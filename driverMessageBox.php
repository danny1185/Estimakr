<?php
    session_start();
    include('database_connection/connection.php');
    include('includes/variables.php');
    if(!isset($_SESSION['email'])){
        header("Location:signIn.php");
       }  
       
       
        $user_id = $_SESSION['user_id'];
        $roleid = $_SESSION['role_id'];

        // getting conversations for customers
        if ($roleid == "1") {
            $result = $db->query("
                SELECT
                    conversations.*,
                    c.firstName AS customer_name,
                    c.logo AS customer_profile_pic
                FROM conversations
                LEFT JOIN `register` c ON conversations.shop_id = `c`.id
                WHERE conversations.customer_id = ".$user_id." ORDER BY `lastmessage_datetime` DESC 
                ");
        }
        // getting conversations for saloon owners
        else {

            $result = $db->query("
                SELECT
                    conversations.*,
                    c.firstName AS customer_name,
                    c.logo AS customer_profile_pic
                FROM conversations
                LEFT JOIN `register` c ON conversations.customer_id = `c`.id
                WHERE conversations.shop_id = ".$user_id." ORDER BY `lastmessage_datetime` DESC
                ");
        } 
        
      
?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google" content="notranslate">
<!-- Bootstrap CSS -->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
<title>Car Details</title>
<link rel="stylesheet" href="css/driverMessageBox.css">
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
<nav class="navbar" style="background-color: #324a5f; color: white; height: 55px; font-size: 18px; font-family: playfair;">
<ul class="navbar-nav">
  <li class="nav-item ml-5">Messages</li>
</ul>
</nav>
<!-- PAGE HEADER END -->



<!-- MAIN BODY CONTAINER START -->
<div class="container-fluid row mb-5 ml-auto mr-auto ">
 
  <!-- SIDE USER SELECT MAIN CONTAINER -->
  <div class="container-fluid col-xl-4 col-lg-4 col-md-12 col-12 ml-auto mr-auto pl-0 pr-0" id="userSelectMainContainer">
    <ul class="col-12">

      <!-- USER SELECT INDIVIDUAL CONTAINER -->
        <?php foreach($result as $row){ ?>
        <li class="row col-12 chat_list <?php if($row['id'] == $_GET['chat_id']){ echo 'active_chat';} ?>" data-ids="<?php echo $row['id']; ?>" data-customer="<?php echo $row['customer_id'] ; ?>" data-shop="<?php echo $row['shop_id'] ; ?>"  id="userSelectIndividualContainer">
            <?php 
                if($row['customer_profile_pic'] == '')
                {
                    echo '<i class="fa fa-user-circle fa-3x" id="userSelectAvatar"></i>';
                }else
                {
                    echo '<img src="'.BASE_URL.'images/logo/'.$row['customer_profile_pic'].'" class="profilelogo">' ; 
                }
            ?>    
          
        <div  id="userSelectShopInfo">
          <span class="title" id="userSelectShopName"><?php echo $row['customer_name'] ; ?></span>
          <div class="row" id="userSelectSecondLine">
          <a href="<?php if($roleid == 1){ echo 'shopProfile.php?userid='.$row['shop_id'] ; }else{ echo 'shopProfile.php?userid='.$row['customer_id'] ; }?>" class="nav-item" id="userSelectProfileBtn"><p>View Profile</p></a>
          <p id="userSelectDate"><span class="text-success" id="userSelectLastMessage">Last Message:</span> <?php echo date('m/d/Y',strtotime($row['lastmessage_datetime'])) ; ?></p>
        </div>
        </div>
      </li>
        <?php } ?>
      <!-- USER SELECT INDIVIDUAL CONTAINER -->

      <!-- USER SELECT INDIVIDUAL CONTAINER -->
      
    </ul>
  </div>

  

  <div class="container-fluid col-xl-8 col-lg-8 col-md-12 col-sm-12 pl-0 pr-0">
<!-- Section: Block Content -->
<section>
  <div class="card">
    <!-- CHAT BOX SHOP MENU START -->
    <nav class="navbar z-depth-0 " >
          <ul class="navbar-nav col-12" id="chatBoxUserMenu">
          <li class="row" >
              <i class="fa fa-user-circle fa-2x" id="chatBoxShopAvatar"></i>
            
              <h1 id="chatBoxUserMenuShopName">Top Gun Paint & Body</h1>
             

              <a href="shopProfile.php" id="chatBoxUserMenuProfileBtn" >View Profile</a>

<!-- ESTIMATE SUBMIT MODEL START ------------------------------------------------------------------ -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" id="mostRecentEstBtn" data-toggle="modal" data-target="#basicExampleModal">
  <i class="fas fa-clipboard mr-2"></i>Most Recent Estimate
</button>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="mostRecentEstimateModalHeader"
  aria-hidden="true">
  <div class="modal-dialog modal-fluid container" role="document">
    <div class="modal-content">
      <div class="modal-header" id="mostRecentEstimateModalHeader">
        <h5 class="modal-title" >Top Gun Paint & Body</h5>
        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <button type="button" class="btn btn-outline-success btn-sm col-11 ml-auto mr-auto" data-dismiss="modal" >Accept Supplement</button>

      <div class="modal-footer row col-12 ml-auto mr-auto ">
      
          <a class="mr-xl-auto ml-xl-3 mr-lg-auto ml-lg-3 mr-md-auto ml-md-0 mr-sm-auto ml-sm-0 mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/24/2019 <span class="blue-grey-text">1:47pm</span></span></p></a>
          <a class="mr-xl-3 ml-xl-3 mr-lg-3 ml-lg-3 mr-md-0 ml-md-0 mr-sm-0 ml-sm-0 mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/25/2019 <span class="blue-grey-text">12:23pm</span></span></p></a>
          <a class="mr-xl-3 ml-xl-auto mr-lg-3 ml-lg-auto mr-md-1 ml-md-auto mr-sm-1 ml-sm-auto mr-auto ml-0" href="#" ><p id="modalEstimateHistoryBtn">Estimate <span class="mt-auto mb-auto" style="font-size: 13px; color: #324a5f;">12/27/2019 <span class="blue-grey-text">2:20pm</span></span></p></a>
     
     </div>
    </div>
  </div>
</div>

<!-- ESTIMATE SUBMIT MODEL END ------------------------------------------------------------------ -->                
          </li>
          </ul>
        </nav>
     <!-- CHAT BOX SHOP MENU END -->
    <div class="card-body my-custom-scrollbar msg_history">
      
    </div>
    <h5 class="mb-0 container-fluid pl-3 z-depth-2" id="chatBoxAutoBodyHeader">Send Message</h5>
  <form class="messageform">
    <div class="card-footer white py-3">
      <div class="form-group mb-0">
        <textarea class="form-control rounded-0 write_msg" id="exampleFormControlTextarea1" name="message" rows="1" placeholder="Type message..."></textarea>
        <input type="hidden" class="customer_id" value="" name="customer_id"></input>
          <input type="hidden" class="shop_id" value="" name="shop_id"></input>
          <input type="hidden" name="sender_roleid" value="<?php $_SESSION['role_id'] ; ?>">
        <div class="text-right pt-2">
          <button type="button" class="btn btn-primary btn-sm mb-0 mr-0 btn-send">Send</button>
        </div>
      </div>
    </div>
    </form>
  </div>

</section>
<!-- Section: Block Content -->

</div>
 
  

  
</div>








<!-- Footer -->
<footer class="page-footer font-small fixed-bottom" style="overflow: hidden;">
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

<script>/*var myCustomScrollbar = document.querySelector('.my-custom-scrollbar');
var ps = new PerfectScrollbar(myCustomScrollbar);

var scrollbarY = myCustomScrollbar.querySelector('.ps.ps--active-y>.ps__scrollbar-y-rail');

myCustomScrollbar.onscroll = function() {
  scrollbarY.style.cssText = `top: ${this.scrollTop}px!important; height: 250px; right: ${-this.scrollLeft}px`;
}
*/
</script>
<script type="text/javascript">
    $('.btn-send').click(function(e){
      	
	    var formData = $('.messageform').serialize(); 
	    
        if($('.write_msg').val() != '')
        {
	        var request = $.ajax({
	        type: 'POST',
	        url: '<?php echo BASE_URL ; ?>controllers/newChat.php',
	        dataType:'json',
	        data: formData,
	        success: function(data){                            
	            if(data.success)
	            {
					$(".messageform")[0].reset();
		            
					
				}else
				{
					alert('Message Not Sent');
				}
	        },
	        error: function(msg){
	            alert(JSON.stringify(msg,null,4));
	        }
	    });
        }
      })
    
    
    $('.chat_list').click(function(){
      	$('.chat_list').removeClass('active_chat');
      	$(this).addClass('active_chat');
      	get_chats_messages();
      })

    function get_chats_messages()
     {
     
     	var chat_id = $('.active_chat').attr('data-ids');
     	var customer_id = $('.active_chat').attr('data-customer');
     	var shop_id = $('.active_chat').attr('data-shop');
     	$('.customer_id').val(customer_id);
     	$('.shop_id').val(shop_id);
        $.post("<?php echo BASE_URL ; ?>controllers/GetMessages.php", { chat_id: chat_id,customer_id:customer_id,shop_id:shop_id }, function(data) {

            /* Condition */
            if (data.status == 'ok') {
                //console.log(data.content);
                var current_content = $("div.msg_history").html();
                

                $("div.msg_history").html(data.content);
                
                if (!data.content == '') {
                    var notification = new Notification('Notification title', {
                      icon: '',
                      body: "Ada pesan masuk, silahkan cek!!",
                    });

                    notification.onclick = function () {
                      window.open("http://stackoverflow.com/a/13328397/1269037");      
                    };

                    /* Scroll each time you get new message */
                    $('div.msg_history').scrollTop($('div.msg_history')[0].scrollHeight);
                } else {
                    
                }
                

            } else {
                /* Error here */
            }

        }, "json");

        return false;
    }
      setInterval(function() {
        get_new_messages();
    }, 2500);
    function get_new_messages()
     {
     
     	var chat_id = $('.active_chat').attr('data-ids');
     	var newmessage = 1;
        $.post("<?php echo BASE_URL ; ?>controllers/GetNewMessage.php", { chat_id: chat_id,newmessage:newmessage}, function(data) {

            /* Condition */
            if (data.status == 'ok') {
                //console.log(data.content);
                var current_content = $("div.msg_history").html();
                

                $("div.msg_history").append(data.content);
                
                if (!data.content == '') {
                    var notification = new Notification('Notification title', {
                      icon: '',
                      body: "Ada pesan masuk, silahkan cek!!",
                    });

                    notification.onclick = function () {
                      window.open("http://stackoverflow.com/a/13328397/1269037");      
                    };

                    /* Scroll each time you get new message */
                    $('div.msg_history').scrollTop($('div.msg_history')[0].scrollHeight);
                } else {
                    
                }
                

            } else {
                /* Error here */
            }

        }, "json");

        return false;
    }

    get_chats_messages();
</script>

</body>
</html>
</div>
</body>
</html>