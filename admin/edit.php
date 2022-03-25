<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include('connection.php');
include 'header.php';

?>
<?php
$a1=$_GET["id"];
$query="SELECT * from employee where ID=$a1";
$res=mysqli_query($conn,$query);
if(!$res)
{
	echo "not selected";
}
while($row = mysqli_fetch_array($res))
{
    $Name = $row['Name'];
    $Address=$row["Address"];
	$Email=$row["Email"];
	$Phone=$row["Phone"];
	$Desg=$row["Desg"];
   
}
?>
<div class="container-flud">
	<div class="a2">
<form method="POST" id="My_Form" action="editb.php" >
	<p class="r1">Name</p>
	 <input class="a1" type="text" name="Name"  value="<?php echo $Name; ?>" id="f1" style="margin-left: 40px" >
	 <br>
	 	<p class="r1">Address</p>
	 <input class="a1" type="text" name="Address"  value="<?php echo $Address; ?>" id="f1" style="margin-left: 40px" >
	 <br>
	
    <p class="r1">Email </p>
	
	<input class="a1" type="text" name="Email" value="<?php echo $Email; ?>" id="f2" style="margin-left: 40px" >
	<br>
	<p class="r1">Phone</p>
	<input class="a1" type="number" name="Phone" value="<?php echo $Phone; ?>" id="f4" style="margin-left: 40px"  >
	<br>
	<p class="r1">Desg</p>
	<input class="a1" type="text" name="Desg" value="<?php echo $Desg; ?>" id="f3"  style="margin-left: 40px" >
	<br>
	
  
 
  
  <input class="done" type="submit" value="Submit" > 
</form>
</div>
</div>
<?php

include 'footer.php';

?>
</body>
</html>