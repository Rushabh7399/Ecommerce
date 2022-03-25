<?php  session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style type="text/css">
  .header
  {
    width: 100%;
    height: 10%;
  }
  .h
  {
    text-align: center;
  }
   #content{
    width: 100%;
    height:35%;
   
   }
   #a1{
    width: 100%;

    
   }
   /*form div{
    margin-top: 5px;
    text-align: center;
   }*/
   #img_div{
    width: 100%;
    height:100%;
    
    
    
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    
    width: 100%;
    height: 100%;
   }
   .lab{
    padding: 10px;
    background: red; 
    display: table;
    color: #fff;
    float: center;
     }

     .co
     {
      height: 700px;
      width: 33%;
      margin-left: 33%;
      border:1px solid black;
      background-color: grey;

     }
     .co2
     {
      width: 100%;
      margin-top: 12%;
     }
     .a1
     {
      border: none;
      background:transparent;
      color: white;
      font-size: 30px;

     }
     .r1
     {
        border: none;
      background:transparent;
      color: white;
      font-size: 30px;
     }
     .done
     {
       display:inline-block;
       height: 25px;



     }



input[type="file"] {
    display: none;

}
</style>
  <title></title>
  <?php
      
      $conn=mysqli_connect("localhost","root","","oopals");
      $a=$_SESSION['Id'];
      if(!$conn)
      {
        echo "not connected";
      }

    
   if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    

    // image file directory
    $target = "images/".basename($image);

    $sql = "UPDATE employee set image='$image' where id=$a";
    // execute query
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      
    }else{
     
    }
  }
  

 $sql="SELECT * from employee where id= $a";
    $res=mysqli_query($conn,$sql);

    if(!$res)
    {
      echo "not selected";
    }
    

 ?>   
</head>
<body>
<div class="co">
    <div id="header">
      <p class="h">Profile</p>
    </div>
    <div id="content">
    <?php
        while ($row = mysqli_fetch_array($res)) {
            echo "<div id='img_div'>";
                echo "<img src='images/".$row['image']."' >";
        
                echo "</div>";
              $Name = $row["Name"];
              $Email=$row["Email"];
              $Phone=$row["Phone"];
              $user_type=$row["user_type"];
    }
  ?>
  <form method="POST" action="profile.php" id="a1" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    
    <label class="lab" id="bb"><center>UPLOAD HERE
      <input type="file" name="image"  id="File"></center>
      </label>
    
    
   
      <button type="submit" name="upload">click here</button>
    
  </form>
</div>
<div class="co2" >
      <div class="a2">
        
        <form method="POST" id="My_Form" action="" >
        <input type="hidden" name="Id" value="<?php echo $id; ?>" >
          <label class="r1">Name:</label>
            <input class="a1" type="text" name="Name"  value="<?php echo "$Name"; ?>" id="f1" style="margin-left: 40px" >
          <br>
          <br>
          <label class="r1">Email:</label>
  
            <input class="a1" type="text" name="Email" value="<?php echo $Email; ?>" id="f2" style="margin-left: 40px" >
            <br><br>
          <label class="r1">Phone:</label>
            <input class="a1" type="text" name="Phone" value="<?php echo $Phone; ?>" id="f4" style="margin-left: 40px"  >
          <br><br>
          <label class="r1">Type:</label>
            <input class="a1" type="text" name="Phone" value="<?php echo $user_type; ?>" id="f4" style="margin-left: 40px"  >
          <br><br>
          
            <input class="done" type="submit" name="submit" value="Submit" > 
        </form>
      </div>
    </div>

</div>
 


</body>
</html>

