<?php

session_start();
include './auth.php';
//$re = mysqli_query($con,"select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );

$id  = $_POST['hall_id'];
$cond = "";
$size ="";
$rate ="";
$desc ="";
$occupancy ="";
$hall_name ="";

	$hall_name = $_POST['hall_name'];
	if(isset($_POST['cond'])){
	$cond = $_POST['cond'];}
	if(isset($_POST['size'])){
	$size = $_POST['size'];}
	if(isset($_POST['rate'])){
	$rate =$_POST['rate'];}
	if(isset($_POST['description'])){
	$desc =$_POST['description'];}
	if(isset($_POST['occupancy'])){
	$occupancy =$_POST['occupancy'];}
	
if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name']))
{
$imgpath = "";
$imageFileType = pathinfo($imgpath,PATHINFO_EXTENSION);
$uploadDir = "../img/";
$imagename= $_FILES['img']['name'];
$imgpath = $uploadDir.$imagename.$imageFileType;
$uploadDirForSql = "img/";
$imgpathForSQL = $uploadDirForSql.$imagename.$imageFileType;


	
	$sql = "UPDATE `hib`.`hall` SET `occupancy` = '".$occupancy."', `size` = '".$size."', `cond` = '".$cond."', `hall_name` = '".$hall_name."', `description` = 'hcjeg', `rate` = '".$rate."', `imgpath` = '".$imgpathForSQL."' WHERE `hall`.`hall_id` = ".$id." ";
	$result = mysqli_query($con,$sql);
	//echo mysqli_error($result);
	move_uploaded_file($_FILES["img"]["tmp_name"], $imgpath);
	header('Refresh: 3;url=reception.php');
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
echo "		<h4> Success. Please wait 10 few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n";
echo "\n";
echo "</body></html>";

}else
{
	
	$sql2 = "UPDATE `hib`.`hall` SET `occupancy` = '".$occupancy."', `size` = '".$size."', `cond` = '".$cond."', `hall_name` = '".$hall_name."', `description` = 'hcjeg', `rate` = '".$rate."' WHERE `hall`.`hall_id` = ".$id." ";
	$result2 = mysqli_query($con,$sql2);
	//echo $sql2;
	//echo mysqli_error();
	header('Refresh: 3;url=reception.php');
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
echo "		<h4> Success. Please wait 3 few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n";
echo "\n";
echo "</body></html>";
}

?>