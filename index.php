<?PHP

require('./classes/Inventory.php');
require('./classes/ShoppingCart.php');

$inventory = new Inventory();
$products = $inventory->loadData();

$shopping_cart = new ShoppingCart();
$cart = $shopping_cart->getCart();

// var_dump($cart['cart']);

?>

<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords"
		content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script>
		function processProduct(id, action = "add") {
			fetch('./controllers/process.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: new URLSearchParams({ id, action })
			})
				.then(response => response.json())
				.then(data => {
					location.reload();
				})
				.catch(error => console.error('Error:', error));
		}

		function plusProduct(id){
			processProduct(id, 'plus');
		}

		function minusProduct(id){
			processProduct(id, 'minus');
		}
	</script>
</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-2">
						<div id="fh5co-logo"><a href="index.html">Shop.</a></div>
					</div>
					<div class="col-md-6 col-xs-6 text-center menu-1">
						<ul>
							<li class="has-dropdown">
								<a href="product.html">Shop</a>
								<ul class="dropdown">
									<li><a href="single.html">Single Shop</a></li>
								</ul>
							</li>
							<li><a href="#">About</a></li>
							<li class="has-dropdown">
								<a href="#">Services</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
						<ul>
							<li class="search">
								<div class="input-group">
									<input type="text" placeholder="Search..">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button"><i
												class="icon-search"></i></button>
									</span>
								</div>
							</li>
							<li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i
											class="icon-shopping-cart"></i></span></a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Products.</h2>
						<div id="result"></div>
					</div>
				</div>
				<div class="row">
					<?php
					for ($i = 0; $i < count($products); $i++) {
						echo '<div class="col-md-4 text-center animate-box">';
						echo '	<div class="product">';
						echo '		<div class="product-grid" style="background-image:url(images/product-1.jpg);">';
						echo '			<div class="inner">';
						echo '				<p>';
						echo '					<a href="javascript:processProduct(' . $products[$i]['id'] . ')" class="icon" id="fetchData"><i class="icon-shopping-cart"></i></a>';
						echo '				</p>';
						echo '			</div>';
						echo '		</div>';
						echo '		<div class="desc">';
						echo '			<h3><a href="single.html">' . $products[$i]['name'] . '</a></h3>';
						echo '			<span class="price">$' . $products[$i]['price'] . '</span>';
						echo '		</div>';
						echo '	</div>';
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>

		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>Checkout.</h2>
						<div id="result"></div>
					</div>
				</div>
				<div class="row">

					<div class="panel panel-default">

						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading">Panel heading</div>

							<!-- Table -->
							<table class="table">
								<tr>
									<th>Product</th>
									<th>Price / Unit</th>
									<th>Price per product</th>
									<th>Cant</th>
								</tr>
								<?php
								for ($i = 0; $i < count($cart['cart']); $i++) {
									echo '<tr>';
										echo '<td>' . $cart['cart'][$i]['name'] . '</td>';
										echo '<td>' . $cart['cart'][$i]['price'] . '</td>';
										echo '<td>' . $cart['cart'][$i]['total_price'] . '</td>';
										echo '<td>';
										echo '<div class="cart-product-control" role="group" aria-label="...">';
											echo '<a class="btn btn-default" href="javascript:minusProduct('.$cart['cart'][$i]['id'].')">-</a>';
											echo '<input type="text" value="' . $cart['cart'][$i]['cant'] . '" id="product-cant-input-'.$cart['cart'][$i]['id'].'"></input>';
											echo '<a class="btn btn-default" href="javascript:plusProduct('.$cart['cart'][$i]['id'].')">+</a>';
										echo '</div>';
										echo '</td>';
									echo '</tr>';
								}

								echo '<tr>';
								echo '<td>Total:</td>';
								echo '<td></td>';
								echo '<td>' . $cart['total_price'] . '</td>';
								echo '<td>' . $cart['total_products'] . '</td>';
								echo '</td>';
								echo '</tr>';
								?>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div id="fh5co-started">
				<div class="container">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2>Newsletter</h2>
							<p>Just stay tune for our latest Product. Now you can subscribe</p>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2">
							<form class="form-inline">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label for="email" class="sr-only">Email</label>
										<input type="email" class="form-control" id="email" placeholder="Email">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<button type="submit" class="btn btn-default btn-block">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer id="fh5co-footer" role="contentinfo">
				<div class="container">
					<div class="row row-pb-md">
						<div class="col-md-4 fh5co-widget">
							<h3>Shop.</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque
								dicta adipisci architecto culpa amet.</p>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
							<ul class="fh5co-footer-links">
								<li><a href="#">About</a></li>
								<li><a href="#">Help</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Meetups</a></li>
							</ul>
						</div>

						<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
							<ul class="fh5co-footer-links">
								<li><a href="#">Shop</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#">Testimonials</a></li>
								<li><a href="#">Handbook</a></li>
								<li><a href="#">Held Desk</a></li>
							</ul>
						</div>

						<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
							<ul class="fh5co-footer-links">
								<li><a href="#">Find Designers</a></li>
								<li><a href="#">Find Developers</a></li>
								<li><a href="#">Teams</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</div>
					</div>

					<div class="row copyright">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
								<small class="block">Designed by <a href="http://freehtml5.co/"
										target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/"
										target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/"
										target="_blank">Unsplash</a></small>
							</p>
							<p>
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
							</p>
						</div>
					</div>

				</div>
			</footer>
		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
		</div>

		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Carousel -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- countTo -->
		<script src="js/jquery.countTo.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>

</body>

</html>