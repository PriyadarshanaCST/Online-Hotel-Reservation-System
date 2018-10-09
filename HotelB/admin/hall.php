<?php
session_start();
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation</title>

<link rel="stylesheet" href="scss/normalize.css">
<link rel="stylesheet" href="scss/foundation.css">
<link rel="stylesheet" href="scss/style.css">
<link rel="stylesheet" href="assest/jquery-ui-1.12.1.custom/jquery-ui.css">

<link href='http://fonts.googleapis.com/css?family=Slabo+13px' rel='stylesheet' type='text/css'>

<script src="assest\jquery-ui.min.js"></script>
<script src="assest\analytics.js"></script>

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

<body class="fontbody" style="background-image : url(img/r.jpg); no-repeat center center fixed; background-size: cover;">
 
<div class="row foo" style="margin:30px auto 30px auto;"><br><br>


</div>
</div>
 
<div class="row">
	<div class="large-7 columns blackblur fontcolor" style="padding-top:10px;">
	
	<div class="large-12 columns " >
	<p><b>Check Date</b></p><hr class="line">
			<form name="form" action="checkhall.php" method="post" onSubmit="return validateForm(this);">
			<div class="row">
				
					<div class="large-6 columns" style="max-width:100%;">
						<label class="fontcolor" for="checkin">Check In
							
                            <input type="date" name="CheckDate" id="datepicker1" style="width:100%;"/>
						</label>
					</div>
					
			
			  <div class="row">
				<div class="large-12 columns" >
					<button name="submit" href="checkhall.php" class="button small fontslabo" style= "background-color:#2ecc71; width:100%;">Check Availability</button>
				</div>
			  </div>
			</form>
	</div>
	


</div>
</div>
<script>
	function validateForm(form) {
		var a = form.checkin.value;
		
			if(a == null) 
			{
			 alert("Please choose date");
			 return false;
			}
			

	}
</script>

<script src="assest\jquery-ui-1.12.1.custom\jquery-ui.js"></script>
<script src="assest\jquery-ui-1.12.1.custom\external\jquery\jquery.js"></script>



<script>
  $( function() {
    $( "#datepicker1" ).datepicker();

  } );
  </script>
</body>
</html>