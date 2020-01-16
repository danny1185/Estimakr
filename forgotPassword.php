<?php 
  session_start();
  include('includes/variables.php');
?>

<html>
  <head>
      <title>Sign In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
    <style>
  .formstyle
        {
            margin-right: 300px;
            margin-left: 300px;
            box-shadow: black 10px;
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
    #signInFormHeader {
        color: white;
        font-family: 'lora';
        padding-top: 3px;
        padding-bottom: 3px;
        border-radius: 5px;
    }

    @media (max-width: 575px) {

#formContainer {
  margin-top: 70px;
  margin-bottom: -10px;
}
#signInFormHeader {
  font-size: 26px;
}
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
<body>


<!doctype html>
<html lang="en">
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
<title>Hello, World!</title>


    </head>
    <body>
       
 <!-- NAVBAR CONTAINER (user logged in) START -->
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
          <li class="nav-item ml-5 active">
            <a class="nav-link" href="signIn.php">Login</a>
          </li>
          <li class="nav-item">
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
    <div id="resultstatus"></div>
    <br>
    <form  class="formstyle col-md-8 col-lg-6 mr-auto ml-auto" id="forgot_form">
  <div class="form-group">
      <h2 align="center" class="bg-primary z-depth-2" id="signInFormHeader">Forgot Password</h2> <br>
   
    <input type="email" class="form-control z-depth-1" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    
  </div>
  
  <button type="button" name="submit" value="submit" class="btn btn-primary forgot-btn">Submit</button>
</form>
  </center> 
<!-- Footer -->
<footer class="page-footer font-small fixed-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" id="footerContainer">� 2018 Copyright:
          <a href="www.aionwebandgraphicdesigns.com"> Estimakr</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
      <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
      var base_url = 'http://www.estimakr.com/';
  </script>
  <script src="<?php echo BASE_URL ; ?>js/jquery.form.js"></script>
	<script src="<?php echo BASE_URL ; ?>js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/logger.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
</body>
</html>
