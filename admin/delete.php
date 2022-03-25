<?php
require('connection.php');
$Id=$_REQUEST['id'];
$query = "DELETE FROM employee WHERE id=$Id"; 
$result = mysqli_query($conn,$query) ;

header("Location: admin.php");
?>