<?php
session_start();

include './auth.php';


?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

 

    <title>Booking System</title>

 
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/dashboard.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	
    
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

      <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">


 </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid" style="background-color: #4aa3df;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color: #ffffff;">Admin Booking Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signout.php" style="color: #ffffff;">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-5 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard.php"><i class="icon-gauge"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            
			<li><a href="room.php"><i class="icon-key"></i> Rooms</a></li>
            <li><a href="reception.php"><i class="icon-key"></i> Reception Hall</a></li>
            <li><a href="rhbooking.php"><i class="icon-key"></i> Hall Bokking</a></li>
            <li><a href="newadmin.php"><i class="icon-key"></i>Add New Admin</a></li>
            <li><a href="feedback.php"><i class="icon-key"></i> Customers Feedbacks</a></li>


          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         
		 
			<div class="container-fluid">
			 <h4>Customer Feedback</h4>
							
				<div class="row" id="bookindetails">
					<hr>        <div class="col-xs-12 "  >
							  
							  <div class="table-responsive">
                
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Feedback ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Message</th>
                  </tr>
                </thead>
                <tbody>
            <?php 
              include './auth.php';
              $result = mysqli_query($con,"select * from feedback");
              if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_array($result) ){
                  print "<tr style=\"\">		 <td>".$row['feedback_id']."</td>\n";
                  print "                  <td>".$row['name']."</td>\n";
                  print "                  <td>".$row['email']."</td>\n";
                  print "                  <td>".$row['message']."</td>\n";
                  
          
                }
              }			
            
            ?>
          
                 
                </tbody>
              </table>
							  </div>
							</div>
		</div>
								
			</div>
				</div>
				</div>
				
			</div>
            <?php
			$feedback_id="";
			$name="";
			$email="";
			$message="";
            ?>
</body></html>