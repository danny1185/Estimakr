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
 
  <!-- Navbar NON-LOGGED IN END-->

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('images/estimat-for-customer.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container-fluid">

        <!--Grid row-->
        <div class="row wow fadeIn" id="heroContentContainer" >

          <!--Grid column-->
          <div class="col-md-5 mb-1 ml-auto mr-5 mr-md-5 mr-lg-5 mr-xl-5 mr-sm-auto mr-auto mt-xs-5 white-text text-center text-md-left" id="heroContentColumn">

            <h1 class="display-6" style="font-family: 'playfair display', serif;" id="heroHeader">Auto body repair estimates from your home or office</h1>

            <hr class="hr-light">

            <p id="heroSubHeader" style="font-family: 'lora';">
              <strong>Need an auto body repair estimate?</strong>
            </p>

            <p class="mb-4 d-none d-md-block" id="heroDescription" style="font-family: 'lora';">
              Estimakr allows you to submit a request for an auto body repair estimate to local shops in your
              area. You view multiple shops and estimates from your home and office, schedule and a drop off date and time,
              then keep track of your repairs all from one place.
              
              <!-- Estimakr allows you to write the estimate you need using the
                  pre-built auto estimating template. Keep track of your invoices and 
                  make sure their paid. -->
              
            </p>
            <a href="signUp.php" class="btn btn-red btn-sm">Get an Estimate Now!
              <i class="fas fa-clipboard ml-2"></i>
            </a>
            <a href="signUp.php" class="btn btn-primary btn-sm">Start writing estimates
              <i class="fas fa-pen ml-2"></i>
            </a>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-xl-4 col-lg-5 col-md-5 col-sm-10 ml-auto mr-auto mt-5 mb-4">

            <!--Card-->
            <div class="card z-depth-3" id="heroForm">

                <h5 class="card-header white-text text-center py-4" id="heroFormHeader">
                    <strong>Have a Question?</strong>
                </h5>
            
                <div class="card-body px-lg-5 pt-0">
            
                    <form class="md-form" style="color: #757575;">
            <div class="md-form">
              <input type="email" id="materialLoginFormEmail" class="form-control">
              <label for="materialLoginFormEmail">E-mail</label>
            </div>
                        
            <div class="md-form">
              <label for="input">Name</label>
              <input type="text" id="input" class="form-control" placeholder="">
            </div>
            
            <div class="md-form">
              <label for="textarea">Note:</label>
              <textarea class="form-control md-textarea" id="textarea" placeholder=""></textarea>
            </div>
 
                        <button class="btn btn-rounded btn-block my-4 waves-effect hoverable" id="heroFormSubmitBtn" type="submit">Submit</button>
            
                        <div class="text-center">
                            <p>Not a member?
                                <a href="signUp.php">Register</a>
                            </p>
            
                            
                        </div>
                    </form>
                </div>
            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->
<!-- FEATURES SECTION START -->
  <div class="container-fluid py-5 mt-5" id="featureMainSection">
    <div class=" text-center ml-auto mr-auto">
        <h3 class="ml-auto mr-auto" id="carTypeSectionHeader">Services</h3>
        <p id="carTypeSectionSubHeader"></p>
      </div>
      <hr class="col-3 ml-auto mr-auto" style="background-color: #BB1516;" id="hrSectionHeader1">
      <section class="p-md-3 mt-md-5 container-fluid text-lg-left" id="featureMainContainer">
        <div class="row d-flex container-fluid col-12 ml-auto mr-auto justify-content-center">
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8 mb-lg-0 mb-5 ml-2 mr-2 ml-xl-4 mr-xl-4 fade-in-up" id="featureContainer">
            <img class="mb-4" src="images/icons/Phone-Blue.png" id="featureIcon">
            <h4 class="font-weight-bold mb-4" id="featureHeader">Add your car</h4>
            <p class="text-muted mb-lg-0" id="featureSubHeader">
              Enter your car's information and snap <br>a few pictures
            </p>
            <hr class="w-25 ml-0 primary-color">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8 mb-lg-0 mb-5 ml-2 mr-2 ml-xl-4 mr-xl-4 fade-in-up" id="featureContainer">
              <img class="mb-4" src="images/icons/Email-RedBlue.png" id="featureIcon">
            <h4 class="font-weight-bold mb-4" id="featureHeader">Get Estimates</h4>
            <p class="text-muted mb-lg-0" id="featureSubHeader">
            Review estimates from local auto body Shops based on price, shop ratings, reviews, and more
            </p>
            <hr class="w-25 ml-0 primary-color">
          </div>
          <div class="col-xl-3 col-lg-3 col-md-8 col-sm-8 mb-lg-0 mb-5 ml-2 mr-2 ml-xl-4 mr-xl-4 fade-in-up" id="featureContainer">
              <img class="mb-4" src="images/icons/location-Blue.png" id="featureIcon">
            <h4 class="font-weight-bold mb-4" id="featureHeader">Pick a Shop</h4>
            <p class="text-muted mb-md-0" id="featureSubHeader">
              Choose a shop that is right for you and take your car in. No need for driving around and searching.
            </p>
            <hr class="w-25 ml-0 primary-color">
          </div>
        </div>
      </section>
    </div>
<!-- FEATURES SECTION END -->

<!-- CAR TYPE SECTION START -->
<div class="container-fluid" id="carTypeSection">
  <div class="col-lg-5 col-md-5 col-sm-8 text-center ml-auto mr-auto">
    <h3 id="carTypeSectionHeader">Get your car fixed</h3>
    <p id="carTypeSectionSubHeader">It's so easy to find the shop thats right for you just tell us a little about your car</p>
  </div>
  <hr class="col-3 ml-auto mr-auto" style="background-color: #BB1516;" id="hrSectionHeader2">
  <div class="row" id="carTypeIconSection">
      <img class="mb-4 col-lg-2 col-md-2 col-2 ml-auto" src="images/icons/pick-up-truck.svg" id="carTypeIcons">
      <img class="mb-4 col-lg-2 col-md-2 col-2" src="images/icons/convertible.svg" id="carTypeIcons">
      <img class="mb-4 col-lg-2 col-md-2 col-2" src="images/icons/suv.svg" id="carTypeIcons">
      <img class="mb-4 col-lg-2 col-md-2 col-2" src="images/icons/coupe.svg" id="carTypeIcons">
      <img class="mb-4 col-lg-2 col-md-2 col-2" src="images/icons/sedan.svg" id="carTypeIcons">
      <img class="mb-4 col-lg-2 col-md-2 col-2 mr-auto" src="images/icons/fleet.svg" id="carTypeIcons">
  </div>
</div>
<!-- CAR TYPE SECTION END -->

<div class="serviceSection" style="background-image: url('images/classic-car-tinted.jpg'); background-repeat: no-repeat; background-size: cover;"> 
  <div class=" col-md-6 col-lg-5 col-xl-4 col-sm-8 text-center ml-auto mr-auto" id="serviceSectionHeaderContainer">
      <h3 id="serviceSectionHeader">What Can <span id="serviceSectionHeaderSpan">You</span> Do With Estimakr?</h3>
      <p id="serviceSectionSubHeader">We can help you find the right auto body shop for your repair and refinish needs.</p>
    </div>
</div>


<div class="container-fluid pl-auto pr-auto">

    <!-- Section -->
    <section class="container-fluid pl-auto pr-auto">
  
      
  
      <div class="row container-fluid ml-auto mr-auto" id="whatCanSectionContainer">
  <!-- CARD COLUMN 1 START -->
        <div class=" mb-2 col-xl-3 col-lg-5 col-md-8 ml-auto mr-auto">
          <div class=" text-center text-white">
            <div class="card-body" id="whatCanCardContainer">
              <p class="mt-2 pt-2">
                <svg version="1.1" id="whatCanIcons" class="mb-1 ml-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
             <style type="text/css">
               .st0{stroke-width:2;stroke-miterlimit:10;}
             </style>
             <path class="st0" d="M55.51,1L7.26,46.88v29.47c0.59-0.02,1.2-0.04,1.79-0.04c23.86,0,43.22,19.36,43.22,43.22
               c0,2.56-0.21,5.04-0.66,7.47h69.15V1H55.51z M97.22,64.14H73.99v-7.15h23.23V64.14z M111.52,64.14h-8.94v-7.15h8.94V64.14z
                M111.52,45.09H22.16L60.43,9.94h51.1V45.09z"/>
             </svg>
              </p>
              <p style="font-family: 'playfair';" id="whatCanCardHeader">Car Body</p>
              <h5 class="font-weight-normal py-2"  style="font-family: 'playfair"><a id="whatCanCardSubHeader" href="#">Minor Body Repair</a></h5>
              <p class="mb-4" id="whatCanCardContent"style="font-family: 'lora'">From bumper scratches, dings, dents, oxidation, peeling and minor collision Estimakr can help
              you on your way to having that new car look and feel again.</p>
            <hr class="col-md-2 col-sm-8 col-8" id="whatCanCardHr">
            <div class="row"><a href="signUp.php" class="btn btn-sm ml-auto mr-auto" id="whatCanCardBtn">Learn More
                <i class="fas fa-pen ml-2"></i>
              </a></div>
            
            </div>
            
          </div>
        </div>
  <!-- CARD COLUMN 1 END -->

  <!-- CARD COLUMN 2 START -->
  <div class=" mb-2 col-xl-3 col-lg-5 col-md-8 ml-auto mr-auto">
      <div class=" text-center text-white">
        <div class="card-body" id="whatCanCardContainer">
          <p class="mt-2 pt-2">
              <svg version="1.1" id="whatCanIcons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
           <style type="text/css">
            
             .st1{stroke-width:2;stroke-miterlimit:10;}
           </style>
           
           <path id="icon_9_" class="st1" d="M99.09,126.5H28.91c-4.03,0-7.3-3.28-7.3-7.3V23.97c0-4.03,3.28-7.3,7.3-7.3h11.17v4.87H28.91
             c-1.34,0-2.43,1.09-2.43,2.43v95.22c0,1.34,1.09,2.43,2.43,2.43h70.18c1.34,0,2.43-1.09,2.43-2.43V23.97c0-1.34-1.09-2.43-2.43-2.43
             H88.05v-4.87h11.04c4.03,0,7.3,3.28,7.3,7.3v95.22C106.39,123.22,103.12,126.5,99.09,126.5z M84.47,11.76v12.87
             c0,1.28-1.04,2.34-2.34,2.34H45.9c-1.28,0-2.34-1.05-2.34-2.34V11.76c0-1.28,1.05-2.34,2.34-2.34h8.5c0.88-4.5,4.85-7.92,9.59-7.92
             c2.69,0,5.14,1.1,6.91,2.87c1.35,1.35,2.32,3.1,2.69,5.05h8.54C83.43,9.42,84.47,10.47,84.47,11.76z M69.27,12.6
             c0-1.2-0.41-2.3-1.09-3.18c-0.96-1.27-2.48-2.08-4.19-2.08s-3.23,0.81-4.19,2.08c-0.67,0.88-1.07,1.98-1.07,3.18
             c0,2.9,2.35,5.27,5.26,5.27S69.27,15.51,69.27,12.6z M57.46,106.83L57.46,106.83c0,0.98,0.82,1.77,1.82,1.77h33.39
             c1.01,0,1.82-0.79,1.82-1.77l0,0c0-0.98-0.82-1.77-1.82-1.77H59.28C58.28,105.06,57.46,105.85,57.46,106.83z M57.46,84.7L57.46,84.7
             c0,0.98,0.82,1.77,1.82,1.77h33.39c1.01,0,1.82-0.79,1.82-1.77l0,0c0-0.98-0.82-1.77-1.82-1.77H59.28
             C58.28,82.92,57.46,83.72,57.46,84.7z M57.46,62.56L57.46,62.56c0,0.98,0.82,1.77,1.82,1.77h33.39c1.01,0,1.82-0.79,1.82-1.77l0,0
             c0-0.98-0.82-1.77-1.82-1.77H59.28C58.28,60.79,57.46,61.58,57.46,62.56z M57.46,40.43L57.46,40.43c0,0.98,0.82,1.77,1.82,1.77
             h33.39c1.01,0,1.82-0.79,1.82-1.77l0,0c0-0.98-0.82-1.77-1.82-1.77H59.28C58.28,38.66,57.46,39.45,57.46,40.43z M46.75,32.04
             c1.93,0,3.53,1.61,3.53,3.53v9.71c0,1.93-1.61,3.53-3.53,3.53h-9.71c-1.93,0-3.53-1.61-3.53-3.53v-9.71c0-1.93,1.61-3.53,3.53-3.53
             H46.75z M37.04,45.28h9.71v-9.71h-9.71V45.28z M46.75,98.44c1.93,0,3.53,1.61,3.53,3.53v9.71c0,1.93-1.61,3.53-3.53,3.53h-9.71
             c-1.93,0-3.53-1.61-3.53-3.53v-9.71c0-1.93,1.61-3.53,3.53-3.53H46.75z M37.04,111.68h9.71v-9.71h-9.71V111.68z M53.02,58.79
             l-9.16,9.16c-1.36,1.36-3.63,1.36-4.99,0l-4.57-4.57l2.5-2.5l4.57,4.57l9.16-9.16L53.02,58.79z M46.75,76.31
             c1.93,0,3.53,1.61,3.53,3.53v9.71c0,1.93-1.61,3.53-3.53,3.53h-9.71c-1.93,0-3.53-1.61-3.53-3.53v-9.71c0-1.93,1.61-3.53,3.53-3.53
             H46.75z M37.04,89.55h9.71v-9.71h-9.71V89.55z"/>
           </svg>
          </p>
          <p style="font-family: 'playfair';" id="whatCanCardHeader">Minor Collision</p>
          <h5 class="font-weight-normal py-2"  style="font-family: 'playfair"><a id="whatCanCardSubHeader" href="#">Insurance Claims and Repair</a></h5>
          <p class="mb-4" id="whatCanCardContent"style="font-family: 'lora'">If you were in a minor colision and are now going through your insurance carrier for repairs. Our partnered Shops
          have the knowledge and expertise to welcome all insurance claims.</p>
        <hr class="col-md-2 col-sm-8 col-8" id="whatCanCardHr">
        <div class="row"><a href="signUp.php" class="btn btn-sm ml-auto mr-auto" id="whatCanCardBtn">Learn More
            <i class="fas fa-pen ml-2"></i>
          </a></div>
        
        </div>
        
      </div>
    </div>
<!-- CARD COLUMN 2 END -->
       
    <!-- CARD COLUMN 3 START -->
    <div class=" mb-2 col-xl-3 col-lg-5 col-md-8 ml-auto mr-auto">
        <div class=" text-center text-white">
          <div class="card-body" id="whatCanCardContainer">
            <p class="mt-2 pt-2">
                <svg version="1.1" id="whatCanIcons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
             <style type="text/css">
               
               .st1{stroke-width:2;stroke-miterlimit:10;}
             </style>
            
             
             <g>
               <g>
                 <path class="st1" d="M113.22,44.31H46.28c-2.72,0-4.92,2.2-4.92,4.92v25.59c0,2.72,2.2,4.92,4.92,4.92h28.84h4.18l10.11,28.24
                   c0.7,1.96,2.56,3.26,4.63,3.26h21.4c1.33,0,2.28-1.3,1.88-2.57l-9.26-28.93h4.13h1.02c2.72,0,4.92-2.2,4.92-4.92V49.23
                   C118.14,46.52,115.94,44.31,113.22,44.31z"/>
               </g>
               <g>
                 <path class="st1" d="M113.22,80.73h-1.02c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h1.02c2.17,0,3.94-1.77,3.94-3.94V49.23
                   c0-2.17-1.77-3.94-3.94-3.94H46.28c-2.17,0-3.94,1.77-3.94,3.94v25.59c0,2.17,1.77,3.94,3.94,3.94h28.84
                   c0.54,0,0.98,0.44,0.98,0.98s-0.44,0.98-0.98,0.98H46.28c-3.26,0-5.91-2.65-5.91-5.91V49.23c0-3.26,2.65-5.91,5.91-5.91h66.94
                   c3.26,0,5.91,2.65,5.91,5.91v25.59C119.13,78.09,116.48,80.73,113.22,80.73z"/>
               </g>
               <g>
                 <path class="st1" d="M71.88,36.44h-12.8c-5.97,0-10.83-4.86-10.83-10.83V6.91C48.25,3.65,50.9,1,54.16,1H76.8
                   c3.26,0,5.91,2.65,5.91,5.91v18.7C82.7,31.58,77.85,36.44,71.88,36.44z M54.16,2.97c-2.17,0-3.94,1.77-3.94,3.94v18.7
                   c0,4.89,3.97,8.86,8.86,8.86h12.8c4.89,0,8.86-3.97,8.86-8.86V6.91c0-2.17-1.77-3.94-3.94-3.94H54.16z"/>
               </g>
               <g>
                 <path class="st1" d="M37.42,68.92h-8.86c-1.63,0-2.95-1.32-2.95-2.95v-7.88c0-1.63,1.32-2.95,2.95-2.95h8.86
                   c0.54,0,0.98,0.44,0.98,0.98s-0.44,0.98-0.98,0.98h-8.86c-0.54,0-0.98,0.44-0.98,0.98v7.88c0,0.54,0.44,0.98,0.98,0.98h8.86
                   c0.54,0,0.98,0.44,0.98,0.98S37.97,68.92,37.42,68.92z"/>
               </g>
               <g>
                 <path class="st1" d="M124.05,59.08h-1.97c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h1.97c0.54,0,0.98-0.44,0.98-0.98v-3.94
                   c0-0.54-0.44-0.98-0.98-0.98h-1.97c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h1.97c1.63,0,2.95,1.32,2.95,2.95v3.94
                   C127,57.75,125.68,59.08,124.05,59.08z"/>
               </g>
               <g>
                 <path class="st1" d="M110.66,118.14H99.12c-1.98,0-3.82-0.98-4.91-2.63l-2.48-3.71c-0.2-0.3-0.22-0.69-0.05-1.01
                   c0.17-0.32,0.5-0.52,0.87-0.52h23.63c0.32,0,0.61,0.15,0.8,0.41c0.18,0.26,0.24,0.59,0.13,0.89l-0.85,2.54
                   C115.45,116.52,113.2,118.14,110.66,118.14z M94.39,112.23l1.46,2.18c0.73,1.1,1.96,1.75,3.28,1.75h11.54
                   c1.7,0,3.2-1.08,3.74-2.69l0.41-1.25H94.39z"/>
               </g>
               <g>
                 <path class="st1" d="M115.44,112.23h-21.4c-2.49,0-4.72-1.57-5.56-3.91L77.43,77.44c-0.56-1.56-2.05-2.61-3.71-2.61H45.3
                   c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h28.43c2.49,0,4.72,1.57,5.56,3.91l11.05,30.88c0.56,1.56,2.05,2.61,3.71,2.61
                   h21.4c0.32,0,0.61-0.15,0.79-0.4c0.19-0.26,0.24-0.58,0.14-0.88l-14.93-46.65c-0.17-0.52,0.12-1.07,0.64-1.24
                   c0.52-0.16,1.07,0.12,1.24,0.64l14.93,46.65c0.29,0.91,0.14,1.87-0.43,2.64C117.27,111.79,116.4,112.23,115.44,112.23z"/>
               </g>
               <g>
                 <path class="st1" d="M69.91,41.36c-0.54,0-0.98-0.44-0.98-0.98v-4.92c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v4.92
                   C70.89,40.92,70.45,41.36,69.91,41.36z"/>
               </g>
               <g>
                 <path class="st1" d="M61.05,41.36c-0.54,0-0.98-0.44-0.98-0.98v-4.92c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v4.92
                   C62.03,40.92,61.59,41.36,61.05,41.36z"/>
               </g>
               <g>
                 <path class="st1" d="M3.95,63.02H1.98C1.44,63.02,1,62.58,1,62.03s0.44-0.98,0.98-0.98h1.97c0.54,0,0.98,0.44,0.98,0.98
                   S4.5,63.02,3.95,63.02z"/>
               </g>
               <g>
                 <path class="st1" d="M22.66,63.02H7.89c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h14.77c0.54,0,0.98,0.44,0.98,0.98
                   S23.2,63.02,22.66,63.02z"/>
               </g>
               <g>
                 <path class="st1" d="M2.77,76.83c-0.39,0-0.75-0.23-0.91-0.61c-0.21-0.5,0.03-1.08,0.53-1.29l1.82-0.75
                   c0.5-0.21,1.08,0.03,1.29,0.53S5.47,75.8,4.97,76l-1.82,0.75C3.03,76.81,2.9,76.83,2.77,76.83z"/>
               </g>
               <g>
                 <path class="st1" d="M8.23,74.57c-0.39,0-0.75-0.23-0.91-0.61c-0.21-0.5,0.03-1.08,0.53-1.29l13.64-5.65
                   c0.5-0.21,1.08,0.03,1.29,0.53s-0.03,1.08-0.53,1.29L8.6,74.5C8.48,74.55,8.35,74.57,8.23,74.57z"/>
               </g>
               <g>
                 <path class="st1" d="M4.59,49.95c-0.13,0-0.25-0.02-0.38-0.07L2.4,49.12c-0.5-0.21-0.74-0.78-0.53-1.29
                   c0.21-0.5,0.79-0.74,1.29-0.53l1.82,0.75c0.5,0.21,0.74,0.78,0.53,1.29C5.34,49.72,4.98,49.95,4.59,49.95z"/>
               </g>
               <g>
                 <path class="st1" d="M21.87,57.11c-0.13,0-0.25-0.02-0.38-0.07L7.85,51.38c-0.5-0.21-0.74-0.78-0.53-1.29s0.78-0.74,1.29-0.53
                   l13.64,5.65c0.5,0.21,0.74,0.78,0.53,1.29C22.62,56.88,22.26,57.11,21.87,57.11z"/>
               </g>
               <g>
                 <path class="st1" d="M110.27,57.11H96.48c-1.63,0-2.95-1.32-2.95-2.95v-1.97c0-1.63,1.32-2.95,2.95-2.95h13.78
                   c1.63,0,2.95,1.32,2.95,2.95v1.97C113.22,55.78,111.89,57.11,110.27,57.11z M96.48,51.2c-0.54,0-0.98,0.44-0.98,0.98v1.97
                   c0,0.54,0.44,0.98,0.98,0.98h13.78c0.54,0,0.98-0.44,0.98-0.98v-1.97c0-0.54-0.44-0.98-0.98-0.98H96.48z"/>
               </g>
               <g>
                 <path class="st1" d="M100.42,127H41.36c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h59.06c2.17,0,3.94-1.77,3.94-3.94v-3.94
                   c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v3.94C106.33,124.35,103.68,127,100.42,127z"/>
               </g>
               <g>
                 <path class="st1" d="M76.72,35.45H54.23c-2.76,0-5-2.24-5-5V13.8h32.48v16.66C81.72,33.21,79.48,35.45,76.72,35.45z"/>
                 <path class="st1" d="M71.88,36.44h-12.8c-5.97,0-10.83-4.86-10.83-10.83V13.8c0-0.54,0.44-0.98,0.98-0.98h32.48
                   c0.54,0,0.98,0.44,0.98,0.98v11.81C82.7,31.58,77.85,36.44,71.88,36.44z M50.22,14.78v10.83c0,4.89,3.97,8.86,8.86,8.86h12.8
                   c4.89,0,8.86-3.97,8.86-8.86V14.78H50.22z"/>
               </g>
               <g>
                 <path class="st1" d="M80.72,98.45h-8.86c-0.94,0-1.81-0.43-2.37-1.19c-0.56-0.76-0.73-1.71-0.46-2.61l2.15-7.17v-3.79
                   c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v3.94c0,0.1-0.01,0.19-0.04,0.28l-2.19,7.31c-0.09,0.3-0.03,0.62,0.15,0.87
                   s0.48,0.4,0.79,0.4h8.86c0.54,0,0.98,0.44,0.98,0.98S81.27,98.45,80.72,98.45z"/>
               </g>
               <g>
                 <path class="st1" d="M70.89,30.53c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98c2.17,0,3.94-1.77,3.94-3.94V19.7
                   c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v4.92C76.8,27.88,74.15,30.53,70.89,30.53z"/>
               </g>
               <g>
                 <path class="st1" d="M31.52,68.92c-0.54,0-0.98-0.44-0.98-0.98V56.13c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v11.81
                   C32.5,68.48,32.06,68.92,31.52,68.92z"/>
               </g>
               <g>
                 <path class="st1" d="M117.16,15.77c-0.54,0-0.98-0.44-0.98-0.98V6.91c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v7.88
                   C118.14,15.33,117.7,15.77,117.16,15.77z"/>
               </g>
               <g>
                 <path class="st1" d="M101.41,27.58c-0.54,0-0.98-0.44-0.98-0.98v-7.88c0-0.54,0.44-0.98,0.98-0.98s0.98,0.44,0.98,0.98v7.88
                   C102.39,27.14,101.95,27.58,101.41,27.58z"/>
               </g>
               <g>
                 <path class="st1" d="M105.34,23.64h-7.88c-0.54,0-0.98-0.44-0.98-0.98s0.44-0.98,0.98-0.98h7.88c0.54,0,0.98,0.44,0.98,0.98
                   S105.89,23.64,105.34,23.64z"/>
               </g>
             </g>
             </svg>
            </p>
            <p style="font-family: 'playfair';" id="whatCanCardHeader">Custom Work</p>
            <h5 class="font-weight-normal py-2"  style="font-family: 'playfair"><a id="whatCanCardSubHeader" href="#">Restoration and Custom Kits</a></h5>
            <p class="mb-4" id="whatCanCardContent"style="font-family: 'lora'">Restoring that classic 78' camaro? or maybe you want to add a body kit to your modern car. Whatever your
            custom requriements are just send them over and get the right estimates.</p>
          <hr class="col-md-2 col-sm-8 col-8" id="whatCanCardHr">
          <div class="row"><a href="signUp.php" class="btn btn-sm ml-auto mr-auto" id="whatCanCardBtn">Learn More
              <i class="fas fa-pen ml-2"></i>
            </a></div>
          
          </div>
          
        </div>
      </div>
<!-- CARD COLUMN 3 END -->

  <!-- CARD COLUMN 4 START -->
  <div class=" mb-2 col-xl-3 col-lg-5 col-md-8 ml-auto mr-auto">
      <div class=" text-center text-white">
        <div class="card-body" id="whatCanCardContainer">
          <p class="mt-2 pt-2">
              <svg version="1.1" id="whatCanIcons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 128 128" style="enable-background:new 0 0 128 128;" xml:space="preserve">
           <style type="text/css">
             
             .st4{fill-rule:evenodd;clip-rule:evenodd;stroke-width:2;stroke-miterlimit:10;}
           </style>
          
           
           
           <g>
             <path class="st4" d="M91.98,26.96c2.88,0,5.21,2.33,5.21,5.21c0,1.5-0.64,2.85-1.65,3.8h4.28v1.4h-7.84H39.31H26.77v-1.4h8.98
               c-1.02-0.95-1.65-2.3-1.65-3.8c0-2.87,2.33-5.21,5.21-5.21c2.88,0,5.21,2.33,5.21,5.21c0,1.5-0.64,2.85-1.65,3.8h45.56
               c-1.02-0.95-1.65-2.3-1.65-3.8C86.77,29.3,89.11,26.96,91.98,26.96L91.98,26.96z M25.37,31v-2.81h5.62l1.4-1.4h-5.62v-8.43h23.88
               l-1.4-1.4H26.77V9.93l1.4-5.62l2.81-2.81h43.55l5.62,1.4l2.81,2.81l-4.21,1.4h4.21l7.02,8.43h-1.4l-5.62-7.02H71.73v5.62l1.4,1.4
               l14.05,2.81l1.4-1.4h2.81l7.02,2.81l2.81,2.81h-2.81v1.4l4.21,1.4v1.4l-2.81,1.4h2.81v4.21l-2.81,1.4h-1.43
               c0.13-0.52,0.2-1.07,0.2-1.64c0-3.65-2.96-6.61-6.61-6.61c-3.65,0-6.61,2.96-6.61,6.61c0,0.56,0.07,1.11,0.2,1.64H45.72
               c0.13-0.52,0.2-1.07,0.2-1.64c0-3.65-2.96-6.61-6.61-6.61c-3.65,0-6.61,2.96-6.61,6.61c0,0.56,0.07,1.11,0.2,1.64h-4.72L25.37,31
               L25.37,31z M91.98,31.18c-0.55,0-0.99,0.45-0.99,0.99c0,0.55,0.44,1,0.99,1c0.55,0,1-0.45,1-1C92.98,31.62,92.53,31.18,91.98,31.18
               L91.98,31.18z M39.31,31.18c-0.55,0-0.99,0.45-0.99,0.99c0,0.55,0.44,1,0.99,1c0.55,0,0.99-0.45,0.99-1
               C40.3,31.62,39.86,31.18,39.31,31.18L39.31,31.18z M91.98,29.77c-1.32,0-2.4,1.07-2.4,2.4c0,1.32,1.07,2.4,2.4,2.4
               c1.32,0,2.4-1.08,2.4-2.4C94.38,30.85,93.31,29.77,91.98,29.77L91.98,29.77z M39.31,29.77c-1.32,0-2.4,1.07-2.4,2.4
               c0,1.32,1.07,2.4,2.4,2.4c1.32,0,2.4-1.08,2.4-2.4C41.71,30.85,40.63,29.77,39.31,29.77L39.31,29.77z"/>
             <path class="st4" d="M91.98,71.52c2.88,0,5.21,2.33,5.21,5.21c0,1.5-0.64,2.85-1.65,3.8h4.28v1.4h-7.84H39.31H26.77v-1.4h8.98
               c-1.02-0.95-1.65-2.3-1.65-3.8c0-2.87,2.33-5.21,5.21-5.21c2.88,0,5.21,2.33,5.21,5.21c0,1.5-0.64,2.85-1.65,3.8h45.56
               c-1.02-0.95-1.65-2.3-1.65-3.8C86.77,73.86,89.11,71.52,91.98,71.52L91.98,71.52z M25.37,75.56v-2.81h5.62l1.4-1.4h-5.62v-8.43
               h23.88l-1.4-1.4H26.77v-7.02l1.4-5.62l2.81-2.81h43.55l5.62,1.4l2.81,2.81l-4.21,1.4h4.21l7.02,8.43h-1.4l-5.62-7.02H71.73v5.62
               l1.4,1.4l14.05,2.81l1.4-1.4h2.81l7.02,2.81l2.81,2.81h-2.81v1.4l4.21,1.4v1.4l-2.81,1.4h2.81v4.21l-2.81,1.4h-1.43
               c0.13-0.52,0.2-1.07,0.2-1.64c0-3.65-2.96-6.61-6.61-6.61c-3.65,0-6.61,2.96-6.61,6.61c0,0.56,0.07,1.11,0.2,1.64H45.72
               c0.13-0.52,0.2-1.07,0.2-1.64c0-3.65-2.96-6.61-6.61-6.61c-3.65,0-6.61,2.96-6.61,6.61c0,0.56,0.07,1.11,0.2,1.64h-4.72
               L25.37,75.56L25.37,75.56z M91.98,75.74c-0.55,0-0.99,0.45-0.99,0.99c0,0.55,0.44,1,0.99,1c0.55,0,1-0.45,1-1
               C92.98,76.18,92.53,75.74,91.98,75.74L91.98,75.74z M39.31,75.74c-0.55,0-0.99,0.45-0.99,0.99c0,0.55,0.44,1,0.99,1
               c0.55,0,0.99-0.45,0.99-1C40.3,76.18,39.86,75.74,39.31,75.74L39.31,75.74z M91.98,74.33c-1.32,0-2.4,1.07-2.4,2.4
               c0,1.32,1.07,2.4,2.4,2.4c1.32,0,2.4-1.08,2.4-2.4C94.38,75.41,93.31,74.33,91.98,74.33L91.98,74.33z M39.31,74.33
               c-1.32,0-2.4,1.07-2.4,2.4c0,1.32,1.07,2.4,2.4,2.4c1.32,0,2.4-1.08,2.4-2.4C41.71,75.41,40.63,74.33,39.31,74.33L39.31,74.33z"/>
             <path class="st4" d="M91.98,116.08c2.88,0,5.21,2.33,5.21,5.21c0,1.5-0.64,2.85-1.65,3.8h4.28v1.4h-7.84H39.31H26.77v-1.4h8.98
               c-1.02-0.95-1.65-2.3-1.65-3.8c0-2.87,2.33-5.21,5.21-5.21c2.88,0,5.21,2.33,5.21,5.21c0,1.5-0.64,2.85-1.65,3.8h45.56
               c-1.02-0.95-1.65-2.3-1.65-3.8C86.77,118.42,89.11,116.08,91.98,116.08L91.98,116.08z M25.37,120.12v-2.81h5.62l1.4-1.4h-5.62
               v-8.43h23.88l-1.4-1.4H26.77v-7.02l1.4-5.62l2.81-2.81h43.55l5.62,1.4l2.81,2.81l-4.21,1.4h4.21l7.02,8.43h-1.4l-5.62-7.02H71.73
               v5.62l1.4,1.4l14.05,2.81l1.4-1.4h2.81l7.02,2.81l2.81,2.81h-2.81v1.4l4.21,1.4v1.4l-2.81,1.4h2.81v4.21l-2.81,1.4h-1.43
               c0.13-0.52,0.2-1.07,0.2-1.64c0-3.65-2.96-6.61-6.61-6.61c-3.65,0-6.61,2.96-6.61,6.61c0,0.56,0.07,1.11,0.2,1.64H45.72
               c0.13-0.52,0.2-1.07,0.2-1.64c0-3.65-2.96-6.61-6.61-6.61c-3.65,0-6.61,2.96-6.61,6.61c0,0.56,0.07,1.11,0.2,1.64h-4.72
               L25.37,120.12L25.37,120.12z M91.98,120.3c-0.55,0-0.99,0.45-0.99,0.99c0,0.55,0.44,1,0.99,1c0.55,0,1-0.45,1-1
               C92.98,120.74,92.53,120.3,91.98,120.3L91.98,120.3z M39.31,120.3c-0.55,0-0.99,0.45-0.99,0.99c0,0.55,0.44,1,0.99,1
               c0.55,0,0.99-0.45,0.99-1C40.3,120.74,39.86,120.3,39.31,120.3L39.31,120.3z M91.98,118.89c-1.32,0-2.4,1.07-2.4,2.4
               c0,1.32,1.07,2.4,2.4,2.4c1.32,0,2.4-1.08,2.4-2.4C94.38,119.97,93.31,118.89,91.98,118.89L91.98,118.89z M39.31,118.89
               c-1.32,0-2.4,1.07-2.4,2.4c0,1.32,1.07,2.4,2.4,2.4c1.32,0,2.4-1.08,2.4-2.4C41.71,119.97,40.63,118.89,39.31,118.89L39.31,118.89z
               "/>
           </g>
           </svg>
          </p>
          <p style="font-family: 'playfair';" id="whatCanCardHeader">Fleet Work</p>
          <h5 class="font-weight-normal py-2"  style="font-family: 'playfair"><a id="whatCanCardSubHeader" href="#">Service or Business Vehicles</a></h5>
          <p class="mb-4" id="whatCanCardContent"style="font-family: 'lora'">For those who have multiple vehicles and are looking for the right shop to handle either your fleet of vehicles, large semi trucks
          box trucks, commercial vans, specialed equiptment or any other item in need of refinishing.</p>
        <hr class="col-md-2 col-sm-8 col-8" id="whatCanCardHr">
        <div class="row"><a href="signUp.php" class="btn btn-sm ml-auto mr-auto" id="whatCanCardBtn">Learn More
            <i class="fas fa-pen ml-2"></i>
          </a></div>
        
        </div>
        
      </div>
    </div>
<!-- CARD COLUMN 4 END -->
      </div>
  
    </section>
    <!-- Section -->
  <div class="container-fluid my-5 py-5" >


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center dark-grey-text">
 
      <h3 class="font-weight-bold mb-5" id="customerShopMainContainerHeader">Need repairs <span id="customerShopMainContainerHeaderSpan">or</span> do you repair?</h3>

      <!--Grid row-->
      <div class="row" id="customerShopMainContainer">

        <!--Grid column-->
        <div class="col-md-5 col-xl-4 ml-auto mb-4 mb-md-0 p-4 mx-2 hoverable" id="customerShopCardContainer">

          

          <p class="font-weight-bold"  style="font-family: 'playfair';" id="customerShopHeader">Are You Looking</p>

          <p class="text-muted" style="font-family: 'playfair';" id="customerShopSubHeader">To Repair your car?</p>
          <hr class="text-red">
          <p class="text-muted" style="font-family: 'playfair';" id="customerShopDescription">Go ahead and submit your refinish or repair
          needs. Gather multiple auto body shop estimates without leaving your driveway.</p>
          <a class="btn btn-md" href="#" role="button" id="customerShopGetEstimateBtn" >Get an Estimate</a>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-5 col-xl-4 mb-4 mr-auto mb-md-0 hoverable p-4 mx-2" id="customerShopCardContainer">

         

          <p class="font-weight-bold"  style="font-family: 'playfair';" id="customerShopHeader">Would You Like</p>

          <p class="text-muted " style="font-family: 'playfair';" id="customerShopSubHeader">To add your repair shop?</p>
          <hr class="text-red">
          <p class="text-muted" style="font-family: 'playfair';" id="customerShopDescription">Looking for a way to boost business?
          Join estimakr and connect with local drivers and fleet managers in need of your auto body services.</p>

          <a class="btn btn-md" href="#" role="button" id="customerShopGiveEstimateBtn">Give an Estimate</a>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->


    </section>
    <!--Section: Content-->


  </div>
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
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="index.html" target="_blank"> Estimakr </a>
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
