<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
.col-md-6
{
	padding:20px 20px 20px 20px;
}
.col-md-6 img
{
	width:100%;
	height: 500px;
	
}
header
{
	font-size: 55px;
}
.done
{
	
	margin-bottom: 10px;
	margin-left: 20px;
	font-size: 25px;
	color: #F6F5FC;

	background-color: #39DB49;
	margin-top: 10px;
	height: 50px;
	width: 80%;
}
.lll

{
	
	/*background-color:#2582CA;*/
	
	background-color: #E6CEE3;
	margin-top: 20px;
	padding-top: 10px;
	opacity: 0.9;


	background:transparent;



}
.a1
{
	
	width:80%;
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline:none;
	color: orange;
	font-size: 20px;
	margin-bottom: 20px;
	

}
.a11
{
	
	width:80%;
	
	border: 1px solid #fff;
	background: transparent;
	outline:none;
	color: orange;
	font-size: 20px;
	margin-bottom: 20px;
	

}
.r1
{
	margin-left: 20px;
	font-size: 20px;
	color: white;
	font-weight: bold;



}
#m1
{
	font-weight: bold;
	font-size: 40px;
	color: white;
	text-align: center;
}
a.selected {
  background-color:#1F75CC;
  color:white;
  z-index:100;
}

.messagepop {
  background-color:#FFFFFF;
  border:1px solid #999999;
  cursor:default;
  display:none;
  margin-top: 15px;
  position:absolute;
  text-align:left;
  width:394px;
  z-index:50;
  padding: 25px 25px 20px;
}

label {
  display: block;
  margin-bottom: 3px;
  padding-left: 15px;
  text-indent: -15px;
}

.messagepop p, .messagepop.div {
  border-bottom: 1px solid #EFEFEF;
  margin: 8px 0;
  padding-bottom: 8px;
}
.btn
{
	width: 180px;
}
#pri
{
	font-size: 45px;
}
a
{
	text-decoration-line: none;

}

</style>
</head>
<body>
<?php

include 'header.php';
include 'admin/connection.php';
?>
<script type="text/javascript">
	function deselect(e) {
  $('.pop').slideFadeToggle(function() {
    e.removeClass('selected');
  });    
}

$(function() {
  $('#contact').on('click', function() {
    if($(this).hasClass('selected')) {
      deselect($(this));               
    } else {
      $(this).addClass('selected');
      $('.pop').slideFadeToggle();
    }
    return false;
  });

  $('.close').on('click', function() {
    deselect($('#contact'));
    return false;
  });
});

$.fn.slideFadeToggle = function(easing, callback) {
  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};
</script>

<?php
$a=$_GET['id'];

$sql="SELECT * from products where id=$a";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo "not ";
}
 


 while($row=mysqli_fetch_assoc($res))
{ 
	$product_Name=$row["product_Name"];
	$price=$row["price"];
	$image=$row["image"];
	$desp=$row["desp"];
	$id=$row["id"];
	$cat=$row["cat_name"];
 }
   
  ?> 
<div class="container-flud">
	<div class="row">
		 <div class="col-md-6">
		 <header style="text-transform: uppercase;"><?php echo $cat; ?></header>
		 </div>
	</div>
	
</div>

<div class="container-flud">
	<div class="row">
		<div class="col-md-6">
			 <img src="admin/images/<?php echo $image; ?>" alt="Los Angeles"  title="<?php echo $Name; ?>" id="im">
		</div>
		<div class="col-md-6">
			 <header style="text-transform: uppercase;">
			 	<?php echo $product_Name; ?>
			 </header>
			 <p><bold><?php echo $desp; ?></bold></p>
			 <p><strong>Price</strong></p>
			 <p id="pri"><bold><strong>RS.</strong><?php echo $price; ?><strong>only</strong></bold></p>
			 <form method="POST" action="cart_add.php">
			 	<input type="hidden" name="id" value="<?php echo $id; ?>">
			 	<input type="number" name="quantity" placeholder="quantity" value="1">
			 	
			 	<button type="submit" name="BUY" class="btn " >BUY</button>
			 </form>
			 
			 <br>
			 <br>
			 <button id="contact">Inquiry</button>
		</div>

		
	</div>
	
</div>
<div class="messagepop pop">
  <form method="post" id="new_message" action="inq_submit.php">
   <p >Name:</p>
	 						<input class="a1" type="text" name="Name"   style="margin-left: 20px" required>
	 
						<p >Phone</p>
	
							<input class="a1" type="text" name="Phone"   style="margin-left: 20px" required>
	 					<p >Email: </p>
	 						<input class="a1" type="text" name="Email"   style="margin-left: 20px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
						<p >Message: </p>
							<textarea 
								
        						id="text" 
        						cols="40" 
        						rows="4" 
        						name="msg" 
        						style="margin-left: 20px"
        						placeholder="write here"></textarea>
							<input  type="hidden" name="product_id" value="<?php echo $id; ?>"   style="margin-left: 20px">
 							 
    <p><input type="submit" value="Send Message" name="submit" id="message_submit"/> or <a class="close" href="/">Cancel</a></p>
  </form>
</div>



</body>
</html>
<!-- <div class="container-flud" style="background-color: black; color: white;">
				<div class="a2">
					<form method="POST" id="My_Form" action="pro_submit.php" enctype="multipart/form-data">
						
						<label class="r1">Name</label>
	 						<input class="a1" type="text" name="Name"  id="f1" style="margin-left: 40px" >
	 					<br>
	 					
	 					<input type="hidden" name="size" value="1000000">
    
    						<label class="lab" id="bb"><center>UPLOAD HERE
      						<input type="file" name="image"  id="File"></center>
      						</label>
    					<br>
    					<textarea 
        				id="text" 
        				cols="40" 
        				rows="4" 
        				name="desp" 
        				placeholder="aaa"></textarea>
              <br>
             <label>category</label> 
	 					<select name="category">
              <?php
                  $sql="SELECT Name from category";
                  $res=mysqli_query($conn,$sql);
                  while ($row=mysqli_fetch_array($res)) { ?>
                    <option value="<?php echo $row["Name"];  ?>"><?php echo $row["Name"];  ?></option>';
                  <?php }

              ?>
            </select>
						<br>
						<label class="r1">Activity</label>
							<input class="a1" type="number" name="activity" id="f3"  style="margin-left: 40px" >
						<br>
							<input class="done" type="submit" value="upload" > 
					</form>
				</div>
			</div>

	
</div> -->
