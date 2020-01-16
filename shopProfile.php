<?php 
  session_start();
  include('database_connection/connection.php');
  include('includes/variables.php');
//   if(!isset($_SESSION['email'])){
//     header("Location:signIn.php");
//    }

     $userid = $_GET['userid'] ;  
     $userdetails = $db->rawQueryOne('select * from register where id = '.$userid.''); 
    
     
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

<link href="path/to/lightbox.css" rel="stylesheet" />
<link rel="stylesheet" text="text/css" href="./css/shopProfile.css">



<title><?php echo $userdetails['businessname'] ; ?> Profile</title>
<style>

  </style>

  </head>
  <body>
    <!-- NAVBAR CONTAINER START -->
  <?php 
        if(!$_SESSION['role_id'] )
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
  <!-- <nav class="navbar z-depth-2 mb-5 mt-4" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white ml-4" ><?php echo $userdetails['businessname'] ; ?></li>
  </ol>
</nav> -->
<!-- PAGE HEADER END -->




<div class="headerHero" style="background:url(<?php echo BASE_URL.'images/bannerimage/'.$userdetails['bannerimage'] ; ?>); background-size: cover; background-repeat: no-repeat; background-position: 0 30%;">
      <!-- <div class="heroText">
        <h1> Top Gun Paint & Body </h1>
        <p style="font-size: 16px; font-family: 'lora';">If you need help take a look at or faq's or contact us</p>
      </div> -->
    </div>
<div class="container ml-auto mr-auto" id="profileContainer">
    <div class="row ml-auto mr-auto">
        <div class="col-xl-6 col-lg-6">
            <!-- COMPANY Avatar START -->
  <div class="" id="companyLogo">
        <img width="300" height="300" src="<?php echo BASE_URL?>images/logo/<?php if ( isset($userdetails['logo'])){ echo  $userdetails['logo']; }?>" >
      
  </div>
<!-- COMPANY Avatar END -->
            <div class="pt-4 mt-2 col-xl-12 col-md-12" id="overviewContainer">

                <!-- OVERVIEW SECTION START -->
                <section class="pb-1">
                    <h3 class="" id="overviewHeader">Overview</h3>
                    <div class="pt-2">
                        
                        <!-- CONTACT INFORMATION SECTION START -->
                            <h6 id="contactInfoTitle" style="font-family: 'playfair';">
                            Contact Information
                        </h6> 
                        <hr id="hrContactHeader">
                        <div class="row mb-4 pb-3">
                            <dt class="col-sm-4" id="contactInfoLabel">Phone</dt>
                            <dd class="col-sm-8" id="contactInfo"><?php echo $userdetails['phone'] ; ?></dd>
                            
                            <dt class="col-sm-4" id="contactInfoLabel">Business Address</dt>
                            <dd class="col-sm-8">
                                <address class="mb-0" id="contactInfo">
                                    <?php echo $userdetails['address'] ; ?> <?php echo $userdetails['city'] ; ?>, <?php echo $userdetails['state'] ; ?>
                                </address>
                            </dd>
                            
                            <dt class="col-sm-4" id="contactInfoLabel">Email address</dt>
                            <dd class="col-sm-8">
                              <!-- ADD THE SHOPS EMAIL ADDRESS BELOW -->
                                <a href="mailto:<?php echo $userdetails['email'] ; ?>" id="contactInfo"><?php echo $userdetails['email'] ; ?></a>
                            </dd>
                        </div>
                        <!-- CONTACT INFORMATION SECTION END -->
                      <hr>
                      <!-- BUTTON ROW PRIVATE MESSAGE, GET AN ESTIMATE, AND SUBMIT REFERRAL START----------------------------------------------------- -->
        
            <section >
              <div class="d-flex">
                <button class="btn btn-outline-blue-grey btn-sm col-xl-5" style="border-radius: 40px;">
                    <i class="fa fa-comments"></i>
                    Send Message
                </button>  

               
                  <button class="btn btn-sm col-xl-5 ml-auto mr-0" href="addCarPage.php" style="background-color: #324a5f; color: white; border-radius: 40px;">
                      <i class="fa fa-check"></i>
                      Get Estimate
                  </button>
               
              </div>

