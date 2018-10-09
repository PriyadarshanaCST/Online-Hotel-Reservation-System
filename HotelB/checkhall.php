<?php
session_start();
if(isset($_POST["CheckDate"])){
	$date=$_POST['CheckDate'];
	//echo $date;
}

include './auth.php';


?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>
<head>
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link rel="stylesheet" href="assest/bootstrap.min.css">
    <link rel="stylesheet" href="assest/w3.css">
    
<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
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


<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>


</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
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
</nav>

 
   


<div class="row foo" style="margin:60px auto 30px auto;">
<div class="large-12 columns">
		<div class="large-3 columns centerdiv">
			<a href="sessiondestroy.php" class="button round blackblur fontslabo" >1</a>
			<p class="fontgrey">Please select Date</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round fontslabo" style="background-color:#2ecc71;">2</a>
			<p class="fontgrey">Select Hall</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur fontslabo" >3</a>
			<p class="fontgrey">Guest Details</p>
		</div>
		<div class="large-3 columns centerdiv">
			<a href="#" class="button round blackblur fontslabo" >4</a>
			<p class="fontgrey">Reservation Complete</p>
		</div>
</div>

</div>
</div>
 
<div class="row medium-offset-2">
	<div class="large-4 columns blackblur fontcolor" style="margin-left:-10px; padding:10px;">
	
		<div class="large-12 columns " >
		<p><b>Choose Your Reservation</b></p><hr class="line">
				
				<div class="row">
					<div class="large-12 columns">
						<div class="row">
						
							<div class="large-6 columns" style="max-width:100%;">
								<span class="fontgrey">Check In
								</span>
							</div>
							
							<div class="large-4 columns" style="max-width:100%;">
								<span class="">: <?php echo $date;?>
								</span>				
							
							</div>
						</div>
						
				  <div class="row">
					<div class="large-12 columns" >
						<br><button name="submit" href="hall.php" class="button small fontslabo" style="background-color:#2ecc71; width:100%;" >Edit Reservation</button>
					</div>
				  </div>
				
		</div></div></div></div>
        	
		<div class="large-8 columns blackblur fontcolor" style="padding:10px">
	
		<div class="large-12 columns" >
		<p><b>Choose Reception Your Hall</b></p><hr>
        
        <?php 
		$quary="SELECT * FROM `hall`";
		$result=mysqli_query($con,$quary);
		while($row=mysqli_fetch_array($result)){
		
		?>
				
					<p><h4><?php echo $row["hall_name"]; ?></h4></p>
					<div class="row">
					
						<div class="large-4 columns">
							<img src="<?php echo $row["imgpath"]; ?>"></img>
						</div>
						<div class="large-4 columns">
						<p><span class="fontgrey">Occupancy : </span> <?php echo $row["occupancy"]; ?><br>
						<span class="fontgrey">Size : </span> <?php echo $row["size"]; ?>m<sup>2</sup>
						<br><span class="fontgrey">Condition : </span> <?php echo $row["cond"]; ?></p>

						</div>
						<div class="large-4 columns">
						<p ><span class="fontgrey">Rate : LKR </span><span style="font-size:24px;"><?php echo $row["rate"]; ?>.00</span><span class="fontgrey">per day</span><br>
						<!--<span style="text-align:right;"></span>-->
						</p>
							<div class="row">
								<div class="large-6 columns">
									
								</div>
								<div class="large-6 columns">
									<a href="hguestform.php?hall_id=<?php echo $row['hall_id']?>&date=<?php echo $date;?>"><button type="submit"  class="w3-btn btn-success w3-green"  
                                   <?php 
								   $quary2="SELECT *  FROM `hallbooking` WHERE `hall_id` = '".$row['hall_id']."' AND `checkin_date` = '".$date."'";
					$result2=mysqli_query($con,$quary2);
					$numRows=mysqli_num_rows($result2);
					if($numRows>0){
						echo 'disabled';
						}
								    ?> 
                                    
                                    >Book Now</button></a>
								</div>
							</div>
						</div>
						
					</div>
					<hr/>
				<?php }?>
               
		</div>
	


	</div>


</div>

</body></html>