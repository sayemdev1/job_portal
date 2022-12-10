<?php
session_start();

include "php/conn.php";
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  $sql = "Select * from admin where email='$email' and password='$password'";
  $query = mysqli_query($con, $sql);
  if(mysqli_num_rows($query)>0){
    $data = mysqli_fetch_assoc($query);
    $success = "Login successfull";
    $_SESSION['admin']=true;
    $_SESSION['aid'] = $data['id'];

    
    header('Location: index.php');
  }else{
    $success = "Password doesn't matched";
  }

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
          <!-- <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li> -->
          <!-- <li class="nav-item"><a href="browsejobs.php" class="nav-link">Browse Jobs</a></li> -->
          <!-- <li class="nav-item cta mr-md-1"><a href="registration.php" class="nav-link">Signup</a></li> -->
          <!-- <li class="nav-item cta cta-colored"><a href="job-post.html" class="nav-link">Want a Job</a></li> -->

        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <!-- <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <h1 class="mb-3 bread">Login in your account</h1>
        </div>
      </div>
    </div>
  </div> -->


  <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="col-md-12 order-md-last d-flex">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-5 contact-form">
         <center> <h3 class="form-group">Login</h3></center>
          <div class="form-group">
            <input  class="form-control" placeholder="Enter username" name="email">
          </div>
          
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter password" name="password">
          </div>
          <div class="alert-warning" id="message">
            <?php if (isset($success)) {
            echo $success;
          } ?>
                    <div></div>

          </div>

            <center>
              <div class="form-group">
                <input name="submit" type="submit" value="Sign in" class="btn btn-primary py-3 px-5">
              </div>
            </center>
          
        </form>

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