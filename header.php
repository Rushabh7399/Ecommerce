<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style type="text/css">
a
{
  font-size: 20px;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
  <a class="navbar-brand" href="#"><img src="images/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="false" aria-controls="navbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <?php
      include 'admin/connection.php';
      $sql="SELECT * from category";
      $res=mysqli_query($conn,$sql);
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="cat.php" id="navbardrop" data-toggle="dropdown">
        categories
        </a>
          <div class="dropdown-menu bg-dark ">
          <?php while($row=mysqli_fetch_assoc($res)){  ?>
            <a class="dropdown-item text-light" href="pro.php?id=<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></a>
          <?php } ?>  
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="#">Portfolio</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
    </ul>
    <?php
      if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
      {
        $sum=0;$i=0;
        $a=0;
        foreach ($_SESSION['cart']['product'] as $key => $value) { 
                $a+=count($key);
                
        }
      }  
?>
      
     <ul class="navbar-nav ml-auto">
            
            <?php if(isset($_SESSION['Id'])):  ?>
               <li class="nav-item active">
              <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i><sup style="border:1px solid white; border-radius: 50%; background-color: 
              #FA7F38;"><?php echo $a; ?></sup></a>
            </li>
               <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-smile-o" style="font-size: 22px;"></i>  <?php echo $_SESSION['Name'];  ?></a>
              <div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="profile.php?id=<?php echo $_SESSION['Id'];  ?>">my profile</a>
                        <a class="dropdown-item text-light" href="order_detail.php?id=<?php echo $_SESSION['Id'];  ?>">my orders</a>
                        <a class="dropdown-item text-light" href="cart.php">my cart</a>
                        
                </div>
            </li>
             
              <li class="nav-item active">
              <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a>
            </li>
            
            <?php else: ?>
              <li class="nav-item active">
              <a class="nav-link" href="register.php"><i class="fa fa-user" aria-hidden="true"></i> signup
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> login</a>
            </li>
              
            <?php endif; ?>
           
          </ul>
  </div>  
</nav>





</body>
</html>


