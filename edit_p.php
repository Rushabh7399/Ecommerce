<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"> 
</head>
<style type="text/css">

#c6 input
{
	
	font-size: 25px;
	width: 200px;
	background:transparent;
}
#c12 input
{
	
	font-size: 19px;
	width: 180px;
  background:transparent;
}
input
{
  border: none;
  border-bottom:1px solid black;
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
input[type="file"] {
    display: none;

}
.lab{
    padding: 10px;
    background: black; 
    display: inline-block;
    color: white;
    margin-left: 10px;
    width: 180px;
     }

</style>
<body>
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

while($row=mysqli_fetch_assoc($res)) 
  {
  	//print_r($row); exit;
  			$img= $row["image"];
  			$Id=$row["Id"];
  			$Name=$row["Name"];
  			$Email=$row["Email"];
  			$Phone=$row["Phone"];
  			$addl_1=$row["addl_1"];
  			$addl_2=$row["addl_2"];
  			$city=$row["city"];
  			$pin_no=$row["pin_no"];
  			$state=$row["state"];
  			$country=$row["country"];


    } 
    //echo $img;
   ?>
<div class="container">
	<div class="a1">		
  <legend style="text-align: center;">MY PROFILE</legend>
  <hr>
  
  	
  
<form method="POST" action="edit_p1.php" enctype="multipart/form-data"> 
 
 
  <div class="row">

  		<div class="col-sm-4" id="aq">
  		<img style="width: 300px;
	height: 300px;
	margin-left: 10px;
	margin-bottom: 10px;" src="admin/images/<?php echo $img; ?>" >	
  <input type="hidden" name="size" value="1000000">
    
                <label class="lab" id="bb" >UPLOAD HERE
                      <input type="file" name="image"  value="<?php echo $img; ?>" id="File">
                </label>  
  		</div>
  		<div class="col-sm-8">
  				<div class="row">
  						<div class="col-sm-6" id="c6">
  							<label>id:</label><input type="text" name="Id" value="<?php echo $Id; ?>" ><br>
                        <label>Name : </label><input type="text" name="Name" value="<?php echo $Name; ?>" ><br>
  						</div>
  						<div class="col-sm-6" id="c6">
  						<label> Email :</label><input type="text" name="Email" value="<?php echo $Email; ?>" >
                <label>Phone:</label><input type="text" name="Phone" value="<?php echo $Phone; ?>" ><br>
  						</div>
  					
  				</div>
  				<hr>
  				<div class="row">
  						<div class="col-sm-8" id="c12">
  							<label>Address:</label><br>
  							<input type="text" placeholder="addl_1" name="addl_1" value="<?php echo $addl_1; ?>" ><br>
  							<input type="text" placeholder="addl_2" name="addl_2" value="<?php echo $addl_2; ?>," ><br>
              				<input type="text" placeholder="city" name="city" value="<?php echo $city; ?>," ><br>
              				<input type="text" placeholder="pin" name="pin_no" value="<?php echo $pin_no; ?>," ><br>
              				<input type="text" placeholder="state" name="state" value="<?php echo $state; ?>," ><br>
              				<input type="text" placeholder="country" name="country" value="<?php echo $country; ?>." ><br>
              
  						
  						
  						</div>
  						<div class="col-sm-4">
  						<input type="submit" name="submit">
  							
  						</div>
  						
  					
  				</div>
  		
	  		
	  		
	  	</div>	  		
  	 
  </div>

 


</form> 
</div>
 
	
</div>
    <!-- <form method="POST" action="edit_p1.php" enctype="multipart/form-data">
   <input type="hidden" name="size" value="1000000">
    
                
                      <input type="file" name="image"  value="<?php echo $img; ?>" id="File"></center>
                 
                    <label>id:</label><input type="text" name="Id" value="<?php echo $Id; ?>" ><br>
                        <label>Name : </label><input type="text" name="Name" value="<?php echo $Name; ?>" ><br>
                          <label> Email :</label><input type="text" name="Email" value="<?php echo $Email; ?>" >
                <label>Phone:</label><input type="text" name="Phone" value="<?php echo $Phone; ?>" ><br>
                <input type="text" placeholder="addl_1" name="addl_1" value="<?php echo $addl_1; ?>," ><br>
              <input type="text" placeholder="addl_2" value="<?php echo $addl_2; ?>," ><br>
              <input type="text" placeholder="city" value="<?php echo $city; ?>," ><br>
              <input type="text" placeholder="pin" value="<?php echo $pin_no; ?>," ><br>
              <input type="text" placeholder="state" value="<?php echo $state; ?>," ><br>
              <input type="text" placeholder="country" value="<?php echo $country; ?>." ><br>
              <input type="submit" name="submit">
  </form> 
  -->

  
</body>
</html>