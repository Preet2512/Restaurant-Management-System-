<!DOCTYPE html>
<html lang="en">
<?php
include("Config.php"); 
error_reporting(0);
session_start();

include_once 'food_cart.php';
if(empty($_SESSION['userid']) || empty($_SESSION['success'])) 
{
	header('location:customer_login.php');
}
else{ 

?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Food Menu Page</title>
    <link href="css/food_menu.css" rel="stylesheet"> </head>

<body>
    
<header>
<h1 style="font-size: 2rem;
  margin: 1 rem;
  color: #FFF;
  font-weight: bold;
  font-family: 'Sofia',sans-serif;">
<?php $ress= mysqli_query($mysqli,"select * from Restaurant where Res_ID='$_GET[res_id]'");
	$rows=mysqli_fetch_array($ress); 
    echo $rows['Res_Name'];
    $img=$rows["Res_img"];
    ?>
</h1>
<nav>
    <ul type="none" >
        <?php 
            if($_GET['res_id']==1)
                echo '<li> <a class="active" href="Mughlai.php">Home </a> </li>';
            else if($_GET['res_id']==2)
                echo '<li> <a class="active" href="chinese.php">Home </a> </li>';
            else if($_GET['res_id']==3)
                echo '<li> <a class="active" href="Korean.php">Home </a> </li>';
            else if($_GET['res_id']==4)
                echo '<li> <a class="active" href="italian.php">Home </a> </li>';
        ?>
        <li> <a class="active" href="index.php">Restaurants</a> </li>
	    <?php
			if(empty($_SESSION["userid"]))
			{
				echo '<li><a href="customer_login.php" class="active">Login</a> </li>
					  <li><a href="customer_register.php" class="active">Register</a> </li>';
			}
			else
			{
		    	echo  '<li><a href="orders.php" class="active">My Orders</a> </li>';
				echo  '<li><a href="customer_logout.php" class="active">Logout</a> </li>';
			}
		?>
    </ul>
        </nav>
        </header>
        
        <div class="top-links">
                    <ul type="none">
                      
                        <li class="nav-item"><span class="s">1</span><a href="Restaurant.php">Choose Restaurant</a></li>
                        <li class="nav-item"><span class="s">2</span><a href="food_menu.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
                        <li class="nav-item"><span class="s">3</span><a href="checkout.php">Order and Pay</a></li>
                        
                    </ul>
            </div>
              
              <?php
                
                if($_GET['res_id']==1) {
                    ?>
                    <div style="background-image: url(Photos/mughlai.jpg);
                height:500px;
                width:1506px;
                background-size:1506px 500px;
                background-repeat:no-repeat;
                margin-left: 0;
                margin-right: 0;">
                    <h2 style="font-align:center"><strong>Welcome to our Mughlai Restaurant</h2>
                    <p style="font-align:center;font-size: 1.51rem;color:rgb(201, 250, 250);margin:0;padding-left:350px;">Enjoy authentic Mughlai cuisine prepared with fresh ingredients.</p>
               <?php } 
               else if($_GET['res_id']==2) { ?>
               <div style="background-image: url(Photos/chinese.jpg);
                 height:400px;
                width:1506px;
                background-size:1506px 400px;
                background-repeat:no-repeat;
                margin-left: 0;
                margin-right: 0;">
                <h2><strong>Welcome to our Chinese Restaurant</h2>
                    <p style="font-align:center;font-size: 1.5rem;color:rgb(251, 253, 253);margin:0;padding-left:350px;">Enjoy authentic Chinese cuisine prepared with fresh ingredients.</strong></p>
               <?php }
               else if($_GET['res_id']==3) {?>
               <div style="background-image: url(Photos/korean.jpg);
                 height:500px;
                width:1506px;
                background-size:1506px 500px;
                background-repeat:no-repeat;
                margin-left: 0;
                margin-right: 0;">
                <h2 style="font-align:center"><strong>Welcome to our Korean Restaurant</h2>
                <p style="font-align:center;font-size: 1.5rem;color:rgb(201, 250, 250);margin:0;padding-left:350px;">Enjoy authentic Korean cuisine prepared with fresh ingredients.</strong></p>
               <?php }
               else if($_GET['res_id']==4) {?>
               <div style="background-image: url(Photos/italian.jpg);
                 height:500px;
                width:1506pxpx;
                background-size:1506px 500px;
                background-repeat:no-repeat;
                margin-left: 0;
                margin-right: 0;">
                <h2 style="font-align:center"><strong>Welcome to our Italian Restaurant</h2>
                <p style="font-align:center;font-size: 1.5rem;color:rgb(251, 253, 253);margin:0;padding-left:430px;">Enjoy authentic Italian cuisine prepared with fresh ingredients.</p>
               <?php } ?>
                      
               </div>
               <br><br>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        
                         <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Your Cart
                              </h3>
							  				  
							  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">
									
									
	<?php

$item_total = 0;

foreach ($_SESSION["cart_item"] as $item)  
{
?>									
									
                                        <div class="title-row">
										<?php echo $item["fname"]; 
                                        if($_GET['choice']==3) {?>
                                        <a href="food_menu.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["fid"]; ?>&choice=3" >
                                        <i class="fa fa-trash pull-right"></i></a>
                                        <?php }
                                        else {?>
                                        <a href="food_menu.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["fid"]; ?>" >
                                        <i class="fa fa-trash pull-right"></i></a>
                                        <?php } ?>
										
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "Rs.".$item["fprice"]; ?> readonly id="exampleSelect1">
                                                   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                        
									  </div>
									  
	<?php
$item_total += ($item["fprice"]*$item["quantity"]); 
}
?>								  
									  
									  
									  
                                    </div>
                                </div>
                               
                         
                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong><?php echo "Rs.".$item_total; ?></strong></h3>
                                        
                                        <?php
                                          if($_GET['choice']==3){
                                            if($item_total!=0){
                                        ?>
                                           <a href="takeaway.php?res_id=<?php echo $_GET['res_id'];?>"  class="btn btn-success btn-lg active">Takeaway</a>
                                           <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-danger btn-lg disabled">Checkout</a>

                                        <?php
                                            }
                                            else { ?>
                                                <a href="takeaway.php?res_id=<?php echo $_GET['res_id'];?>"  class="btn btn-success btn-lg disabled">Takeaway</a> 
                                                <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-danger btn-lg disabled">Checkout</a>
                                           <?php }
                                          }
                                          else{
                                        ?>
                                           <a href="takeaway.php?res_id=<?php echo $_GET['res_id'];?>"  class="btn btn-success btn-lg disabled">Takeaway</a>

                                        <?php
                                        if($item_total==0){
                                        ?>
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-danger btn-lg disabled">Checkout</a>

                                        <?php
                                        }
                                        else{ 
                                        ?>
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn btn-success btn-lg active">Checkout</a>
                                        <?php   
                                        }
                                    }
                                        ?>

                                        
                                    </div>
                                </div>
								
						
								
								
                            </div>
                    </div>

                    <div class="col-md-8">
                      
             
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              MENU 
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            
						<?php  
									$stmt = $mysqli->prepare("select * from Food where Res_ID='$_GET[res_id]' order by Features desc");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
						
												if(strcmp($product['Available'],'Yes')==0) {	
													 
													 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                            <?php
                                                if($_GET['choice']==3) { ?>
                                                    <form method="post" action='food_menu.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['Food_ID']; ?>&choice=3'>
                                                <?php }
                                                    else { ?>
                                                        <form method="post" action='food_menu.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['Food_ID']; ?>'>
                                                 <?php   } ?>
										
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="Photos/'.$product['Image_path'].'" alt="Food logo">'; ?></a>
                                            </div>
                                
                                            <div class="rest-descr">
                                                <h5><a href="#"><?php echo $product['Food_Name']; ?></a></h5>
                                                <p> <?php echo $product['Description']; ?></p>
                                                <?php
                                                    if(strcmp($product['Features'],'On')==0) { ?>
                                                        <p style="color: #1f74c9; font-size: 15px; font-weight: 500; padding-top: 0">Recommended</p>
                                                    <?php } ?>
                                            </div>
                           
                                        </div>
                               
                                        <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info"> 
										<span class="price pull-left" >Rs. <?php echo $product['Price']; ?>/-</span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
                                          <br><br>
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add To Cart" />
										</div>
										</form>
                                    </div>
              
                                </div>
                
								
								<?php
									  }
                                      else {
                                            ?>
                                          <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="Photos/'.$product['Image_path'].'" alt="Food logo">'; ?></a>
                                            </div>
                                
                                            <div class="rest-descr">
                                                <h5><a href="#"><?php echo $product['Food_Name']; ?></a></h5>
                                                <p> <?php echo $product['Description']; ?></p>
                                            </div>
                           
                                        </div>
                               
                                        <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info"> 
										<span class="price pull-left" >Rs. <?php echo $product['Price']; ?>/-</span>
										  
                                          <br><br>
										  <button class="btn btn-danger" style="margin-left:40px;">Unavailable</button>
										</div>
										</form>
                                    </div>
              
                                </div>  
                                      <?php 
                                      }
									}
                                }
								?>
								
								
                              
                            </div>
             
                        </div>
            
                       
                    </div>
                    
                </div>
     
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>     
            
</body>
</html>

<?php
}
?>