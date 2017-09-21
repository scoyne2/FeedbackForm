<?php

class Request {
	protected $endPoint;
	protected $params;
	public function __construct(array $params = array()) {
		$this->params = $params;
	}

	public function url($url, array $data = array()) {
		$qm = strpos($url, '?') !== false;
		$query = http_build_query($data, null, '&');
		if ($qm) {
			return $url . '&' . $query;
		}
		return $url . '?' . $query;
	}

	public function request($url, $method, array $idata = array()) {
		$c = curl_init();

		$data = array_merge($this->params, $idata);

		if (strtolower($method) === 'get') {
			$url = $this->url($url, $data);
		}

		$options = array(
			CURLOPT_URL => $this->url($url),
			CURLOPT_TIMEOUT => 30,
			CURLOPT_RETURNTRANSFER => true,
		);

		if (strtolower($method) !== 'get') {
			$options[CURLOPT_POSTFIELDS] = http_build_query($data, NULL, '&');
		}

		switch (strtolower($method)) {
		case 'put':
			$options[CURLOPT_PUT] = true;
			break;
		case 'post':
			$options[CURLOPT_POST] = true;
			break;
		case 'get':
			$options[CURLOPT_HTTPGET] = true;
			break;
		}

		curl_setopt_array($c, $options);

		$response = curl_exec($c);

		if ($response === false) {
			$code = curl_errno($c);
			$error = curl_error($c);
			curl_close($c);
			throw new Exception("cURL issued an error while trying to contact Klaviyo: [$code] $error");
		}

		curl_close($c);

		return $response;
		
	}

	public function get($url, array $data = array()) {
		return $this->request($url, 'GET', $data);
	}

	public function post($url, array $data = array()) {
		return $this->request($url, 'POST', $data);
	}

	static public function test() {
		$cfg = include "config.php";
		
		$rq = new self($cfg['request_params']);

		$result = $rq->get('https://a.klaviyo.com/api/v1/list/' . $cfg['list_id']);
		var_dump($result);
	}
}

class KlaviyoList {
	protected $rq;
	protected $endPoint = 'https://a.klaviyo.com/api/v1/';
	protected $id;
	public function __construct($cfg) {
		$this->rq = new Request($cfg['request_params']);
		$this->id = $cfg['list_id'];
	}

	public function addPerson($email, $name, $product, $rating, $comments) {
		$details = array(
			'email' => $email,
			'properties' => json_encode(array(
				'name' => $name,
				'product' => $product,
				'rating' => $rating,
				'comments' => $comments,
			)),
			'confirm_optin' => true,
		);

		return $this->rq
			->post(
				$this->endPoint . 'list/' . $this->id . '/members',
				$details
			);
	}

	public static function test() {
		$k = new KlaviyoList(include 'config.php');
		$result = $k->addPerson(
			'lucas.m.green@gmail.com',
			'Lucas Green',
			'asdf',
			'5',
			'aasdfaksdfjkasdflkj asdf f'
		);
		var_dump($result);
	}
}


//Request::test();
