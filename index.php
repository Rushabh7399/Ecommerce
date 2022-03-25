<!DOCTYPE html>
<html>
<head>

	<title></title>
	<meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <!-- Start WOWSlider.com HEAD section -->
<!-- <link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script> -->
<!-- End WOWSlider.com HEAD section -->
</head>
<style type="text/css">
	.carousel-inner {
      width: 100%;
      height: 600px;
  }
  img
  {
      width: 100%;
      height: 100%;
  }
</style>
<body>
<?php

include 'header.php';
include 'admin/connection.php';
?>

<br>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <!-- <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
   -->
  <!-- The slideshow -->
  <div class="carousel-inner" id="a">
    <div class="carousel-item active">
      <img src="images/lake.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <?php
$sql="SELECT * from slidebar order by id desc";
$res=mysqli_query($conn,$sql);



  while($row=mysqli_fetch_assoc($res))
{ ?>
  <div class="carousel-item">
  <img src="images/<?php echo $row["image"]; ?>" alt="Los Angeles" width="1100" height="500" title="Landscape" id="im"></div>
<?php }
   
  ?>
      
    
    
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<?php
include 'footer.php';
?>

</body>
</html>
