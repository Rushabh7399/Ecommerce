<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require('connection.php');

$image = $_FILES['image']['name'];
$Name=$_POST["Name"];
$desp=$_POST["desp"];
$activity=$_POST["activity"];
$ID=$_POST["id"];
if($image == NULL)
{
	$sql="UPDATE category set Name='$Name',desp='$desp',activity='$activity' where id=$ID ";
	$res=mysqli_query($conn,$sql);
}
else
{
	$sql="UPDATE category set Name='$Name',image='$image',desp='$desp',activity='$activity' where id=$ID ";
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

header('location:category.php');

?>



</body>
</html>
