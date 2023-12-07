<?php
include('Config.php');
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
session_start();

$gt = 0;
$i = 1;
$grtot=0;
$gst=1;
$html="<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>
<style>
h2 {
font-family: Verdana, Geneva, Tahoma, sans-serif;
text-align: center;
}
table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
td,
th {
    border: 1px solid #444;
    padding: 8px;
    text-align: left;
   }
   .my-table {
   text-align: right;
   }
</style>
</head>
<body>
<h2>Invoice</h2>
<table>
<tr>
<th>Item No.</th>
<th>Item</th>
<th>Pice</th>
<th>Quantity</th>
<th>Total</th>
</tr>";
foreach ($_SESSION['cart_item'] as $item) {
    $html .= "<tr>
    <td>" . $i . "</td>
    <td>" . $item['fname'] . "</td>
    <td>" . $item['fprice'] . "</td>
    <td>" . $item['quantity'] . "</td>
    <td>" . $item['fprice'] * $item['quantity'] . "</td>
    </tr>";
    $gt += $item['fprice'] * $item['quantity'];
    $i++;
    }
    $gst=(($gt * 5) / 100);
    $grtot=($gt + ($gt * 5) / 100);
$html .= "<tr>
<th colspan='4' class='my-table'>GST (5%)</th>
<th>" . $gst . "</th>
</tr>
<tr>
<th colspan='4' class='my-table'>Grand Total</th>
<th>" . $grtot . "</th>
</tr>
</table>
<h2>Thank you!</h2>
</body>
</html>";


$dompdf = new Dompdf;
$dompdf->loadHtml(html_entity_decode($html));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf');
?>

<?php
    unset($_SESSION["cart_item"]);
    unset($item["fname"]);
    unset($item["quantity"]);
    unset($item["fprice"]);
?>