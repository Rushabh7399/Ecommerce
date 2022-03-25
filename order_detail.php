<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> 
<style type="text/css">
input
{
	border: none;
	font-size: 25px;
}
.a1
{
	width:100%;
	font-size: 25px;
	border: 1px solid black;
	border-radius: 20px;
	background-color: white;
}
.container
{
	margin-top: 5%;
	width: 100%;
	height: auto;
	margin-bottom: 5%;
}
.row
{
	width: 100%;
	height: auto;
}
.col_sm_6
{
	width: 50%;
}
img
{
	width: 50%;
}
</style>
</head>
<body style="background-color: #D1C8C8;">
<?php
include 'admin/connection.php';
include 'header.php';
?>

				
		<!-- </div>
	
</div> -->
<?php
$uid=$_GET['id'];
$sql="SELECT order_detail.*,products.* from order_detail LEFT JOIN products ON products.id=order_detail.product_id where order_detail.user_id=$uid ";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not selected";
}
?>

	<div class="container">
	<div class="a1">		
  <legend style="text-align: center;font-family: Bebas Neue
; font-size: 33px;">Your Orders</legend>
  <hr>
  
  	
  

  <?php
  while($row=mysqli_fetch_assoc($res)) 
  {
  		//print_r($row); exit;
   ?>
  <div class="row">
  		<div class="col-sm-6">
  		<img src="admin/images/<?php echo $row['image']; ?>">	
  		</div>
  		<div class="col-sm-6">
  			id:<input type="text" value="<?php echo $row["id"]; ?>" readonly><p>
	  		product_id   :<input type="text" value="<?php echo $row["product_id"]; ?>" readonly><br>
	  		Quantity   :<input type="text" value="<?php echo $row["quantity"]; ?>" readonly><br>
	  		sub_Total   :<input type="text" value="<?php echo $row["sub_total"]; ?>" readonly><br>
	  		Brand_Name   :<input type="text" value="<?php echo $row["B_Name"]; ?>" readonly><br>
	  		Brand ID  :<input type="text" value="<?php echo $row["B_id"]; ?>" readonly><br>
	  		PRODUCT Name   :<input type="text" value="<?php echo $row["product_Name"]; ?>" readonly><br>
	  		PRODUCT ID  :<input type="text" value="<?php echo $row["product_id"]; ?>" readonly><br>
	  		CAT NAME   :<input type="text" value="<?php echo $row["cat_name"]; ?>" readonly><br>
	  		CAT ID   :<input type="text" value="<?php echo $row["cat_id"]; ?>" readonly><br>
	  	</div>	  		
  	
  </div>
  <hr>

<?php  } ?>
</div>
 
	
		</div>
<?php


?>
</body>
</html>