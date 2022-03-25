<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	.done
{
	
	margin-bottom: 30px;
	margin-left: 40px;
	font-size: 25px;
	color: #F6F5FC;
	background-color: #39DB49;
	margin-top: 40px;
	height: 60px;
	width: 80%;
}


.a1
{
	
	width:80%;
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline:none;
	color: orange;
	

}

.r1
{
	margin-left: 40px;
	font-size: 20px;
	color: white;
	font-weight: bold;


}
.a2
{
	margin-left: 35%;
	/*background-color:#2582CA;*/
	margin-right: 30%;
	/*background-color: #E6CEE3;*/
	margin-top: 10px;
	padding-top: 30px;
	opacity: 0.9;
	background-color:black;


	/*background:transparent;
*/


}

form
{
	
	background:transparent;
}
</style> 
<body>
<div class="container-flud">
	<div class="a2">
<form method="POST" id="My_Form" action="submit.php" >
	<p class="r1">Name</p>
	 <input class="a1" type="text" name="Name"  id="f1" style="margin-left: 40px" >
	 <br>
	 	<p class="r1">Address</p>
	 <input class="a1" type="text" name="Address"  id="f1" style="margin-left: 40px" >
	 <br>
	
    <p class="r1">Email </p>
	
	<input class="a1" type="text" name="Email"  id="f2" style="margin-left: 40px" >
	<br>
	<p class="r1">Phone</p>
	<input class="a1" type="number" name="Phone"  id="f4" style="margin-left: 40px"  >
	<br>
	<p class="r1">Desg</p>
	<input class="a1" type="text" name="Desg" id="f3"  style="margin-left: 40px" >
	<br>
	
  
 
  
  <input class="done" type="submit" value="Submit" > 
</form>
</div>
</div>
  
	
	


</body>
</html>