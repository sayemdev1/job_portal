<?php
session_start();
include "php/conn.php";
$id = $_GET['id'];
$uid = '';
$loggedin = false;
if (isset($_SESSION['loggedin']) && isset($_SESSION['id'])) {
  $loggedin = $_SESSION['loggedin'];
  $uid = $_SESSION['id'];
}


if (isset($_POST['submit'])) {

  mysqli_query($con, "INSERT INTO `candidates` (`job_id`, `candidate_id`) VALUES ('$id', '$uid')");
}


if (isset($_POST['login'])) {
  header('Location: signin.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>JOB-PORTAL</title>
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
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="browsejobs.php" class="nav-link">Browse Jobs</a></li>
          <!-- <li class="nav-item"><a href="candidates.php" class="nav-link">Canditates</a></li> -->
          <!-- <li class="nav-item cta mr-md-1"><a href="new-post.html" class="nav-link">Post a Job</a></li>
          <li class="nav-item cta cta-colored"><a href="job-post.html" class="nav-link">Want a Job</a></li> -->
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

  <?php

  $query = mysqli_query($con, "SELECT companies.address as address,jobs.id,jobs.deadline,jobs.title,description,category,experience,salary,name as companyName,companies.logo,companies.about,location,job_type.title as jobType FROM `jobs` INNER JOIN companies ON companies.id=jobs.company INNER JOIN job_type ON job_type.id=jobs.type where jobs.id='$id'");
  $result = mysqli_fetch_assoc($query);
    $sort='';
  if($loggedin==true){
    $q = mysqli_query($con,"select * from candidates where job_id='$id' and candidate_id='$uid'");

    $data = mysqli_fetch_assoc($q);
    if($data['status']==1){
      $sort = "[Shortlisted]";
    }

  }

  ?>

  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span class="mr-3"><a href="browsejobs.php">Jobs <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Job Details</span></p>
          <h1 class="mb-3 bread">
            <?php echo $result['title'] ?>
          </h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ftco-animate">
          <h2 class="mb-3">
            <?php echo $result['title'].$sort ?>
          </h2>
          <p>
            <?php echo $result['description'] ?>
          </p>

          <div class="about-author d-flex p-4 bg-light">
            <div class="bio mr-5">
              <img src="images/<?php echo $result['logo'] ?>" alt="Image placeholder" class="img-fluid mb-4">
            </div>
            <div class="desc">
              <h3>
                <?php echo $result['companyName'] ?>
              </h3>
              <p>
                <?php echo $result['about'] ?>
              </p>
            </div>
          </div>


        </div> <!-- .col-md-8 -->

        <div class="col-lg-4 sidebar">
          <div class="sidebar-box bg-white p-4 ftco-animate">
            <h3 class="heading-sidebar">Job Type</h3>
            <p>
              <?php echo $result['jobType'] ?>
            </p>
            <h3 class="heading-sidebar">Experience</h3>
            <p>
              <?php echo $result['experience'] ?> Years
            </p>
            <h3 class="heading-sidebar">Salary</h3>
            <p>
              <?php echo $result['salary'] ?>
            </p>
            <h3 class="heading-sidebar">Deadline</h3>
            <p>
              <?php echo $result['deadline'] ?>
            </p>
            <h3 class="heading-sidebar">Address</h3>
            <p>
              <?php echo $result['address'] . ", " . $result['location'] ?>
            </p>
          </div>
        </div>

      </div>

    </div>

    </div>
    <center>
      <div class="col-md-6 ftco-animate">
        <form action="" method="post" class="bg-white p-4 contact-form">
          <input type="text" id="id" name="id" hidden value="<?php echo $id ?>">
          <?php

          $num = mysqli_num_rows(mysqli_query($con, "select * from candidates where job_id='$id' and candidate_id='$uid'"));
          if($loggedin==false){
            ?>
            <div><button type="submit" name="login" class="form-control btn btn-primary">Login First</button></div> 
          <?php
          }
          else if ($num < 1) { ?>
          <div><button type="submit" name="submit" class="form-control btn btn-primary">Apply Here</button></div>
          <?php
          } else {

          ?>
          <div><button disabled class="form-control btn btn-primary">Applied</button></div>
          <?php
          }

          ?>
        </form>
      </div>
    </center>
  </section> <!-- .section -->

  <!-- <?php //echo "job-single.php?id=".$id; ?> -->
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