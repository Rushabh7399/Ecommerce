<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://localhost/company/pro2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>
.grid-container {
  display: grid;
  grid-template-columns: 24% 24% 24% 24%;
  grid-auto-rows: 400px;
  grid-gap: 1%;
  background-color: grey;
  padding: 10px;
  cursor: pointer;
   

}
.grid-container>div {
  background-color: white;
  text-align: center;
  padding:10px 10px;
  font-size: 30px;
  margin-top: 10px;
  
}
.grid-container img
{
  width: 100%;
  height: 80%;
  padding: 10px 10px 10px 10px;
  border:1px grey;
  border-radius: 25px;

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
@media only screen and (max-device-width: 800px) and (min-width: 550px){
    .grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
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
@media only screen and (max-width: 550px) {
    .grid-container {
  display: grid;
  grid-template-columns: auto;
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
.container-flud
{
  
  background-color: grey;
  color: white;
}


</style>
</head>
<body>
<?php

include 'header.php';
include 'admin/connection.php';
?>


<br>
<?php
$a=$_GET['id'];


if(isset($_POST['search']))
      {
            $valueToSearch = $_POST['valueToSearch'];
              
            $query = "SELECT * from products WHERE cat_id=$a AND  `product_Name` LIKE '%".$valueToSearch."%'";
            $result =mysqli_query($conn, $query);
            if(!$result)
            {
              echo "Not selected";
            }
    
      }
      else {
        $perpage = 4;
          if(isset($_GET["page"])){
            $page = intval($_GET["page"]);
          }
         /* else {
            $page = 1;
          }
              $calc = $perpage * $page;
              $start = $calc - $perpage;*/
         
                $query = "SELECT * from products where cat_id=$a ";
                $result = mysqli_query($conn, $query);
        } ?>
 <div class="container-flud">
                <form action="pro.php?id=<?php echo $a;  ?>" method="post">
                  <input type="text" name="valueToSearch" placeholder="value to search" style=" width: 400px; height: 44px;">
                  
                  <button type="submit" name="search" value="Filter" class="btn btn-primary">SEARCH</button>
                </form>
                  
  
</div>
<div class="grid-container">

       
<?php 
 while($row=mysqli_fetch_assoc($result))
{ ?>



  <div class="item"><a href="pro_detail.php?id=<?php echo $row["id"]; ?>"><img src="admin/images/<?php echo $row["image"]; ?>" alt="Los Angeles"  title="<?php echo $row["product_Name"]; ?>" id="im"></a><input type="text" value="<?php echo $row["product_Name"]; ?>" readonly></div>

 <?php }
   
  ?> 

</div>
<!-- <?php

    if(isset($page))

    {

        $result = mysqli_query($conn,"select Count(*) As Total from products");

        $rows = mysqli_num_rows($result);

    if($rows)

    {

        $rs = mysqli_fetch_assoc($result);

        $total = $rs["Total"];

    }

        $totalPages = ceil($total / $perpage);?>
        <ul class="pagination" style="float: right;">
    <?php
    if($page <=1 ){ ?>

    <li class="page-item disabled"><span id='page_links' ><a class="page-link" href="#">Prev</a></span></li>

    <?php }

    else

    {

    $j = $page - 1;
    ?>

    <li class="page-item"><span><a id='page_a_link' class="page-link" href='pro.php?page=<?php echo $j; ?>'>Prev</a></span></li>

    <?php }

        for($i=1; $i <= $totalPages; $i++)

        {

        if($i<>$page)

{ ?>

<li class="page-item"><span><a id='page_a_link' class="page-link" href='pro.php?page=<?php echo $i; ?>'> <?php echo $i; ?> </a></span></li>

<?php }

else

{ ?>

<li class="page-item"><span id='page_links' ><a class="page-link" href="#"><?php echo $i; ?> </a></span></li>

<?php }

}

if($page == $totalPages )

{ ?>

<li class="page-item disabled"><span id='page_links' ><a class="page-link" href="#">Next </a></span></li>

<?php }

else

{

$j = $page + 1;
 ?>
<li class="page-item"><span><a id='page_a_link' class="page-link" href='pro.php?page=<?php echo $j; ?> && id=<?php echo $id;  ?>'>NEXT</a></span></li>
<?php }

}

?> -->

<hr>
<hr>
<?php
$a=$_GET['id'];
$sq="SELECT * from products where cat_id=$a";
$re=mysqli_query($conn,$sq);
while($row=mysqli_fetch_assoc($re))
{
  $name=$row["cat_name"];
} ?>
<div class="container-flud">
  <h1>SHOP BY BRAND</h1>
</div>

<?php
$sql="SELECT * from sub_category where cat_id=$a";
$res=mysqli_query($conn,$sql);

 ?>
<div class="grid-container">
<?php
 while($row=mysqli_fetch_assoc($res))
{ ?>



  <div class="item"><a href="prob.php?id=<?php echo $row["id"]; ?>"><img src="admin/images/<?php echo $row["B_image"]; ?>" alt="Los Angeles"  title="<?php echo $row["B_Name"]; ?>" id="im"></a><input type="text" value="<?php echo $row["B_Name"]; ?>" readonly></div>

 <?php }
   
  ?> 


</body>
</html>
