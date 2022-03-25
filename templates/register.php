<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Flat Login Form 3.0</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="http://localhost/company/pro2/assets/css/register.css">
<script type="text/javascript">
  function validate()
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

    



  }

  
</script>
<?php 
  $conn = mysqli_connect("localhost", "root", "", "comp");
  
  $Email = "";
  if (isset($_POST['register'])) {
    $Name=$_POST["Name"];

$Email=$_POST["Email"];
$Password=$_POST["Password"];
$Phone=$_POST["Phone"];
$user_type=$_POST["user_type"];
$check_user=$_POST["check_user"];


    
    
          $sql="INSERT into admin(Name,Email,Password,Phone,user_type,check_user) values('$Name','$Email','$Password','$Phone','$user_type','$check_user')";
$res=mysqli_query($conn,$sql);
if(!$res)
{
  echo "not added";
}


           echo 'Saved!';
           exit();
    }
  

?>
<?php
header('location:login.php');
?>

  
</head>

<body>

  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Register Form</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
 
  <div class="form">
    <h2>Create an account</h2>
    <!-- <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form> -->
    <form action="" method="POST" id="regc">
    
      
      <input type="name" class="form-control" id="f1" placeholder="Name" name="Name" required>
   
   
      <input type="email" class="form-control" id="f2" placeholder="email" name="Email" required>
    
    
      
      <input type="password" class="form-control" id="f3" placeholder="password" name="Password" required>
    
    
      
      <input type="number" class="form-control" id="f4" placeholder="Phone" name="Phone" required>
    
      
      <input type="text" class="form-control" id="f4" placeholder="User Type" name="user_type" required>
    
      
      <input type="number" class="form-control" id="f4" placeholder="1/0" name="check_user" required>
    
    
    <button type="submit" class="btn btn-default" id="done" name="register" onclick="validate()">Submit</button>
  </form>
  </div>
  <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

  

    



</body>

</html>
