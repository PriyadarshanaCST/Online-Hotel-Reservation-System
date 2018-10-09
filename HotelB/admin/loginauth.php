<?php
session_start();

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] =  $_POST['password'];

include './auth.php';
$re = mysqli_query($con,"select * from user where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
//echo mysql_error();
if(mysqli_num_rows($re) > 0)
{
//header('Refresh: 0;url=dashboard.php');
header("location: dashboard.php");
} 
else
{
//echo 'no';
session_destroy();
header("location: index.htm");
}
?>