<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: 23% 23% 23% 23%;
  grid-auto-rows: 400px;
  grid-gap: 2%;
  background-color: grey;
  padding: 10px;
  cursor: pointer;

}
.grid-container>div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding:20px 10px;
  font-size: 30px;
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

include 'header.php';
include 'admin/connection.php';
?>
<div class="container-flud">
<header style="font-size: 45px; background-color: grey; "><strong style="font-weight: 33px;">C</strong>ategories</header>
  
</div>
<?php
$sql="SELECT * from category";
$res=mysqli_query($conn,$sql); ?>
<div class="grid-container">

<?php
 while($row=mysqli_fetch_assoc($res))
{ ?>



  <div class="item"><a href="pro.php?id=<?php echo $row["id"]; ?>"><img src="admin/images/<?php echo $row["image"]; ?>" alt="Los Angeles"  title="<?php echo $row["Name"]; ?>" id="im"></a><input type="text" value="<?php echo $row["Name"]; ?>" readonly></div>

 <?php }
   
  ?> 
</div>

</body>
</html>
