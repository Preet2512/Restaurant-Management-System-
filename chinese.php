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
<html>
<head>
	<title>Chinese Restaurant</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="
sha384-1BmE4kBq781YhF1dvKuhfTAU6a8t194WrHftJDbrCEXSU1oBoqy12QvZ6jIW3" crossorigin-"anonymous">
<!-- Bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/chinese_home.css">
</head>
<body>
	<header>
		<h1>Wok-N-Grill</h1>
		<nav>
			<ul>
				<li><a href="index.php"><i class="bi bi-house-fill"></i>Home</a></li>
				<li><a href="food_menu.php?res_id=2"><i class="bi bi-book-fill"></i>Menu</a></li>
            <li><a href="gallery_c.html"><i class="bi bi-image-fill"></i>Gallery</a></li>
				<li><a href="about_c.html"><i class="bi bi-info-circle-fill"></i>About Us</a></li>
				<li><a href="contact_c.html"><i class="bi bi-telephone-fill"></i>Contact Us</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section class="hero">
			<h2>Welcome to Wok-N-Grill</h2>
			<p>Discover the authentic taste of Chinese cuisine with us.<br>We offer a variety of dishes to satisfy your cravings.</p>
			<a href="food_menu.php?res_id=2" class="cta">Order Now</a>
      <a href="reservation.php?res_id=2" class="cta">Dine-In</a>
          <a href="food_menu.php?res_id=2&choice=3" class="cta">
                     Takeaway
                </a>
		</section>
    <div class="blog-container">
      <div class="blog-card">
      <div class="popping-header">
                <h1 class="text-center">Best Sellers</h1>
            </div>

         <input type="radio" name="select" id="tap-1" checked>
         <input type="radio" name="select" id="tap-2">
         <input type="radio" name="select" id="tap-3">
         <input type="radio" name="select" id="tap-4">
         <input type="checkbox" id="imgTap">
         <div class="sliders">
            <label for="tap-1" class="tap tap-1"></label>
            <label for="tap-2" class="tap tap-2"></label>
            <label for="tap-3" class="tap tap-3"></label>
            <label for="tap-4" class="tap tap-4"></label>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-1" src="Photos/Chicken Hakka Noodles.jpg">
            </label>
            <div class="content content-1">
            <br><br>
               <div class="title">
               Chicken Hakka Noodles
               </div>
               <div class="text">
               Wok Tossed Noodles With Chicken And Cabbage, Carrot, Capsicum In Light And Black Soya.
               </div>
               <a href="food_menu.php?res_id=2"><button>Order Now</button></a>
            </div>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-2" src="Photos/Kung Pao Chicken.jpg">
            </label>
            <div class="content content-2">
              
               <div class="title">
               Kung Pao Chicken
               </div>
               <div class="text">
               A spicy, stir-fried Chinese dish made with cubes of chicken, peanuts, vegetables, and chili peppers.
               </div>
               <a href="food_menu.php?res_id=2"><button>Order Now</button></a>
            </div>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-3" src="Photos/Chicken Steam Momo.jpg">
            </label>
            <div class="content content-3">
              
               <div class="title">
               Chicken Steam Momo
               </div>
               <div class="text">
               Momo Stuffed With Mix Of Soft Juicy Boneless Chicken.
               </div>
               <a href="food_menu.php?res_id=2"><button>Order Now</button></a>
            </div>
         </div>
         <div class="inner-part">
            <label for="imgTap" class="img">
            <img class="img-4" src="Photos/Chilly Garlic Baby Corn and Button Mushroom.jpg">
            </label>
            <div class="content content-4">
            
               <div class="title">
               Chilly Garlic Baby Corn and Button Mushroom
               </div>
               <div class="text">
               Crunchy, crispy, and wonderfully flavorful Chilli baby corn with button mushroom.
               </div>
               <a href="food_menu.php?res_id=2"><button>Order Now</button></a>
            </div>
         </div>
      </div>
      <div class="blog-contain">
      <div class="blog-text">
            <h1 class="text-center">Story</h1>
            <p>In the heart of a bustling city, nestled amidst a vibrant cultural tapestry, stood a humble Chinese restaurant. Under the guidance of a visionary chef, each dish crafted in its kitchen was a masterpiece, tantalizing taste buds and transcending expectations. The flavors danced on the tongue, weaving tales of tradition and innovation. Word of mouth spread like wildfire, drawing curious epicureans from far and wide. With relentless dedication, the restaurant carved a niche for itself, ultimately earning the prestigious Michelin star. This accolade not only celebrated their culinary prowess but also showcased the harmonious fusion of artistry and authenticity that made their dining experience truly unforgettable. </p>
        </div>
</div>
</div>
<h2>Reviews</h2>
<?php  

//  $review_id=$_SESSION['review_id'];
 $review_id=3;
 
 $sql="SELECT *FROM review WHERE Res_ID='2' ORDER BY $review_id";
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
	</main>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>