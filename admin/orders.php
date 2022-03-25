<?php session_start(); ?>
<?php include "head.php" ?>
<?php


include 'connection.php';
?>

<?php
//$sql="SELECT employee.*,orders.total_amount,orders.id from employee LEFT JOIN orders ON orders.user_id=employee.Id";
$sql="SELECT orders.*,employee.Name,employee.Email from orders LEFT JOIN employee ON employee.Id=orders.user_id";

$res=mysqli_query($conn,$sql);
 ?>
<div id="page-content-wrapper">
<div class="container-fluid">
  <h1>Orders</h1>
</div>
    <div class="container-fluid">
       

<table class="table table-striped" id="myTable">

          <tr> 
          <th>id </th> 
          <th >Name</th> 
          <th >Total_amount</th>
          <th>Email</th>
          
          <th>Action2</th> </tr>
        <?php
            while($row=mysqli_fetch_array($res)):
            {
                echo'
                <tr>
                <td>'.$row["id"].'</td> 
                <td>'.$row["Name"].'</td>
                <td><i class="fa fa-inr"></i> '.$row["total_amount"].'</td>
               
                <td>'.$row["Email"].'</td>  
                
                <td><a href="order_detail.php?id='.$row["id"].'">Order-detail</a></td>
                </tr>
                ';
            }
        endwhile;
        ?>
        </table>

 

       
    </div>
</div>
<?php include "foot.php" ?>