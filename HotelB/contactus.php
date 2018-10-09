<?php
session_start();
	include './auth.php';
	
	
?>

<!DOCTYPE html>
<html>
  <head>


  <link rel="stylesheet" href="assest/bootstrap.min.css">
      <link rel="stylesheet" href="assest/w3.css">
      <link rel="stylesheet" href="assest/font-awesome.min.css">

  <script src="assest\jquery-3.2.1.js"></script>
  <script src="assest/bootstrap.min.js"></script>
  
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

  </head>
<br><br><br><br>
  <body>

  <div class="w3-container" id="contact">
  <div class="panel panel-default">
                <div class="panel-heading"><h2>Contact Us</h2></div>
                <div class="panel-body">
    
    <p>If you have any questions, do not hesitate to ask them.</p>
    <i class="fa fa-map-marker w3-text-green" style="width:30px"></i> No 55,Passara Road,Badulla<br>
    <i class="fa fa-phone w3-text-green" style="width:30px"></i> Phone:055-2247255<br>
    <i class="fa fa-envelope w3-text-green" style="width:30px"> </i> Email: araliyahotel@gmail.com<br>
    <form action="contactus.php" method="post">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
      <button class="w3-btn w3-green" type="submit" name="submit">Send Message</button>
     
    </form>
  </div>
  <?php
   if (isset($_POST['submit'])) {


                    $name = $_POST['Name'];
                    $email = $_POST['Email'];
					$message=$_POST['Message'];
					
		$query="INSERT INTO `hib`.`feedback` (`feedback_id`, `name`, `email`, `message`) VALUES (NULL, '".$name."', '".$email."', '".$message."');";
		if(mysqli_query($con,$query)){
			    echo '<div class="alert alert-success">
  <strong>Sucessfully submit your message.Thank you for your feedback</strong> 
</div> ';
					
						
						}else{
						   echo'<div class="alert alert-danger">
  <strong>Your Meassage is not sent,Please using the correct format for given fields</strong>
</div>';
							
								session_start();
								
								
							
								header("location:index.php");
						
								}
						
								
								
  
   }
  ?>

</body>
</html>