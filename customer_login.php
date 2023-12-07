<?php
include("config.php");
session_start();

	$username = $password = $chck_password = $id = "";
	$username_err = $password_err = $login_err="";
 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]))
{
	if(!preg_match('/^[a-zA-Z0-9_]+$/', $_POST["username"]))
        	$username_err = "Username can only contain letters, numbers, and underscores."; 
	else
		$username = $_POST["username"];
	if(strlen($_POST["password"]) < 6)
        	$password_err = "Password must have atleast 6 characters.";
    	else
        	$password = $_POST["password"];
	
        if(empty($username_err) and empty($password_err))
	{
		$sql=mysqli_query($mysqli,"SELECT User_ID,Password FROM Customer WHERE User_ID='$username'");
		if($sql)
		{
                	if($sql->num_rows == 1)
			{ 
				while($row = $sql->fetch_assoc())
				{
					$chck_password=$row["Password"];
					$id=$row["User_ID"];
				}
				if(strcmp($password,$chck_password)==0)
				{
                    $_SESSION['userid']=$id;
                    header("location:otp.php");
                }
				else
					$login_err= "Invalid username or password<br>";
                         } 
			 else
                 $login_err= "Invalid username or password<br>";
            }
		  else
              $login_err= "Invalid username or password<br>";
    	}
}
    mysqli_close($mysqli);
?>


<html>
    <head>
        <title>Customer Login Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
    <div style=" background-image: url('Photos/resturant.jpg');background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="container">
        <div class="box">
            <div class="box-body">
                <div class="design"></div>
                <header class="title text-center">
                    <p>Login to your account</p>
                </header>
                <form method="POST" action="" class="main-form text-center">
                    <span class="error"><?php echo $login_err; ?></span>
                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <i class="fas fa-user"></i>
                            <input name="username" id="username" type="text" class="input" placeholder="Username">
                            <span class="error"><?php echo $username_err; ?></span>
                        </label>
                    </div>
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input name="password" id="password" type="password" class="input" placeholder="Password">
                            <span class="error"><?php echo $password_err; ?></span>
                        </label>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>
                            <input type="submit" name="login" value="Login" class="form-control btn">
                        </label>    
                    </div>
                    <div class="form-group">
                        <div class="cta">Not resgitered?
                        <a href="customer_register.php" style="color:##5c4ac7; font-size:17px">Create a new account</a>
                    </div>
                    <div class="form-group">
                        <div class="cta">Forgot Password?
                        <a href="forgot_password.php" style="color:##5c4ac7; font-size:17px">Reset Password</a>
                    </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>