<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
       }  
       
       
       if(!isset($_GET['vehicle_id']))
       {
	   	 header("Location: ".BASE_URL."customerDashboard.php");
	   }else
	   {
	   		$vehicle_id  = $_GET['vehicle_id'] ;
       		$estimate_id = $_GET['estimate_id'];
	   }
     $ig = 0;
     $vehicle = $db->rawQueryOne('select * from vehicle where vehicle_id = "'.$vehicle_id.'"'); 
     $vehcileimage = $db->rawQuery('select * from vehicle_image where vehicle_id = "'.$vehicle['vehicle_id'].'"');
     $est = $db->rawQueryOne('select * from estimation where id ='.$estimate_id);
     $estimationaccept = $db->rawQueryOne('select * from vehicle_accpet_estimate where estimate_id ='.$estimate_id);
     $reviews = $db->rawQuery('select * from userratings where estimate_id ='.$estimate_id);
     
     $userreviews = $db->rawQuery('select * from userratings where user_id ='.$est['user_id']);
      $totalreview = 0;
     if(count($userreviews) > 0)
     {
	 	 foreach($userreviews as $review)
	     {
		 	$totalreview += $review['ratings'];
		 }
	     $totlreviews = round(($totalreview/count($userreviews)));
	 }else
	 {
	 	$totalreview = 0;
	 }
     
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
<link rel="stylesheet" text="text/css" href="./css/acceptedEstimatePage.css">

<title>Accepted Estimate</title>
</head>

<body>
<style>

</style>

</head>
<body>
  
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
<!-- DRIVER NAVBAR CONTAINER END -->
<!-- PAGE HEADER START -->
<nav class="navbar" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item" id="activeBreadcrumb"><a class="text-info" href="customerDashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item" id="activeBreadcrumb"><a class="text-info" href="carDetails.php?vehicle_id=<?php echo $vehicle_id ; ?>">Car Details</a></li>
    <li class="breadcrumb-item active text-white" id="activeBreadcrumb">Accepted Estimate</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

<div class="row container-fluid ml-auto mr-auto " id="mainBodyContainer">
<!-- SIDE INFO CONTAINER START -->

<div class="container text-left col-xl-4 col-lg-5 col-md-8 col-sm-10 col-10 mr-auto ml-auto mt-1 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-5" id="carInfoContainer">

  <!-- Title -->
  <div id="demo" class="carousel slide" data-ride="carousel">



  <!-- The slideshow -->
  <div class="carousel-inner z-depth-2">
  	
    <?php 
    	foreach($vehcileimage as $image){ 
    	$imgelist = $ig++;
    ?>
    <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
     <img class="card-img-top z-depth-2" src="<?php echo BASE_URL ; ?>photo_gallery/<?php echo $image['image'] ; ?>" alt="Card image cap">
    </div>
    <?php } ?>
    
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<!-- Card Content -->
<div class="ml-1">
    <h2 class="card-title mt-3" style="font-family: 'playfair';">Description</h2>
    
  
  <!-- Subtitle -->
  <p class="blue-grey-text" style="font-family: 'lora';"><?php echo $vehicle['description'] ; ?></p>
  <hr class="my-2">
  <p class="blue-grey-text" style="font-family: 'lora';"><span class="font-weight-bold">Vin:</span> <?php echo $vehicle['vin_number'] ; ?></p>

  <hr class="my-2">
  <p class="blue-grey-text" style="font-family: 'lora'; font-size: 16px;"><i class="fa fa-check text-success mr-2"></i><?php if($est['eststatus'] == 0){ echo 'Estimate Submitted';}else if($est['eststatus'] == 1) { echo 'Estimate Accepted' ;}else if($est['eststatus'] == 2){ echo 'Vehicle Droped Off';}else if($est['eststatus'] == 3){ echo 'Vehicle Ready';}else if($est['eststatus'] == 4){ echo 'Vehicle Picked Up';}else if($est['eststatus'] == 5){ echo 'Complete' ;} ?></p>
  <hr class="my-2">
  <p class="blue-grey-text" style="font-family: 'lora'; font-size: 16px;"><span class="font-weight-bold">Posted:</span> <?php echo time_elapsed_string($vehicle['created_on']); ; ?></p>
  <!-- Grid row -->

  <!-- Grid row -->

