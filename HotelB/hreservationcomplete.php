<?php
session_start();
include './auth.php';

	$date=$_POST['date'];
	$hallname=$_POST['hallname'];
	$rate=$_POST['rate'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$addressline1=$_POST['addressline1'];
	$addressline2=$_POST['addressline2'];
	$postcode=$_POST['postcode'];
	$city=$_POST['city'];
	$hall_id=$_POST['hall_id'];
	$deposit=$rate*0.15;
	
	$queary="INSERT INTO `hib`.`hallbooking` (`booking_id`, `hall_id`, `checkin_date`, `payment_status`, `total_amount`, `deposit`, `booking_date`, `first_name`, `last_name`, `email`, `telephone`, `addline1`, `addline2`, `city`,  `postcode`) VALUES (NULL, '".$hall_id."', '".$date."', 'pending', '".$rate."', '".$deposit."', CURRENT_TIMESTAMP, '".$firstname."', '".$lastname."', '".$email."', '".$phone."', '".$addressline1."', '".$addressline2."', '".$city."', '".$postcode."');";
	if(mysqli_query($con,$queary)){
		
		echo 'Ok';
		
		}
	
	

?>
<!DOCTYPE html>
<meta charset="utf-8">

<title>Reservation</title>

<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
  <link rel="stylesheet" href="assest/bootstrap.min.css">
    <link rel="stylesheet" href="assest/w3.css">
    
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="icon/css/fontello.css">
<link rel="stylesheet" href="icon/css/animation.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="jquery.backstretch.min.js"></script>

<script src="assest\jquery-3.2.1.js"></script>
  <script src="assest/bootstrap.min.js"></script>
<script src="assest\vendor\jquery\jquery.min.js"></script>

<style>
span{
	color:#91B1C5
	}
p{color:#FFFFFF;
	
	}
</style>

<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
</head>

<body class="fontbody" >
<nav class="navbar navbar-inverse navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Araliya Hotel</a >
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
         
      <li><a href="roomdetails.php">Book Now</a></li>
      
      <li><a href="galery.php">Gallery</a></li>
  
      </li>
	
   
<li><a href="contactus.php">Contact Us</a></li>

    </ul>
  </div>
</nav>
  </div>
</nav>

 
    </header>

<div class="row foo" style="margin:60px auto 30px auto;" >
<div class="large-12 columns">
		<div class="large-3 columns centerdiv">
			<a href="sessiondestroy.php" class="button round blackblur fontslabo" >1</a>
			<p class="fontgrey">Please select Date</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="unsetroomchosen.php" class="button round blackblur fontslabo" >2</a>
			<p class="fontgrey">Select Hall</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="guestform.php" class="button round  blackblur fontslabo" >3</a>
			<p class="fontgrey">Guest Details</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;">4</a>
			<p class="fontgrey">Reservation Complete</p>
		</div>
</div>

</div>
</div>
 
 <div class="row medium-offset-2">
<div class="row">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Your Reservation</b></p><hr class="line">
				<form name="guestdetails" action="unsetroomchosen.php" method="post" >
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check In
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $date;?>
								</span>				
							
							</div>
						</div>
					
				
						
					
						<div class="row"><hr>
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Hall Selected
								</span>
							</div>
							
							
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="" ><?php 
								echo $hallname
													

												?>
												
								</span>
							</div>
							
						
						</div>
						
					</div>	
				</div><br>
				<div class="row">					
						<div class="large-12 columns" style="max-width:100%;">
							<p class="fontgrey borderstyle" style="text-align:center;color:#FFFFFF">15% Deposit Due Now<br>
							<span class="fontslabo " style="font-size:32px; text-align:center;">LKR <?php echo $deposit;?></span>
							<br><span class="fontgrey" style="text-align:center;color:#FFFFFF">Total</span><br>
							<span class="fontslabo" style="font-size:32px; text-align:center;color:#91B1C5">LKR <?php echo $rate;?></span></p>
							
						</div>
						
						<div class="large-12 columns" style="max-width:100%;">
							
							
						</div>
				</div>
						

				
				  <div class="row">
					<div class="large-12 columns" >
						<button name="submit" href="checkhall.php" class="button small fontslabo" style="background-color:#2ecc71; width:100%;">Edit Reservation</button>
					</div>
				  </div>
				</form>
		</div>
	


	</div>
	<div class="large-8 columns blackblur fontcolor" style="padding:10px">
	
		<div class="large-12 columns" >
		<p><b>Reservation Complete</b></p><hr class="line">
		<p>Details of your reservation have just been sent to you
		in a confirmation email. Please check your spam folder if you didn't received any email. We look forward to see you soon. In the
		meantime, if you have any questions, feel free to contact us.</p>
		<p>
		<i class="icon-fax" style="font-size:24px"></i> <span class="i-name fontgrey">Address</span><span class="i-code"> &emsp;&emsp;No 55,Passra Road,Badulla</span><br>
        <i class="icon-phone" style="font-size:24px"></i> <span class="i-name fontgrey">Phone</span><span class="i-code">&emsp; 055-2247255</span><br>
        
        <i class="icon-mail-alt"style="font-size:24px"> </i> <span class="i-name fontgrey">Email</span><span class="i-code">&emsp; araliyahotelb@gmail.com</span>
		</p><hr>
<div class="row">
			<div class="large-12 columns" >
		
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="3FWZ42DLC5BJ2">
					<input type="hidden" name="lc" value="MY">
					<input type="hidden" name="item_name" value="15% Hotel Deposit Payment for Booking ID #<?echo $_SESSION['booking_id'];?>">
					<input type="hidden" name="amount" value="<?php $deposit; print $amount; ?>">
					<input type="hidden" name="currency_code" value="LKR">
					<input type="hidden" name="button_subtype" value="services">
					<input type="hidden" name="no_note" value="0">
					<input type="hidden" name="custom" value="<? echo $booking_id;?>">1
					<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
					<img type="image" src="img/paypal.jpg" style="background-color:white; width:32%; height:14%; padding:2px; " ></img>
					<br><button class="button small " border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:32%;background-color:#2ecc71; ">Pay Room Deposit Now</button>
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>


			</div>
		</div>
		</div>
	


	</div>


</div>
</div>

<script>
</script>
</body></html>