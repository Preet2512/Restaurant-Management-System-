<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Bill Invoice</title>
    <link href="css/bill.css" rel="stylesheet"> </head>
    <body>
    <h2>Invoice</h2>
<?php
include("Config.php");

error_reporting(0);
session_start();

$tot_sum=0;

if(empty($_SESSION['userid']) || empty($_SESSION['success']))
{
	header('location:customer_login.php');
 }
else{

									
                                                        


// Calculate the subtotal and total
$sub_total = 0;
foreach ($_SESSION["cart_item"] as $item) {
  $sub_total += $item['fprice'];
}
$tax = $sub_total * 0.05;
$total = $sub_total + $tax;

// Output the invoice
// echo "<header><h1>Bill Invoice</h1></header>";
echo "<table>";
echo "<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Sub Total</th></tr>";
foreach ($_SESSION["cart_item"] as $item) {
  echo "<tr><td>" . $item['fname'] . "</td><td>" .$item['quantity'] . "</td><td>Rs. " . number_format($item['fprice'], 3) . "</td><td>Rs. " . number_format($item['fprice']*$item['quantity'], 3) . "</td></tr>";
}
echo "<tr><td colspan='3' class='my-table'>Tax (5%)</td><td>Rs. " . number_format($tax, 2) . "/-</td></tr>";
echo "<tr><td colspan='3' class='my-table'>Total</td><td>Rs. " . number_format($total, 2) . "/-</td></tr>";
echo "</table>";
// echo "<footer>Thank you for your order!</footer>";
?>
<br><br>
<div>
<a href="pdf.php" class="btn btn-danger" target="_blank">Invoice PDF</a>
</div>
<br>
<div>
<a href="orders.php" class="btn btn-danger">My Orders</a>
</div>


<center>
<h3>
            Thank You for your order!<br>
            Your takeaway code is <?php echo $_SESSION["Takeaway_id"]; ?>
</h3></center>
<?php
    /*unset($_SESSION["cart_item"]);
    unset($item["fname"]);
    unset($item["quantity"]);
    unset($item["fprice"]);*/
?>
</body>
</html>

<?php
}
?>