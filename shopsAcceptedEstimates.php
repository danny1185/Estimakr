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
<title>Estimate Requests</title>
</head>

<body>
<style>


#carCardContainer {
  height: 430px;
}
#cardTitle {
  text-align: center;
  font-family: 'playfair';
  padding-top: 15px;
  margin-bottom: -10px;
}
#jobDescription {
  text-align: center;
  font-family: 'lora';
}
.card {
  height: 440px;
}
#vehicleImageCard {
  height: 250px;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
}
@media (min-width: 320px) and (max-width: 499px) {
  #carCardContainer {
    height: 400px;
    margin-bottom: 100px;
  }
}
@media (max-width: 575px) {
  #carCardContainer {
    height: 400px;
  }
}
/*Extra Small devices */
@media (min-width: 320px) and (max-width: 499px) { 
  #carCardContainer {
    height: 400px;
  }
 }
/* Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767px) { 
  #carCardContainer {
    height: 400px;
  }
 }

/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991px) { 

  #carCardContainer {
    height: 400px;
  }

 }
/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199px) { 
  #carCardContainer {
    height: 430px;
  }

 }

 @media (min-width: 1200px) and (max-width: 1399px){

  #carCardContainer {
    height: 450px;
  }
#vehicleImageCard {
  width: 100%;
 }
 }
@media screen and (min-width: 1400px) and (max-width: 1599px){
  #carCardContainer {
    height: 450px;
  }
}
@media screen and (min-width: 1600px) {
  #carCardContainer {
    height: 450px;
  }
}
@media screen and (min-width: 1999px) {
  #carCardContainer {
    height: 450px;
  }
}

</style>

</head>
<body>
  <!-- NAVBAR CONTAINER START -->

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
  <!-- NAVBAR CONTAINER END -->

<!-- PAGE HEADER START -->
<nav class="navbar" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white" >New Estimate Requests</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

<div class="row container-fluid">
<!-- Jumbotron -->


<!-- Jumbotron VEHICLE CARDS START-------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container row justify-content-center col-md-12">
<!-- CARDS ARE ADDED WHEN CARS ARE ADDED TO USER ACCOUNT -->
<?php 
	$vehicle = $db->rawQuery('select * from vehicle_accpet_estimate where user_id = '.$_SESSION['user_id']); 
	
	foreach($vehicle as $vsi){
	    $ig = 0;
	    $vs = $db->rawQueryOne('select * from vehicle where vehicle_id = "'.$vsi['vehicle_id'].'"'); 
		$vehcileimage = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$vs['vehicle_id'].'"');
		$estimationcount = $db->rawQueryOne('select * from estimation where user_id ='.$userid);
?>
<div class="card container col-xl-3 col-lg-5 col-md-5 m-3 pt-2" id="carCardContainer">
  <!-- Card image -->
  <div id="demo<?php echo $vs['vehicle_id'] ; ?>" class="carousel slide" data-ride="carousel">



  <!-- The slideshow -->
  <div class="carousel-inner">
  	
    <?php 
    	foreach($vehcileimage as $image){ 
    	$imgelist = $ig++;
    ?>
    <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
      <img class="card-img-top" id="vehicleImageCard" src="<?php echo BASE_URL ; ?>photo_gallery/<?php echo $image['image'] ; ?>" alt="Card image cap">
    </div>
    <?php } ?>
    
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo<?php echo $vs['vehicle_id'] ; ?>" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo<?php echo $vs['vehicle_id'] ; ?>" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
  
  <!-- Card content -->
  <!-- CAR INFORMATION -->
  <h4 class="card-title mt-3" id="cardTitle"><?php echo $vs['year'].' '.$vs['make'].' '.$vs['model'] ; ?> </h4>
  <?php
   
 $estimatesubmitted  = $db->rawQueryOne('select * from estimation where vehicle_id = "'.$vs['vehicle_id'].'" AND user_id = "'.$_SESSION['user_id'].'"');
 
  if(count($estimatesubmitted) > 0)
  {
  ?>
  <p class="text-center mt-3">
  <a class="ml-auto mr-auto text-primary " id="deleteEstimateBtnText" href="estimateDetailsPage.php?est_id=<?php echo $estimatesubmitted['id'] ; ?>" >Estimat Details<i class="fa fa-question-circle text-success ml-1" href="#" data-toggle="tooltip" data-placement="top" title="Click here to view estimate details for this vehicle"></i></a></p>
  <?php
  }
  ?>
  <!-- ESTIMATE STATUS -->
  <hr>
<!-- Button -->
 
</div>
<?php  } ?>
<?php $est =  $db->rawQueryOne('select * from estimation where vehicle_id ='.$vs['vehicle_id']);
?>

<!-- ESTIMATE MODAL START ----------------------------------------------------------------------------------------->


<?php 
        if(!$_SESSION['role_id'])
        {
            require_once('components/visitorMainNav.php');
        }else if($_SESSION['role_id'] == 1)
        {
            require_once('components/customerEstimateModal.php');
        }else if($_SESSION['role_id'] == 2)
        {
            require_once('components/shopEstimateModal.php');
        }
    ?>



<!-- ESTIMATE MODAL END ------------------------------------------------------------------------------------------------------------------>


<!-- Card -->
</div>
<!-- Jumbotron VEHICLE CARDS END-------------------------------------------------------------------------------------------------------------------------------------------->

</div>

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
</div>
</body>
</html>