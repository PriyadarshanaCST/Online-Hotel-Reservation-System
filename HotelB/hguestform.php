<?php
session_start();
	include './auth.php';
	$hall_id=$_GET['hall_id'];
	$date=$_GET['date'];
	
	$queary="SELECT *  FROM `hall` WHERE `hall_id` = '".$hall_id."' ORDER BY `description` ASC";
	$result=mysqli_query($con,$queary);
	$row=mysqli_fetch_assoc($result);
	$hall_name=$row['hall_name'];
	$rate=$row['rate'];
	
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
<head>
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>


<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>

<!--<link rel="stylesheet" href="assest/bootstrap.min.css">-->
    <link rel="stylesheet" href="assest/w3.css">
    
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>




<script src="assest\jquery-3.2.1.js"></script>
  <script src="assest/bootstrap.min.js"></script>
<script src="assest\vendor\jquery\jquery.min.js"></script>

<style>
span{ color:#91B1C5
	
	}
label{
	color:#FFFFFF}
p{ color:#FFFFFF
	}
	h4{ color:#91B1C5
	}


</style>

  </head>
<body>
<!--<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Araliya Hotel</a >
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
         
     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Book Now<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="rooms.php">Rooms</a></li>
           <li><a href="hall.php">Reciption Halls</a></li>
         
         </ul>
      </li>
      
      <li><a href="galery.php">Gallery</a></li>
  
      </li>
	
   
<li><a href="contactus.php">Contact Us</a></li>

    </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Admin</a></li>
            </ul></div>
</nav>-->
<div class="row foo" style="margin:30px auto 30px auto;">
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
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;">3</a>
			<p class="fontgrey">Guest Details</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur fontslabo" >4</a>
			<p class="fontgrey">Reservation Complete</p>
		</div>
</div>

</div>
</div>
 
<div class="row">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Your Reservation</b></p><hr class="line">
				<form name="guestdetails" action="hreservationcomplete.php" method="post" >
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check In
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">:  <?php echo $date?>
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
								<span class="" ><?php echo $hall_name?>
												
								</span>
							</div>
							
					
						</div>
						
					</div>	
				</div><br>
				<div class="row">					
						<div class="large-12 columns" style="max-width:100%;">
							<p class="fontgrey borderstyle" style="text-align:center;color:#FFFFFF">15% Deposit Due Now <br>
							<span class="fontslabo " style="font-size:32px; text-align:center;color:#91B1C5">LKR <?php echo ($rate*0.15);?></span>
							<br><span class="fontgrey" style="text-align:center;color:#FFFFFF">Total</span><br>
							<span class="fontslabo" style="font-size:32px; text-align:center;color:#91B1C5">LKR <?php echo $rate?> </span></p>
							
						</div>
						
						<div class="large-12 columns" style="max-width:100%;">
							
							
						</div>
				</div>
						

				
				  <div class="row">
					<div class="large-12 columns" >
						<button name="submit" href="#" class="button small fontslabo" style="background-color:#2ecc71; width:100%;">Edit Reservation</button>
					</div>
				  </div>
				</form>
		</div>
	


	</div>

	<div class="large-8 columns blackblur fontcolor" style="padding-top:10px;">
		<p><b>Guest Details</b><hr class="line"></p>
		<form action="hreservationcomplete.php" method="post"  onSubmit="return validateForm(this);">
		  <div class="row">
			<input type="hidden" name="date" value="<?php echo $date?>">
            <input type="hidden" name="hallname" value="<?php echo $hall_name?>">
            <input type="hidden" name="rate" value="<?php echo $rate?>">
             <input type="hidden" name="hall_id" value="<?php echo $hall_id?>">
			<div class="large-6 columns">
			  <label class="fontcolor">First Name*
				<input name="firstname" type="text" value="" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Last Name*
				<input name="lastname" type="text" value="" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" required class="w3-input"/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Email Address*
				<input name="email" type="email" value="" placeholder="" / required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Telephone Number*
				<input name="phone" type="text" id="phone" value="" pattern= "[^a-zA-Z]+" Title="Only numbers are allowed"  placeholder=""  size="35" required/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 1*
				<input name="addressline1" type="text" value=""   placeholder=""/ required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 2
				<input name="addressline2" type="text" value=""  placeholder=""/ required />
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Zip/Postcode*
				<input name="postcode" type="text"  value="" pattern= "[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed><;"  placeholder=""/ required/>
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">City*
				<input name="city" type="text"  value="" pattern= "[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed"  placeholder=""/ required />
			  </label>
			</div>
		  </div>
		
		
		  <div class="row">
			<div class="large-12 columns" style="text-align:right;"><button type="submit" class="button small fontslabo" style="background-color:#2ecc71;" onclick="return confirm('Are you sure you want to continue?')" name="submit">Confirm</button>
		  </div>

		  </div>
		</form>

	</div>

</div>
  

<script>
	function validateForm(form) {
		var fname = form.firstname.value;
		var lname = form.lastname.value;
		var email = form.email.value;
		var phone = form.phone.value;
		var add1 = form.addressline1.value;
		var postcode = form.postcode.value;
		var city = form.city.value;
		
			if(fname == null || lname == null || email == null || phone == null || add1 == null || postcode == null|| city == null|| state == null || country == null || fname == "" || lname == "" || email == "" || phone == "" || add1 == "" || postcode == "" || city == "") 
			{
			 alert("Please fill in all the fields mark with *.");

			 return false;
			}
			
	}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</body></html>