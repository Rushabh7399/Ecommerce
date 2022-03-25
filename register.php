<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

      <link rel="stylesheet" href="http://localhost/company/pro2/assets/css/register.css">
  
  
<script type="text/javascript">
$(document).ready(function() {
 
  $('#My_form').submit(function(e) {
    /*e.preventDefault();*/
    var Name = $('#Name').val();
    var Email = $('#Email').val();
   	var Password = $('#Password').val();
   	var Phone= $('#Phone').val();
   	
 
    $(".error").remove();
 
    if (Name.length < 1) {
      $('#Name').before('<span class="error"><strong>*</strong>This field is required</span>');
      return false;
    }
    
    if (Email.length < 1) {
      $('#Email').before('<span class="error"><strong>*</strong>This field is required</span>');
      return false;
    } else {
      var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
      var validEmail = regEx.test(Email);
      if (!validEmail) {
        $('#Email').before('<span class="error"><strong>*</strong>Enter a valid email</span>');
        return false;
      }
    }
    if (Password.length < 8) {
      $('#Password').before('<span class="error"><strong>*</strong>Password must be at least 8 characters long</span>');
      return false;
    }
    if (Phone.length < 10 || Phone.length >10) {
      $('#Phone').before('<span class="error"><strong>*</strong>This field is required</span>');
      return false;
    }
    else{
    	return true;
    }
    
    

  });
 
});
	/*function validate()
	{
		var n=/^[a-zA-Z]*$/;
		var n2=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
		var v1=document.getElementById('f1').value;
		if(v1 == "")
		{
			window.alert("name is required");
			return false;
			
		}
		else if(v1.match(n))
		{
			
		}
		else
		{
			window.alert("name format is not match");
			return false;
		}
		var v2=document.getElementById('f2').value;
		if(v2 == "")
		{
			window.alert("Email is required");
			return false;
			
		}
		else if(v2.match(n2))
		{
			
		}
		else
		{
			window.alert("Email format is not match");
			return false;

		}
		var v3=document.getElementById('f3').value;
		if(v3 == "")
		{
			window.alert("Password is required");
			return false;
			
		}
		var v4=document.getElementById('f4').value;
		var no=v4.length;
		if(v4 == "")
		{
			window.alert("Mobile is required");
			return false;
			
		}
		
		else if(no>10 || no<10)
		{
			window.alert("size must be 10");
			return false;
		}

		



	}*/

	
</script>
<?php
  $conn = mysqli_connect("localhost", "root", "", "oopals");
  if(!$conn)
  {
  	echo "NOT CONNECTED";
  }
  
if(isset($_POST['register'])) {
  	
    $Name=$_POST["Name"];

$Email=$_POST["Email"];
$Password=$_POST["Password"];
$Phone=$_POST["Phone"];
$user_type='user';
$check_user='1';

    
    
          $sql="INSERT into employee(Name,Email,Password,Phone,user_type,check_user) values('$Name','$Email','$Password','$Phone','$user_type','$check_user')";
$res=mysqli_query($conn,$sql);
if(!$res)
{
  echo "not added";
}
else
{
	echo "added successfully";
}

          
    }
if(isset($_POST["Name"]))
{
	header('location:login.php');
} 
 
?>
<style type="text/css">
.error
{
	color: red;
}
</style>
</head>
<body>
<div class="pen-title">
  <h1>Register Form</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
 
  <div class="form" >
    <h2>Create an account</h2>
    <!-- <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form> -->
    <form action="" method="POST" id="My_form">
    
      
      <input type="name" class="form-control" id="Name" placeholder="Name" name="Name" >
   
   
      <input type="email" class="form-control" id="Email" placeholder="email" name="Email" >
    
    
      
      <input type="password" class="form-control" id="Password" placeholder="password" name="Password" >
    
    
      
      <input type="number" class="form-control" id="Phone" placeholder="Phone" name="Phone" >
    
      
      
    
    
    <button type="submit" class="btn btn-default" id="done" name="register">Submit</button>
  </form>
  </div>
  <div class="cta"><a href="login.php">Forgot your password?</a></div>
</div>
  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
<!-- <script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>
 -->
  


    




</body>
</html>
