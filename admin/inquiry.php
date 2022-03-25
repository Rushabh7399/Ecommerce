<?php session_start(); ?>
<?php include "head.php" ?>
<?php


include 'connection.php';
?>

<?php
$sql="SELECT inquiry.*,products.product_Name from inquiry LEFT JOIN products ON products.id=inquiry.product_id";

$res=mysqli_query($conn,$sql);
 ?>
<div id="page-content-wrapper">
    <div class="container-fluid">
       <div class="grid-container">
<?php
 while($row=mysqli_fetch_assoc($res)  )
{

 ?>



  <div class="item">
  	<p><label>Product-Name:</label> <?php echo $row["product_Name"]; ?></p>
  	<p><label>Person-Name:</label> <?php echo $row["Name"]; ?></p>
  	<p><label>Product_id:</label> <?php echo $row["id"]; ?></p>
  	<p><label>Message:</label> <?php echo $row["msg"]; ?></p>

  </div>

 <?php }
   
  ?> 
</div>
       
    </div>
</div>
<?php include "foot.php" ?>