<!--Social-->

            <ul class="social list-unstyled row">
              <li class="nav-item"><a href="#" class="icons-md fb-ic nav-link"><i class="fab fa-facebook-f "> </i></a></li>
              <li class="nav-item"><a href="#" class="icons-md pin-ic nav-link"><i class="fab fa-instagram"> </i></a></li>
              <li class="nav-item"><a href="#" class="icons-md tw-ic nav-link"><i class="fab fa-twitter"> </i></a></li>
            </ul>
        
          <!--/Social-->
      </div>
</div>

<!-- SIDE INFO CONTAINER END -->

<div class="container col-lg-7 col-md-10 col-sm-11"  id="estimateCardContainer">
<!-- ESTIMATE CARD START 1------------------------------------------------------- -->
<?php 
	
	$qetcutomerinfo = $db->rawQueryOne('select * from register where id = "'.$est['user_id'].'"');
?>

<div class="card col-md-12 ml-auto mr-auto mt-5 hoverable" id="cardContainer">
  <h5 class="card-header h5 row" id="estimateCardHeader" style="font-family: 'playfair';"><?php echo $qetcutomerinfo['businessname'] ; ?>
  <?php if($est['eststatus'] == 5){ ?><a class="ml-auto mr-3" href="javascript:void()" <?php if(count($reviews) == 0){ echo  'data-toggle="modal" data-target="#ratingEstimate"';} ?>><span><h5 class="font-weight-bold" id="estimateAcceptedBtn"><?php if(count($reviews) == 0){ echo '<i class="fa fa-info-circle mr-2"></i><span id="estimateInfoText">Add Reviews</span>';}else{ echo '<span id="estimateInfoText">Reviews Added</span>' ; }  ?></h5></span></a><?php } ?></h5>
  <div class="card-body col-12 row" id="estimateCardBody">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0">  
        <img class="car-img-top"  src="<?php echo BASE_URL ; ?>images\logo\<?php echo $qetcutomerinfo['logo'] ; ?>" class="" alt="<?php echo $qetcutomerinfo['businessname'] ; ?>">
    </div>
<!-- DATE, RATING AND PROFILE START -->
    <div id="cardShopInfo" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-12 z-depth-sm-1">
    <h5 class="card-title"><?php echo $qetcutomerinfo['city'].', '.$qetcutomerinfo['state'] ; ?></h5>
    <p class="card-text" style="font-family: 'lora';">Rating:</span>
        <?php 
	        if($totalreview > 0)
	        {
				for($r=0; $r<$totlreviews;$r++){
			
        ?>
        	<i class="fa fa-star text-warning"></i>
        <?php } } else{ ?>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <?php } ?>(<?php echo $totalreview ; ?>)
    </p>
    <a href="shopProfile.php?userid=<?php echo $est['user_id'] ; ?>" style="font-family: 'lora';" class="text-warning">View Shop Profile</a>
  </div>
<!-- DATE, RATING AND PROFILE END -->

<!-- TOTAL, TURNAROUND TIME, MESSAGE SHOP START -->
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-12" id="cardEstimateInfo" >
    <h5 class="card-title">$<?php echo $est['total'] ; ?></h5>
    <p class="card-text">Turnaround Time:</span> <?php echo time_elapsed_string($est['created_at']); ; ?></p>
    <a href="driverMessageBox.php" style="font-family: 'lora';" class=""><i class="fa fa-envelope mr-2"></i>Message Shop</a>
  </div>
  <!-- TOTAL, TURNAROUND TIME, MESSAGE SHOP END -->

