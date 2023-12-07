<?php
include("config.php");
session_start();
include("mreset_mail_function.php");
$success = "";
$error_message = "";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_email"])) {
	$result = mysqli_query($mysqli,"SELECT * FROM Manager WHERE Email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
    $_SESSION['email']=$_POST['email'];
	if($count>0) {
        $mail_status = sendreset_link($_POST["email"]);
        if($mail_status == 1) {
				$success=1;
		}
	} else {
		$error_message = "Email does not exist!";
	}
}
    ?>

    <html>
    <head>
            <title>Forgot Password Page</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="css\mforgot_pass.css">
        </head>
        <body>
        <div class="container">  
          <div class="row">  
            <div class="col-md-8 offset-md-2">  
              <div class="login-form">  
        <form method="POST" action="" class="form-signin">
        <span class="error" style="color: #FF0000; margin-left: 10px;"><?php echo $error_message; ?></span>
            <?php 
                if(!empty($success == 1)) { 
            ?>
                   <div class="form-group"> 
                   <header class="text-center">
                        <p><strong><center><h3>A link to reset your password has been sent to your email.</h3></center><strong></p>
                        <p><strong><center><h4>Click on the link to reset your password.</h4></center><strong></p>
                    </header>
            <?php 
                } 
                else {
                    ?>
                    <div class="form-group">
                    <header class="text-center">
                        <p><strong><center><h3>EMAIL VERIFICATION</h3></center><strong></p>
                        </header>
                        <input type="email" name="email" placeholder="Enter your login email" class="form-control" required>
                        <br><br>
                        <input type="submit" name="submit_email" value="Submit" class="btn btn-primary">
                        </div>
                
                    <?php 
                        }
                    ?>
                
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