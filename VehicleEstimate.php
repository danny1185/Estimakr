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
<script>// Tooltips Initialization
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})</script>
</head>

<body>
<style>

li {
		margin-right: 15px;
	  }
th {
    font-family: 'lora';
    }
          
#companyLogo {
    /* border: solid 1px black; */
    text-align: left;
    margin: 2% 2% 0 0;
    }
h5 {
    font-family: 'playfair';
    font-size: 26px;
    margin-bottom: -35px;
      }
.md-form {
    margin-bottom: -10px;
      }
ul li {
    padding: 0px;
}
ul li a {
    color: #fbffff ;
    text-decoration: none;
   }
    
.displaynone
{
    display:none;
}

.nav-link {
    color: #324a5f;
}
.navbar-nav {
	margin-right: 60px;
}
#brandLink {
    font-family: 'lora', serif;
    margin-left:50px;
    color: #324a5f;
	font-size: 24px;
}
.dropdown-menu {
    background-color: #324a5f;
    opacity: 0.9;
    box-shadow: 0 0 10px darkslategray;
}
#dropdownLink {
    color: white;
}
#dropdownLink:hover {
    color: #324a5f;
    background-color: #d4d4d6;
}
#carCardContainer {
  height: 450px;
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

#vehicleImageCard {
  height: 250px;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
}
#giveEstimateBtnText {
  font-size: 12px;
 
  font-family: 'lora';
}
#deleteEstimateBtnText {
  font-size: 14px;
  font-family: 'lora';
}
#deleteEstimateBtnText:hover {
  color: darkred;
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
    height: 450px;
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
<!--<nav class="navbar navbar-expand-lg z-depth-0" id="mainNavBar"> <a class="navbar-brand" id="brandLink" href="#" >Estimakr</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav col-md-3 ml-md-auto" style="margin-right:150px;">
      </ul>
      <form class="form-inline my-2 my-lg-0" style="margin-right:100px;">
      <ul class="navbar-nav mr-auto" >
          
          <li class="nav-item"> <a class="nav-link" href="VehicleEstimate.php" id="mainNavLink" tabindex="-1" aria-disabled="true"><i class="fa fa-clipboard mr-2"></i>Estimate Requests</a> </li>
          <li class="nav-item">
                <a class="nav-link" href="shopMessageBox.php" id="d_messageNavBtn" role="button" style="color: #324A5F;">Inbox<i class="fa fa-envelope ml-2"></i></a>
              </li> 
      
      
          
          <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['firstName']; ?></a>
                  <div class="dropdown-menu" id="mainNavDropDown" aria-labelledby="navbarDropdown"> 
                    <a class="dropdown-item" id="dropdownLink" href="estimateForm.php">New Estimate</a> 
                    <a class="dropdown-item" id="dropdownLink" href="estimateStatus.php">Saved Estimates</a> 
                    <a class="dropdown-item" id="dropdownLink" href="update_profile.php">Settings</a> 
                    <a class="dropdown-item" id="dropdownLink" href="ticket.php">Help</a>
                    <a class="dropdown-item" id="dropdownLink" href="shopProfile.php">Profile</a>  
                    <a class="dropdown-item" id="dropdownLink" href="shopsAcceptedEstimates.php">Accepted Estimates</a>
       
                  </div>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle waves-classic" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <i class="fa fa-bell mt-2" style="font-size:18px; color: #0c4153;"></i></a>
                <ul class="dropdown-menu"></ul>
            </li>
                <li class="nav-item"> <a class="nav-link" id="mainNavLink" href="<?php echo BASE_URL?>controllers/logout.php" tabindex="-1" aria-disabled="true">LogOut</a> </li>
              </ul>
            </form>
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
  <!-- NAVBAR CONTAINER END -->

<!-- PAGE HEADER START -->
<nav class="navbar mb-5" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white" >New Estimate Requests</li>
    <li class="breadcrumb-item"><a class="text-primary" href="shopsAcceptedEstimates.php" data-toggle="tooltip" data-placement="top" title="Click here to view estimates accepted by a customer">Accepted Estimates</a></li>

  </ol>
</nav>
<!-- PAGE HEADER END -->



<div class="row container-fluid ">
<!-- Jumbotron -->



<!-- Jumbotron VEHICLE CARDS START-------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container row justify-content-center col-md-12 ml-auto mr-auto" id="carCardContainer">
<!-- CARDS ARE ADDED WHEN CARS ARE ADDED TO USER ACCOUNT -->

<?php 
    
	$vehicle = $db->rawQuery('select * from vehicle where status = 0'); 
	foreach($vehicle as $vs){
	    $ig = 0;
		$vehcileimage = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$vs['vehicle_id'].'"');
		$estimationcount = $db->rawQueryOne('select * from estimation where user_id ='.$userid);
		$vehicleuser = $db->rawQueryOne('select * from register where id = "'.$vs['user_id'].'"'); 
		
		
		$origin = $user['address']; 
		$destination = $vehicleuser['address'];
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".urlencode($origin)."&destinations=".urlencode($destination)."&key=AIzaSyBOln7oJYsIGVfQ2yQXBcqRj0BNI2ZAfgE");
        
        $distancedata = json_decode($api);
        
		$miles = round(((int)$distancedata->rows[0]->elements[0]->distance->value/1609));  
		if($miles <= $vs['distance']){
		
?>
<div class="card container col-xl-3 col-lg-5 col-md-5 col-sm-10 mb-3 mr-auto ml-auto pt-2 " id="carCardContainer">
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
  <p class="text-warning" style="margin-bottom: 0; padding-bottom: 0;text-align: center;margin-top: 10px;">Estimate Submitted</p>
  <a class="ml-auto mr-auto text-primary" id="deleteEstimateBtnText" href="estimateDetailsPage.php?est_id=<?php echo $estimatesubmitted['id'] ; ?> " >Estimat Details<i class="fa fa-question-circle text-success ml-1" href="#" data-toggle="tooltip" data-placement="top" title="Click here to view estimate details for this vehicle"></i></a>
  <?php
  }
  ?>
  <!-- ESTIMATE STATUS -->

  <hr>
<!-- Button -->
   
  <a class="btn btn-sm hoverable btn-primary" id="giveEstimateBtnText" href="estimateRequests.php?vehicle_id=<?php echo $vs['vehicle_id'] ; ?>" >Give Estimate</a>
  <div class="row ">
  <a class="ml-auto mr-auto text-danger" id="deleteEstimateBtnText" href="<?php echo BASE_URL ; ?>controllers/VehicleRequestsRemove.php?vehicle_id=<?php echo $vs['vehicle_id'] ; ?>" data-toggle="tooltip" data-placement="top" title="Click here to delete this vehicle">Delete Request</a>
  

  </div>
  
</div>
<?php  } }  ?>

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