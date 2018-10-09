<?php
session_start();

include './auth.php';



?>
<!DOCTYPE html>

<html lang="en"><head>


    <title>Booking System</title>

   
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/dashboard.css" rel="stylesheet">



  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
   <script src="assest/jquery.form-validator.min.js"></script>
   
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


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         
     

<div class="panel panel-default">
 <div class="panel-heading"><h2>Add New Admin</h2></div>
    <div class="panel-body">

  
  <form class="form-horizontal" action="newadmin.php" method="post">
    <div class="form-group row col-sm-10">
      <label class="control-label col-sm-2" for="fn">First Name:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="fn" name="fn" data-validation="required">
      </div>
      <label class="control-label col-sm-2" for="ln">Last Name:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="ln" name="ln" data-validation="required">
      </div>
    </div>
    
        
         
       <div class="form-group row   col-sm-10">
      <label class="control-label col-sm-2" for="fn">Username:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="fn" name="un" data-validation="required">
      </div></div>
    <div class="form-group row col-sm-10">
      <label class="control-label col-sm-2" for="pwd">Create a Password:</label>
      <div class="col-sm-8">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" data-validation="length" data-validation-length="min5">
      </div>
      </div>
          <div class="form-group row col-sm-10">
      <label class="control-label col-sm-2" for="pwd">Confirm your Password:</label>
      <div class="col-sm-8">          
        <input type="password" class="form-control" id="pwd" placeholder="Reenter password" name="conp" required>
      </div></div>
       <div class="form-group row col-sm-10">
      <label class="control-label col-sm-2" for="fn">Contact No:</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="fn" name="cn" required>
      </div></div>
      <div class="form-group row col-sm-10">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-8">
        <input type="email" class="form-control" id="email" name="email"data-validation="email">
      </div>

    </div>
    <div class="form-group row col-sm-10">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Register</button>
      </div>
    </div>
  </form>






 <script src="assest/jquery.form-validator.min.js"></script>

                </div>
              </div>
              
          
          <?php 
$con=mysqli_connect("localhost","root","","hib") or die('site is under construction');

if(isset($_POST['submit'])){
  $firstName=$_POST['fn'];
  $lastName=$_POST['ln'];
  //$userId=$_POST['uid'];
  $userName=$_POST['un'];
  $password=$_POST['pwd'];
  $confirmpassword=$_POST['conp'];
  $contactNo=$_POST['cn'];
  $email=$_POST['email'];
 
  if($password==$confirmpassword){
    
  
  $queary="INSERT INTO `hib`.`user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `contactno`) VALUES (NULL, '".$userName." ', '".$password."', '".$firstName."', '".$lastName."', '".$email."', '".$contactNo."')";
  
  if(mysqli_query($con,$queary)){
    
    echo '<div class="alert alert-success">
  <strong>Successfully Registered!</strong> 
</div> ';
    }else{
      echo'<div class="alert alert-danger">
  <strong>Error!</strong>
</div>';
      }
  
  }else{
     echo'<div class="alert alert-danger">
  <strong>Password is not match!</strong>
</div>';
  }
  }



 ?>
          
      </div>
  </div>

  


      </body>

</html>