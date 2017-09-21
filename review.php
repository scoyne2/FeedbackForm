<?php

session_start();
$cfg = include 'config.php';
require_once "Request.php";

$validators = array(
	'name' => function ($a) { return !empty($a);},
	'email' => function ($a) { return filter_var($a, FILTER_VALIDATE_EMAIL) === $a; },
	//TODO: validate against list
	'product' => function ($a) { return $a === $a; },
	'rating' => function ($a) { return is_numeric($a); },
	'comments' => function ($a) { return true; }
);

$errors = [];
foreach ($validators as $k => $validator) {
	if (!$validator(@$_POST[$k])) {
		$errors[] = $k;
	}
}

$_SESSION['rating_form_data'] = array();
foreach ($validators as $k => $v) {
	$_SESSION['rating_form_data'][$k] = $_POST[$k];
}

if (!empty($errors)) {
	include "errors.php";
	exit;
}

if (empty($cfg['debug'])) {
	$k = new KlaviyoList($cfg);
	$result = $k->addPerson(
		$_POST['email'],
		$_POST['name'],
		$_POST['product'],
		$_POST['rating'],
		$_POST['comments']
	);
}

if ($_POST['rating'] > 3) {
	header('Location: hi-thanks.php');
	exit;
}

header('Location: lo-thanks.php');
