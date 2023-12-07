<?php
    include('Config.php');
    $fid=$_GET['food_del'];
    $sql=mysqli_query($mysqli,"DELETE FROM Food WHERE Food_ID='$fid'");

    if($sql) {
?>
<script>
alert("Food Deleted Successfully");
window.location.href = "view_food.php";
</script>
<?php     
      }
?>
