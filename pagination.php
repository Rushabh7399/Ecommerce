<?php

$conn=mysqli_connect("localhost","root","","a");

?>

<!DOCTYPE >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagination</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>

<table style="border: 1px #000000 solid;" width="400" cellspacing="2" cellpadding="2" align="center">
<?php

$perpage = 3;

if(isset($_GET["page"])){
$page = intval($_GET["page"]);
}
else {
$page = 1;
}
$calc = $perpage * $page;
$start = $calc - $perpage;
$result = mysqli_query($conn, "select * from post Limit $start, $perpage");

$rows = mysqli_num_rows($result);

if($rows){
$i = 0;
while($post = mysqli_fetch_assoc($result)) {
?>
<tbody>
<tr style="background-color: #cccccc;">

<td style="font-weight: bold;font-family: arial;"><?php echo $post["title"]; ?></td>

</tr>

<tr>

<td style="font-family: arial;padding-left: 20px;"><?php echo $post["detail"]; ?></td>

</tr>
<?php
}
}
?>


</tbody>
</table>


<?php

if(isset($page))

{

$result = mysqli_query($conn,"select Count(*) As Total from employee");

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

<li class="page-item"><span><a id='page_a_link' class="page-link" href='pagination.php?page=<?php echo $j; ?>'>Prev</a></span></li>

<?php }

for($i=1; $i <= $totalPages; $i++)

{

if($i<>$page)

{ ?>

<li class="page-item"><span><a id='page_a_link' class="page-link" href='pagination.php?page=<?php echo $i; ?>'> <?php echo $i; ?> </a></span></li>

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
<li class="page-item"><span><a id='page_a_link' class="page-link" href='pagination.php?page=<?php echo $j; ?>'>NEXT</a></span></li>
<?php }

}

?>


</body>
</html>