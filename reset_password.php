<?php
include("config.php");
session_start();

	$error_message="";
 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_pass"]))
{
	$email=$_GET['email'];
    $sql=mysqli_query($mysqli,"SELECT User_ID,Password FROM Customer WHERE Email='$email'");
    while($row = $sql->fetch_assoc())
    {
		$chck_id=$row["User_ID"];
    }
    if(strcmp($_POST['userid'],$chck_id)==0)
	{
        $userid=$_POST['userid'];
        if(strlen($_POST["new_pass"]) < 6)
        	$error_message = "Password must have atleast 6 characters.";
    	else
        	$new_pass = $_POST["new_pass"];
        if(strcmp($_POST['cnfm_pass'],$new_pass)!=0)
            $error_message="Password doesn't match.";
    }
	else
		$error_message= "Username doesn't match with login email<br>";
    
        if(empty($error_message))
	    {
		    $sql1=mysqli_query($mysqli,"UPDATE Customer SET Password='$new_pass' WHERE User_ID='$userid'");
		    if($sql1){ 
                echo '<script>'; 
                echo 'alert("Password Reset Successful.");'; 
                echo 'window.location.href = "customer_login.php";';
                echo '</script>';
            }
            else
                {echo "Error: ".$mysqli->error;}
        }

}
    mysqli_close($mysqli);
?>


<html>
    <head>
            <title>Password Reset Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="css\reset_password.css">
        </head>
        <body>
        <div class="container">  
          <div class="row">  
            <div class="col-md-8 offset-md-2">  
              <div class="login-form">  
        <form method="POST" action="" class="form-signin">
        <span class="error" style="color: #FF0000; margin-left: 10px;"><?php echo $error_message; ?></span>
                    <div class="form-group">
                    <header class="text-center">
                        <p><strong><center><h3>RESET PASSWORD</h3></center><strong></p>
                        </header>
                        <input type="text" name="userid" placeholder="Enter your username" class="form-control" required>
                        <br><br>
                        <input type="password" name="new_pass" placeholder="Enter your new password" class="form-control" required>
                        <br><br>
                        <input type="password" name="cnfm_pass" placeholder="Confirm your password" class="form-control" required>
                        <br><br>
                        <input type="submit" name="submit_pass" value="Reset" class="btn btn-primary">
                        </div>
                
            </form>
            </div>  
                  </div>  
                </div>  
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>  
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>  
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> </script>  
                <script>  
                </script>  
            </body>
            </html>