<?php
 session_start();
 require_once 'vendor/autoload.php';
 use Dompdf\Dompdf;
 include('Config.php');
 include('takeaway_mail_function.php');
 $name_err=$phone_err="";
 $item_total=0;
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["takeaway"]))
 {
   $userid=$_SESSION['userid'];
   $res_id=$_GET['res_id'];
   $sql4=mysqli_query($mysqli,"SELECT Res_Name FROM Restaurant WHERE Res_ID='$res_id'");
   while($n_row=$sql4->fetch_assoc()) {
    $res_name=$n_row['Res_Name'];
   }
  if(empty($_POST['name'])) 
     $name_err="Name has to be entered";
  else 
  $name= $_POST['name'];
  $t_date= $_POST['date'];
  $time_slot= $_POST['time_stamp'];
  if(!preg_match('/^[0-9]+$/',$_POST['phone']))
    $phone_err="Enter valid phone number";
  else if(strlen($_POST['phone'])<10 || strlen($_POST['phone'])>10)
    $phone_err="Mobile number should be 10 digits";
  else
    $phone=$_POST['phone'];
if(empty($name_err) && empty($phone_err)) {
      $code = rand(100000,999999);
      foreach ($_SESSION["cart_item"] as $item)
      {
        $item_qty=$item["quantity"];
        $item_name=$item["fname"];
      $item_total += ($item["fprice"]*$item["quantity"]);
      
      $sql=mysqli_query($mysqli,"INSERT INTO Takeaway(Takeaway_id,Name,T_date,Time_slot,Phone_no,User_ID,Order_Name,Quantity,Tot_price,Takeaway_code,Res_Name) VALUES('','$name','$t_date','$time_slot','$phone','$userid','$item_name','$item_qty','$item_total','$code','$res_name')");
      }
      if($sql) {
      $sql3=mysqli_query($mysqli,"SELECT Email FROM Customer WHERE User_Id='$userid'");
      while($e_row=$sql3->fetch_assoc()){
        $email=$e_row['Email']; }
      $mail_status = send_code($email,$code);
      if($mail_status == 1) {
        $_SESSION['Takeaway_id']=$code;
        echo '<script>'; 
        echo 'alert("Your takeaway request is accepted! Takeaway Code is sent to your email.");';
        echo 'window.location.href = "takeaway_bill.php"';
        echo
              '</script>';
             
      }
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
  <title>Takeaway Form</title>
  <link rel="stylesheet" href="css/style_reservation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fontawesome.com/icons/bowl-food?f=classic&s=solid">
</head>
<body><center>
 <div class="form">
  <form action="" method="post">
    <h1><font color="white">Takeaway</font></h1>

     <div class="container">
        <div class="icon">
        <i class="fa fa-user"></i>
       </div>
         <input type="text" id="name" name="name" placeholder="Enter your name" required>
     </div>

       <b><label><font color="white">Enter Time slot</font></label></b>
		   <select class="form-control" name="time_stamp">
		    <option>12:00 - 16:00</option>
		    <option>16:00 - 20:00</option>
		    <option>20:00 - 00:00</option>
		   </select>
      
           <div class="container">
              <div class="icon">
                   <i class="fa fa-phone"></i>
              </div>
              <input type="mobile" id="phone" name="phone" placeholder="Enter the phone number" required>
            </div>

       <div class="container">
           <div class="icon">
           <i class="fa fa-calendar"></i>
          </div>
       <input type="date" id="date" name="date" placeholder="Enter the date" required>
    </div>


    <button type="submit" name="takeaway" value="Go for takeaway">Go for takeaway</button>
  </form></center>
  </div>
</body>
</html>
