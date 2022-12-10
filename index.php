<?php
session_start();

include "php/conn.php";

$loggedin = false;
$id = '';
if (isset($_SESSION['loggedin']) && isset($_SESSION['id'])) {
	$loggedin = $_SESSION['loggedin'];
	$id = $_SESSION['id'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>JOB-PORTAL - Free Bootstrap 4 Template by Colorlib</title>
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
			<a class="navbar-brand" href="index.php">JOB-PORTAL</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="browsejobs.php" class="nav-link">Browse Jobs</a></li>
					<!-- <li class="nav-item"><a href="candidates.html" class="nav-link">Canditates</a></li> -->
					<!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
					<!-- <li class="nav-item cta mr-md-1"><a href="new-post.html" class="nav-link">Post a Job</a></li> -->
					<?php
                    if ($loggedin == true) {
                    ?>
					<li class="nav-item cta cta-colored"><a href="logout.php" class="nav-link">Signout</a></li>
					<!-- session_destroy(); -->
					<?php
                    } else {
                    ?>
					<li class="nav-item cta cta-colored"><a href="registration.php" class="nav-link">Signup</a></li>
					<?php
                    }
                    ?>

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
						<p class="mb-4">Find Job, Employment, and Career Opportunities</p>
						<h1 class="mb-5">
							<?php
                            if ($id != '') {
	                            $data = mysqli_fetch_assoc(mysqli_query($con, "select * from user where id='$id'"));
	                            echo "Welcome " . $data['name'] . "<br>";

                            }

                            ?>
							The Eassiest Way to Get Your New Job
						</h1>
						<div class="ftco-search my-md-5">
							<div class="row">
								<div class="col-md-12 nav-link-wrap">
									<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
										aria-orientation="vertical">
										<a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
											href="#v-pills-1" role="tab" aria-controls="v-pills-1"
											aria-selected="true">Find a Job</a>

										<!-- <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
											role="tab" aria-controls="v-pills-2" aria-selected="false">Find a
											Candidate</a> -->

									</div>
								</div>
								<div class="col-md-12 tab-wrap">

									<div class="tab-content p-4" id="v-pills-tabContent">

										<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
											aria-labelledby="v-pills-nextgen-tab">
											<form action="browsejobs.php" method="post" class="search-job">
												<div class="row no-gutters">
													<div class="col-md mr-md-2">
														<div class="form-group">
															<div class="form-field">
																<div class="icon"><span class="icon-briefcase"></span>
																</div>
																<input type="text" name="keyword" class="form-control"
																	placeholder="eg. Garphic. Web Developer">
															</div>
														</div>
													</div>
													<div class="col-md mr-md-2">
														<div class="form-group">
															<div class="form-field">
																<div class="select-wrap">
																	<div class="icon"><span
																			class="ion-ios-arrow-down"></span></div>
																	<select name="job_type" id="" class="form-control">
																		<option value="">Category</option>
																		<?php

                                                                        $mainCat = [];
                                                                        $catQ = mysqli_query($con, "select * from job_type");
                                                                        while ($resultCat = mysqli_fetch_assoc($catQ)) {
                                                                        ?>
																		<option
																			value="<?php echo $resultCat['title'] ?>">
																			<?php echo $resultCat['title'] ?>
																		</option>

																		<?php


                                                                        }
                                                                        ?>

																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md mr-md-2">
														<div class="form-group">
															<div class="form-field">
																<div class="icon"><span class="icon-map-marker"></span>
																</div>
																<input type="text" name="location" class="form-control"
																	placeholder="Location">
															</div>
														</div>
													</div>
													<div class="col-md">
														<div class="form-group">
															<div class="form-field">
																<button type="submit" name="submit2"
																	class="form-control btn btn-primary">Search</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>

										<div class="tab-pane fade" id="v-pills-2" role="tabpanel"
											aria-labelledby="v-pills-performance-tab">
											<form action="#" class="search-job">
												<div class="row">
													<div class="col-md">
														<div class="form-group">
															<div class="form-field">
																<div class="icon"><span class="icon-user"></span></div>
																<input type="text" class="form-control"
																	placeholder="eg. Adam Scott">
															</div>
														</div>
													</div>
													<div class="col-md">
														<div class="form-group">
															<div class="form-field">
																<div class="select-wrap">
																	<div class="icon"><span
																			class="ion-ios-arrow-down"></span></div>
																	<select name="" id="" class="form-control">
																		<option value="">Category</option>
																		<option value="">Full Time</option>
																		<option value="">Part Time</option>
																		<option value="">Freelance</option>
																		<option value="">Internship</option>
																		<option value="">Temporary</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md">
														<div class="form-group">
															<div class="form-field">
																<div class="icon"><span class="icon-map-marker"></span>
																</div>
																<input type="text" class="form-control"
																	placeholder="Location">
															</div>
														</div>
													</div>
													<div class="col-md">
														<div class="form-group">
															<div class="form-field">
																<button type="submit"
																	class="form-control btn btn-primary">Search</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
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
	                            $query = mysqli_query($con, "SELECT jobs.id as jid,jobs.title,description,category,experience,salary,name as companyName,location,job_type.title as jobType FROM `jobs` INNER JOIN companies ON companies.id=jobs.company INNER JOIN job_type ON job_type.id=jobs.type");
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
										<?php
	                            $jId = $result['jid'];
	                            $num = mysqli_num_rows(mysqli_query($con, "select * from candidates where job_id='$jId' and candidate_id='$id'"));

	                            if ($num < 1) { ?>
										<a href="job-single.php?id=<?php echo $result['jid'] ?>"
											class="btn btn-primary py-2">Apply Job</a>
										<?php
	                            } else {

                                        ?>
										<div><button disabled class="form-control btn btn-primary">Applied</button>
										</div>
										<?php
	                            }

                                        ?>
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