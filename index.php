<!DOCTYPE HTML>
<html lang="en-US">

<?php include 'header.php'; ?>

<body class="body-bg">
	<header>
		<img src="img/logo.png" class="mainLogo" >
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
                  <option value="charcoal">Acivated Charcoal</option>
		  <option value="teatree">Charcoal With Peppermint and Tea Tree</option>
		  <option value="cedar">Charcoal with Cedar</option>
		  <option value="lavender">Charcoal with Lavender</option>
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