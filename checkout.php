<!DOCTYPE html>
<html lang="en">
<?php
include("Config.php");
include_once 'food_cart.php';
error_reporting(0);
session_start();

$tot_sum=0;
function function_alert() { 
      

    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('Bill.php');</script>"; 
} 

if(empty($_SESSION['userid']) || empty($_SESSION['success']))
{
	header('location:customer_login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["fprice"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into Orders(User_ID,Order_Name,Quantity,Price,Res_ID) values('".$_SESSION["userid"]."','".$item["fname"]."','".$item["quantity"]."','".$item["fprice"]."','".$item["res_id"]."')";
						
														mysqli_query($mysqli,$SQL);
											

                                                        function_alert();

														
														
													}
												}
?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customer Checkout Page</title>
    <link href="css/checkout.css" rel="stylesheet"> </head>

<body>
    
<header>
<h1>
<?php $ress= mysqli_query($mysqli,"select * from Restaurant where Res_ID='$_GET[res_id]'");
	$rows=mysqli_fetch_array($ress); 
    echo $rows['Res_Name'];
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
            <div class="image">
              
                          
            </div>
			
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "Rs. ".$item_total."/-"; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Charges</td>
                                                        <td>Rs. 30/-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GST applied</td>
                                                        <td>5%</td>
                                                    </tr>
                                                    <?php 
                                                        $tot_sum=($item_total+($item_total*0.05))+30;
                                                    ?>
                                                    <tr>
                                                        <td class="text-color"><strong>Net amount payable(including 5% GST)</strong></td>
                                                        <td class="text-color"><strong> <?php echo "Rs. ".$tot_sum."/-"; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio"><span class="custom-control-description"> Cash on Delivery</span>
                                                </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit"  class="btn btn-success btn-block" value="Order Now"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
            
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>     
            
</body>

</html>

<?php
}
?>
