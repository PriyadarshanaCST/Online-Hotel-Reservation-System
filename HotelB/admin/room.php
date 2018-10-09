<?php
session_start();
include './auth.php';
//$re = mysqli_query($con,"select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    
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
	  $(document).ready(function() {
			$("#checkout").datepicker();
			$("#checkin").datepicker({
			minDate : new Date(),
			onSelect: function (dateText, inst) {
			var date = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);
			$("#checkout").datepicker("option", "minDate", date);
			}
			});
			
		
	  });

function fnSearch()
		{
			var checkin=document.getElementById('checkin').value;
			var checkout=document.getElementById('checkout').value;
			var bookingid=document.getElementById('bookingid').value;
			var firstname=document.getElementById('firstname').value;
			$.ajax({
				type: "POST",
				url: "search.php",
				data: "checkin=" + checkin + "&checkout=" + checkout + "&bookingid=" + bookingid + "&firstname=" + firstname,
				success: function(resPonsE) 
					{
						document.getElementById('bookinginfo').innerHTML=resPonsE;
						return true;
					}
			});
		}
	  
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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="roomdetail">
          

          <h2 class="sub-header">Room Details</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Room Name</th>
                  <th>Thumbnail</th>
                  <th>Total Room</th>
				  <th>Size</th>
                  <th>View</th>
			      <th>Occupancy</th>
                  <th>Rate</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody id="roominfo"  >
					<?php 
						include './auth.php';
						
						$result = mysqli_query($con,"select * from room");
						if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_array($result) ){
								print "<tr style=\"\">		 <td>".$row['room_name']."</td>\n";
								print "                  <td><img src=\"../".$row['imgpath']."\" style=\"height:50px;width:50px;\"\"></td>\n";
								print "                  <td>".$row['total_room']."</td>\n";
								print "                  <td>".$row['size']." </td>\n";
								print "                  <td>".$row['view']."</td>\n";
								print "                  <td>".$row['occupancy']."</td>\n";
								print "                  <td>".$row['rate']."</td>\n";
								print "                  <td>".$row['descriptions']."</td>\n";
								print "                  <td><a href=\"editroom.php?room_id=".$row['room_id']."\" \">Edit</a></td><td><a class=\"delete\" href=\"deleteroom.php?room_id=".$row['room_id']."\">Delete</a></td></tr>";					
				
							}
						}			
					
					?>
				
               
              </tbody>
            </table>
          </div>
		 
		  <button type="button" class="btn" id="addroom"><a href="addroom.php>">Add Room</a></button>
        </div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="formnew" style="display:none;">
		<button type="button" class="btn" id="back">Back</button>
					<form role="form" id="formnew" action="addroom.php" method="post" enctype="multipart/form-data">
					  <div class="form-group">
						<label for="room_name">Room Name</label>
						<input type="text" class="form-control" name="room_name" id="room_name" placeholder="Room Name" required>
					  </div>
					  <div class="form-group">
						<label for="total_room">Total Room</label>
						<input type="text" class="form-control" name="total_room"   id="total_room" placeholder="Number of Room" required>
					  </div>
					   <div class="form-group">
						<label for="occupancy">Occupancy</label>
						<input type="text" class="form-control" name="occupancy" id="occupancy" placeholder="max number of occupant">
					  </div>
					  <div class="form-group">
						<label for="size">Size</label>
						<input type="text" class="form-control"  name="size" id="size" value="sqft" placeholder="Please write sqft or metre square: example: 250 sqft">
					  </div>
					  <div class="form-group">
						<label for="view">View</label>
						<input type="text" class="form-control" name="view" id="view" placeholder="example: city view" value="city">
					  </div>
					  <div class="form-group">
						<label for="rate">Rate</label>
						<input type="text" class="form-control"  nsme="rate" id="rate" placeholder="Write without LKR" required>
					  </div>
					  <div class="form-group">
						<label for="desc">Descriptions</label>
						<input type="text" class="form-control" name="desc" id="desc" placeholder="">
					  </div>
					  <div class="form-group">
						<label for="img">Upload Room Image [recommended size is 400 X 400]</label>
						<input type="file" id="img" name="img" required>
						<!-- p class="help-block">Example block-level help text here.</p-->
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
		</div>
		
      </div>
    </div>
	

  <script>
  $( document ).ready(function() {
      $("#addroom").click(function(){
		$("#formnew").toggle();
		$("#roomdetail").toggle();
	  });
	  $("#back").click(function(){
		$("#formnew").toggle();
		$("#roomdetail").toggle();
	  });
	});
	function moredetail(id)
	{
	var x = "booking"+id;
	document.getElementById(x).style.display = "block";
	}
	
	$('.delete').click (function () {
		return confirm ("Are you sure you want to delete?") ;
	}); 
	
  </script>
</body></html>