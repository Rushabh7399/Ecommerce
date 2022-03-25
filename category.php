<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style type="text/css">
.aa
{
	height: 300px;
	width: 300px;
}
</style>
</head>
<body>
<?php

include 'header.php';
include 'admin/connection.php';
?>

<?php
$sql="SELECT * from category";
$res=mysqli_query($conn,$sql);



  while($row=mysqli_fetch_assoc($res))
{ ?>
  
  	
  		<div class="aa">
  			<img src="admin/images/<?php echo $row["image"]; ?>" alt="Los Angeles" width="200" height="200" title="Landscape" id="im">
  		</div>
  		
  	
  
<?php }
   
  ?>


</body>
</html>