<!-- REFERRAL FORM MODAL START -->
                <div class="col-12">
                    <button class="btn btn-outline-primary btn-sm col-12 ml-auto mr-auto" style="border-radius: 40px;" data-toggle="modal" data-target="#modalReferralForm">
                        <i class="fa fa-check"></i>
                        Submit Referral
                    </button>
                </div>


<div class="modal fade" id="modalReferralForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
      <!--Modal: Referral form-->
      <div class="modal-dialog cascading-modal" role="document">

        <!--Content-->
        <div class="modal-content">

          <!--Header-->
          <div class="modal-header primary-color white-text">
            <h4 class="title">
              <i class="fa fa-pencil-alt"></i> Referral Form</h4>
            <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
              aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body">

            <!-- Material input name -->
            <div class="md-form form-sm">
              <i class="fa fa-check prefix"></i>
              <input type="text" id="submitterName" class="form-control form-control-sm">
              <label for="submitterName">Your name</label>
            </div>

            <!-- Material input email -->
            <div class="md-form form-sm">
              <i class="fa fa-envelope prefix"></i>
              <input type="email" id="submitterEmail" class="form-control form-control-sm">
              <label for="submitterEmail">Your email</label>
            </div>

            <!-- Material input subject -->
            <div class="md-form form-sm">
              <i class="fa fa-tag prefix"></i>
              <input type="text" id="materialFormSubjectModalEx1" class="form-control form-control-sm">
              <label for="referralName">Referral's Name</label>
            </div>

            <!-- Material textarea message -->
            <div class="md-form form-sm">
              <i class="fa fa-pencil-alt prefix"></i>
              <textarea type="text" id="materialFormMessageModalEx1"
                class="md-textarea form-control"></textarea>
              <label for="referralMessage">Tells us about your referral</label>
            </div>

            <div class="text-center mt-4 mb-2">
              <button class="btn btn-primary">Send
                <i class="fa fa-send ml-2"></i>
              </button>
            </div>

          </div>
        </div>
        <!--/.Content-->
      </div>
      <!--/Modal: Contact form-->
    </div>
<!-- REFERRAL FORM MODAL END -->
</section>

