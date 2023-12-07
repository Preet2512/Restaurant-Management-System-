<!DOCTYPE html>
<html lang="en">
<?php
include("Config.php");
// error_reporting(0);
session_start();

if(empty($_SESSION['userid']) || empty($_SESSION['success'])) {
  header('location:customer_login.php');
}
else {
  
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_Mughlai.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<body>
    
  <div class="hi">
    <div class="heading1">
       <img src="Photos/img6.png"  width="200px" height="100px">
    </div>
    <div class="heading2">
             <a href="index.php" style="color:white; text-decoration:none;"><i  class="bi bi-house-check"></i>Home</a>
    </div>
    <div class="heading3">
             <a href="food_menu.php?res_id=1" style="color:white; text-decoration:none;"><i class="bi bi-book"></i>Menu</a>
    </div>
    <div class="heading4">
             <a href="Mughlai_gallery.html" style="color:white; text-decoration:none;"><i  class="bi bi-images"></i>Gallery</a>
    </div>
    <div class="heading5">
             <a href="#go" style="color:white; text-decoration:none;"><i  class="bi bi-telephone"></i>Contact Us</a>
    </div>
    <div class="heading6">
         <a href="Mughlai_about.html" style="color:white; text-decoration:none;"><i  class="bi bi-question-circle"></i>About us</A>
    </div>
 </div>
 
    <div class="foodpic">
        <div class="f">
           <font size="7" color="whitesmoke" ><b> Made with love</b></font>
           <br>
           <br>
           <font size="4" color="whitesmoke" ><b> Order tasty & fresh food at any time<br>
            </b></font>
            <br>
            <br>
            <button type="button" class="b"><b><font size="5">
                 <a href="food_menu.php?res_id=1" style="color:white; text-decoration:none; size:5;">
                     Wanna order?
                </a></font></b>
            </button>
            <button type="button" class="b"><b><font size="5">
                 <a href="reservation.php?res_id=1" style="color:white; text-decoration:none; size:5;">
                     Dine-in
                </a></font></b>
            </button>
            <button type="button" class="b"><b><font size="5">
                 <a href="food_menu.php?res_id=1&choice=3" style="color:white; text-decoration:none; size:5;">
                     Takeaway
                </a></font></b>
            </button>
        </div>
        <div class="food1">
            <img src="Photos/img8.jpg" width="200px" height="280px">
        </div> 
        <div class="food2">
            <img src="Photos/img9.jpg" width="200px" height="280px">
         </div> 
        <div class="food3">
            <center><b><u style="c">Our story</u></b>
           <p style="text-align:left;"> The first outlet was brought into existence in 1929 in Zakaria Street serving the famous Awadhi cuisine of Lucknow. 
             Today, Aminia, is being run by its third and fourth generation. Aminia, being a legacy of 90 years, has been profoundly 
             emphasizing on its taste and aromatic chemistry of the spices that blend in perfectly. Besides this, Aminia has its
              butchery to make sure that only fresh and hand-picked meat is being consumed by our clientele.</p>
              <p style="text-align: left;">Aminia believes in societal welfare and philanthropic orientations. We are an active supporter of Tiljala SHED and 
             also contribute to many old age homes and orphanages. Also, the paintings displayed in the Rajarhat and Behala outlet
              are done by the children from NGOs.</p>
            </center>
        </div> 
    </div>

    <br><br><br>
    <div class="quote">
       It's not just food it's an experience
    </div>

    <div class="icon1">
        <div class="icon">
            <center><i class="bi bi-hand-thumbs-up" style="font-size:50px;"></i></center>
        </div>
       <center>
           <font size="3" style="font-family:'Times New Roman', Times, serif;"><b><font size="6px">1000</font><br>Satisfied guests</b></font>
        </center>
    </div>
    <div class="icon2">
        <div class="icon">
            <center><img src="Photos/icon2.jpg"  width="60%" height="90px"></center>
        </div> 
        <center>
             <font size="3" style="font-family:'Times New Roman', Times, serif;"><b><font size="6px">150</font><br>Orders every day</b></font></b>
        </center>
    </div>
    <div class="icon3">
        <div class="icon">
            <center><img src="Photos/icon3.jpeg"  width="80%" height="90px"></center>
        </div>
        <center>
              <font size="3" style="font-family:'Times New Roman', Times, serif;"><b> <font size="6px">18</font><br>Chefs</b></font>
        </center>
    </div>
    <div class="icon4">
        <div class="icon">
            <center><img src="Photos/icon4.jpeg"  width="50%" height="90px"></center>
        </div>
       <center><font size="3" style="font-family:'Times New Roman', Times, serif;"><b> <font size="6px">55</font> <br>Family tables</b></font></center>
    </div>
<br>
    <div class="quote">
       Bestsellers
    </div>
    
    <br>
<div class="container">

<div class="card">
  <div class="bar">
    <div class="filledbar"></div>
  </div>
  <img src="Photos/Butter Chicken.jpg" height="400px" width="300px">

  <a href="food_menu.php?res_id=1" class="message" style="text-decoration:none;"> 
     Butter Chicken
  </a>
</div>

<div class="card">
  <div class="bar">
    <div class="filledbar"></div>
  </div>
  <img src="Photos/Laccha Paratha.jpg" height="400px" width="300px">

  <a href="food_menu.php?res_id=1" class="message" style="text-decoration:none;">
      Laccha Paratha
  </a>
</div>

<div class="card">
  <div class="bar">
    <div class="filledbar"></div>
  </div>
  <img src="Photos/Gajar ka halwa.jpg" height="400px" width="300px">

  <a href="food_menu.php?res_id=1" class="message" style="text-decoration:none;">
    Gajar ka halwa
  </a>
</div>

<div class="card">
  <div class="bar">
    <div class="filledbar"></div>
  </div>
  <img src="Photos/Chicken Biryani.jpg" height="400px" width="300px">

  <a href="food_menu.php?res_id=1" class="message" style="text-decoration:none;">
     Chicken Biryani
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
        <form action="" id="go">
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
         $sql="SELECT *FROM review WHERE Res_ID='1' ORDER BY $review_id";
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
            
            echo "Name: " . $row["Name"]. " " . $row["Review"];
           }
         }
       echo'</div></center>';    
    $mysqli->close();
        ?>
        <br><br>


</body>
</html>

<?php
}
?>