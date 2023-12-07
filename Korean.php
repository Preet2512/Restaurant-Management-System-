<?php
include("Config.php");
// error_reporting(0);
session_start();

if(empty($_SESSION['userid']) || empty($_SESSION['success'])) {
  header('location:customer_login.php');
}
else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_Korean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fontawesome.com/icons/bowl-food?f=classic&s=solid">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<body>
    <div class="hi">
        <div class="heading1">
            <center><font size="6" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">
                Taste of Korea </font></center>
        </div>
        <div class="heading2">
                 <a href="index.php" style="color:white; text-decoration:none;"><i  class="bi bi-house-check"></i>Home</a>
        </div>
        <div class="heading3">
                 <a href="food_menu.php?res_id=3" style="color:white; text-decoration:none;"><i class="bi bi-book"></i>Menu</a>
        </div>
        <div class="heading4">
                 <a href="Korean_gallery.html" style="color:white; text-decoration:none;"><i  class="bi bi-images"></i>Gallery</a>
        </div>
        <div class="heading5">
                <a href="#goK" style="color:white; text-decoration:none;" ><i  class="bi bi-telephone"></i>Contact Us</a>
        </div>
        <div class="heading6">
             <a href="Korean_about.html" style="color:white; text-decoration:none;"><i  class="bi bi-question-circle"></i>About us</A>
        </div>
     </div>

    <div class="image">
        <div class="welcome">
            <center><font size="6" color="whitesmoke" style="font-weight: bold;">
            WELCOME TO OUR RESTAURANT , TASTE OF KOREA</font></center>
        </div>
        <center><button type="button" class="b"><b>
                 <a href="food_menu.php?res_id=3" style="color:white;text-decoration:none;font-size:20px;">
                     Wanna order?
                </a></b>
        <button type="button" class="b"><b>
                 <a href="reservation.php?res_id=3" style="color:white;text-decoration:none;font-size:20px;">
                     Dine-in
                </a></b>
            </button>
            <button type="button" class="b"><b>
                 <a href="food_menu.php?res_id=3&choice=3" style="color:white; text-decoration:none; font-size:20px;">
                     Takeaway
                </a></b>
            </button></center>
    </div>

    <div class="icon1">
        <div class="icon">
            <center><i class="bi bi-hand-thumbs-up" style="font-size:50px;"></i></center>
        </div>
       <center>
           <font size="3" style="font-family:'Times New Roman', Times, serif;"><b><font size="6px">900</font><br>Satisfied guests</b></font>
        </center>
    </div>
    <div class="icon2">
        <div class="icon">
            <center><img src="Photos/icon2.jpg"  width="60%" height="90px"></center>
        </div> 
        <center>
             <font size="3" style="font-family:'Times New Roman', Times, serif;"><b><font size="6px">60</font><br>Orders every day</b></font></b>
        </center>
    </div>
    <div class="icon3">
        <div class="icon">
            <center><img src="Photos/icon3.jpeg"  width="80%" height="90px"></center>
        </div>
        <center>
              <font size="3" style="font-family:'Times New Roman', Times, serif;"><b> <font size="6px">10</font><br>Chefs</b></font>
        </center>
    </div>
    <div class="icon4">
        <div class="icon">
            <center><img src="Photos/icon4.jpeg"  width="50%" height="90px"></center>
        </div>
       <center><font size="3" style="font-family:'Times New Roman', Times, serif;"><b> <font size="6px">25</font> <br>Family tables</b></font></center>
    </div>

    <br>
    <center><font size="7"  style="font-weight: bold;font-family:Sofia,sans-serif;">
        Bestsellers </font></center>
  
    
   <div class="container">

    <div class="card">
      <div class="bar">
        <div class="filledbar"></div>
      </div>
      <img src="Photos/Chicken Gimbap.jpg" height="400px" width="300px">

      <a href="food_menu.php?res_id=3" class="message" style="color:white; text-decoration:none;">
        Chicken Gimbap
      </a>
    </div>

    <div class="card">
      <div class="bar">
        <div class="filledbar"></div>
      </div>
      <img src="Photos/Veg Omurice.jpg" height="400px" width="300px">

      <a href="food_menu.php?res_id=3" class="message" style="color:white; text-decoration:none;">
        Veg Omurice
      </a>
    </div>

    <div class="card">
      <div class="bar">
        <div class="filledbar"></div>
      </div>
      <img src="Photos/Pork Ramyeon.jpg" height="400px" width="300px">

      <a href="food_menu.php?res_id=3" class="message" style="color:white; text-decoration:none;">
        Pork Ramyeon
      </a>
    </div>

    <div class="card">
      <div class="bar">
        <div class="filledbar"></div>
      </div>
      <img src="Photos/Pork Kimchi Deopbap.jpg" height="400px" width="300px">

      <a href="food_menu.php?res_id=3" class="message" style="color:white; text-decoration:none;">
        Pork Kimchi Deopbap
      </a>
    </div>

  </div>

  <h1 class="heading">
        <span>C</span>
        <span>O</span>
        <span>N</span>
        <span>T</span>
        <span>A</span>
        <span>C</span>
        <span>T</span>
        <span>U</span>
        <span>S</span>
    </h1>
    
    <div style="float:left;">
        <img src="Photos/img10.jpg" height="400px" width="600px">
    </div>

     <div class="c">
        <form action="" id="goK">
            <table>
             <tr>
                <td><input type="text" placeholder="Name"></td>
                <td><input type="text" placeholder="Email"> </td>
             </tr>
             <tr>
                <td><input type="text" placeholder="Phone number"></td>
                <td><input type="number" placeholder="Number"></td>
             </tr>
             <tr>
               <td colspan="2"><textarea rows="5" cols="58" name="message"></textarea></td>
            </tr>
           </table>
            <input type="submit">
      </form>
     </div>
       
       <?php  

        //  $review_id=$_SESSION['review_id'];
         $review_id=3;
         $sql="SELECT *FROM review WHERE Res_ID='3' ORDER BY $review_id";
         $result =$mysqli->query($sql);
         if ($result->num_rows > 0 ) 
         {
          while($row = $result->fetch_assoc()) 
          {
            echo'<div class="review">
           <div class="r">
              <img src="Photos/'.$row["Cus_img"].'" height="210px" width="210px" style="border-radius: 50%;">
           </div>
           <center><div class="stars">';
           for($i=1;$i<=$row['Rating'];$i++) {
          echo '
          <i class="fas fa-star"></i>';
           }
            
            echo "Name: " . $row["Name"]. "<br>" . $row["Review"];
           }
         }
       echo'</div></center>';    
    $mysqli->close();
        ?>
<br><br><br><br><br>
    </body>
    </html>

    <?php
}
?>