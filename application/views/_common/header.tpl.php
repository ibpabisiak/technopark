<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>GymHero &mdash; Technopark project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="application/views/_common/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="application/views/_common/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="application/views/_common/css/bootstrap.css">
	
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="application/views/_common/css/owl.carousel.min.css">
	<link rel="stylesheet" href="application/views/_common/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="application/views/_common/css/style.css">

	<!-- Modernizr JS -->
	<script src="application/views/_common/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">

		
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php">GymHERO<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<!-- <li class="active"><a href="index.html">Home</a></li> -->
							<!--<li class="active"><a href="index.php?module=diets">Plan diety</a></li>
							<li><a href="#">Ćwiczenia</a></li>
							<li><a href="#">Postępy</a></li>
							-->
							
							
							
							<?php
								if(!Functions::IsLogged()) {
									echo "							
									<li class=\"btn-cta\"><a href=\"index.php?module=login\"><span>Logowanie</span></a></li>
									<li class=\"btn-cta\"><a href=\"index.php?module=register\"><span>Rejestracja</span></a></li>";
								} else { 
									echo "
									<li><a href=\"index.php?module=trainingplan\">Plany treningowe</a></li>
									<li><a href=\"index.php?module=body\">Pomiary ciała</a></li>
									<li class=\"btn-cta\"><a href=\"index.php?module=login&page=logout\"><span>Wyloguj</span></a></li>";
								}
							?>

						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(application/views/_common/images/homebg.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>YOU ARE <strong>WHAT YOU EAT</strong></h1>
							<!--<p><a href="#" class="btn btn-primary btn-lg with-arrow">Join us</a></p>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	