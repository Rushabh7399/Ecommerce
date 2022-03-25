<?php 

session_start(); 
$msg="";
if(count($_POST) >0)
{   
$Email=$_POST['Email'];
$Password=$_POST['Password'];


$Email=stripcslashes($Email);
$Password=stripcslashes($Password);

//$Name=mysqli_real_escape_string($Name);
//$password=mysqli_real_escape_string($password);
$conn=mysqli_connect("localhost","root","","oopals");

$result=mysqli_query( $conn,"select * from employee where Email='$Email' AND Password='$Password' ")
     or die("fail".mysqli_error());
     if(!$result)
     {
      echo "result no come";
     } 
       $row=mysqli_fetch_array($result);
      $type=$row['user_type'];

$res=mysqli_query( $conn,"select * from employee where Email='$Email' AND Password='$Password' ")
     or die("fail".mysqli_error());
     if(!$result)
     {
      echo "res no come";
     } 
     $r=mysqli_num_rows($res);
     if($r == 1)
     {
        $_SESSION["type"]=$row["user_type"];
        $_SESSION["Email"]=$row["Email"];
        $_SESSION["Name"]=$row["Name"];
        $_SESSION["Id"]=$row["Id"];

          if($type == "admin")
          {
            echo "<script>window.open('admin/dashboard.php','_self')</script>";
          }
          else
          {
            echo "<script>window.open('cat.php','_self')</script>";
          }

     }

   
    
 else {
    $msg="invalid username or password or usertype";
}

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
header("Location:admin/dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title></title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="http://localhost/company/pro2/assets/css/login.css">

  
</head>

<body>

  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Login Form</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <div class="message"><?php if($msg!="") { echo $msg; } ?></div>
    <form action="" method="POST">
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="Email" required>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="Password" required>
      <button type="submit" name="login" class="btn btn-default">Submit</button>
    
    </form>
  </div>
  
  <div class="cta"><p><a href="register.php">Not registered Yet?</a></p></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

  

    <script  src="http://localhost/company/pro2/assets/js/index.js"></script>




</body>

</html>
