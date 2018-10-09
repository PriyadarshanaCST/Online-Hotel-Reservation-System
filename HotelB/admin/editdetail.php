<?php
session_start();
include './auth.php';

?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Booking System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/dashboard.css" rel="stylesheet">


	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

 
  <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">

 </head>
	<script>

	</script>
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
    

    	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="formnew" >
		<?php 
		$booking_id = $_GET['booking'];
		include './auth.php';
		$result = mysqli_query($con,"SELECT * from booking where booking_id ='".$booking_id."' ");
		if(mysqli_num_rows($result) > 0)
		while($rows = mysqli_fetch_array($result)){
		print "					<form role=\"form\" id=\"formnew\" action=\"updatedetail.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
		print "						<input type=\"hidden\" class=\"form-control\" name=\"booking_id\" id=\"booking_id\" placeholder=\"booking ID\" value=\"".$booking_id."\" required>\n";
		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"total_adult\">Edit total adult</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"total_adult\" id=\"total_adult\" placeholder=\"total_adult\" value=\"".$rows['total_adult']."\" required>\n";
		print "					  </div>\n";

		print "					   <div class=\"form-group\">\n";
		print "						<label for=\"total_children\">Total Children</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"total_children\" id=\"total_children\" placeholder=\"max number of occupant\" value=\"".$rows['total_children']."\">\n";
		print "					  </div>\n";

		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"checkin_date\">Checkin Date</label>\n";
		print "						<input type=\"date\" class=\"form-control\"  name=\"checkin_date\" id=\"checkin_date\" placeholder=\"Please write sqft or metre square: example: 250 sqft\" value=\"".$rows['checkin_date']."\">\n";
		print "					  </div>\n";

		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"checkout_date\">Checkout Date</label>\n";
		print "						<input type=\"date\" class=\"form-control\" name=\"checkout_date\" id=\"checkout_date\" placeholder=\"example: city cond\" value=\"".$rows['checkout_date']."\">\n";
		print "					  </div>\n";

		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"special_requirement\">special_requirement</label>\n";
		print "						<input type=\"text\" class=\"form-control\"  name=\"special_requirement\" id=\"special_requirement\" placeholder=\"Write without LKR\" value=\"".$rows['special_requirement']."\" required>\n";
		print "					  </div>\n";

		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"total_amount\">Total Amount</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"total_amount\" id=\"total_amount\" value=\"".$rows['total_amount']."\" placeholder=\"\">\n";
		print "					  </div>\n";
		

		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"deposit\">Deposit</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"deposit\" id=\"deposit\" value=\"".$rows['deposit']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"booking_date\">Booking Date</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"booking_date\" id=\"booking_date\" value=\"".$rows['booking_date']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"first_name\">First Name</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"first_name\" id=\"first_name\" value=\"".$rows['first_name']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"last_name\">Last Name</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"last_name\" id=\"last_name\" value=\"".$rows['last_name']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"e_mail\">E mail</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"e_mail\" id=\"e_mail\" value=\"".$rows['e_mail']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"telephone\">Telephone</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"telephone\" id=\"telephone\" value=\"".$rows['telephone']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"address_line_1\">Address Line 1</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"address_line_1\" id=\"address_line_1\" value=\"".$rows['addline1']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"address_line_2\">Address Line 2</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"address_line_2\" id=\"address_line_2\" value=\"".$rows['addline2']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"city\">City</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"city\" id=\"city\" value=\"".$rows['city']."\" placeholder=\"\">\n";
		print "					  </div>\n";

		
		print "					  <div class=\"form-group\">\n";
		print "						<label for=\"postcode\">Postel Code</label>\n";
		print "						<input type=\"text\" class=\"form-control\" name=\"postcode\" id=\"postcode\" value=\"".$rows['postcode']."\" placeholder=\"\">\n";
		print "					  </div>\n";



		print "					  <button type=\"submit\" class=\"btn btn-default\">Update hall Detail</button>\n";
		print "					</form>";		
		
		
		}


		?>

		</div>
		
      </div>
    </div>
	


    <script src="js/ie10-viewport-bug-workaround.js">

  </script>
     ></body></html>