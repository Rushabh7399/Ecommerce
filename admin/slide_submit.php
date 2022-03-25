<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","Oopals");
if(!$conn)
{
	echo "not connected";
}
$image = $_FILES['image']['name'];
$target = "images/".basename($image);
$id=$_POST["id"];
$Name=$_POST["Name"];
$activity=$_POST["activity"];

$sql="INSERT into slidebar(id,Name,image,activity) values('$id','$Name','$image','$activity')";
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
header('location:slidebar.php');
?>

</body>
</html>
