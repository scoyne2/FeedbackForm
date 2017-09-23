<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>YourHonestFeedback.com landing page</title>
	<link rel="stylesheet" href="main.css" />
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>
</head>
<body>
	<div id="document">
		<?php include "widgets/logo.php"; ?>
		<h1 class="title">Errors were found:</h1>
		<ul>
		<?php foreach ($errors as $error): ?>
			<li><?= $error ?> was missing/invalid.</li>
		<?php endforeach; ?>
		</ul>
		Please go <a href="./">back</a> and fill in the missing data.
	</div>
</body>
</html>