<!DOCTYPE html>
<html lang="en">
<?php
include("Config.php");
// error_reporting(0);
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>
<body>
    <div class="heading">
      <br>
        <div class="heading1">
            <a href="#" style="color:white; text-decoration:none;"><i  class="bi bi-house-check"></i>Home</a>
        </div>
<?php
      if(empty($_SESSION['userid']) || empty($_SESSION['success'])) { ?>
        <div class="heading3">
           <a href="customer_login.php" style="color:white; text-decoration:none;"><i class="fa fa-user-check"></i>Login</a>
        </div>

        <div class="heading4">
           <a href="customer_register.php" style="color:white; text-decoration:none;"> <i class="fa fa-user"></i> Register</a>
        </div>
      <?php } 
      else if(!empty($_SESSION['userid']) && !empty($_SESSION['success'])) {
        echo '<div class="heading4">
        <a href="customer_logout.php" style="color:white; text-decoration:none;"> <i class="fa fa-sign-out-alt"></i> Logout</a>
     </div>';
      }
      ?>
    </div>

    <div class="image">
        <div class="welcome">
            <center><font size="6" color="whitesmoke" style="font-weight: bold;">
            WELCOME TO OUR RESTAURANT , SPICE IT UP</font></center>
        </div>
    </div>

    <br>
    <center><font size="5"  style="font-weight: bold;font-family:Sofia,sans-serif;">
        Choose a restaurant according to your favourite cuisine </font></center>
  
    <div class="restraunt">  
       
        <div class="r">
           Meet your Hunger
        </div>
        <div class="overlay">
                    <div class="text"><font size="4"  style="font-weight: bold;font-family:Sofia,sans-serif;">Indian</font></div>
        </div> 
        <div class="i">
            <img src="Photos/img2.jpg"  width="320px" height="225px">
        </div>
        <a href="Mughlai.php" class="message" style="color:white; text-decoration:none;">
             Wanna visit?
        </a>
      
    </div>



    <div class="restraunt">
        <div class="r">
           Wok-N-Grill
        </div>
        <div class="overlay">
                    <div class="text"><font size="4"  style="font-weight: bold;font-family:Sofia,sans-serif;">Chinese</font></div>
        </div> 
        <div class="i">
           <img src="Photos/img3.jpg"  width="320px" height="225px">
        </div>
        <a href="chinese.php" class="message" style="color:white; text-decoration:none;">
             Wanna visit?
             </a>
    </div>

    <div class="restraunt">
        <div class="r">
          Taste of Korea
        </div>
        <div class="overlay">
                    <div class="text"><font size="4"  style="font-weight: bold;font-family:Sofia,sans-serif;">Korean</font></div>
        </div> 
        <div class="i">
            <img src="Photos/img4.jpeg"  width="320px" height="225px">
        </div>
        <a href="Korean.php" class="message" style="color:white; text-decoration:none;">
             Wanna visit?
             </a>
    </div>

    <div class="restraunt">
        <div class="r">
            Buon Appetito
        </div>
        <div class="overlay">
                    <div class="text"><font size="4"  style="font-weight: bold;font-family:Sofia,sans-serif;">Italian</font></div>
        </div> 
        <div class="i">
            <img src="Photos/img5.jpg"  width="320px" height="200px">
        </div>
        <a href="italian.php" class="message" style="color:white; text-decoration:none;">
             Wanna visit?
             </a> 
    </div>

    <div class="whole">
    
      <center><font size="8"  style="font-weight: bold;font-family:Sofia,sans-serif;">Spice it up</font></center>

      <div class="story"> 
        <font size="5"  style="font-weight: bold;font-family:Sofia,sans-serif;">
            <center><font size="6" style="font-weight: bold;font-family:Sofia,sans-serif;">Our policy</font></center>
        <p>Our employee's  give customers exactly what they want. They provide the right products and
         the right service to all the customers and potential customers. We provide 
         products and services to meet the expectations of our customers. <br></p>
         
        <p>Customer Service applies to all types of customers, these include; individuals, groups, people from different 
         cultures and people with specific needs.</p>
        </font>
      </div>

     <div class="pic">

        <div class="container">
            <input type="radio" name="slider" id="item-1" checked>
            <input type="radio" name="slider" id="item-2">
            <input type="radio" name="slider" id="item-3">
          <div class="cards">
            <label class="card" for="item-1" id="song-1">
              <img src="Photos/Chicken Hakka Noodles.jpg" width="60%" height="100%" >
            </label>
            <label class="card" for="item-2" id="song-2">
              <img src="Photos/Egg Ramyeon.jpg" width="60%" height="100%">
            </label>
            <label class="card" for="item-3" id="song-3">
              <img src="Photos/Margherita Con Bufala.jpg" alt="song">
            </label>
          </div>


        </div>
     </div>
   </div>

   <div class="easy">
    <center><font size="8" color="gold">Easy to order</font></center>
     
    <div class="how">
        <div class="number">
           <i class="bi bi-1-circle"></i>
        </div>
       <center><div class="divicon">
                    <i class="fa fa-store"></i>
                    <br>
               </div>
       </center>
            <font size="4" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">Choose your restaurant.</font>
            <br>
            <font size="2" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">
                We"ve got your covered with menus from a variety of delivery restaurants online.</font>
     </div>

     <div class="how">
        <div class="number">
            <i class="bi bi-2-circle"></i>
         </div>
        <center><div class="divicon">
                  <i class="fa fa-utensils"></i>
                 <br>
                </div>
        </center>
           <font size="4" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">Choose a dish.</font>
           <br>
           <font size="2" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">
            We"ve got your covered with a variety of delivery restaurants online.</font>
    </div>

    <div class="how">
        <div class="number">
            <i class="bi bi-3-circle"></i>
         </div>
         <center><div class="divicon">
                <i class="fa fa-truck"></i>
                <br>
                </div>
            </center>
          <font size="4" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">Pick up or delivery.</font>
          <br>
          <font size="2" color="white" style="font-weight: bold;font-family:Sofia,sans-serif;">
            Get your food delivered! And enjoy your meal! </font>
    </div>
   
  </div>

   </div>

   <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d3150.1829966583578!2d23.75232003459512!3d37.85600838634192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m3!3m2!1d37.8566691!2d23.752137599999998!4m0!5e0!3m2!1sel!2sgr!4v1524459240043"
    style="width:1506px;  height:250px; border:0;" allowfullscreen=""></iframe>
    </body>
    </html>