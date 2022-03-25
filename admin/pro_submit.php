<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include 'connection.php';
if(!$conn)
{
	echo "not connected";
}

$image = $_FILES['image']['name'];
$target = "images/".basename($image);
$B_Name=$_POST["B_Name"];
$product_Name=$_POST["product_Name"];

$desp=$_POST["desp"];
$activity=$_POST["activity"];
$cat=$_POST["cat_name"];

$sql="INSERT into products(B_Name,product_Name,desp,activity,image,cat_name,Date) values('$B_Name','$product_Name','$desp','$activity','$image','$cat',now())";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo" not added in database";
}
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      		echo "Image uploaded successfully";
    }else{
     	$msg = "Failed to upload image";
    								}
//header('location:product.php');
?>


</body>
</html>
