<?php 
session_start();
unset($_SESSION["managerid"]);
header("Location:manager_login.php");
?>






