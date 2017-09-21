<?php
session_start();
$inputs = @$_SESSION['rating_form_data'];
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Share Your Feedback</title>
	<link rel="stylesheet" href="main.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="main.js"></script>
	
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1028812600492089'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1028812600492089&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

</head>
<script>
fbq('track', 'FeedbackRegistrationGood', {
value: 00.00,
currency: 'USD'
});
</script>



<body class="body-bg">
	<header>
		<?php include "widgets/logo.php"; ?>
    </header>
    
    <h1 class="title">Thank You For Your Feedback!</h1>
	<div id="document">
		<p>Check your mail for an email from feedback@foxbrim.com which has instructions on how to claim your free product.</p>
		
		<p> Our Amazon audience would love to hear about your experience. Just copy your feedback from below, click the 'Share on Amazon' button and paste into the text box that opens in a new tab.</p>
		<div class="input-group">
			<label for="#">Your Rating</label>
			<div class="rating-input disabled">
				<div class="rating-wrapper">
					<input type="radio" name="rating"  disabled="disabled" id="stars-0" value="0" checked="checked" />
					<label class="nostars" for="stars-0"></label>
					<?php for ($i = 1; $i < 6; $i += 1): ?>
					<input 
						type="radio"
						name="rating"
						disabled="disabled"
						id="stars-<?= $i; ?>"
						<?php if ($i == $inputs['rating']): ?>
						checked="checked"
						<?php endif; ?>
						value="<?= $i; ?>"
					/>
					<label for="stars-<?= $i; ?>"></label>
					<?php endfor; ?>
				</div>
			</div>
		</div>
		<div class="input-group">
			<label for="comments">Feedback</label>
			<textarea name="comments" id="comments" cols="30" rows="10" disabled="disabled"><?= $inputs['comments']; ?></textarea>
		</div>

		<div class="input-group">
			<a
				class="button"
				href="https://www.amazon.com/review/create-review/ref=cm_cr_dp_d_wr_but_top?ie=UTF8&channel=glance-detail&asin=<?= urlencode($inputs['product']); ?>#"
				target="_blank"
			>Share On Amazon</a>
		</div>
	</div>
</body>
</html>
<?php

session_destroy();
session_unset();
