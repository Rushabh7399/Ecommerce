<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> 
<style type="text/css">

#c6 input
{
	border: none;
	font-size: 25px;
	width: 200px;
	background:transparent;
}
#c12 input
{
	border: none;
	font-size: 19px;
	width: 180px;
}
.a1
{
	width:100%;
	font-size: 25px;
	border: 1px solid black;
}
.container
{
	margin-top: 10%;
	width: 100%;
	height: auto;
}
.row
{
	width: 100%;
	height: auto;
}
.col_sm_6
{
	width: 50%;

}

</style>
</head>
<body style="background-color: #FCF1F1;">
<?php

include 'admin/connection.php';
include 'header.php';

?>	
<?php
$uid=$_GET['id'];
$sql="SELECT * from employee where Id=$uid ";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not selected";
}
?>

	<div class="container">
	<div class="a1">		
  <legend style="text-align: center;">MY PROFILE</legend>
  <hr>
  
  	
  

  <?php
  while($row=mysqli_fetch_assoc($res)) 
  {
  		//print_r($row); exit;
   ?>
  <div class="row">
  		<div class="col-sm-4" id="aq">
  		<img style="width: 300px;
	height: 300px;
	margin-left: 10px;
	margin-bottom: 10px;" src="admin/images/<?php echo $row['image']; ?>" >	
  		</div>
  		<div class="col-sm-8">
  				<div class="row">
  						<div class="col-sm-6" id="c6">
  							<label>id:</label><input type="text" value="<?php echo $row["Id"]; ?>" readonly><br>
	  		                <label>Name : </label><input type="text" value="<?php echo $row["Name"]; ?>" readonly><br>
  						</div>
  						<div class="col-sm-6" id="c6">
  						<label>	Email :</label><input type="text" value="<?php echo $row["Email"]; ?>" readonly>
	  						<label>Phone:</label><input type="text" value="<?php echo $row["Phone"]; ?>" readonly><br>
  						</div>
  					
  				</div>
  				<hr>
  				<div class="row">
  						<div class="col-sm-8" id="c12">
  							<label>Address:</label><br>
  						<p><?php echo $row["addl_1"]; ?> ,<br><?php echo $row["addl_2"]; ?> ,<br><?php echo $row["city"]; ?>,<?php echo $row["pin_no"]; ?>.<br>
  						<?php echo $row["state"]; ?>,<?php echo $row["country"]; ?>.</p>
  						<!-- <input type="text" value="<?php echo $row["addl_1"]; ?>," readonly><br>
  						<input type="text" value="<?php echo $row["addl_2"]; ?>," readonly><br>
  						<input type="text" value="<?php echo $row["city"]; ?>," readonly><br>
  						<input type="text" value="<?php echo $row["pin_no"]; ?>," readonly><br>
  						<input type="text" value="<?php echo $row["state"]; ?>," readonly><br>
  						<input type="text" value="<?php echo $row["country"]; ?>." readonly><br> -->
  						
  						</div>
  						<div class="col-sm-4">
  						<button type="button" class="btn btn-dark" style="width: 150px; margin-top:25%;"><a style="text-decoration: none; color: white;" href="edit_p.php?id=<?php echo $uid; ?>">EDIT</a></button>
  							
  						</div>
  						
  					
  				</div>
  		
	  		
	  		
	  	</div>	  		
  	
  </div>
  

<?php  } ?>
</div>
 
	
		</div>
</body>
</html>