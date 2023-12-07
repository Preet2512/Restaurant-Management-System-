<?php 
session_start();
unset($_SESSION["userid"]);
header("Location:customer_login.php");
?>