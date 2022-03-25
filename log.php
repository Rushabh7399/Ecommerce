<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	body
	{
		background-color: black;
		font-size: 70px;
		text-align: center;
		margin-top: 300px;
		color: white;

	}
</style>
</head>
<body>

<?php

$Name=$_POST['Name'];
$Password=$_POST['Password'];

$Name=stripcslashes($Name);
$Password=stripcslashes($Password);
//$Name=mysqli_real_escape_string($Name);
//$password=mysqli_real_escape_string($password);
$conn=mysqli_connect("localhost","root","","comp");

$result=mysqli_query( $conn,"select Name,Password from admin where Name='$Name' AND Password='$Password'")
     or die("fail".mysqli_error());
     	 $row=mysqli_fetch_array($result);
     	if(is_array($row)) {
		$_SESSION["Password"] = $row['Password'];
		$_SESSION["Name"] = $row['Name'];
} else {
		echo "invalid username or password";
}

   /*$row=mysqli_fetch_array($result);
   if($row['Name']==$Name && $row['password']==$password)
	{
		echo "you have successfully loged in as  ".$row['Name'];
	
	}
	else
	{
		echo "wrong";*/

   

if(isset($_SESSION["Password"])) {
header("Location:admin.php");
}
   
	


?>

</body>
</html>



