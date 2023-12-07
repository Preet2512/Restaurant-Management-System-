<?php
 session_start();
 include('Config.php');
 $name_err="";
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
 {
   $userid=$_SESSION['userid'];
   $customer=mysqli_query($mysqli,"SELECT * FROM Customer WHERE User_ID='$userid'");
    while($c_row=$customer->fetch_assoc()){
      $c_img=$c_row['Image'];
    }

    $res_id=$_GET['res_id'];
    

    if(empty($_POST['name'])) 
     $name_err="Name has to be entered";
  else 
  $name= $_POST['name'];
  $email= $_POST['email'];
  $review= $_POST['review'];
  $rating= $_POST['rate'];
if(empty($name_err)) 
{
    $sql=mysqli_query($mysqli,"INSERT INTO review(Review_ID,Name,Email,Review,User_ID,Cus_img,Rating,Res_ID) VALUES('','$name','$email','$review','$userid','$c_img','$rating','$res_id')");
    if($sql) {
        echo "<script>alert('Review Submitted successfully.');</script>"; 
        echo "<script>window.location.replace('index.php');</script>"; 
    }
   else
        echo "Error: ".$mysqli->error;
    }
 $mysqli->close();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reviews</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/style_review.css">
</head>
<body><center>
 <div class="form">
  <form action="" method="post">
  <h1><font color="white">Reviews</font></h1>
     <div class="container">
       <div class="icon">
       <i class="fa fa-user"></i>
        </div>
         <input type="text" id="name" name="name" placeholder="Enter your Name" required>
     </div>

     <div class="container">
       <div class="icon">
       <i class="fa fa-envelope"></i>
       </div>
      <input type="text" id="email" name="email" placeholder="Enter your email"  required>
    </div>  

    <div class="container">
        <div class="icon">
        <i class="fa fa-file-signature"></i>
        </div>
       <input type="text" id="review" name="review" placeholder="Enter your review" required>
    </div>

    <div class="container">
        <div class="icon">
        <i class="fa fa-star"></i>
        </div>
       <input type="number" id="rate" name="rate" placeholder="Give us a rating *" min=1 max=5 required>
    </div>

    <button type="submit" name="submit" value="submit">Submit</button>
  </form></center>
  </div>
</body>
</html>
