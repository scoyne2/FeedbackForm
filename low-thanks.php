<?php session_start(); ?>
	
	<!DOCTYPE HTML>
	<html lang="en-US">
	
	<?php include 'header.php'; ?>
	
	<script>
		fbq('track', 'FeedbackRegistrationPoor', {
		value: 00.00,
		currency: 'USD'
		});
	</script>
		
		<body class="body-bg">
			<header>
				<img src="img/logo.png" class="mainLogo" >
			</header>
			    
			<h1 class="title">Thank You For Your Feedback!</h1>
			<div id="document">
				<p>Check your mail for an email from feedback@5thstreetskin.com which has instructions on how to claim your free product.</p>
			</div>
		</body>
	</html>
	<?php

session_destroy();
session_unset();
