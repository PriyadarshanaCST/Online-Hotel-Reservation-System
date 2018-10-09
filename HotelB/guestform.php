<?php
session_start();
	include './auth.php';
	if(!isset($_SESSION['room_id'])){
						
						$_SESSION['room_id'] = array();
						
						$_SESSION['roomname'] = array();
						
						$_SESSION['roomqty'] = array();
						$_SESSION['ind_rate'] = array();
						$_SESSION['total_amount'] = 0;
						$_SESSION['deposit'] = 0;
						}
	
				$result = mysqli_query($con,"select * from room");
					if(mysqli_num_rows($result) > 0){
	
				
						$count = 0;
						
						while($row = mysqli_fetch_array($result)){
						
							if (isset($_POST["qtyroom".$row['room_id'].""])   && !empty($_POST["qtyroom".$row['room_id'].""]) )
							{
								$_SESSION['room_id'][$count] = $_POST["selectedroom".$row['room_id'].""];
								$_SESSION['roomqty'][$count] = $_POST["qtyroom".$row['room_id'].""];
								$_SESSION['roomname'][$count] = $_POST["room_name".$row['room_id'].""];
								
								$_SESSION['ind_rate'][$count] = $row['rate']  * $_POST["qtyroom".$row['room_id'].""];
								$_SESSION['total_amount'] =  ( $row['rate']  * $_POST["qtyroom".$row['room_id'].""] * $_SESSION['total_night'] ) + $_SESSION['total_amount'] ;
								$_SESSION['deposit'] = $_SESSION['total_amount'] * 0.15;
								$count = $count + 1;
							}
						}
											
				
					}

	


?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>

<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>


<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
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
<body class="fontbody">
<div class="row foo" style="margin:30px auto 30px auto;">
<div class="large-12 columns">
		<div class="large-3 columns centerdiv">
			<a href="sessiondestroy.php" class="button round blackblur fontslabo" >1</a>
			<p class="fontgrey">Please select Date</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="unsetroomchosen.php" class="button round blackblur fontslabo" >2</a>
			<p class="fontgrey">Select Room</p>
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
				<form name="guestdetails" action="unsetroomchosen.php" method="post" >
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check In
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkin_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Check Out
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['checkout_date'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Adults
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['adults'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall">Childrens
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['childrens'];?>
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-5 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Night Stay(s)
								</span>
							</div>
							
							<div class="large-5 columns" style="max-width:100%;">
								<span class="">: <?php echo $_SESSION['total_night'];?>
								</span>				
							
							</div>
						</div>
						<div class="row"><hr>
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgreysmall" >Room Selected
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="fontgreysmall">Qty
								</span>				
							
							</div>
						</div>
						<div class="row">
							<div class="large-6 columns" style="max-width:100%;">
								<span class="" ><?php 
								
													foreach ($_SESSION['roomname'] as &$value0 ) {
													echo $value0;
													print "<br>";
													} ;

												?>
												
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="">
								<?php foreach ($_SESSION['roomqty'] as &$value1 ) {
													echo $value1;
													print "<br>";
													} ;
												
												?>
								</span>				
							
							</div>
						</div>
						
					</div>	
				</div><br>
				<div class="row">					
						<div class="large-12 columns" style="max-width:100%;">
							<p class="fontgrey borderstyle" style="text-align:center; color:#FFFFFF">15% Deposit Due Now<br>
							<span class="fontslabo " style="font-size:32px; text-align:center;color:#91B1C5">LKR <?php echo $_SESSION['deposit'];?></span>
							<br><span class="fontgrey" style="text-align:center; color:#FFFFFF"">Total</span><br>
							<span class="fontslabo" style="font-size:32px; text-align:center; color:#91B1C5">LKR <?php echo $_SESSION['total_amount'];?></span></p>
							
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
		<form action="insertandemail.php" method="post"  onSubmit="return validateForm(this);">
		  <div class="row">

			<div class="large-6 columns">
			  <label class="fontcolor">First Name*
				<input name="firstname" type="text" value="" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Last Name*
				<input name="lastname" type="text" value="" pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="" required/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Email Address*
				<input name="email" type="email" value="" placeholder="" required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="" style="color:white">Telephone Number*
				<input name="phone" type="text" id="phone" value="" pattern= "[^a-zA-Z]+" Title="Only numbers are allowed"  placeholder="" size="35" required/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 1*
				<input name="addressline1" type="text" value=""   placeholder="" required/>
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">Address Line 2
				<input name="addressline2" type="text" value=""  placeholder="" required/>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-6 columns">
			  <label class="fontcolor">Zip/Postcode*
				<input name="postcode" type="text"  value="" pattern= "[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed><;"  placeholder="" required />
			  </label>
			</div>
			<div class="large-6 columns">
			  <label class="fontcolor">City*
				<input name="city" type="text"  value="" pattern= "[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed"  placeholder=""required/>
			  </label>
			</div>
		  </div>
	
			
		  <div class="row">
			<div class="large-12 columns">
			  <label class="fontcolor">Special Requirements
				<textarea name="specialrequirements" placeholder=""></textarea>
			  </label>
			</div>
		  </div>
		  <div class="row">
			<div class="large-12 columns" style="text-align:right;"><button type="submit" class="button small fontslabo" style="background-color:#2ecc71;" onclick="return confirm('Are you sure you want to continue?')" >Confirm</button>
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