</div>
    <div class="mt-0">
        <hr>
        <div class="row">
           

            <a href="#" data-toggle="modal" data-target="#modalEstimate" id="estimateModalBtn" class="ml-sm-auto mr-auto"><i class="fas fa-clipboard fa-cb mr-1"></i><span id="viewEstimateText">View Estimate</a>
             <a href="<?php echo BASE_URL; ?>controllers/UnacceptEstimate.php?accept_id=<?php echo $estimationaccept['accept_id'] ; ?>&vehicle_id=<?php echo $estimationaccept['vehicle_id'] ; ?>&estimate_id=<?php echo $estimationaccept['estimate_id'] ; ?>" class="ml-auto mr-sm-auto text-danger mb-3" id="deleteEstimateBtn" ><i class="fas fa-trash fa-tr"></i><span id="cardDeleteText">Unaccept Estimate</span></a> 
        </div>
    </div>
</div>
<!-- ESTIMATE CARD END 1 -->

<!-- SHOP CONTACT INFO START -->
<div class="row col-12 mr-auto ml-auto mt-5 mb-xl-0 mb-lg-0 mb-4 pl-0 pr-0">
    <?php 
    $url = "https://maps.google.com/maps/api/geocode/json?address=". urlencode($qetcutomerinfo['address'])."&sensor=false&key=AIzaSyBOln7oJYsIGVfQ2yQXBcqRj0BNI2ZAfgE";
$response = file_get_contents($url);
$response = json_decode($response, true);



$lat = $response['results'][0]['geometry']['location']['lat'];
$long = $response['results'][0]['geometry']['location']['lng'];

?>

<div id="map" class="col-xl-3 col-lg-12 col-md-12 col-sm-12 z-depth-1 ml-auto mr-auto" style="height: 400px;">

</div>

    <div class="col-xl-9 col-lg-12 mt-xl-0 mt-lg-4 mt-md-4 mt-sm-4 mt-4 pr-xl-0 pl-xl-2 pr-xl-2 pl-lg-0 pr-lg-0 pr-0 pl-0 container-fluid" style="height: 500px;">
    
        <div id="shopContactInfoType" class="z-depth-1 col-12 pb-2 pt-0 pl-0 pr-0">
          <h3 class="pt-2 pl-2" id="shopContactHeaderLabel" style="font-family: 'playfair'; background-color: #324a5f; color: white; height: 50px;">Shop Contact Information:</h3>
          
            <p class="blue-grey-text ml-1 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Invoice Number:</p>    
            <p class="blue-grey-text ml-1 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo $est['id'] ; ?></p>    
         <hr>
          <div class="row ml-1">
            <div>
              <p class="blue-grey-text mr-5 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Point of Contact:</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo $qetcutomerinfo['firstName'] ; ?></p>    
            </div>
            <div>
              <p class="blue-grey-text mr-5 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Address:</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo $qetcutomerinfo['address'] ;?>,<br><?php echo $qetcutomerinfo['city'].' '.$qetcutomerinfo['state'] ; ?></p>    
            </div>
          </div>
          <hr>
            <div class="mt-1">
              <p class="blue-grey-text mr-5 ml-1 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Phone Number:</p>    
              <p class="blue-grey-text ml-1 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo $qetcutomerinfo['phone'] ; ?></p>    
            </div>
            <hr>
          <div class="row ml-1">
            <div class="">
              <p class="blue-grey-text mr-4 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Appointment Date</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo date('m/d/Y',strtotime($estimationaccept['created_on'])) ; ?></p>    
            </div>
            <div class="ml-0 ml-xl-2 ml-lg-2 ml-md-2 ml-sm-2">
              <p class="blue-grey-text mr-5 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Appointment Time</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo date('H:i:A',strtotime($estimationaccept['created_on'])) ; ?></p>    
            </div>
          </div>
          <?php 
          		$estimatepickdate 	 = $db->rawQueryOne('select * from estimatestatus where status = "Vehicle Picked Up" AND estimate_id = "'.$est['id'].'"');
          		$estimatedropdate 	 = $db->rawQueryOne('select * from estimatestatus where status = "Vehicle Droped Off" AND estimate_id = "'.$est['id'].'"');
          		
          ?>		
          <div class="row ml-1">
            <div class="">
              <p class="blue-grey-text mr-4 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Drop Off Date</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo date('m/d/Y',strtotime($estimatedropdate['created_on'])) ; ?></p>    
            </div>
            <div class="ml-0 ml-xl-5 ml-lg-5 ml-md-5 md-sm-5">
              <p class="blue-grey-text mr-5 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3 ml-1 ml-md-0" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Drop Off Time</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3 ml-1 ml-md-0" id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo date('H:i:A',strtotime($estimatedropdate['created_on'])) ; ?></p>    
            </div>
          </div>
           <div class="row ml-1">
            <div class="">
              <p class="blue-grey-text mr-4 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3" id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Pick-up Date</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3 " id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo date('m/d/Y',strtotime($estimatepickdate['created_on'])) ; ?></p>    
            </div>
            <div class="ml-0 ml-xl-5 ml-lg-5 ml-md-5 ml-sm-5">
              <p class="blue-grey-text mr-5 pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3 ml-1 " id="shopInfoLabel" style="font-family: 'lora'; margin-bottom: 0;">Pick-up Time</p>    
              <p class="blue-grey-text pl-xl-3 pl-lg-3 pl-md-3 pl-sm-3 pl-3 ml-1 " id="shopInfoData" style="font-family: 'lora'; margin-bottom: 0;"><?php echo date('H:i:A',strtotime($estimatepickdate['created_on'])) ; ?></p>    
            </div>
          </div>
          
          
    </div>
