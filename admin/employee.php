 <?php include 'head.php';   ?>
 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
     <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 </head>
 <style type="text/css">

#a1
{
    text-align: center;
}
table,tr
{
    width:100%;
}
 </style>
 <body>
 

    <div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-4">
            <button type="button"><a href="new.php">New</a></button>
        </div>
    </div>
    
</div>
<?php
include 'connection.php';

$res=mysqli_query($conn,"select Id,Name,Phone,Desg from employee");
$row=mysqli_num_rows($res);
echo "<table border='1'>";

echo "<tr> <th>ID</th> <th>Name</th> <th>Phone</th> <th>Desg</th> <th>Action1</th>  <th>Action2</th> </tr>";
if( $row >0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        echo'
        <tr><td>'.$row["Id"].'</td> <td>'.$row["Name"].'</td> <td>'.$row["Phone"].'</td> <td>'.$row["Desg"].'</td> <td><a href="edit.php?id='.$row["Id"].'">Edit</a> </td> <td><a href="delete.php?id='.$row["Id"].'">Delete</a></td> </tr>
        ';
    }
}
echo "</table>"
?>
</div>



 </body>
 </html>


  