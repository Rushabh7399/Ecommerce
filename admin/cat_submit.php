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

$Name=$_POST["Name"];

$desp=$_POST["desp"];
$activity=$_POST["activity"];

$sql="INSERT into category(Name,desp,activity,image,Date) values('$Name','$desp','$activity','$image',now())";
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

?>
<?php
/*header('location:category.php');*/
?>

</body>
</html>