<!-- BUTTON ROW PRIVATE MESSAGE, GET AN ESTIMATE, AND SUBMIT REFERRAL START----------------------------------------------------- -->

                     
                    </div>
                </section>
                <!-- OVERVIEW SECTION END -->
                
                <div class="mb-5 " >

                    <h3 class="text-white" id="servicesHeader">Services</h3>

                    <div class="row card-body pl-0 pr-0 text-left" >
                        <?php 
                            $services = explode(',',$userdetails['services']) ; 
                            for($i=0 ;$i<count($services);$i++){
                            $servicequery = "select * from services where service_name ='".$services[$i]."'";
                            $servicename = $db->rawQueryOne($servicequery);
                        ?>
                        <div class="col-md-6 col-sm-5 mb-3">
                            <div><span id="serviceTag" data-toggle="tooltip" data-placement="top" title="<?php echo $servicename['service_description'] ; ?>"><?php echo $services[$i] ;?></span></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- COMPANY NAME, HEADER, GALLERY, AND BIO START------------------------------- -->
        <div class="col-xl-6 col-lg-6" >
            <div class="d-flex align-items-center mt-5">
                <h2 class="font-weight-bold m-0" style="font-family: 'playfair'; font-size: 28px;">
                    <?php echo $userdetails['businessname'] ; ?>
                </h2>
                <address class="m-0 pt-2 pl-0 pl-md-4 font-weight-light text-warning">
                    <i class="fa fa-map-marker"></i>
                    <?php echo $userdetails['city'] ; ?>, <?php echo $userdetails['state'] ; ?>
                </address>
            </div>
            <p class="text-primary d-block font-weight-light"><?php echo $userdetails['headliner'] ; ?>
                <!-- This is editable for the shop -->
            </p>
            <hr>
            <!-- INSERT RATING SYSTEM HERE -->
            <section  id="ratingsContainer">
                <p class=" text-warning mb-0" style="font-family: 'playfair'; font-size: 18px;">Shop Bio&nbsp;</p> 
            </section>
            <!-- INSERT RATING SYSTEM HERE -->
            <p style="font-family: 'lora'; font-size: 14px;"><?php echo $userdetails['bio'] ; ?></p>
            <hr>
<!-- SHOP GALLERY CAROUSEL START ----------------------------------------------------->
            <div id="shopImageCarousel" class="carousel container-fluid slide carousel-fade col-xl-10 col-md-12 mr-auto" style="height: 350px; width: 100%" data-ride="carousel">
              <div class="carousel-inner col-md-12" id="carouselControlContainer">
                <?php 
                      $glist = 0;
                      $galleryquery = "select * from shopgallery where  user_id = ". $userdetailsid;
                      $gallery = $db->rawQuery($galleryquery);
                      foreach($gallery as $row){
                          $imgelist = $ig++;
                  ?>             
                <div class="carousel-item <?php if($imgelist == 0){ echo 'active' ;} ?>">
                    <img src="<?php echo BASE_URL.'images/gallery/'.$row['image'] ; ?>" class="d-block z-depth-2" id="imageContainer" alt="...">
                </div>
                <?php } ?>
              </div>
              <a class="carousel-control-prev" href="#shopImageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#shopImageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            </div>
<!-- SHOP GALLERY CAROUSEL END ------------------------------------------------------------->
<!-- COMPANY NAME, HEADER, GALLERY, AND BIO END------------------------------- -->









             
    </div>
</div>
    <!-- REVIEWS AND RATING SECTION START----------------------------------------------- -->
    <div class="container col-xl-7 mb-5 pb-5 mt-5">
    			
          <div class="row col-xl-12 ml-auto mr-auto">
            <!-- RATINGS OVERVIEW START -->
            <div class="col-xl-3 col-lg-2 col-md-3 col-sm-4">
              <div class="">
              <?php
              		 $userdetailsid = $_GET['userid'] ;
              		 $userdetailsreviews = $db->rawQuery('select * from userratings where  user_id ="'.$userdetailsid.'"');
              		 $oneuserreviews = $db->rawQuery('select * from userratings where ratings = 1 AND  user_id ="'.$userdetailsid.'"');
              		 $twouserreviews = $db->rawQuery('select * from userratings where ratings = 2 AND  user_id ="'.$userdetailsid.'"');
              		 $threeuserreviews = $db->rawQuery('select * from userratings where ratings = 3 AND  user_id ="'.$userdetailsid.'"');
              		 $fouruserreviews = $db->rawQuery('select * from userratings where ratings = 4 AND  user_id ="'.$userdetailsid.'"');
              		 $fiveuserreviews = $db->rawQuery('select * from userratings where ratings = 5 AND  user_id ="'.$userdetailsid.'"');
				     $totalreview = 0;
				     if(count($userdetailsreviews) > 0)
				     {
					 	 foreach($userdetailsreviews as $review)
					     {
						 	$totalreview += $review['ratings'];
						 }
					     $totlreviews = round(($totalreview/count($userdetailsreviews)));
					 }else
					 {
					 	$totlreviews = 0;
					 }
				     
			  ?>	     
                <h4 style="font-family: 'playfair';">Rating</h4>
                <h4 class="bold padding-bottom-7"><?php echo $totlreviews ; ?> <small>/ 5</small></h4>
                  <?php for($r=0; $r<$totlreviews;$r++){ ?>
			        <i class="fa fa-star text-warning"></i>
			        <?php } ?>
              </div>
            </div>
             <!-- RATINGS OVERVIEW END -->
            <!-- RATINGS BREADOWN CONTAINER START -->
            <div class="col-xl-4 col-sm-4">
              <h4 style="font-family: 'playfair';">Rating breakdown</h4>
              <div class="pull-left">
               
                  <div class="mb-3" style="height:9px; margin:5px 0;">5 <i class="fas fa-star text-warning"></i> (<?php echo count($fiveuserreviews) ; ?>)</div>
                
                <div class="pull-left" style="width:180px;">
                  <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                    <span class="sr-only">80% Complete (danger)</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pull-left">
                
                  <div class="mb-3" style="height:9px; margin:5px 0;">4 <i class="fas fa-star text-warning"></i> (<?php echo count($fouruserreviews) ; ?>)</div>
                
                <div class="pull-left" style="width:180px;">
                  <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                    <span class="sr-only">80% Complete (danger)</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pull-left">
                
                  <div class="mb-3" style="height:9px; margin:5px 0;">3 <i class="fas fa-star text-warning"></i> (<?php echo count($threeuserreviews) ; ?>)</div>
                
                <div class="pull-left" style="width:180px;">
                  <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                    <span class="sr-only">80% Complete (danger)</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pull-left">
                
                  <div class="mb-3" style="height:9px; margin:5px 0;">2 <i class="fas fa-star text-warning"></i> (<?php echo count($twouserreviews) ; ?>)</div>
                
                <div class="pull-left" style="width:180px;">
                  <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                    <span class="sr-only">80% Complete (danger)</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pull-left">
               
                  <div class="mb-3" style="height:9px; margin:5px 0;">1 <i class="fas fa-star text-warning"></i> (<?php echo count($oneuserreviews) ; ?>)</div>
              
                <div class="pull-left" style="width:180px;">
                  <div class="progress" style="height:9px; margin:8px 0;">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                    <span class="sr-only">80% Complete (danger)</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- RATINGS BREAKDOWN CONTAINER END -->

          </div>			
          <hr>
          <div class="row">
            <div class="col-sm-10">
              
              <div class="review-block">
                <?php foreach($userdetailsreviews as $rev){
                	$userdetailsget = $db->rawQueryOne('select * from register where  id ="'.$rev['from_id'].'"');
                	?>
                <div class="row">
                  <div class="col-sm-2">
                    <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                    <div class="review-block-name"><a href="#"><?php echo $userdetailsget['firstName'] ; ?></a></div>
                    <div class="review-block-date"><?php echo date('M d,Y',strtotime($rev['created_on'])) ; ?><br/><?php echo time_elapsed_string($rev['created_on']); ; ?></div>
                  </div>
                  <div class="col-sm-9">
                    <div class="review-block-rate">
                    	<?php for($rs = 0; $rs<$rev['ratings'] ; $rs++){ ?>
                        <i class="fas fa-star text-warning" aria-hidden="true"></i>
                        <?php } ?>
                    </div>
                    <!--<div class="review-block-title">this was a great shop</div>-->
                    <div class="review-block-description"><?php echo $rev['message'] ; ?></div>
                  </div>
                </div>
                <hr/>
                <?php } ?>
                </div>
              </div>
            </div>
          </div>
          
           <!-- /container -->
      <!-- REVIEWS AND RATING SECTION END------------------------------------------------- -->

<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden; margin-top: 50px;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F; overflow: hidden;">© 2018 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->

<!-- IMAGE MODAL SCRIPT START -->
    <script>
        // Get the modal
        var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
    </script>
<!-- IMAGE MODAL SCRIPT END -->

 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

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
<script src="path/to/lightbox.js"></script>

</body>
</html>