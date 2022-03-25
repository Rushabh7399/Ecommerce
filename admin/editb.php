<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require('connection.php');

$Name=$_POST["Name"];
$Address=$_POST["Address"];
$Email=$_POST["Email"];
$Phone=$_POST["Phone"];
$Desg=$_POST["Desg"];
$ID=$_POST["Id"];

	$sql="UPDATE employee set Name='$Name', Address='$Address',Email='$Email',Phone='$Phone',Desg='$Desg' where Id=$ID ";
	$res=mysqli_query($conn,$sql);
	if(!$res)
	{
		echo"Not Updated";
	}
	else
	{
		echo "updated successfully";
	}
header('location:users.php');





?>



</body>
</html>