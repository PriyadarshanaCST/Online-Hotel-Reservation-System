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
	label{ 
	color:#FFFFFF
		}
	p{ color:#91B1C5
		}
</style>
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
</head>

<body class="fontbody" style="background-image : url(img/2.jpg); no-repeat center center fixed; background-size: cover;">
 
<div class="row foo" style="margin:30px auto 30px auto;"><br><br>

</div>
</div>
 
<div class="row">
	<div class="large-7 columns blackblur fontcolor" style="padding-top:10px;">
	
	<div class="large-12 columns " >
	<p><b>Check Date</b></p><hr class="line">
			<form name="form" action="checkroom.php" method="post" onSubmit="return validateForm(this);">
			<div class="row">
				
					<div class="large-6 columns" style="max-width:100%;">
						<label class="fontcolor" for="checkin">Check In
							
                            <input type="date" name="checkin" id="datepicker1" style="width:100%;"/>
						</label>
					</div>
					
					<div class="large-6 columns" style="max-width:100%;">
						<label class="fontcolor" for="checkout">Check Out
							<input type="date" name="checkout" id="datepicker2" style="width:100%;"/>
                           
						</label>
					
					
					</div>
			</div>
					
			<div class="row">
				
					<div class="large-6 columns">
						<label class="fontcolor">Adults
							
								<select  name="totaladults" id="totaladults" style="width:100%;">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								</select>
							
						</label>
					</div>
					
					<div class="large-6 columns"  style="max-width:100%;">
						<label class="fontcolor">Children
							<select  name="totalchildrens" id="totalchildrens" style="width:100%; color:black;">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							</select>
						</label>
					</div>
					
				
			</div>
			
			  <div class="row">
				<div class="large-12 columns" >
					<button name="submit" href="#" class="button small fontslabo" style= "background-color:#2ecc71; width:100%;">Check Availability</button>
				</div>
			  </div>
			</form>
	</div>
	


</div>
</div>
<script>
	function validateForm(form) {
		var a = form.checkin.value;
		var b = form.checkout.value;
		var c = form.totaladults.value;
		var d = form.totalchildrens.value;
			if(a == null || b == null || a == "" || b == "") 
			{
			 alert("Please choose date");
			 return false;
			}
			if(c == 0) 
			{
			 	if(d == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}
			if(d == 0) 
			{
			 	if(c == 0) 
				{
				 alert("Please choose no. of guest");
				 return false;
				}
			}

	}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script');

  ga('create', 'UA-57205452-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="assest\jquery-ui-1.12.1.custom\jquery-ui.js"></script>
<script src="assest\jquery-ui-1.12.1.custom\external\jquery\jquery.js"></script>



<script>
  $( function() {
    $( "#datepicker1" ).datepicker();
	$( "#datepicker2" ).datepicker();
  } );
  </script>
</body>
</html>