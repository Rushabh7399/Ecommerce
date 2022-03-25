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
$activity=$_POST["activity"];
$ID=$_POST["id"];
$target = "images/".basename($image);

	$sql="UPDATE slidebar set Name='$Name', image='$image',activity='$activity' where Id=$ID ";
	$res=mysqli_query($conn,$sql);
	if(!$res)
	{
		echo"Not Updated";
	}
	else
	{
		echo "updated successfully";
	}
header('location:slidebar.php');





?>



</body>
</html>
<?php
if (isset($_POST['upload1'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    

    // image file directory
    $target = "images/".basename($image);

    $sql = "UPDATE slidebar set image='$image' where id=$a";
   if(!$sql)
   {
   		echo "error";
   }
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  ?>