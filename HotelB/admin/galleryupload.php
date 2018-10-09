<?php
session_start();
include './auth.php';
//$re = mysqli_query($con,"select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
?>
<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Booking System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/dashboard.css" rel="stylesheet">


	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

 
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
            <li><a href="dashboard.php"><i class="icon-gauge"></i> Dashboard <span class="sr-only">(current)</span></a></li>
            
				<li><a href="room.php"><i class="icon-key"></i> Rooms</a></li>
            <li><a href="reception.php"><i class="icon-key"></i> Reception Hall</a></li>
            <li><a href="rhbooking.php"><i class="icon-key"></i> Hall Bokking</a></li>
            <li><a href="newadmin.php"><i class="icon-key"></i>Add New Admin</a></li>
            <li><a href="feedback.php"><i class="icon-key"></i> Customers Feedbacks</a></li>

          </ul>

        </div>


 <div id="container">
            
    <form action="galleryupload.php" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
    <div class="col-md-4 col-md-offset-4">          
    <div class="imgupload panel panel-default">
      <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left"><b>Upload Image</b></h3>    
      </div>

      <div class="file-tab panel-body">

        <div>
          <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
      </div>

      <div class="url-tab panel-body">
        

          <div class="input-group-btn">

              <button type="submit" class="btn btn-primary" value="Upload Image" name="submit" style="float: right;">Upload</button>

          </div>


        <input type="hidden" name="url-input">

      </div>

    </div>
            </div>
      </div>
</form>
<?php 

if(isset($_POST['submit'])){
$image2 = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));

$quary="INSERT INTO `hib`.`upload` (`id`,`filename`) VALUES (NULL,'".$image2."')";

if(mysqli_query($con,$quary)){
	echo 'Ok';
	}else{
		echo 'No';
		}
}
?>
    </div>
</body>
</html>