<!DOCTYPE html>
<html>
<head>
  <title></title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://localhost/company/pro2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://localhost/company/pro2/assets/css/simple-sidebar.css" rel="stylesheet">
     <link href="http://localhost/company/pro2/assets/css/logo-nav.css" rel="stylesheet">
     <!-- <link href="http://localhost/company/pro2/assets/css/slidebar.css" rel="stylesheet"> -->
     
     
     <!-- footer -->
     <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-logo.css"> -->
 <style type="text/css">

  .footer {
    position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: auto;
   background-color: grey;
   color: white;
   text-align: center;
   font-size: 15px;
}
#img_div 
{
  height:150px;
  width: 150px;
}
#img_div img
{
  height: 100%;
  width: 100%;
}
/*table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th,td
{
  width: 19%;
}*/
.grid-container {
  display: grid;
  grid-template-columns: auto;
  grid-auto-rows: 250px;
  grid-gap: 2%;
  background-color: grey;
  padding: 10px;
  cursor: pointer;

}
.grid-container>div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding:20px 10px;
  font-size: 20px;
  margin-top: 10px;
  
}
.grid-container img
{
  width: 100%;
  height: 80%;
  padding: 10px 10px 10px 10px;
}
.grid-container input
{
  width: 100%;
  height: 20%;
  background:transparent;
  border: none;
  text-align: center;
  font-size:40px;
  font-family: Simplifica;
}
@media only screen and (min-width: 551px) and (max-width: 1000px){
    .grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-auto-rows: 300px;
  grid-gap: 2%;
  background-color: #2196F3;
  padding: 10px;
}
.grid-container>div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding:20px 0;
  font-size: 20px;
}
.grid-container img
{
  width: 100%;
  height: 80%;
  padding: 10px 10px 10px 10px;
}
.grid-container input
{
  width: 100%;
  height: 20%;
  background:transparent;
  border: none;
  text-align: center;
  font-size:40px;
  font-family: Simplifica;
}
}
@media only screen and (min-width: 200px) and (max-width: 550px){
    .grid-container {
  display: grid;
  grid-template-columns: auto auto;
  grid-auto-rows: 220px;
  grid-gap: 15px;
  background-color: #2196F3;
  padding: 10px;
}
.grid-container>div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding:20px 0;
  font-size: 20px;
}
.grid-container img
{
  width: 100%;
  height: 80%;
  padding: 10px 10px 10px 10px;
}
.grid-container input
{
  width: 100%;
  height: 20%;
  background:transparent;
  border: none;
  text-align: center;
  font-size:40px;
  font-family: Simplifica;
}
}


</style>    

 
 
</head>
<body>
<?php
include 'connection.php';
?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      
        <a class="navbar-brand" href="#">
          <img src="http://localhost/company/pro2/assets/image/logo.jpg" width="150" height="30" alt="">
        </a>
        <a href="#menu-toggle" class="sidebar-toggle" style="color: white;" data-widget="pushmenu" data-toggle="offcanvas" class="btn btn-secondary" id="menu-toggle"><i class="fa fa-bars"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
         
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
             <?php
              $conn=mysqli_connect("localhost","root","","comp");
              $query = "SELECT id from admin ";
              $result = mysqli_query($conn, $query);
              while($row=mysqli_fetch_array($result))
              {
                $id=$row['id'];
              }

              ?>
              <a class="nav-link" href="profile.php?ide=<?php echo $id; ?>">
               <?php
        if($_SESSION["Name"]) {
 echo $_SESSION["Name"]; 
}else echo "<h1>Please login first .</h1>" .header('location:http://localhost/company/pro2/login.php');
?>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" href="http://localhost/company/pro2/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>logout</a>
            </li>
           
          </ul>
        </div>
      
    </nav>

    <!-- Page Content -->
    
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="http://localhost/company/pro2/assets/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/company/pro2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div id="wrapper" class="toggled">

    <?php include "side.php" ?>