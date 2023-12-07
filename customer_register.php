<?php 
    include("Config.php");
    session_start();
?>

<?php
    $mobile_err=$username_err=$password_err=$register_err=$confirm_err=$image_err="";
    $targetdir="Photos/";
    
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["register"]) && !empty($_FILES["image"]["name"])) {
        
        $iname = basename($_FILES['image']['name']);
        $target_file_path = $targetdir . $iname;
        $file_type=pathinfo($target_file_path,PATHINFO_EXTENSION);

        if(!preg_match('/^[a-zA-Z0-9_]+$/', $_POST["username"]))
        	$username_err = "Username can only contain letters, numbers, and underscores."; 
	    else
		    $username = $_POST["username"];
        $name=$_POST['cust_name'];
		$email=$_POST['email'];
		if(strlen($_POST['ph_no'])<10 || strlen($_POST['ph_no'])>10)
			$mobile_err="Mobile must have atleast 10 characters";
		else
			$mobile=$_POST['ph_no'];
		$addr=$_POST['addr'];
		if(strlen($_POST["password"]) < 6)
        	$password_err = "Password must have atleast 6 characters.";
    	else
        	$password = $_POST["password"];
        if(strlen($_POST["confirm_password"]) != ($_POST["password"]) )
        	$confirm_err = "Password doesnot match.";
        
        $allow_types=array('jpg','png','jpeg');
        if(in_array($file_type,$allow_types)) {
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file_path)) {
		        if(empty($mobile_err) && empty($username_err) && empty($password_err))
		        {
			        $sql=mysqli_query($mysqli,"select * from Customer where User_ID='$username'");
		            if($sql->num_rows == 1)
		            {
                        $register_err="Username already exists!";
                    }
                    else {
                        $sql1=mysqli_query($mysqli,"insert into Customer(User_ID,Name,Phone,Address,Email,Password,Image) values('$username','$name','$mobile','$addr','$email','$password','$iname')");
			
			            if($sql1){ 
                            echo '<script>'; 
                            echo 'alert("Registration Successful.");'; 
                            echo 'window.location.href = "customer_login.php";';
                            echo '</script>';
                        }
			            else
				        {echo "Error: ".$mysqli->error;}
                    }
                }
            }
            else { $image_err="Sorry, there was an error uploading your image."; }
        }
        else { $image_err="Sorry, only JPG, JPEG, PNG files are allowed."; }
	}
$mysqli->close();
?>

<html>
    <head>
        <title>Customer Register Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/customer_register.css">
    </head>
    <body>
    <div style="background-image: url('Photos/resturant.jpg');background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div class="container">
        <div class="box">
            <div class="box-body">
                <form method="POST" action="" class="main-form text-center" enctype="multipart/form-data">
                    <span class="error"><?php echo $register_err; ?></span>
                    <span class="error"><?php echo $image_err; ?></span>
                    <span class="error"><?php echo $username_err; ?></span>
                    <span class="error"><?php echo $mobile_err; ?></span>
                    <span class="error"><?php echo $password_err; ?></span>
                    <span class="error"><?php echo $confirm_err; ?></span>

                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <i class="fas fa-user"></i>
                            <input name="username" id="username" type="text" class="input" placeholder="Enter Username" required>
                            
                        </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <label class="my-0">
                        <i class="fas fa-id-card"></i>
                        <input name="cust_name" id="cust_name" type="text" placeholder="Enter Name" class="input" required>
                    </label>&emsp;
                    </div>

                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <i class="fas fa-mobile-alt"></i>
                            <input name="ph_no" id="ph_no" type="mobile" placeholder="Enter Mobile Number" class="input" required>
                            
                        </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <label class="my-0">
                            <i class="fas fa-envelope"></i>
                            <input name="email" id="email" type="email" placeholder="Enter Email" class="input" required>
                        </label>&emsp;
                    </div>

                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input name="password" id="password" type="password" class="input" placeholder="Password">
                            
                        </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input name="confirm_password" id="confirm password" type="password" class="input" placeholder="Confirm Password">
                            
                        </label>&emsp;
                    </div>

                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <i class="fas fa-map-marker-alt"></i>
                            <input name="addr" id="addr" type="text" placeholder="Enter Address" class="input1" required>
                        </label>&emsp;
                    </div>

                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <i class="fas fa-image"></i>
                            <input name="image" id="image" type="file" class="input1" required>
                        <label>&emsp;
                    </div>

                    <br>
                    <div class="form-group">
                        <label>
                            <input type="submit" name="register" value="Register" class="form-control btn">
                            Already have an account? <a href="customer_login.php" style="color:#062db9; font-size:17px; align=center">Login</a>
                        </label>    
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