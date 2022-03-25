<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body style="background-color: #D1C2C2;">
<?php   
include 'admin/connection.php';
include 'header.php';
//echo "<pre>"; print_r($_SESSION);exit;
$total=$_POST['total'];
$user_id=$_SESSION['Id'];

$sql="INSERT into orders(user_id,total_amount) values('$user_id','$total')";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not added";
}

?>
<?php
$sql="SELECT * from orders where user_id=$user_id";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not added";
}
while($row=mysqli_fetch_assoc($res))
{
	$id=$row['id'];
	$user_id=$row['user_id'];
	$total=$row['total_amount'];
}
//echo $id;
//echo $user_id;
foreach ($_SESSION['cart']['product'] as $key => $value)  
{

	$product_id=$_SESSION['cart']['product'][$key]['id'];
	$product_quantity=$_SESSION['cart']['product'][$key]['quantity'];
	$sub_total=$_SESSION['cart']['product'][$key]['sub_total'];
	$sql="INSERT INTO order_detail(user_id,order_id,product_id,quantity,sub_total) values('$user_id','$id','$product_id','$product_quantity','$sub_total')";
	$res=mysqli_query($conn,$sql);

}
?>
<div class="container" >
		<div class="row" >
		<div class="col-sm-2">
            
        </div>
        <div class="col-sm-8" style="margin-top: 10%;">
            				<h1 style="font-size:55px; margin-top: auto;">THANK YOU FOR ORDER</h1>

        </div>
        <div class="col-sm-2">
            
        </div>
			
		</div>
		<div class="row" style="align-items: center;">
		<div class="col-sm-4">
            
        </div>
        <div class="col-sm-4" style="margin-top: 3%; margin-bottom: 10%;">
            				<button class="btn btn-success" ><a href="cat.php" style="text-decoration: none; color: white;">CONTINUE SHOPPING</a></button>

        </div>
        <div class="col-sm-4">
            
        </div>
					
		</div>
	
</div>
<?php
unset($_SESSION['cart']['product']);
unset($sum);

?>
</body>
</html>