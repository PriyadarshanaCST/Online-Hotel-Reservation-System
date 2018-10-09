<?php
session_start();
include './auth.php';



$total = "";
//$view = "";
$size ="";
$rate ="";
$description ="";
$occupancy ="";
$imgpath ="";
$hallname ="";
$imageFileType = pathinfo($imgpath,PATHINFO_EXTENSION);
$uploadDir = "../img/";
$imagename= $_FILES['img']['hallname'];
$imgpath = $uploadDir.$imagename.$imageFileType;
$uploadDirForSql = "img/";
$imgpathForSQL = $uploadDirForSql.$imagename.$imageFileType;

//check image dimension



//end of check image dimension/
	$hall_name = $_POST['hallname'];
	//if(isset($_POST['total_room'])){
	//$total =$_POST['total_room'];}
	if(isset($_POST['condition'])){
	$cond= $_POST['condition'];}
	if(isset($_POST['size'])){
	$size = $_POST['size'];}
	if(isset($_POST['rate'])){
	$rate =$_POST['rate'];}
	if(isset($_POST['description'])){
	$desc =$_POST['description'];}
	if(isset($_POST['occupancy'])){
	$occupancy =$_POST['occupancy'];}
		
	$sql = "INSERT INTO hall (hall_id,occupancy, size,condition, hall_name, description, rate, imgpath) VALUES (null,  '".$occupancy."', '".$size."', '".$cond."', '".$hallname."', '".$description."', '".$rate."', '".$imgpathForSQL."')";
	$result = mysqli_query($sql);
	echo mysqli_error();
	move_uploaded_file($_FILES["img"]["tmp_name"], $imgpath);
	
	
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "\n";
echo "    <!-- Bootstrap core CSS -->\n";
echo "    <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <!-- Custom styles for this template -->\n";
echo "    <link href=\"css/dashboard.css\" rel=\"stylesheet\">\n";
echo "	<link href=\"css/style.css\" rel=\"stylesheet\">\n";
echo "	<link rel=\"stylesheet\" href=\"css/fontello.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"css/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"css/fontello-ie7.css\"><![endif]-->\n";
echo "    \n";
echo "<body>\n";
echo "<div class=\"container\">\n";
echo "	<div class=\"row\">\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-6 \">\n";
echo "		<h4> Success. Please wait few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n";
echo "\n";
echo "</body></html>";
?>