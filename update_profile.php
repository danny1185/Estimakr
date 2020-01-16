<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php'); 
    $query = "select * from register where  id = ". $_SESSION['user_id'];
    $user = $db->rawQueryOne($query);
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" text="text/css" href="./css/estimateForm.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<title>Profile Settings</title>
<link rel="stylesheet" text="text/css" href="./css/update_profile.css">




</head>
<body>
<div class="">
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
  <nav class="navbar z-depth-2" style="background-color: #324a5f; color: white; height: 55px; font-size: 26px; font-family: playfair;">

<ol class="breadcrumb mr-auto" style="font-size: 18px;">
    <li class="breadcrumb-item active text-white ml-4" >Profile Settings</li>
  </ol>
</nav>
<!-- PAGE HEADER END -->

    <div class="container-fluid mt-0 ml-0 mr-0 mb-5" id="profileContainer">
    <div class="row">
        <div class="col-md-4">
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

    
        
<form class="container-fluid col-xl-12 p-0" enctype="multipart/form-data" action="<?php echo BASE_URL?>controllers/update_profile.php" method="post" name="cart" >
            

<!-- BANNER IMAGE UPLOAD START -------------------------------------------------------------------------------------------------->
<div class="container-fluid col-xl-12 p-0 z-depth-2" style="background:url(<?php echo BASE_URL.'images/bannerimage/'.$user['bannerimage'] ; ?>); background-size: cover; background-repeat: no-repeat; background-position: 0 30%; height: 400px;">
    <div class="form-group col-xl-1 ml-auto mr-auto pt-5 pl-0 pr-0">
        <input type="file" name="bannerimage" class="logoInput" id="bannerimage">
        <label for="bannerimage"><i class="fa fa-upload mr-1"></i>Upload Banner</label>
        <input type="hidden" class="form-control" id="uploadButton" value="<?php if ( isset($user['bannerimage'])){ echo  $user['bannerimage']; }?>"  name="old_bannerimage">
    </div>
