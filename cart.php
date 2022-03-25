<?php  
//session_start();
//unset($_SESSION['cart']);  ?>
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
<style type="">
.a
{
  height: 150px;
  width: 150px;
}
</style>
<body>
<?php   
include 'admin/connection.php';
include 'header.php';
 //echo "<pre>"; print_r($_SESSION);exit;


?>
<div class="container">
  <div class="row">
      <h1>Your Cart</h1>
  </div>
</div>
<?php
if(isset($_GET['id']))
  { 
    $a=$_GET['id'];
   
    if($a)
    { ?>
    <?php
    $b=$a-1;
    /*if(isset($_SESSION['cart']['product']))
    {
      print_r($_SESSION['cart']['product']);
    }*/
    //unset($_SESSION[$a]);
      //print_r($_SESSION['cart']['product'][$b]); exit;
      unset($_SESSION['cart']['product'][$b]);
     }
      
  }
  ?>
  
<div class="container-flud">
  <table class="table ">

  <thead>
    <tr>
      <th>cart_id</th>
      <th>Id</th>
      <th>Name</th>
      <th>image</th>
      <th>quantity</th>
      <th>price</th>
      <th>sub_total</th>
      <th>remove</th>
    </tr>
  </thead>
  <tbody>
  <?php
      if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
      {
        $sum=0;$i=0;
        $a=0;
        foreach ($_SESSION['cart']['product'] as $key => $value) { 
                $a+=count($key);
                
          ?>

        <tr>
          <?php $i++; ?>
          <td><?php echo $i; ?></td>
          <td><?php echo $value['id'];  ?></td>
          <td><?php echo $value['product_Name'];  ?></td>
          <td><img src="admin/images/<?php echo $value['image'];  ?>" class="a"></td>
          <td><?php echo $value['quantity'];  ?></td>
          <td><?php echo $value['price'];  ?></td>
          <td><?php echo $value['sub_total'];  ?></td>
          <td><a href="cart.php?id=<?php echo $key+1;  ?>">remove</a></td>
          <?php $sum+=$value['sub_total']; ?>
        </tr> 
      <?php  }
       
      } 

  ?>
 
   <!--   -->
  </tbody>
</table>
<?php
//print_r($_SESSION['cart']['product']);
//exit;
?>
<!-- <table class="table table-bordered" style="font-size: 23px;">
  <tr>
    <th>Total</th>
    <td style="text-align: center;"><bold><?php echo $sum;  ?></bold></td>
  </tr>
</table>
</div> -->
<div class="container-flud">
<form action="place_order.php" method="POST">
    <table class="table table-bordered" style="font-size: 23px;">
  <tr>
    <th>Total</th>
    <td style="text-align: center; border: none;"><bold><input type="text" style="border: none; float: right;" name="total" value="<?php echo $sum;  ?>"></bold></td>
  </tr>
</table>
  <input type="submit" name="submit"  class="btn btn-success" style="float: right; width: 250px;">
</form>
  
</div>
</body>
</html>
