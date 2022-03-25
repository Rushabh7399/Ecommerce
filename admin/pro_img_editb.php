<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require('connection.php');
$image = $_FILES['image']['name'];


$ID=$_POST["id"];

  $sql = "UPDATE products set image='$image' where id=$ID";
   if(!$sql)
   {
      echo "error";
   }
    // execute query
    mysqli_query($conn, $sql);


$target = "images/".basename($image);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
header('location:products.php');
?>



</body>
</html>
