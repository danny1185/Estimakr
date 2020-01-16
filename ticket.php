<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
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
<title>Help</title>

</script>

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
    h1 {
      font-size: 68px;
      font-family: 'playfair';
      margin-bottom: -15px;
    }
    h4 {
        font-size: 28px;
        font-family: 'playfair display';
    }
    p {
        font-family: 'lora';
    }
    label {
        font-family: 'lora';
    }
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
    #helpSubmitBtn {
        width: 150px;
        font-family: 'lora';
        font-weight: 400;
        background-color: #0C6EAF;
        border: solid 2px #0C6EAF;
        color: white;
        transition: 0.5s;
        letter-spacing: 1.5px;
    }
    #helpSubmitBtn:hover {
        transition: 0.5s;
        border: solid 2px #0C6EAF;
        background-color: transparent;
        color: #0c6eaf;
    }
    #faqContainer {
        margin-bottom: 300px;
    }
    #faqHeader {
      transition: 0.5s;
    }
    #faqHeader:hover  {
      transition: 0.5s;
      background-color: #0C6EAF;
      color: white;
    }
    #faqHeader:hover #faqHeaderText {
      transition: 0.5s;
      color: white;
      border: none;
    }
    #faqHeaderText:hover {
      text-decoration: none;
    }
</style>

</head>
<body>
<div class="mb-5">
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

    <div class="headerHero">
      <div class="heroText">
        <h1> Information </h1>
        <p style="font-size: 16px; font-family: 'lora';">If you need help take a look at our faq's or contact us</p>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-5">
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
    <div class="row" id="faqContainer">
    <div class="col-md-5 container jumbotron bg-white">
        <h4 class="text-center">Need Help?</h4>
        <p class="text-center">Tell us what we can help with</p>

        <form action="<?php echo BASE_URL?>controllers/ticket.php" method="post" name="cart" >
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name">
            </div>
            
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" class="form-control" name="phone">
            </div>
            
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" class="form-control"   name="email">
            </div>
            <div class="form-group">
                <label>Message:</label>
                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="row">
                <label>&nbsp;</label>
                <button type="submit" name="submit" value="save" class="btn" id="helpSubmitBtn">Submit</button>
            </div>
        </form>
    </div>
    <div class="container col-md-5" id="accordion">
  <h4 style="font-size: 36px;">FAQ's</h4>
  <div class="card">
    <div class="card-header" id="faqHeader">
      <h4 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <span id="faqHeaderText"><i class=" fa fa-arrow-down mr-3" ></i>How do i write an estimate?</span>
        </button>
      </h4>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum 
        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla 
        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt 
        sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, 
        aw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="faqHeader">
      <h4 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <span id="faqHeaderText"><i class=" fa fa-arrow-down mr-3" ></i>Collapsible Group Item #2</span>
        </button>
      </h4>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="faqHeader">
      <h4 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <span id="faqHeaderText"><i class=" fa fa-arrow-down mr-3" ></i>Collapsible Group Item #3</span>
        </button>
      </h4>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
<!-- FAQ SECTION START -->



<!-- FAQ SECTION END -->



</div>
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