</div>
<!-- BANNER IMAGE UPLOAD END -------------------------------------------------------------------------------------------------->




            <div class="row container mb-5 mt-5 ml-auto mr-auto pl-5">

                <div class="col-xl-6 ml-5">
                    <div class="row pt-auto pb-auto">
                        <!-- <div class="col-xl-3 offset-md-1 mt-auto mb-auto"><label class="mt-auto mb-auto">Logo:</label></div> -->
                        <!-- LOGO UPLOAD START --------------------------------------------------------->
                        <div class="row mt-auto mb-auto">
                            <div class="form-group mt-auto mb-auto">
                                <input type="file" name="logo" class="logoInput mt-auto mb-auto" id="file">
                                <label for="file"><i class="fa fa-upload mr-3 mt-auto mb-auto"></i>Choose a File</label>
                                <input type="hidden" class="form-control mt-auto mb-auto" id="uploadButton" value="<?php if ( isset($user['logo'])){ echo  $user['logo']; }?>"  name="old_logo">
                            </div>
                            <div class="col-md-3 mb-3 mt-auto mb-auto">
                            <img width="100" height="100" src="<?php echo BASE_URL?>images/logo/<?php if ( isset($user['logo'])){ echo  $user['logo']; }?>" >
                            </div>
                        </div>
                    <!-- LOGO UPLOAD END? ------------------------------------------------------------>
                    </div>
                </div>    
            </div>

          <div class="row container ml-auto mr-auto">
                <div class="col-xl-5 container z-depth-1 p-3 mb-5">
                        <div class="md-form mb-3">
                            <input type="text" value="<?php if ( isset($user['businessname'])){ echo  $user['businessname']; }?>" class="form-control" name="zip">
                            <label>Business Name:</label>
                        </div>
                
                    <div class="row">
                        <div class="md-form mb-3 col-6">
                            <input type="text" class="form-control" value="<?php if ( isset($user['firstName'])){ echo  $user['firstName']; }?>"  name="firstName">
                            <label class="ml-3">First Name:</label>
                        </div>

                        <div class="md-form mb-3 col-6">
                            <input type="text" class="form-control" value="<?php if ( isset($user['lastName'])){ echo  $user['lastName']; }?>"  name="lastName">
                            <label class="ml-3">Last Name:</label>
                        </div>
                    </div>

                    <div class="row">
                            <div class="md-form mb-3 col-6">
                                <input type="text" class="form-control" placeholder="(323)555-5555" value="<?php if ( isset($user['phone'])){ echo  $user['phone']; }?>"  name="phone" onkeydown="javascript:backspacerDOWN(this,event);"
                                onkeyup="javascript:backspacerUP(this,event);">
                                <label class="ml-3">Phone:</label>
                            </div>
                            <div class="md-form mb-3 col-6">
                                <input type="email" class="form-control" value="<?php if ( isset($user['email'])){ echo  $user['email']; }?>"   name="email">
                                <label class="ml-3">Email Address:</label>
                            </div>
                        </div>
                    </div>
                <!-- CONTAINER ADDRESS START -->
                <div class="col-xl-5 container z-depth-1 p-3 mb-5">
                    <div class="md-form mb-4 ">
                        <input type="text" value="<?php if ( isset($user['address'])){ echo  $user['address']; }?>"   class="form-control" name="address">
                        <label class="ml-3">Address:</label>
                    </div>
                    <div class="md-form mb-3 ">
                        <input type="text" value="<?php if ( isset($user['address2'])){ echo  $user['address2']; }?>"   class="form-control" name="address2">
                        <label class="ml-3">Address2:</label>
                    </div>
                    
                <div class="row">
                    <div class="md-form mb-3 col-5">
                        <input type="text" value="<?php if ( isset($user['city'])){ echo  $user['city']; }?>"   class="form-control" name="city">
                        <label class="ml-3">City:</label>
                    </div>
                    <div class="md-form mb-3 col-3">
                        <input type="text" value="<?php if ( isset($user['state'])){ echo  $user['state']; }?>"   class="form-control" name="state">
                        <label class="ml-3">State:</label>
                    </div>
                    <div class="md-form mb-3 col-4">
                        <input type="text" value="<?php if ( isset($user['zip'])){ echo  $user['zip']; }?>"   class="form-control" name="zip">
                        <label class="ml-3">Zip Code:</label>
                    </div>
                </div>
                </div>
                <!-- CONTAINER ADDRESS END -->

            </div>
                <div class="container mb-5">
                    <div class="md-form mb-3">
                        <input type="password" value=""   class="form-control" name="password">
                        <label>Password:</label>
                    </div>
               
            
                    <div class="md-form mb-3">
                        <textarea name="bio" class="form-control md-textarea"><?php echo $user['bio'] ; ?></textarea>
                        <label>Bio Description:</label>
                    </div>
              

            
                    <div class="md-form">
                        <textarea name="headliner" class="form-control md-textarea"><?php echo $user['headliner'] ; ?></textarea>
                        <label>Headliner:</label>
                    </div>
              
            
                    <label class="mt-3" style="font-size: 16px;">Services: <span class="blue-grey-text" style="font-size: 12px;">(Choose the services your auto shop provides)</span></label>
                    <div class="form-group col mr-0 ml-0">
                        <?php 
                            $servicesquery = "select * from services";
                            $service = $db->rawQuery($servicesquery);
                            $services = explode(',',$user['services']) ; ?>
                        <select class="js-example-basic-multiple form-control" name="services[]" multiple="multiple">
                            <?php foreach($service as $ser){ ?>
                              <option value="<?php echo $ser['service_name'] ; ?>" <?php if(array_search($ser['service_name'],$services)){ echo 'selected' ; } ?>><?php echo $ser['service_name'] ; ?></option>
                              <?php } ?>  
                        </select>
                        
                    </div>
               
                    </div>
        
            <div class="row ml-auto mr-auto mb-5">
                <div class=""><label>&nbsp;</label></div>
                <div class=" ml-auto mr-auto mb-5">
                        <button type="submit" name="submit"  value="save" class="saveChangesBtn" style="width: 150px;">Save Changes</button>
                </div>
            </div>
        </form>
    
    
</div>
<!-- Footer -->
<footer class="page-footer font-small fixed-bottom mt-5" style="overflow: hidden; margin-top: 200px;">
<!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: #324A5F;">© 2020 Copyright:
        <a href="www.estimakr.com"> Estimakr</a>
    </div>
<!-- Copyright -->
</footer>
      <!-- Footer -->
<!-- <div class="row justify-content-center">
    <input type="submit" name="submit" class="btn btn-success">
    </div> -->
</div>
</div>
</body>
</html>
</div>

<!-- TAX CALCULATION FUNCTION START -->
<!-- FORMS TO BE SWITCHED ON RADIO CLICK START ------------------------------------->
<script type="text/javascript">
      function calu()
    {
       

        var laborType = parseFloat(document.getElementById("laborType").value);
        var price = parseFloat(document.getElementById("price").value);
        var taxRate = parseFloat(document.getElementById("taxRate").value);
        var taxRate = taxRate/100;
        var cost1 = parseFloat(document.getElementById("cost1").value);
        var sub_total = document.getElementById("sub_total").value;
        var checkBoxtax = document.getElementById("tax");
        var x = document.getElementById( "laborType").selectedIndex; 
 

            //   <!-- TAX RATE NOT MULTIPLY % CORRECTLY -->
             if (checkBoxtax.checked == true && x == 5 && cost1 >= 1 ) {
              document.getElementById("tax_total").value = cost1 * taxRate; 
        
            }
             else if (checkBoxtax.checked == true  && price >= 1 ) {
              document.getElementById("tax_total").value = (price * taxRate); 
        
            }
             
        else
        {
            document.getElementById("tax_total").value = 0;
        }
    }

