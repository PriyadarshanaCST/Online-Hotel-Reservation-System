<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assest/bootstrap.min.css">
        <script src="assest\jquery-3.2.1.js"></script>
        <script src="assest/bootstrap.min.js"></script>
        <link href="fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">



    </head>
    <body>

        <nav class="navbar navbar-inverse navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Araliya Hotel</a >
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    

                    <li><a href="galery.php">Gallery</a></li>
                   
                    <li><a href="contactus.php">Contact Us</a></li> 
                    </li>

                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>User Login</h2></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="login.php" method="post" >
                        

                        <div class="col-sm-6">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 <input id="email" type="text" class="form-control" name="username" placeholder="Username">
                            </div><br><br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div><br>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
               


                </div>

                <?php
				
                $con = mysqli_connect("localhost", "root", "", "hib") or die('site is under construction');
               		if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    

                    $query="SELECT * FROM `user` WHERE Username='".$username."' AND Password='".$password."';";
					$re=mysqli_query($con,$query);
					$result=mysqli_fetch_assoc($re);
					//$utype=$result['UserType'];
					$num=mysqli_num_rows($re);
					$username1=$result['Username'];
					$password1=$result['Password'];
					//echo $utype;
					if($num==0){
						echo 'Error';
						
						}else{
							
								session_start();
								
								$_SESSION['username'] = $username1;
								//echo $_SERVER["usertype"];
								header("location:admin/dashboard.php");
						
								}
								
							//else if($utype=='recp') {
								//echo 'rep';
							}
							//else{
								
								
								
							
                
                ?> 

                </body>
                </html>
