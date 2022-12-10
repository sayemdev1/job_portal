<?php
session_start();
include "php/conn.php";
$loggedin = false;
$id = '';
if (isset($_SESSION['admin']) && isset($_SESSION['aid'])) {
  $loggedin = $_SESSION['admin'];
  $id = $_SESSION['aid'];

  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $company = $_POST['company'];
    $description = $_POST['description'];
    $jobType = $_POST['jobType'];
    $experience = $_POST['experience'];
    $category = $_POST['category'];
    $salary = $_POST['salary'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO `jobs`(`title`, `description`, `category`, `company`, `experience`, `salary`, `type`, `deadline`)
     VALUES ('$title','$description','$category','$company','$experience','$salary','$jobType','$deadline')";
    $query = mysqli_query($con, $sql);

    
  }

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="get_company_info.js"></script>

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
          <li class="nav-item"><a href="candidates.php" class="nav-link">Canditates</a></li>
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
          <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.php">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>Job Post</span></p>
          <h1 class="mb-3 bread">Post A Job</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-8 mb-5">

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="p-5 bg-white">

            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Job Title</label>
                <input type="text" id="fullname" name="title" required class="form-control"
                  placeholder="eg. Professional UI/UX Designer">
              </div>
            </div>

            <div class="row form-group mb-5">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="category">Category</label>
                <select class="form-control" required id="category" name="category">
                  <option value="">Select Category</option>
                  <?php
                  $query = mysqli_query($con, "select * from category");
                  while ($data = mysqli_fetch_assoc($query)) {

                  ?>
                  <option value="<?php echo $data['id'] ?>">
                    <?php echo $data['name'] ?>
                  </option>
                  <?php
                  }
                  ?>

                </select>
                <!-- <input type="text" id="fullname" class="form-control" placeholder="eg. Facebook, Inc."> -->
              </div>
            </div>


            <div class="row form-group mb-5">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="company">Company</label>
                <select class="form-control" required id="company" name="company">
                  <option value="">Select Company</option>
                  <?php
                  $query = mysqli_query($con, "select * from companies");
                  while ($data = mysqli_fetch_assoc($query)) {

                  ?>
                  <option value="<?php echo $data['id'] ?>">
                    <?php echo $data['name'] ?>
                  </option>
                  <?php
                  }
                  ?>

                </select>
                <!-- <input type="text" id="fullname" class="form-control" placeholder="eg. Facebook, Inc."> -->
              </div>
            </div>


            <div class="row form-group">
              <div class="col-md-12">
                <h3>Job Type</h3>
              </div>
              <div class="col-md-12 mb-3 mb-md-0">
                <select class="form-control" required id="jobType" name="jobType">
                  <option value="">Select Job Type</option>
                  <?php
                  $query = mysqli_query($con, "select * from job_type");
                  while ($data = mysqli_fetch_assoc($query)) {

                  ?>
                  <option value="<?php echo $data['id'] ?>">
                    <?php echo $data['title'] ?>
                  </option>
                  <?php
                  }
                  ?>

                </select>
                <!-- <input type="text" id="fullname" class="form-control" placeholder="eg. Facebook, Inc."> -->
              </div>
            </div>


            <div class="row form-group mb-4">
              <div class="col-md-12">
                <h3>Experience</h3>
              </div>
              <div class="col-md-12 mb-3 mb-md-0">
                <input type="number" class="form-control" name="experience" placeholder="Ex: 2">
              </div>
            </div>

            <div class="row form-group mb-4">
              <div class="col-md-12">
                <h3>Salary</h3>
              </div>
              <div class="col-md-12 mb-3 mb-md-0">
                <input type="number" class="form-control" name="salary" placeholder="Ex: 1000000">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <h3>Job Description</h3>
              </div>
              <div class="col-md-12 mb-3 mb-md-0">
                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
              </div>
            </div>
            <div class="row form-group mb-4">
              <div class="col-md-12">
                <h3>Deadline</h3>
              </div>
              <div class="col-md-12 mb-3 mb-md-0">
                <input type="date" name="deadline" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="post" name="submit" class="btn btn-primary  py-2 px-5">
              </div>
            </div>


          </form>
        </div>

        <div class="col-lg-4">
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3" id="companyName">Company name</h3>
            <p class="mb-0 font-weight-bold">Address</p>
            <p class="mb-4" id="address">203 Fake St. Mountain View, San Francisco, California, USA</p>

            <p class="mb-0 font-weight-bold">Phone</p>
            <p class="mb-4" id="phone">+1 232 3235 324</p>

          </div>

          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">More Info</h3>
            <p id="about">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia
              architecto hic
              consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
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