// PHONE NUMBER FORMAT STYLING JS START -->
var zChar = new Array(' ', '(', ')', '-', '.');
var maxphonelength = 13;
var phonevalue1;
var phonevalue2;
var cursorposition;

function ParseForNumber1(object) {
    phonevalue1 = ParseChar(object.value, zChar);
}

function ParseForNumber2(object) {
    phonevalue2 = ParseChar(object.value, zChar);
}

function backspacerUP(object, e) {
    if (e) {
        e = e
    } else {
        e = window.event
    }
    if (e.which) {
        var keycode = e.which
    } else {
        var keycode = e.keyCode
    }

    ParseForNumber1(object)

    if (keycode >= 48) {
        ValidatePhone(object)
    }
}

function backspacerDOWN(object, e) {
    if (e) {
        e = e
    } else {
        e = window.event
    }
    if (e.which) {
        var keycode = e.which
    } else {
        var keycode = e.keyCode
    }
    ParseForNumber2(object)
}

function GetCursorPosition() {

    var t1 = phonevalue1;
    var t2 = phonevalue2;
    var bool = false
    for (i = 0; i < t1.length; i++) {
        if (t1.substring(i, 1) != t2.substring(i, 1)) {
            if (!bool) {
                cursorposition = i
                bool = true
            }
        }
    }
}

function ValidatePhone(object) {

    var p = phonevalue1

    p = p.replace(/[^\d]*/gi, "")

    if (p.length < 3) {
        object.value = p
    } else if (p.length == 3) {
        pp = p;
        d4 = p.indexOf('(')
        d5 = p.indexOf(')')
        if (d4 == -1) {
            pp = "(" + pp;
        }
        if (d5 == -1) {
            pp = pp + ")";
        }
        object.value = pp;
    } else if (p.length > 3 && p.length < 7) {
        p = "(" + p;
        l30 = p.length;
        p30 = p.substring(0, 4);
        p30 = p30 + ")"

        p31 = p.substring(4, l30);
        pp = p30 + p31;

        object.value = pp;

    } else if (p.length >= 7) {
        p = "(" + p;
        l30 = p.length;
        p30 = p.substring(0, 4);
        p30 = p30 + ")"

        p31 = p.substring(4, l30);
        pp = p30 + p31;

        l40 = pp.length;
        p40 = pp.substring(0, 8);
        p40 = p40 + "-"

        p41 = pp.substring(8, l40);
        ppp = p40 + p41;

        object.value = ppp.substring(0, maxphonelength);
    }

    GetCursorPosition()

    if (cursorposition >= 0) {
        if (cursorposition == 0) {
            cursorposition = 2
        } else if (cursorposition <= 2) {
            cursorposition = cursorposition + 1
        } else if (cursorposition <= 5) {
            cursorposition = cursorposition + 2
        } else if (cursorposition == 6) {
            cursorposition = cursorposition + 2
        } else if (cursorposition == 7) {
            cursorposition = cursorposition + 4
            e1 = object.value.indexOf(')')
            e2 = object.value.indexOf('-')
            if (e1 > -1 && e2 > -1) {
                if (e2 - e1 == 4) {
                    cursorposition = cursorposition - 1
                }
            }
        } else if (cursorposition < 11) {
            cursorposition = cursorposition + 3
        } else if (cursorposition == 11) {
            cursorposition = cursorposition + 1
        } else if (cursorposition >= 12) {
            cursorposition = cursorposition
        }

        var txtRange = object.createTextRange();
        txtRange.moveStart("character", cursorposition);
        txtRange.moveEnd("character", cursorposition - object.value.length);
        txtRange.select();
    }

}

function ParseChar(sStr, sChar) {
    if (sChar.length == null) {
        zChar = new Array(sChar);
    } else zChar = sChar;

    for (i = 0; i < zChar.length; i++) {
        sNewStr = "";

        var iStart = 0;
        var iEnd = sStr.indexOf(sChar[i]);

        while (iEnd != -1) {
            sNewStr += sStr.substring(iStart, iEnd);
            iStart = iEnd + 1;
            iEnd = sStr.indexOf(sChar[i], iStart);
        }
        sNewStr += sStr.substring(sStr.lastIndexOf(sChar[i]) + 1, sStr.length);

        sStr = sNewStr;
    }

    return sNewStr;
}
var clipboard = new Clipboard('.btn');

clipboard.on('success', function(e) {
    console.log(e);
});

clipboard.on('error', function(e) {
    console.log(e);
});
   
</script>
<!-- TAX CALCULATION FUNCTION END -->
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

</body>
</html>
