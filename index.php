<?php
session_start();
$inputs = @$_SESSION['rating_form_data'];

ini_set('auto_detect_line_endings', '1');
require_once "vendor/autoload.php";

use League\Csv\Reader;

$csv = Reader::createFromPath(realpath('products.csv'));
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Foxbrim Naturals</title>
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
<body class="body-bg">
	<header>
		<?php include "widgets/logo.php"; ?>
    </header>
    
    <h1 class="title">Thank You For Your Feedback!</h1>
	<div id="document">
		<p>Share your experience with our products, and we'll send you instruction on how to claim a product of your choice, free of charge!*</p>
		<form action="review.php" method="POST">
            <div class="input-group input-half">
                <label for="name">Name</label>
                <input type="text" value="<?= $inputs['name']; ?>" name="name" id="name" required />
            </div>
            <div class="input-group input-half right">
                <label for="email">Email</label>
                <input type="email" value="<?= $inputs['email']; ?>" name="email" id="email" required />
            </div>
            <div class="input-group input-half">
                <label for="product">Product</label>
                <select name="product" id="product"required >
                    <option disabled="disabled" selected="selected"></option>
                    <?php
                    foreach ($csv->fetch() as $line) {
                        $name = htmlentities($line[0]);
                        $val = htmlentities($line[1]);
                        echo '<option value="', $val,'"';
                        if ($inputs['product'] == $val) {
                            echo ' selected="selected" ';
                        }
                        echo '>', $name, '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="input-group input-half right">
                <label for="#">Rating</label>
                <div class="rating-input enabled">
                    <div class="rating-wrapper">
                        <input type="radio" name="rating" id="stars-0" value="0" checked="checked" />
                        <label class="nostars" for="stars-0"></label>
                        <?php for ($i = 1; $i < 6; $i += 1): ?>
                        <input
                            type="radio"
                            name="rating"
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
                <textarea name="comments" id="comments" cols="30" rows="10" required><?= $inputs['comments']; ?></textarea>
            </div>
            <div class="input-group">
                <input type="submit" value="Share your Feedback!" />
            </div>
            <div class="input-group">
            *Limit one free product per customer.
            </div>
		</form>
	</div>
</body>
</html>