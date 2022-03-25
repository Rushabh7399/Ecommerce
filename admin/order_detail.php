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
}
.container
{
	width: 100%;
	height: auto;
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
<body>
<?php
include 'connection.php';
?>
<?php
$sql="SELECT orders.*,employee.* from orders LEFT JOIN employee ON employee.Id=orders.user_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$order_id=$_GET['id'];
$Name=$row["Name"];
$Total=$row["total_amount"];
$Email=$row['Email'];


?>
<!-- <div class="container">
		<div class="row"> -->
<div class="container">
			<div class="a1">
			
  <legend style="text-align: center;">USER DETAIL</legend>
  Order_id:<input type="text" value="<?php echo $order_id; ?>" readonly><br>
  Name    :<input type="text" value="<?php echo $Name; ?>" readonly><br>
  Email   :<input type="text" value="<?php echo $Email; ?>" readonly><br>
  Total   :<input type="text" value="<?php echo $Total; ?>" readonly><br>
  
 
	
		</div>
</div>
<br>
<br>

				
		<!-- </div>
	
</div> -->
<?php
$sql="SELECT order_detail.*,products.* from order_detail LEFT JOIN products ON products.id=order_detail.product_id where order_detail.order_id=$order_id ";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not selected";
}
?>
<div class="container">
	<div class="a1">		
  <legend style="text-align: center;">Product_detail</legend>
  <hr>
  
  	
  

  <?php
  while($row=mysqli_fetch_assoc($res)) 
  {
  		//print_r($row); exit;
   ?>
  <div class="row">
  		<div class="col-sm-6">
  		<img src="images/<?php echo $row['image']; ?>">	
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
  

<?php  } ?>
</div>
 
	
		</div>>
</body>
</html>