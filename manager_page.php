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
?>

<html>
<head>
    <title>Manager Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/manager.css">
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
<!-- End vertical navbar -->

 <!-- content -->
 <div class="page-content p-5" id="content">
 <h2 class="display-4 text-white">Welcome Manager!</h2>
  <p class="lead text-white mb-0">This is your dashboard.</p>
  <div class="separator"></div>
  <div class="row text-white">
  <div class="col main pt-2 mt-0">
  <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-info text-white h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-home fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Restaurant</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from Restaurant";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
															echo $rws;?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fa fa-cutlery fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Foods</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from Food";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
															echo $rws;?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Customers</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from Customer";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
															echo $rws;?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fa fa-ticket fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Reservations</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from Reservation";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
															echo $rws;?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-shopping-cart fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Total Orders</h6>
                            <h1 class="display-4">
                            <?php $sql1="select * from Orders";
									$result=mysqli_query($mysqli,$sql1); 
									 $rws=mysqli_num_rows($result);
                                $sql2="select * from Takeaway";
                                $result1=mysqli_query($mysqli,$sql2);
                                $rws1=mysqli_num_rows($result1);
                                echo $rws+$rws1;?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-spinner fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Processing Orders</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from Orders where Status='in process'";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
															echo $rws;?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-check-square-o fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Delivered Orders</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from Orders where Status='closed'";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
                                $sql1="select * from Takeaway where Status='paid'";
												      $result1=mysqli_query($mysqli,$sql1); 
													    $rws1=mysqli_num_rows($result1);
															echo $rws+$rws1;?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-inr fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Total Earning</h6>
                            <h1 class="display-4">
                            <?php 
                              $result=mysqli_query($mysqli,"SELECT SUM(Price) AS Tot_Sum FROM Orders WHERE Status='closed'");
												      $row = mysqli_fetch_assoc($result); 
                                                      
                                $result1=mysqli_query($mysqli,"SELECT SUM(Tot_price) AS Tot_Sum1 FROM Takeaway WHERE Status='paid'");
												      $row1 = mysqli_fetch_assoc($result1); 
                              $sum = $row['Tot_Sum']+$row1['Tot_Sum1'];
                              echo $sum;
                            ?>
                            </h1>
                        </div>
                    </div>
                </div>
                &ensp;&ensp;&ensp;
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body bg-warning">
                            <div class="rotate">
                                <i class="fa fa-comment fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Customer Reviews</h6>
                            <h1 class="display-4">
                            <?php $sql="select * from review";
												      $result=mysqli_query($mysqli,$sql); 
													    $rws=mysqli_num_rows($result);
															echo $rws;?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
<!-- end content --> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<?php
 }
?>