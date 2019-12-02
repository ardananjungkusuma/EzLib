<!DOCTYPE html>
<html>

<head>
	<title>EzLib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php
	include "connection.php";

	session_start();
	if (isset($_SESSION['status']) == 'user_login') {
		header("Refresh:0; url=user_dashboard.php");
	} else {
		?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<center>
					<div class="single-page-nav sticky-wrapper" id="tmNavbar" style="margin-left:100px;">
						<ul class="nav navbar-nav">
							<li><a href="#section1">Homepage</a></li>
							<li><a href="#section2">Trending Books</a></li>
							<li><a href="#section3">List Buku</a></li>
							<li><a href="#section4">Login/Register</a></li>
						</ul>
					</div>
				</center>
			</div>
		</nav>

		<div id="section1">
			<header id="header-area" class="intro-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<div class="header-content">
								<h1>Ez Library</h1>
								<h5>Your Choice For Online Library</h5>
							</div>
						</div>
					</div>
				</div>
			</header>
		</div>
		<div id="section2">
			<!-- Start Testimornial Area -->
			<section id="testimornial-area" style="padding:50px">
				<div class="container">
					<div class="row text-center" style="margin-top:30px;">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/4-1.jpg" alt="Image">
								<h2>Book One</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis. Fusce posuere egestas enim eu viverra.</p>
								<br>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/4-2.jpg" alt="Image">
								<h2>Book Two</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis.</p>
								<a href="#" class="content-link">read it</a>
								<br>
								<p id="redd"></p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/4-3.jpg" alt="Image">
								<h2>Book Three</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis. Fusce posuere egestas enim eu viverra.</p>
								<br>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
							<div class="testimonial-content">
								<img src="img/stackBook.png" style="width:200" alt="Image">
								<h2>All Books</h2>
								<p>Ut ac odio scelerisque ante ornare commodo. Sed faucibus dui libero, in tincidunt purus pretium quis.</p>
								<a href="viewListBuku.php" class="content-link">details</a>
								<br>
								<p id="dets"></p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Testimornial Area -->
		</div>
		<div id="section3" style="padding-top:110px;">
			<section id="services-area" class="services-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center inner our-service">
							<div class="service">
								<h1>All Book List</h1><br>
								<a href="viewListBuku.php" class="content-link">View All Book Catalogue</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<footer id="footer-area">
			<!-- Slideshow container -->
			<div class="slideshow-container">

				<!-- Full-width slides/quotes -->
				<div class="mySlides">
					<q>A reader lives a thousand lives before he dies . . . The man who never reads lives only one.</q>
					<p class="author">- George R.R. Martin</p>
				</div>

				<div class="mySlides">
					<q>Reading is essential for those who seek to rise above the ordinary.</q>
					<p class="author">- Jim Rohn</p>
				</div>

				<div class="mySlides">
					<q>So please, oh please, we beg, we pray, go throw your TV set away, and in its place you can install a lovely bookshelf on the wall.</q>
					<p class="author">- Roald Dahl</p>
				</div>

				<!-- Next/prev buttons -->
				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>
			</div>

			<!-- Dots/bullets/indicators -->
			<div class="dot-container">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
			</div>
		</footer>
		<div id="section4">
			<!-- Start Login Area #Fix Border Bottom Section Login Or Register-->
			<section id="contact-area" class="contact-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center inner">
							<div class="contact-content">
								<h1>Ez Lib Authentication</h1>
								<div class="form-group">
									<a href="user_login.php"><button class="btn btn-default">Login</button></a>
									<a href="user_register.php"><button class="btn btn-default">Register</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Login Area -->
		</div>

		<!-- Start Footer Area -->
		<footer id="footer-area">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<div class="footer-content">
							<h1>Ez Library</h1>
							<p>“We provides best service for you - Administrator EzLib“</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p class="copy">Copyright © 2019
							| Design: Ardan Anjung Kusuma, Sugeng Prastiyo</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer Area -->

		<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script> <!-- https://github.com/markgoodyear/scrollup -->
		<script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
		<script src="js/parallax.js-1.3.1/parallax.js"></script> <!-- http://pixelcog.github.io/parallax.js/ -->
		<script>
			// HTML document is loaded. DOM is ready.
			$(function() {

				// Parallax
				$('.intro-section').parallax({
					imageSrc: 'img/header1.jpg',
					speed: 0.2
				});
				$('.services-section').parallax({
					imageSrc: 'img/headerAllBooks.jpg',
					speed: 0.2
				});
				$('.contact-section').parallax({
					imageSrc: 'img/headerLogin.jpg',
					speed: 0.2
				});

				// jQuery Scroll Up / Back To Top Image
				$.scrollUp({
					scrollName: 'scrollUp', // Element ID
					scrollDistance: 300, // Distance from top/bottom before showing element (px)
					scrollFrom: 'top', // 'top' or 'bottom'
					scrollSpeed: 1000, // Speed back to top (ms)
					easingType: 'linear', // Scroll to top easing (see http://easings.net/)
					animation: 'fade', // Fade, slide, none
					animationSpeed: 300, // Animation speed (ms)		        
					scrollText: '', // Text for element, can contain HTML		        
					scrollImg: true // Set true to use image		        
				});

				// ScrollUp Placement
				$(window).on('scroll', function() {

					// If the height of the document less the height of the document is the same as the
					// distance the window has scrolled from the top...
					if ($(document).height() - $(window).height() === $(window).scrollTop()) {

						// Adjust the scrollUp image so that it's a few pixels above the footer
						$('#scrollUp').css('bottom', '80px');

					} else {
						// Otherwise, leave set it to its default value.
						$('#scrollUp').css('bottom', '30px');
					}
				});

				$('.single-page-nav').singlePageNav({
					offset: $('.single-page-nav').outerHeight(),
					speed: 1500,
					filter: ':not(.external)',
					updateHash: true
				});

				$('.navbar-toggle').click(function() {
					$('.single-page-nav').toggleClass('show');
				});

				$('.single-page-nav a').click(function() {
					$('.single-page-nav').removeClass('show');
				});

			});
			var slideIndex = 1;
			showSlides(slideIndex);

			function plusSlides(n) {
				showSlides(slideIndex += n);
			}

			function currentSlide(n) {
				showSlides(slideIndex = n);
			}

			function showSlides(n) {
				var i;
				var slides = document.getElementsByClassName("mySlides");
				var dots = document.getElementsByClassName("dot");
				if (n > slides.length) {
					slideIndex = 1
				}
				if (n < 1) {
					slideIndex = slides.length
				}
				for (i = 0; i < slides.length; i++) {
					slides[i].style.display = "none";
				}
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex - 1].style.display = "block";
				dots[slideIndex - 1].className += " active";
			}
		</script>
	<?php
	}
	?>

</body>

</html>