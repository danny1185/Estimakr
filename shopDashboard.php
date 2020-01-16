<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
       }  
     
     $userid = $_SESSION['user_id'] ;  
     $user = $db->rawQueryOne('select * from register where id = "'.$userid.'"'); 
     
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
<title>Dashboard</title>


<style>
.btn-circle {
            width: 30px;
            height: 30px;
            padding: 0px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
            color: white;
          }
  .fa-clipboard:hover {
    text-shadow:black 0 0 10px ;
  }

</style>

</head>
<body>

   <!-- NAVBAR CONTAINER START --------------------------------------------------------------------------------------->

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
  <!-- NAVBAR CONTAINER END --------------------------------------------------------------------------------------->

    
    <div class="row">
        <div class="col-md-12">
          <?php if( isset($_SESSION['error'])): ?>
              <div class="alert alert-danger" id="error_message">	
                  <button type="button" class="close" data-dismiss="alert">&times;</button>				
                  <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                  
                  ?>							
              </div>
          <?php endif ?>
          <?php if( isset($_SESSION['success'])): ?>
              <div class="alert alert-success" id="success_messsage">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>				
                  <?php echo $_SESSION['success']; unset($_SESSION['success']);  ?>							
              </div>
          <?php endif ?>
          </div>
    </div>
    <!-- PAGE HEADER START --------------------------------------------------------------------------------------->
<nav class="navbar mb-4" style="background-color: #324a5f; color: white; height: 55px; font-size: 18px; font-family: playfair;">
<ul class="navbar-nav">
  <li class="nav-item ml-5">Dashboard</li>
</ul>
</nav>
<!-- PAGE HEADER END ------------------------------------------------------------------------------------------->

<!-- WELCOME BANNER START --------------------------------------------------------------------------------------->
    <div class="container float-left offset-1 p-5 z-depth-1 text-white col-xl-10" style="border-radius: 5px; background-color: #bbbbbb;">
      <div class="row ml-0" style="margin-bottom: -13px;">
        <h2 style="font-family: 'playfair';"> Welcome to Estimakr </h2>
        <p class="ml-2" style="font-family: 'lora';" >Beta</p>
      </div>
      <div class="ml-1">
        <p style="font-size: 16px; font-family: 'lora';">Select the " <i class="fas fa-car blue-grey-text"> New Cars</i> " Link on the top navbar to begin writing estimates for customers</p>
      </div>
    </div>
<!-- WELCOME BANNER END ----------------------------------------------------------------------------------------->

<!-- WELCOME SUB BANNER START ---------------------------------------------------------------------------------->
<div class="container float-left mt-4 offset-1 p-3 z-depth-1 col-xl-6" style="border-radius: 5px;">
      <div class="row ml-0" style="margin-bottom: -13px;">
        <h4 style="font-family: 'playfair';">Thank you for trying Estimakr </h4>
        <p class="ml-2" style="font-family: 'lora';" >Beta</p>
      </div>
      <div class="ml-1" style="margin-bottom: -8px;">
        <p class="grey-text" style="font-size: 16px; font-family: 'lora';">For information or questions visit our help section</p>
      </div>
      <div class="ml-1">
        <a href="ticket.php" data-toggle="tooltip" title="Help and faq's page">Click here</a>
      </div>
    </div>
<!-- WELCOME SUB BANNER END --------------------------------------------------------------------------------------->

<!-- RECENT ESTIMATE REQUEST OVERVIEW START ------------------------------------------------------------------------------>
<div class="container float-left mt-4 mb-5 offset-1 p-3 pb-5 z-depth-1 col-xl-6 row" style="border-radius: 5px;">
       
