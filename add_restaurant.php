<?php
 include('Config.php');
 session_start();

 if(empty($_SESSION['managerid']) || empty($_SESSION['m_success'])) {
    header('location:manager_login.php');
  }
  else {
  $mid=$_SESSION['managerid'];
  $manager=mysqli_query($mysqli,"SELECT * FROM Manager WHERE M_ID='$mid'");
  while($m_row=$manager->fetch_assoc()){
    $m_name=$m_row['Name'];
    $m_img=$m_row['Photo'];
  }

  $phone_err=$add_err="";
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
  
  if(strlen($_POST['res_phone'])<10 || strlen($_POST['res_phone'])>10)
    $phone_err="Mobile must have 10 characters";
  else
    $res_phone=$_POST['res_phone'];

  $res_name=$_POST['res_name'];
  $res_email=$_POST['res_email'];
  $res_category=$_POST['category_name'];
  $res_addr=$_POST['res_addr'];

    if(empty($phone_err)) {
      $sql1=mysqli_query($mysqli,"select * from Restaurant where Res_Name='$res_name'");
      if($sql1->num_rows == 1)
		    {
                $add_err="Restaurant name already exists!";
            }
            else {
              $sql2=mysqli_query($mysqli,"select * from Restaurant where Res_email='$res_email'");
              if($sql1->num_rows == 1)
		          {
                $add_err="Restaurant email already exists!";
              }
              else {
                $sql3=mysqli_query($mysqli,"insert into Restaurant(Res_id,Category_ID,Res_Name,Res_email,Res_phone,Res_address) values('','$res_category','$res_name','$res_email','$res_phone','$res_addr')");
			
			          if($sql3){ 
                    echo "<script>alert('A new restaurant has now been added!')</script>";
                }
			          else
				          {echo "Error: ".$mysqli->error;}
              }
            }
    }
  }
  
?>

<html>
<head>
    <title>Add Restaurant Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/addition_manage.css">
</head>
<body>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
          <div class="media d-flex align-items-center">
            <img decoding="async" loading="lazy" src="Photos/<?php echo $m_img; ?>" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
            <div class="media-body">
              <h4 class="m-0">Manager <?php echo $m_name; ?></h4>
            </div>
          </div>
        </div>

        <a href="manager_page.php" class="nav-link text-dark bg-light"><p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p></a>

  <ul class="nav flex-column bg-white mb-0">
  <li class="nav-item"> 
      <a class="nav-link text-dark bg-light" href="#FoodSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-cutlery mr-3 text-primary fa-fw"></i>Foods&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      <i class="fa fa-caret-down mr-3 text-primary fa-fw"></i></a>
          <ul class="collapse list-unstyled" id="FoodSubmenu">
                <li><a href="view_food.php" class="nav-link text-dark bg-light"><i class="fa fa-list-ul mr-3 text-primary fa-fw"></i>All Food</a></li>
								<li><a href="add_food.php" class="nav-link text-dark bg-light"><i class="fa fa-cart-plus mr-3 text-primary fa-fw"></i>Add Food Item</a></li>
          </ul>
    </li>
    <li class="nav-item">
      <a href="view_customers.php" class="nav-link text-dark">
                <i class="fa fa-users mr-3 text-primary fa-fw"></i>
                Customers
            </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link text-dark bg-light" href="#RestaurantSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-home mr-3 text-primary fa-fw"></i>Restaurant&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      &ensp;&ensp;
      <i class="fa fa-caret-down mr-3 text-primary fa-fw"></i></a>
          <ul class="collapse list-unstyled" id="RestaurantSubmenu">
                <li><a href="view_restaurant.php" class="nav-link text-dark bg-light"><i class="fa fa-th mr-3 text-primary fa-fw"></i>All Restaurant</a></li>
								<li><a href="add_category.php" class="nav-link text-dark bg-light"><i class="fa fa-list mr-3 text-primary fa-fw"></i>Add Category</a></li>
                <li><a href="add_restaurant.php" class="nav-link text-dark bg-light"><i class="fa fa-plus-square-o mr-3 text-primary fa-fw"></i>Add Restaurant</a></li>
          </ul>
    </li>
    <li class="nav-item">
      <a href="view_orders.php" class="nav-link text-dark">
                <i class="fa fa-shopping-cart mr-3 text-primary fa-fw"></i>
                Orders
            </a>
    </li>
    <li class="nav-item">
      <a href="view_takeaway.php" class="nav-link text-dark">
                <i class="fa fa-shopping-bag mr-3 text-primary fa-fw"></i>
                Takeaways
            </a>
    </li>
    <li class="nav-item">
      <a href="view_reviews.php" class="nav-link text-dark">
                <i class="fa fa-comments mr-3 text-primary fa-fw"></i>
                Customer Reviews
            </a>
    </li>
    <li class="nav-item">
      <a href="view_reservation.php" class="nav-link text-dark">
                <i class="fa fa-ticket mr-3 text-primary fa-fw"></i>
                Reservations
            </a>
    </li>
  </ul>

  <br><br>
  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="manager_logout.php" class="nav-link text-dark">
                <i class="fa fa-sign-out mr-3 text-primary fa-fw"></i>
                Logout
            </a>
    </li>
</ul>
</div>
 <!--End vertical navbar -->

 <!-- content -->
 <div class="page-content p-5" id="content">
 <h2 class="display-4 text-white">All your restaurants are famous!</h2>
  <p class="lead text-white mb-0">Open a new restaurant to meet the hunger of more people!</p>
  <div class="separator"></div>
  <div class="row text-white">
  <div class="container">
        <div class="box">
            <div class="box-body">
                <div class="design"></div>
                <header class="title text-center">
                    <p><strong>ENTER RESTAURANT DETAILS</strong></p>
                </header>
                <form method="POST" action="" class="main-form text-center">
                  
                  <span class="error"><?php echo $add_err; ?></span>
                  <span class="error"><?php echo $phone_err; ?></span>
                    <br><br>
                <div class="form-group my-0"> 
                        <label class="my-0">
                            <input name="res_name" id="res_name" type="text" class="input" placeholder="Enter Restaurant Name" required>
                       </label>
                       &emsp;&emsp;&emsp;&emsp;
                       <label class="my-0">
                            <input name="res_email" id="res_email" type="email" class="input" placeholder="Enter Restaurant Email" required>
                       </label>
                    </div>
                    <br><br>
                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <input name="res_phone" id="res_phone" type="mobile" class="input" placeholder="Enter Restaurant Phone" required>
                       </label>
                       &emsp;&emsp;&emsp;&emsp;
                       <label class="my-0">
                       <select name="category_name" class="select" data-placeholder="Choose a Category" tabindex="1">
                                                        <option>--Select Category--</option>
                                                 <?php $ssql ="select * from Food_Category";
													$res=mysqli_query($mysqli, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{
                                                       echo' <option value="'.$row['Category_ID'].'">'.$row['Category_Name'].'</option>';;
													}  
                                                 
													?> 
													 </select>
                       </label>
                    </div>
                    <br><br>
                    <div class="form-group my-0"> 
                        <label class="my-0">
                            <input name="res_addr" id="res_addr" type="textarea" placeholder="Enter Restaurant Address" class="input" required>
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>
                            <input type="submit" name="add" value="Add Restaurant" class="form-control btn">
                        </label>    
                    </div>      
                    </form>
            </div>
        </div>
    </div>

</div>
<!-- end content --> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>

<?php
 }
?>