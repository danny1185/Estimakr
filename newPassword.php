<?php 
  session_start();
  include('includes/variables.php');
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
     <title>Sign Up</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet"></link>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"></link>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo BASE_URL ; ?>css/bootstrap.min.css" rel="stylesheet"></link>
  <!-- Material Design Bootstrap -->
  <link href="<?php echo BASE_URL ; ?>css/mdb.min.css" rel="stylesheet"></link>
  <!-- Your custom styles (optional) -->
  <link href="<?php echo BASE_URL ; ?>css/style.min.css" rel="stylesheet"></link>
  <link href="<?php echo BASE_URL ; ?>style.css" rel="stylesheet"></link>
<style>
  .formstyle
        {
            margin-right: 300px;
            margin-left: 300px;
            box-shadow: black 10px;
            /* border: solid 1px black; */
        }
    

    html,
    body,
    header,
    .view {
        height: 100%;
    }
    body {
        overflow-y:hidden;
    }
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
    #footerContainer {
        background-color: #1C2331;
    }
    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
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
    <form  class="formstyle validate col-md-8 col-lg-6 mr-auto ml-auto" id="reset_form">
    <div class="form-group">
        <h2 align="center" class="bg-primary z-depth-2" id="signUpFormHeader">Reset password</h2> <br>
        <div id="resultstatus"></div>
    </div>
    <div class="form-group">    
        <input type="password" name="password" class="form-control z-depth-1"  placeholder="Enter New Password" id="mainpassword" title="Must contain at least one number, one uppercase, lowercase, and at least 8 characters">
    </div>
    <div class="form-group">    
        <input type="password" name="cpassword" class="form-control z-depth-1" id="exampleInputPassword1" placeholder="Confirm Password" >
    </div>
    <input type="hidden" name="code" value="<?php echo $_GET['code'] ; ?>">
    <button type="button"  value="save" class="btn btn-primary reset-btn">Submit</button>
    </form>
        
    </center>
</div>
<footer class="page-footer text-center font-small" >
<!--Copyright-->
<div class="footer-copyright py-3 fixed-bottom" id="footerContainer">
      � 2019 Copyright:
      <a href="index.html" target="_blank"> Estimakr </a>
    </div>
    <!--/.Copyright-->
</footer>
	<!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="http://www.estimakr.com/js/jquery.1.12.4.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/mdb.min.js"></script>
  <script type="text/javascript">
      var base_url = 'http://www.estimakr.com/';
  </script>
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
    

    



  