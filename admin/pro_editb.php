<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require('connection.php');

$image = $_FILES['image']['name'];
echo $_FILES['image']['name']; exit;
$Name=$_POST["Name"];
$cat=$_POST["category"];
$desp=$_POST["desp"];
$activity=$_POST["activity"];
$ID=$_POST["id"];

if($image == NULL)
{
	$sql="UPDATE products set Name='$Name',desp='$desp',cat_name='$cat',activity='$activity' where id=$ID ";
	$res=mysqli_query($conn,$sql);
}
else
{
	$sql="UPDATE products set Name='$Name',image='$image',desp='$desp',cat_name='$cat',activity='$activity' where id=$ID ";
	$res=mysqli_query($conn,$sql);
}
	
	if(!$res)
	{
		echo"Not Updated";
	}
	else
	{
		echo "updated successfully";
	}

$target = "images/".basename($image);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
/*header('location:product.php');*/

?>



</body>
</html>
