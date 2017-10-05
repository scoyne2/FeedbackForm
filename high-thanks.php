<?php
session_start();
$inputs = @$_SESSION['rating_form_data'];
?>
<!DOCTYPE HTML>
<html lang="en-US">

<?php include 'header.php'; ?>

<body class="body-bg">
	<header>
		<img src="img/logo.png" class="mainLogo" >
	</header>
    
	<h1 class="title">Thank You For Your Feedback!</h1>
	<div id="document">
		<p>Check your email for a message from info@5thstreetskin.com which has instructions on how to claim your free product.</p>
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