</div>
<!-- SHOP CONTACT INFO END -->

</div>

</div>




<!-- Modal: modalCart -->
<div class="modal fade" id="modalEstimate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #324A5F;">
        <h4 class="modal-title" id="myModalLabel" style="color: white;"><?php echo $qetcutomerinfo['businessname'] ; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  aria-hidden="true" style="color: white; font-size: 26px;">×</span>
        </button>
      </div>
      <div class="row ml-xl-5 ml-lg-5 ml-md-5 ml-0 mt-4">  
        <img class="car-img-top img-fluid" src="<?php echo BASE_URL ; ?>images\logo\<?php echo $qetcutomerinfo['logo'] ; ?>" alt="Card image cap">
        <div class="ml-5 ml-xl-5 ml-lg-5 ml-md-5 mr-auto">
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Address:</span> <?php echo $qetcutomerinfo['address'].' '.$qetcutomerinfo['city'].' '.$qetcutomerinfo['state'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Phone:</span> <?php echo $qetcutomerinfo['phone'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Email:</span> <?php echo $qetcutomerinfo['email'] ; ?></p>    
            <p class="blue-grey-text" style="font-family: 'lora'; margin-bottom: 0;"><span class="font-weight-bold">Invoice Number:</span> <?php echo $est['id'] ; ?></p>    
        </div>
        </div>
        
    <!--Body-->
      <div class="modal-body">

        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Labor Type</th>
              <th class="hiddenEstimateColumn">Labor Option</th>
              <th>Description</th>
              <th class="hiddenEstimateColumn">Part Type</th>
              <th class="hiddenEstimateColumn">Part Number</th>
              <th class="hiddenEstimateColumn">Tax</th>
              <th class="hiddenEstimateColumn">Hours</th>
              <th class="hiddenEstimateColumn">Labor Unit</th>

              <th>Price</th>
              <th>Cost</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            	$estimationdetails = $db->rawQuery('select * from estimation_table where estimation_id ='.$est['id']);
            	$lab = 1;
            	foreach($estimationdetails as $detl){ 
            ?>	
            
            <tr>
              <th scope="row"><?php echo $lab++; ?></th>
              <td><?php echo $detl['labour_type']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['labour_option']; ?></td>
              <td><?php echo $detl['description']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['part_type']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['part_number']; ?></td>
              <td class="hiddenEstimateColumn"><i class="fas fa-times"></i></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['hourly_rate']; ?></td>
              <td class="hiddenEstimateColumn"><?php echo $detl['labour_unit']; ?></td>
              <td><?php echo $detl['price']; ?></td>
              <td style="text-align:right;"><?php echo $detl['cost']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <hr>
        <!-- TOTALS START -->
            <div class="mt-4 mb-4 row pl-0 ml-auto mr-auto">

            <div class="container col-xl-8 col-lg-8 col-md-7 col-12 float-left ml-3 ml-auto mr-auto"> 
              <p class="mb-0" style="font-family: 'lora'; font-weight: bold; color: lightgrey;">Notes:</p>
              <hr class="mb-2 mt-0">
              <div class="">
                <p style="font-family: 'lora';">We can definately have this done and back on the road</p>
              </div>  
            </div>

            <div class="col-xl-3 col-lg-3 col-md-4 col-11 ml-auto mr-auto mt-3">
                <div class="row " style="font-family: 'lora';">
                    <h5 class=" font-weight-bold">Sub Total</h5>
                    <p class="mr-4 ml-auto">$<?php echo $est['sub_total'] ; ?></p>
                </div>
                <div class="row " style="font-family: 'lora';">
                    <h5 class="mr-5 font-weight-bold" >Tax</h5>
                    <p class="mr-4 ml-auto" style="margin-left: 30px;">$<?php echo $est['tax_percent'] ; ?></p>
                </div>
                <div class="row " style="font-family: 'lora';">
                    <h5 class="mr-3 font-weight-bold">Total</h5>
                    <p class="mr-4 ml-auto">$<?php echo $est['total_tax'] ; ?></p>
                </div>
              </div>
            </div>
        <!-- TOTALS END -->
        <!-- LABOR RATES START -->
            <table class="table table-hover container-fluid">
                <thead class="z-depth-2" style="background-color: #324A5F;">
                    <tr>
                        <th style="font-size: 18px; color: white;">Labor Type</th>
                        <th style="font-size: 18px; color: white;">Labor Rate</th>
                    </tr>
                </thead>
                <tbody>
                
                   <?php foreach($estimationdetails as $detls){ ?>
                    <tr>
                        <td><?php echo $detls['labour_type'] ; ?></td>
                        <td><?php echo $detls['labour_unit'] ; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- LABOR RATES END -->
      </div>
      <!--Footer-->          
      <button type="button" class="btn btn-outline-success btn-sm col-11 ml-auto mr-auto" data-dismiss="modal" >Accept Supplement</button>

      <div class="modal-footer row col-12 ml-auto mr-auto ">
      
          <a class="mr-xl-auto ml-xl-3 mr-lg-auto ml-lg-3 mr-md-auto ml-md-0 mr-sm-auto ml-sm-0 mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/24/2019 <span class="blue-grey-text">1:47pm</span></span></p></a>
          <a class="mr-xl-3 ml-xl-3 mr-lg-3 ml-lg-3 mr-md-0 ml-md-0 mr-sm-0 ml-sm-0 mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/25/2019 <span class="blue-grey-text">12:23pm</span></span></p></a>
          <a class="mr-xl-3 ml-xl-auto mr-lg-3 ml-lg-auto mr-md-1 ml-md-auto mr-sm-1 ml-sm-auto mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/27/2019 <span class="blue-grey-text">2:20pm</span></span></p></a>
     
     </div>
        
    </div>
  </div>
</div>



<!----- Rating Modal ------------>
<div class="modal fade" id="ratingEstimate" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Reviews</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="addreviews validate">
        	<div class="row">
        	<div class="reviewmodal"></div>
	        	<div class="col-md-12">
	        		<div class="rate">
					    <input type="radio" id="star5" name="rate" value="5" />
					    <label for="star5" title="text">5 stars</label>
					    <input type="radio" id="star4" name="rate" value="4" />
					    <label for="star4" title="text">4 stars</label>
					    <input type="radio" id="star3" name="rate" value="3" />
					    <label for="star3" title="text">3 stars</label>
					    <input type="radio" id="star2" name="rate" value="2" />
					    <label for="star2" title="text">2 stars</label>
					    <input type="radio" id="star1" name="rate" value="1" />
					    <label for="star1" title="text">1 star</label>
					  </div>
	        	</div>
	        	<div class="col-md-12">
	        		<textarea class="form-control" placeholder="Add Message" name="message" required=""></textarea>
	        		<input type="hidden" name="estimate_id" value="<?php echo $est['id'] ; ?>"></input>
	        		<input type="hidden" name="vehicle_id" value="<?php echo $est['vehicle_id'] ; ?>"></input>
	        		<input type="hidden" name="user_id" value="<?php echo $est['user_id'] ; ?>"></input>
	        	</div>
	        	<div class="col-md-12">
	        		<input type="button" class="btn btn-primary btnaddreviews" value="Submit"></input>
	        	</div>
	        </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>

<!-- UPDATE CONTAINER START / MAXIMUM AMOUNT OF UPDATES ON FREE VERSION IS 3---------------------------------------------------------------->
<div class="container mb-5 mt-5" id="updateMainContainer">


  <!-- Section: Block Content -->
  <section class="dark-grey-text mt-5" >

    <h3 class="text-center font-weight-bold pb-2 mb-0" style="font-family: 'playfair';">Updates</h3>
    <p class="text-center text-muted w-responsive mx-auto mb-5 mt-0" style="font-family: 'lora';">If your auto shop sends you a custom update this is where they will be. 
    You can view images and get a brief description of what stage your car is in.
    </p>

    <!-- First row -->
    <div class="row">

      <!-- First column -->
      <?php 
			$getupdates = $db->rawQuery('select * from estimate_updates where estimate_id = "'.$est['id'].'"');
			foreach($getupdates as $update){
		?>	
      <div class="col-md-6 mb-4 ml-auto mr-auto">

        <!-- Card -->
        <div class="card">
          <div class="view overlay">
            <img class="card-img-top" src="<?php echo BASE_URL ; ?>images/customupdate/<?php echo $update['image'] ; ?>" alt="Card image cap">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <a class="btn-floating btn-action ml-auto mr-4 mdb-color"><i class="fas fa-chevron-right pl-1"></i></a>

          <div class="card-body">

            <h4 class="card-title mb-0 text-center" style="font-family: 'playfair';"><?php echo $update['title'] ; ?></h4>
            <hr class="mt-1">

          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- First column -->
      <?php } ?>



      


      

    

    </div>
    <!-- First row -->

  </section>
  <!-- Section: Block Content -->
  
  
</div>
<!-- UPDATE CONTAINER END -->


<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden; margin-top: 50px;">
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

<script>
    
var map;
  function getData() {
   
    
      init_map();
     
  }
  
  function init_map(data) {
        var map_options = {
            zoom: 14,
            center: new google.maps.LatLng(<?php echo $lat ; ?>, <?php echo $long ; ?>)
          }
        map = new google.maps.Map(document.getElementById("map"), map_options);
       marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(<?php echo $lat ; ?>, <?php echo $long ; ?>)
        });
        infowindow = new google.maps.InfoWindow({
            content: data['formatted_address']
        });
        google.maps.event.addListener(marker, "click", function () {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
</script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOln7oJYsIGVfQ2yQXBcqRj0BNI2ZAfgE&callback=getData"></script>
</body>
</html>
</div>
</body>
</html>