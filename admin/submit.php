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
$Name=$_POST["Name"];
$Address=$_POST["Address"];
$Email=$_POST["Email"];
$Phone=$_POST["Phone"];
$Desg=$_POST["Desg"];
$sql="INSERT into employee(Name,Address,Email,Phone,Desg) values('$Name','$Address','$Email','$Phone','$Desg')";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo" not added in database";
}


?>
<?php
header('location:users.php');
?>

</body>
</html>