<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include 'admin/connection.php';
?>
<?php
$id=$_POST['Id'];
$image= $_FILES['image']['name'];
//print_r($_FILES);
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$addl_1=$_POST['addl_1'];
$addl_2=$_POST['addl_2'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$pin_no=$_POST['pin_no'];
?>
<?php 
if($image == NULL)
{
	$sql="UPDATE employee set Name='$Name',Email='$Email',Phone='$Phone',addl_1='$addl_1',addl_2='$addl_2',city='$city',state='$state',country='$country',pin_no='$pin_no' where Id=$id ";
	$res=mysqli_query($conn,$sql);
}
else
{
	$sql="UPDATE employee set image='$image',Name='$Name',Email='$Email',Phone='$Phone',addl_1='$addl_1',addl_2='$addl_2',city='$city',state='$state',country='$country',pin_no='$pin_no' where Id=$id ";
	$res=mysqli_query($conn,$sql);
}
if(!$res)
{
	echo "NOT UPDATED";
}
header('location:profile.php?id='.$id.'');
?>
</body>
</html>