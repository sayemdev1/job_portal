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
	<title>JOB-PORTAL | Admin Panel</title>
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
			<a class="navbar-brand" href="index.php">Admin Panel</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="browsejobs.php" class="nav-link">My Jobs</a></li>
					<li class="nav-item"><a href="candidates.php" class="nav-link">Canditates</a></li>
					<li class="nav-item cta mr-md-1"><a href="new-post.php" class="nav-link">Post a Job</a></li>
					<li class="nav-item cta cta-colored"><a href="logout.php" class="nav-link">Signout</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-10 d-flex align-items-center ftco-animate">
					<div class="text text-center pt-5 mt-md-5">
						<h1 class="mb-5">Manage your jobs</h1>
						</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="category-wrap">
						<div class="row no-gutters">
							<div class="col-md-2">
								<div class="top-category text-center no-border-left">
									<h3><a href="#">Website &amp; Software</a></h3>
									<span class="icon flaticon-contact"></span>
									<p><span class="number">
											<?php

                                            $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `jobs` where category='1'"));
                                            echo $num;

                                            ?>
										</span> <span>Open position</span></p>
								</div>
							</div>
							<div class="col-md-2">
								<div class="top-category text-center active">
									<h3><a href="#">Education &amp; Training</a></h3>
									<span class="icon flaticon-mortarboard"></span>
									<p><span class="number">
											<?php

                                            $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `jobs` where category='2'"));
                                            echo $num;

                                            ?>
										</span> <span>Open position</span></p>
								</div>
							</div>
							<div class="col-md-2">
								<div class="top-category text-center">
									<h3><a href="#">Graphic &amp; UI/UX Design</a></h3>
									<span class="icon flaticon-idea"></span>
									<p><span class="number">
											<?php

                                            $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `jobs` where category='3'"));
                                            echo $num;

                                            ?>
										</span> <span>Open position</span></p>
								</div>
							</div>
							<div class="col-md-2">
								<div class="top-category text-center">
									<h3><a href="#">Accounting &amp; Finance</a></h3>
									<span class="icon flaticon-accounting"></span>
									<p><span class="number">
											<?php

                                            $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `jobs` where category='4'"));
                                            echo $num;

                                            ?>
										</span> <span>Open position</span></p>
								</div>
							</div>
							<div class="col-md-2">
								<div class="top-category text-center">
									<h3><a href="#">Restaurant &amp; Food</a></h3>
									<span class="icon flaticon-dish"></span>
									<p><span class="number">
											<?php

                                            $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `jobs` where category='5'"));
                                            echo $num;

                                            ?>
										</span> <span>Open position</span></p>
								</div>
							</div>
							<div class="col-md-2">
								<div class="top-category text-center">
									<h3><a href="#">Health &amp; Hospital</a></h3>
									<span class="icon flaticon-stethoscope"></span>
									<p><span class="number">
											<?php

                                            $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `jobs` where category='6'"));
                                            echo $num;

                                            ?>
										</span> <span>Open position</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-0">All Jobs</h2>
				</div>
			</div>
			<div class="container">
				<div class="row justify-content-center mb-12">
					<div class="col-lg-12 pr-lg-4">
						<div class="row">
							<?php


                            if (isset($_POST['submit2'])) {

	                            $where = "";

	                            $location = $_POST['location'];
	                            $keyword = $_POST['keyword'];
	                            $job_type = $_POST['job_type'];

	                            if ($keyword != null && $location != null && $job_type != null) {
		                            $where = "where jobs.title=" . "'$keyword'" . " and location like " . "'%$location%'" . " and job_type.title = " . "'$job_type'";
	                            }


	                            $sql = "SELECT jobs.id,jobs.title,description,category,experience,salary,name as companyName,location,job_type.title as jobType FROM `jobs` INNER JOIN companies ON companies.id=jobs.company INNER JOIN job_type ON job_type.id=jobs.type " . $where;
	                            $query = mysqli_query(
	                            	$con,
	                            	$sql
	                            );

	                            // echo $sql;
                            
                            } else {
	                            $query = mysqli_query($con, "SELECT jobs.id,jobs.title,description,category,experience,salary,name as companyName,location,job_type.title as jobType FROM `jobs` INNER JOIN companies ON companies.id=jobs.company INNER JOIN job_type ON job_type.id=jobs.type");
                            }



                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
							<div class="col-md-12 ftco-animate">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center">
									<div class="one-third mb-4 mb-md-0">
										<div class="job-post-item-header align-items-center">
											<span class="subadge">
												<?php echo $result['jobType'] ?>
											</span>
											<h2 class="mr-3 text-black"><a href="#">
													<?php echo $result['title'] ?>
												</a></h2>

										</div>
										<div class="job-post-item-body d-block d-md-flex">
											<div class="mr-3"><span class="icon-layers"></span> <a href="#">
													<?php echo $result['companyName'] ?>
												</a></div>
											<div><span class="icon-my_location"></span> <span>
													<?php echo $result['location'] ?>
												</span></div>
										</div>
									</div>

									<div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">

										<a href="job-single.php?id=<?php echo $result['id'] ?>"
											class="btn btn-primary py-2">View Job</a>
									</div>
								</div>
							</div><!-- end -->
							<?php
                            }

                            ?>
						</div>

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