<!-- Section: Block Content -->
  <div class="card-body col-xl-10">
    <h5 class=" font-weight-bold mb-4 blue-grey-text" style="font-family: 'playfair';">Recent Estimate Request</h5>

    <hr>

    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-12 mb-3 mx-auto">
        <div class="media">
          <img class="d-flex mr-3 mt-2" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-1 font-weight-bold" style="font-family: 'playfair';"><a href="#!">2003 Honda Civic<i class="fas fa-question-circle text-success ml-2" data-toggle="tooltip" title="View Estimate Details"></i></a><a><i class="fas fa-trash text-danger float-right mr-3"></i></a></h5>
            <p style="margin-top: -10px;"><span class="font-weight-bold" >Description:</span>Needs a new bumper and paint</p>

            <div class="row ml-0" style="margin-top: -10px;">
            <button class=" btn btn-outline-blue-grey btn-sm ml-0" href="#"><i class="fas fa-clipboard mr-2 blue-grey-text hoverable"></i>Give Estimate</button>
            </div>
          </div>
        </div>
        <hr>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
    <hr>
    <a href="VehicleEstimate.php" data-toggle="tooltip" title="View All Estimate Request">Get new customers<i class="fas fa-question-circle text-success ml-2"></i></a>
  </div>
<!-- Section: Block Content -->


</div>
<!-- RECENT ESTIMATE REQUEST OVERVIEW END --------------------------------------------------------------------------------->








<!-- SHOP PERFORMANCE OVERVIEW START ----------------------------------------------------------------------------->

 <!--Grid column 1 ---------------------->
 <div class=" container float-left col-lg-4 col-md-12 mt-2 mb-4 ml-4 ">
<!-- Admin card -->
<div class="card mt-3">

  <div class="">
    <i class="far fa-money-bill-alt fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
    <div class="float-right text-right p-3">
      <p class="text-uppercase text-muted mb-1" style="font-family: 'lora';"><small>Monthly<br>Completed Estimates</small></p>
      <h4 class="font-weight-bold mb-0">$4,467.89</h4>
    </div>
  </div>

  <div class="card-body pt-0">
    <div class="progress md-progress z-depth-1">
      <div class="progress-bar bg-primary " role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
        aria-valuemax="100"></div>
    </div>
    <p class="card-text mt-2"><a href="shopAcceptedEstimates.php" data-toggle="tooltip" title="View completed estimates page">View completed estimates<i class="fas fa-question-circle text-success ml-2"></i></a></p>
  </div>

</div>
<!-- Admin card -->

</div>
<!--Grid column 1 ----------------------->

 <!--Grid column 1 ---------------------->
 <div class=" container float-left col-lg-4 col-md-12 mt-2 ml-4 ">
<!-- Admin card -->
<div class="card mt-3">

  <div class="">
    <i class="far fa-clipboard fa-lg z-depth-2 p-4 ml-3 mt-n3 rounded text-white" style="background-color: #324a5f;"></i>
    <div class="float-right text-right p-3">
      <p class="text-uppercase text-muted mb-1" style="font-family: 'lora';"><small>Referrals Received</small></p>
      <h4 class="font-weight-bold mb-0">14</h4>
    </div>
  </div>

  <div class="card-body pt-0">
    <div class="progress md-progress z-depth-1">
      <div class="progress-bar " role="progressbar" style="width: 100%; background-color: #324a5f" aria-valuenow="75" aria-valuemin="0"
        aria-valuemax="100"></div>
    </div>
    <p class="card-text mt-2"><a href="referralsReceived.php" data-toggle="tooltip" title="View all referrals you have received">View Referrals<i class="fas fa-question-circle text-success ml-2"></i></a></p>
  </div>

</div>
<!-- Admin card -->

</div>
<!--Grid column 1 ----------------------->
<!-- SHOP PERFORMANCE OVERVIEW END ------------------------------------------------------------------------------->


<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden; margin-top: 100px;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F;">© 2018 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->


      <!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- JQuery -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>  
<script type="text/javascript">
      var base_url = '<?php echo BASE_URL ;?>';
  </script>
<script src="<?php echo BASE_URL ; ?>js/jquery.form.js"></script>
	<script src="<?php echo BASE_URL ; ?>js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL ; ?>js/logger.js"></script>
</body>
</html>

</body>
</html>
