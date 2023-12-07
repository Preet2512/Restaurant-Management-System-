<!DOCTYPE html>
<html lang="en">
<?php
include("Config.php");
error_reporting(0);
session_start();

if(empty($_SESSION['userid']) || empty($_SESSION['success']))
{
	header('location:cutomer_login.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/orders.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

	</head>

<body>
    
<header>
<h1 style="font-size: 2rem;
  margin: 1 rem;
  color: #FFF;
  font-weight: bold;
  font-family: 'Sofia',sans-serif;">
	Spice It Up
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
				echo  '<li><a href="cutomer_logout.php" class="active">Logout</a> </li>';
			}
		?>
    </ul>
        </nav>
        </header>
        



    <div class="top-links">
        <ul type="none">
            <li class="nav-item"><span class="s">1</span><a class="a" href="Restaurant.php">Choose Restaurant</a></li>
            <li class="nav-item"><span class="s">2</span><a href="food_menu.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
            <li class="nav-item"><span class="s">3</span><a href="#">Order and Pay</a></li>
        </ul>
    </div>
                    <div style="background-image: url(Photos/Restaurant1.jpg);
                height:500px;
                width:1506px;
                background-size:1506px 500px;
                background-repeat:no-repeat;
                margin-left: 0;
                margin-right: 0;">
			   </div>
    
        <br><br>
        <div class="container">            
            <table class="table table-bordered table-hover">
			    <thead style = "background: #404040; color:white;">
					<tr>
				        <th>Food Item</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Status</th>
					</tr>
			    </thead>
			    <tbody>
				<?php 
				    $query_res= mysqli_query($mysqli,"select * from Orders where User_ID='".$_SESSION['userid']."'");
					if(!mysqli_num_rows($query_res) > 0 )
					{
						echo '<td colspan="4"><center>You have No orders Placed yet. </center></td>';
					}
					else
					{			      
					    while($row=mysqli_fetch_array($query_res))
						{
							?>
							<tr>	
						        <td data-column="Item"> <?php echo $row['Order_Name']; ?></td>
								<td data-column="Quantity"> <?php echo $row['Quantity']; ?></td>
								<td data-column="Price">Rs.<?php echo $row['Price']; ?></td>
								<td data-column="Status"> 
								<?php 
									$status=$row['Status'];
									if($status=="" or $status=="NULL")
									{
										?>
										<button type="button" class="btn btn-info"><i class="fa fa-bars"></i> Dispatch</button>
									    <?php 
									}
									if($status=="in process")
									{ ?>
									    <button type="button" class="btn btn-warning"><i class="fa fa-cog fa-spin"></i> On The Way!</button>
										<?php
									}
									if($status=="closed")
									{
										?>
									    <button type="button" class="btn btn-success" ><i class="fa fa-check-circle"></i> Delivered</button>
										<a href="review.php?res_id=<?php echo $row['Res_ID']; ?>"><button type="button" class="btn theme-btn" ><i class="fa fa-comments"></i> Give us your review</button></a> 
										<?php 
									} 
																			?>
														   
														   
														   
														   
														   
														   
														   </td>
														 
												</tr>
												
											
														<?php }} ?>					
							
							
										
						
						  </tbody>
					</table>
						
					<br><br>
					<table class="table table-bordered table-hover">
			    <thead style = "background: #404040; color:white;">
					<tr>
						<th>Takeaway Code</th>
				        <th>Food Item</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Status</th>
					</tr>
			    </thead>
			    <tbody>
				<?php 
				    $query_res1= mysqli_query($mysqli,"select * from Takeaway where User_ID='".$_SESSION['userid']."'");
					if(!mysqli_num_rows($query_res1) > 0 )
					{
						echo '<td colspan="4"><center>You have No orders Placed yet. </center></td>';
					}
					else
					{			      
					    while($row1=mysqli_fetch_array($query_res1))
						{
							?>
							<tr>
								<td data-column="Item"> <?php echo $row1['Takeaway_code']; ?></td>	
						        <td data-column="Item"> <?php echo $row1['Order_Name']; ?></td>
								<td data-column="Quantity"> <?php echo $row1['Quantity']; ?></td>
								<td data-column="Price">Rs.<?php echo $row1['Tot_price']; ?></td>
								<td data-column="Status"> 
								<?php 
									$status=$row1['Status'];
									if($status=="" or $status=="NULL")
									{
										?>
										<button type="button" class="btn btn-info"><i class="fa fa-bars"></i> Order Placed</button>
									    <?php 
									}
									
									if($status=="paid")
									{
										?>
									    <button type="button" class="btn btn-success" ><i class="fa fa-check-circle"></i> Order Taken</button>
										<?php 
									} 
																			?>
														   
														   
														   
														   
														   
														   
														   </td>
														 
												</tr>
												
											
														<?php }} ?>					
							
							
										
						
						  </tbody>
					</table>
					
                                    
                                                </div>
            


            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>     
     
</body>

</html>
<?php
}
?>