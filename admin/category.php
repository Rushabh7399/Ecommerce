<?php session_start(); ?>

<?php include "head.php" ?>
<?php include 'connection.php'; ?>
<div id="page-content-wrapper" >
    
	
    <?php
	if(isset($_GET['id']))
	{
	
		$a=$_GET['id'];
		if($a=='1')
		{ 
			
  // Create database connection
  						

  // Initialize message variable
  						
 						

					?>
			<div class="container-flud">
				<div class="a2">
					<form method="POST" id="My_Form" action="cat_submit.php" enctype="multipart/form-data">
						
						<p class="r1">Name</p>
	 						<input class="a1" type="text" name="Name"  id="f1" style="margin-left: 40px" >
	 					<br>
	 					
	 					<input type="hidden" name="size" value="1000000">
    
    						<label class="lab" id="bb"><center>UPLOAD HERE
      						<input type="file" name="image"  id="File"></center>
      						</label>
    					<br>
    					<textarea 
        				 
        				cols="40" 
        				rows="4" 
        				name="desp" 
        				placeholder="aaa"></textarea>
	 					
						
						<p class="r1">Activity</p>
							<input class="a1" type="number" name="activity" id="f3"  style="margin-left: 40px" >
						<br>
							<input class="done" type="submit" value="upload" > 
					</form>
				</div>
			</div>

		<?php }
	}
	elseif(isset($_GET['ide']))
	{	
		$a=$_GET['ide'];
		
		if($a)
		{ ?>
		<?php
			

  // If upload button is clicked ...
  
 $query="SELECT * from category where id=$a";
		$res=mysqli_query($conn,$query);

		if(!$res)
		{
			echo "not selected";
		}
				 $msg = "";
		

		?>
		<div class="container-flud">
			<div class="a2">
			<?php
        while ($row = mysqli_fetch_array($res)) {
            echo "<div id='img_div'>";
                echo "<img src='images/".$row['image']."' >";
        
                echo "</div>";
                $img=$row["image"];
                $Id=$row["id"];
             		$Name = $row['Name'];
             		$desp=$row['desp'];
             		$activity=$row["activity"];
    			}
  			?>
  				<form method="POST" action="cat_editb.php" id="a1" enctype="multipart/form-data">
    				<input type="hidden" name="id" value="<?php echo $a; ?>" >
					
	 				
	 				<input type="hidden" name="size" value="1000000">
    
    						<label class="lab" id="bb" n>
      								<input type="file" name="image"  value="<?php echo $img; ?>" id="File"></center>
      						</label>
      			
      			
      				<p class="r1">Name</p>
	 					<input class="a1" type="text" name="Name"  value="<?php echo $Name; ?>" id="f1" style="margin-left: 40px" >
	 				<br>
		
      						<input type="hidden" name="id" value="<?php echo $a; ?>" >
      				<br>
    				<textarea 
        				id="text" 
           				cols="40" 
        				rows="4" 
        				name="desp" 
        				placeholder="<?php echo $desp; ?>"
        				></textarea>	
	
    				
					<p class="r1">ACTIVITY</p>
						<input class="a1" type="number" name="activity" value="<?php echo $activity; ?>" id="f4" style="margin-left: 40px" >
					<br>
					
						<input class="done" type="submit" name="submit" value="Submit" > 
				</form>
			</div>
		</div>
  
 
  
  				


<?php	}
			
	}
	elseif(isset($_GET['del']))
	{
		$a=$_GET['del'];
		if($a)
		{

$Id=$_GET['del'];
$query = "DELETE FROM category WHERE id=$Id"; 
$result = mysqli_query($conn,$query) ;



		}
	}
	else
	{ ?>
		<link rel="stylesheet" type="text/css" href="assets/css/table-css.css">
		<div class="container-fluid">
        	<h1>User Management</h1>
        		<div class="container">
    				<div class="row">
        				<div class="col-lg-4 col-sm-4 col-4">
            				
        				</div>
    				</div>
    
				</div>
		<?php
			include 'connection.php';

			if(isset($_POST['search']))
			{
    				$valueToSearch = $_POST['valueToSearch'];
   
    				$query = "SELECT id,Name,image from category WHERE CONCAT(`Id`, `Name`, `image`) LIKE '%".$valueToSearch."%'";
    				$result =mysqli_query($conn, $query);
    
			}
 			else {
 					$perpage = 2;
 					if(isset($_GET["page"])){
						$page = intval($_GET["page"]);
					}
					else {
						$page = 1;
					}
							$calc = $perpage * $page;
							$start = $calc - $perpage;
    						$query = "SELECT * from category Limit $start, $perpage";
    						$result = mysqli_query($conn, $query);
				}

				?>
			
				<form action="category.php" method="post">
						<button type="button"><a href="category.php?id=1">New</a></button>
            			<input type="text" name="valueToSearch" placeholder="Value To Search" style="float:right">
            			<input type="submit" name="search" value="Filter" style="float:right; margin-right:20px;"><br><br>		
					<table class="table table-striped" id="myTable">

					<tr> 
					<th onclick="sortTable(0)" >ID</th> 
					<th onclick="sortTable(1)">Name</th> 
					<th onclick="sortTable(1)" >desp</th> 
					<th onclick="sortTable(1)" >image</th> 
					
					<th onclick="sortTable(0)" >Activity</th>
					
					<th>Action1</th>  
					<th>Action2</th> </tr>
				<?php
    				while($row=mysqli_fetch_array($result)):
    				{
        				echo'
        				<tr>
        				<td>'.$row["id"].'</td> 
        				<td>'.$row["Name"].'</td>
        				<td>'.$row["desp"].'</td>';
        				echo "<td><div id='img_div'><img src='images/".$row['image']."'></td></div>";
        				echo '<td>'.$row["activity"].'</td>  
        				<td><a href="category.php?ide='.$row["id"].'">Edit</a> </td> 
        				<td><a href="category.php?del='.$row["id"].'">Delete</a></td>
        				</tr>
        				';
    				}
				endwhile;
				?>
				</table>
				</form><br><br>
				<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
$(document).ready(function(){
    $('th').css( 'cursor', 'pointer' );
});
Click
</script>

		
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

<li class="page-item"><span><a id='page_a_link' class="page-link" href='category.php?page=<?php echo $j; ?>'>Prev</a></span></li>

<?php }

for($i=1; $i <= $totalPages; $i++)

{

if($i<>$page)

{ ?>

<li class="page-item"><span><a id='page_a_link' class="page-link" href='category.php?page=<?php echo $i; ?>'> <?php echo $i; ?> </a></span></li>

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
<li class="page-item"><span><a id='page_a_link' class="page-link" href='category.php?page=<?php echo $j; ?>'>NEXT</a></span></li>
<?php }

}

?>
	</div>
<?php	}
	?>

</div>

<?php include "foot.php" ?>