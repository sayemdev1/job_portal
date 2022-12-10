<?php
session_start();
include "php/conn.php";
$loggedin = false;
$id = '';
if (isset($_SESSION['admin']) && isset($_SESSION['aid'])) {
	$loggedin = $_SESSION['admin'];
	$id = $_SESSION['aid'];
	
} else {
	header('location: signin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>JOB-PORTAL - Admin Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container-fluid px-md-4	">
			<a class="navbar-brand" href="index.html">JOB-PORTAL</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="browsejobs.php" class="nav-link">Browse Jobs</a></li>
					<li class="nav-item active"><a href="candidates.php" class="nav-link">Canditates</a></li>
					<li class="nav-item cta mr-md-1"><a href="new-post.php" class="nav-link">Post a Job</a></li>
					<li class="nav-item cta cta-colored"><a href="logout.php" class="nav-link">Signout</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-start">
				<div class="col-md-12 ftco-animate text-center mb-5">
					<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
									class="ion-ios-arrow-forward"></i></a></span> <span>Canditates</span></p>
					<h1 class="mb-3 bread">Hire Your Best Candidates</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pr-lg-4">
					<div class="row">

						<?php

                        $query = mysqli_query($con, "select * from user");
                        while ($result = mysqli_fetch_assoc($query)) {
                        ?>
						<div class="col-md-12">
							<div class="team d-md-flex p-4 bg-white">
								<div class="img" style="background-image: url(../<?php echo $result['profile'] ?>);"></div>
								<div class="text pl-md-4">
									<span class="location mb-0">
										<?php echo $result['location'] ?>
									</span>
									<h2>
										<?php echo $result['name'] ?>
									</h2>
									<span class="position">
										<?php echo $result['experience'] ?>
									</span>
									<p class="mb-2">
										<?php echo $result['about'] ?>
									</p>
									<!-- <p><a href="shortlist.php" class="btn btn-primary">Shortlist</a></p> -->
								</div>
							</div>
						</div>

						<?php
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>