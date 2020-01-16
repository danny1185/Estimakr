<?php
     session_start();
     include('includes/variables.php');
?>

<html>
    <head>
     <title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
<style>
 
    

   
   
    #headerNav {
        background-color: #1C2331;
    }
    #formContainer {
        /* border: solid 1px black; */
        margin-top: 250px;
    }
    #signUpFormHeader {
        color: white;
        font-family: 'lora';
        padding-top: 3px;
        padding-bottom: 3px;
        border-radius: 5px;
    }
    #signUpSubHeader {
      font-family: 'lora';
      font-size: 18px;
      margin-bottom: 30px;
    }
    #footerContainer {
        background-color: #1C2331;
    }
    /* Extra small devices (portrait phones, less than 576px) */
    @media (max-width: 575px) {

#formContainer {
  margin-top: 80px;
  margin-bottom: -10px;
}

}

    @media (max-width: 740px) {
    
    }

    @media (min-width: 800px) and (max-width: 850px) {
     
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
    </style>
    </head>
<body >
   
<!-- Navbar -->
<!--<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="headerNav">
    <div class="container">

      <a class="navbar-brand" href="index.html">
        <span style="font-family: 'playfair display', serif; font-size: 24px;">Estimakr</span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>

        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="" class="nav-link" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item ml-5">
            <a class="nav-link" href="signIn.php">Login</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Sign Up</a>
          </li>
        </ul>

      </div>

    </div>
  </nav>-->
  <?php 
        if(!$_SESSION['role_id'])
        {
            require_once('components/visitorMainNav.php');
        }else if($_SESSION['role_id'] == 1)
        {
            require_once('components/customerMainNav.php');
        }else if($_SESSION['role_id'] == 2)
        {
            require_once('components/shopMainNav.php');
        }
    ?>
  <!-- Navbar -->

<div class="container" id="formContainer">
    <center>
    <form  class="formstyle validate col-md-8 col-lg-6 mr-auto ml-auto" id="register_form">
    <div class="form-group">
        <h2 align="center" class="bg-primary z-depth-2" id="signUpFormHeader">Sign Up</h2>
        <p id="signUpSubHeader">Are you an auto body shop or are you looking to <br>get your car repaired?</p>
        <div id="resultstatus"></div>
	        <select class="form-control z-depth-1 accounttype" name="accounttype">
	        	<option value="">Select Account Type</option>
	        	<option value="1">Customer</option>
	        	<option value="2">Auto Shop</option>
	        </select>
	        <br>
            <input type="text" class="form-control" name="firstName"  placeholder="Enter FirstName" required> <br>
            <input type="text" class="form-control" name="lastName"  placeholder="Enter LastName" required> <br>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required> 
    </div>
    <div class="form-group">    
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase, lowercase, and at least 8 characters" required  data-parsley-pattern="((?=.*\d)(?=.*[A-Z])(?=.*\W).{6,15})">
    </div>
    <div class="registerformfields"></div>
    <input type="hidden" name="submit" value="save">
    <button type="button"  value="save" class="btn btn-primary register-btn">Submit</button>
    </form>
        <div class="text-center p-t-115"><span class="txt1">have an account?</span>
            <a class="txt2" href="signIn.php">Sign In</a>
        </div>
    </center>
</div>
<footer class="page-footer text-center font-small fixed-bottom">
<!--Copyright-->
<div class="footer-copyright py-3" id="footerContainer">
      © 2019 Copyright:
      <a href="index.html" target="_blank"> Estimakr </a>
    </div>
    <!--/.Copyright-->
</footer>
	<!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="<?php echo BASE_URL ; ?>js/jquery.1.12.4.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/mdb.min.js"></script>
  <script type="text/javascript">
      var base_url = '<?php echo BASE_URL ;?>';
  </script>
  <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDle_EaikORy0q4nDhaEQPoDIas7_ubpoU"></script>
  <script src="<?php echo BASE_URL ; ?>/js/logger-google.js"></script>
	<script src="<?php echo BASE_URL ; ?>/js/jquery.geocomplete.js"></script>
  <script src="<?php echo BASE_URL ; ?>js/jquery.form.js"></script>
	<script src="<?php echo BASE_URL ; ?>js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/logger.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

</body>
</html>
    

    



  