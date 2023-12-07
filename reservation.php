<?php
 session_start();
 include('Config.php');
 include('reserve_mail_function.php');
 $name_err=$phone_err="";
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reserve"]))
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
  $num_guests= $_POST['num_guests'];
  $r_date= $_POST['r_date'];
  $time_slot= $_POST['time_stamp'];
  $table_type= $_POST['table'];
  if(!preg_match('/^[0-9]+$/',$_POST['phone']))
    $phone_err="Enter valid phone number";
  else if(strlen($_POST['phone'])<10 || strlen($_POST['phone'])>10)
    $phone_err="Mobile number should be 10 digits";
  else
    $phone=$_POST['phone'];
if(empty($name_err) && empty($phone_err)) {
  $sql1=mysqli_query($mysqli,"SELECT * FROM Reservation WHERE Name='$name' AND Num_guests='$num_guests' AND Table_type='$table_type' AND R_date='$r_date' AND Time_slot='$time_slot' AND Phone_no='$phone' AND User_ID='$userid' AND Res_Name='$res_name'");
    if($sql1->num_rows>0) {
      echo "You have already registered with these details!";
    }
    $sql2=mysqli_query($mysqli,"SELECT * FROM Reservation WHERE Table_type='$table_type' AND R_date='$r_date' AND Time_slot='$time_slot' AND Res_Name='$res_name'");
    if($sql2->num_rows>0) {
      echo "This table is already booked for this time slot.";
    }
    else {
      $code = rand(100000,999999);
    $sql=mysqli_query($mysqli,"INSERT INTO Reservation(Reserve_id,Name,Num_guests,Table_type,R_date,Time_slot,Phone_no,User_ID,Reserve_code,Res_Name) VALUES('','$name','$num_guests','$table_type','$r_date','$time_slot','$phone','$userid','$code','$res_name')");
    if($sql) {
      $sql3=mysqli_query($mysqli,"SELECT Email FROM Customer WHERE User_Id='$userid'");
      while($e_row=$sql3->fetch_assoc()){
        $email=$e_row['Email']; }
      $mail_status = send_code($email,$code);
      if($mail_status == 1) {
        echo '<script>'; 
        echo 'alert("Table Reserved Successfully! Reservation Code is sent to your email.");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
		  }
}
   else
        echo "Error: ".$mysqli->error;
    }
}
 $mysqli->close();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Table Reservation Form</title>
  <link rel="stylesheet" href="css/style_reservation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fontawesome.com/icons/bowl-food?f=classic&s=solid">
</head>
<body><center>
 <div class="form">
  <form action="" method="post">
    <h1><font color="white">Table Reservation</font></h1>

     <div class="container">
        <div class="icon">
        <i class="fa fa-user"></i>
       </div>
         <input type="text" id="name" name="name" placeholder="Enter your name" required>
     </div>

     <div class="container">
        <div class="icon">
        <i class="fa fa-users"></i>
       </div>
      <input type="number" id="guests" name="num_guests" placeholder="Enter number of guests" min=1 max=12 required>
    </div>

    <b><font color="white">Choose your table</font></b>
		   <select class="form-control" name="table">
		    <option>Table 1 - 4 people</option>
		    <option>Table 2 - 4 people</option>
		    <option>Table 3 - 4 people</option>
        <option>Table 4 - 4 people</option>
        <option>Table 5 - 6 people</option>
        <option>Table 6 - 6 people</option>
        <option>Table 7 - 6 people</option>
        <option>Table 8 - 2 people</option>
        <option>Table 9 - 2 people</option>
        <option>Table 10 - 12 people</option>
		   </select>

       <b><label><font color="white">Enter Time slot</font></label></b>
		   <select class="form-control" name="time_stamp">
		    <option>12:00 - 16:00</option>
		    <option>16:00 - 20:00</option>
		    <option>20:00 - 00:00</option>
		   </select>
      
       <div class="container">
           <div class="icon">
           <i class="fa fa-calendar"></i>
          </div>
       <input type="date" id="date" name="r_date" placeholder="Enter the date" required>
    </div>

    <div class="container">
        <div class="icon">
        <i class="fa fa-phone"></i>
       </div>
      <input type="mobile" id="phone" name="phone" placeholder="Enter the phone number" required>
   </div>

    <button type="submit" name="reserve" value="reserve">Reserve</button>
  </form></center>
  </div>
</body>
</html>
