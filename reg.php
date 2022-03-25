<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","comp");
$Name=$_POST["Name"];

$Email=$_POST["Email"];
$Password=$_POST["Password"];
$Phone=$_POST["Phone"];
$user_type=$_POST["user_type"];
$check_user=$_POST["check_user"];





$sql="INSERT into admin(Name,Email,Password,Phone,user_type,check_user) values('$Name','$Email','$Password','$Phone','$user_type','$check_user')";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not added";
}


?>
<?php
header('location:login.php');
?>

</body>
</html>