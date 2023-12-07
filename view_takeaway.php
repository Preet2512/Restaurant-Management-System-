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
    <title>Takeaway Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/update_manage.css">
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
 <h2 class="display-4 text-white">Orders placed at your restaurant</h2>
  <p class="lead text-white mb-0">Wow! So many orders! You're gonna be busy now!! Manage your orders here!</p>
  <div class="separator"></div>
<div class="row text-white">
   <?php
$sql1=mysqli_query($mysqli,"SELECT * FROM Takeaway");

echo "<table class='table table-dark table-hover' >";
echo "<thread>";
echo "<tr>";
echo "<th>Takeaway Code</th><th>Customer Name</th><th>Takeaway Date</th><th>Time Slot</th><th>Phone Number</th><th>Order Name</th><th>Quantity</th><th>Total Price</th><th>Restaurant</th><th>Status</th><th>Action</th>";
    echo "</tr>";
    echo "</thread>";
    echo "<tbody>";
    while($row=$sql1->fetch_assoc()) {
      echo "<tr>";
        echo "<td>".$row['Takeaway_code']."</td><td>".$row['Name']."</td><td>".$row['T_date']."</td><td>".$row['Time_slot']."</td><td>".$row['Phone_no']."</td><td>".$row['Order_Name']."</td><td>".$row['Quantity']."</td><td>".$row['Tot_price']."</td><td>".$row['Res_Name']."</td>";
        $status=$row['Status'];
        if($status=="" or $status=="NULL")
        {
        echo "<td><button type='button' class='btn btn-info'><span class='fa fa-bars' aria-hidden='true'></span> Placed</button></td>";
          }
           
        if($status=="paid")
          {
        echo "<td> <button type='button' class='btn btn-primary'><span class='fa fa-check-circle' aria-hidden='true'></span> Taken</button></td>"; 
        }
        echo "<td>";
						echo "<a href='update_takeaway.php?take_upd=".$row['Takeaway_id']."' class='btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5'><i class='fa fa-edit'></i></a>
						</td>";
        echo "</tr>";
      }
  
      echo "</tbody>";
        echo "</table>";
        echo "<br>";
    
        $mysqli->close();
    ?>
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