<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Estimakr</title>
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
  <link rel="stylesheet" text="text/css" href="./css/index.css">

  <style>
    .headerHero {
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(images/faq-customer-service-help-support-exclamation.jpg);
      height: 400px;
      background-position: 0 30%;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
    .heroText {
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }
  </style>
  
</head>

<body>

  <!-- Navbar  NON LOGGED IN START-->
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
 <div class="headerHero">
      <div class="heroText">
        <h1> What is estimakr? </h1>
        <p style="font-size: 16px; font-family: 'lora';">If you'd like to know more, take a look at our faq's or contact us.</p>
      </div>
    </div>
  

    <div class="container mt-5">
<!-- Card image -->
<div class="view view-cascade overlay z-depth-3">
          <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Slides/img%20(142).jpg" alt="Sample image">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

<!--Section: Content-->
<section class="mx-md-5 dark-grey-text">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-12">

      <!-- Card -->
      <div class="card card-cascade wider reverse">

        

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

          <!-- Title -->
          <h3 class="font-weight-bold" style="font-family: 'playfair';"><a>About Us</a></h3>
          <!-- Data -->
          <!-- <p>Written by <a><strong>Abby Madison</strong></a>, 26/08/2018</p> -->
       

        </div>
        <!-- Card content -->

      </div>
      <!-- Card -->

      <!-- Excerpt -->
      <div class="mt-5">

        <p>estimakr was founded in 2019 with the intention of creating a simpler and more cost-effective 
          auto body repair process by eliminating the most time-consuming and tedious process itself, gathering 
          estimates and finding the right auto body shop. We started estimakr because we have seen that the 
          automotive repair industry has been growing in paint and repair technology, but the way a shop gains 
          new customers hasn’t. We’re in an era of technology, with smartphones specifically. 
        </p>
        <p>We all make sure to maintain our vehicles assure they run the way they were meant to, but we also 
          love driving in a vehicle that looks great as well. Let’s face it we procrastinate a lot with 
          fixing those dings, dents, scratches, fades or even repaints. 
        </p>
        <p>
        It’s hard to find the right auto body shop especially when there open the same days and hours we 
        work, that’s why estimakr helps gather estimates from multiple auto body shops in your area in a
         fraction of the time from the comfort of your home or office.  
        </p>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="mb-5 mt-4">

</section>
<!--Section: Content-->


</div>



  <!--Footer-->
  <footer class="page-footer text-center font-small wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="signUp.php" role="button">Create your first estimate
        <i class="fas fa-pen ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="#" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="#" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="#" target="_blank">
        <i class="fab fa-instagram mr-3"></i>
      </a>
      <a href="termsOfUse" target="_blank">
          Terms of Use
      </a>
      <a href="termsOfUse" class="ml-2" target="_blank">
          Privacy Policy
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="index.php" target="_blank"> Estimakr </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>

</body>

</html>
