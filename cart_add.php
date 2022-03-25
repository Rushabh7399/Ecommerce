
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
include 'admin/connection.php';
include 'header.php';
?>
<?php
$pro_id=$_POST['id'];
if(isset($_SESSION['Name']))
{

}
else
{
	header('location:login.php');
}
$product=array();
$pro_id=$_POST['id'];

//echo "<pre>";  print_r($_SESSION); exit;

$sql="SELECT * from products where id=$pro_id";
$res=mysqli_query($conn,$sql);
$product=array();

/*if(isset($_SESSION['cart'])) {
	//print_r($_SESSION['cart']); exit;
	
		$ids = array_column($_SESSION['cart']['product'], 'id');
			while($row=mysqli_fetch_array($res))
			{
				
				//if(in_array($row['id'],$ids))
				if($row['id'] == $ids)
				{
					
					//$value['quantity']=$value['quamtity']+$value['quantity'];
					
				}
				
			}

		
	}
}

echo "<pre>"; print_r($_SESSION['cart']['product']);*/
//echo $product['quantity'];
//echo $value['quantity'];
//echo "<pre>"; print_r($product);
/*while($row =mysqli_fetch_array($res)){
	$ro=(object) $row;
    $ids = array_column($product, 'id');
    print_r($ids);
    if(in_array($ro->id, $ids)){
        echo $ro->id;exit;
    }else{
        $product['id']=$_POST['id'];
	$product['quantity']=$_POST['quantity'];
	$product['product_Name']=$row['product_Name'];
	$product['price']=$row['price'];
	$product['image']=$row['image'];
	$product['sub_total']=$product['quantity']*$product['price'];
    }
}*/
		                        $flag=true;
			
			echo "<pre>"; print_r($_SESSION['cart']['product']);
              
              foreach ($_SESSION['cart']['product'] as $key => $value)  
                    {
                    	
                    	//print_r($_SESSION['cart']['product']);exit;
                       //print_r($_SESSION['cart']['product'][$key]['id']);exit;
                       
		                        if($_SESSION['cart']['product'][$key]['id'] == $pro_id)
		                        { 
		                          $_SESSION['cart']['product'][$key]['quantity']=$_SESSION['cart']['product'][$key]['quantity']+$_POST['quantity'];
		                          $_SESSION['cart']['product'][$key]['sub_total']=$_SESSION['cart']['product'][$key]['quantity']*$_SESSION['cart']['product'][$key]['price'];
		                          $flag=false;
		                          break;
		                        }
		                        
		                    	
                        
                    }

                    //echo $flag."lllllll";
            
            if($flag)
            {

            	//print "Sumer Pal";

            	 $nextItem = count($_SESSION["cart"]["product"]);
		            	while($row=mysqli_fetch_assoc($res))
								{ 

												$_SESSION["cart"]["product"][$nextItem]['id']=$_POST['id'];
												$_SESSION["cart"]["product"][$nextItem]['quantity']=$_POST['quantity'];
												$_SESSION["cart"]["product"][$nextItem]['product_Name']=$row['product_Name'];
												$_SESSION["cart"]["product"][$nextItem]['price']=$row['price'];
												$_SESSION["cart"]["product"][$nextItem]['image']=$row['image'];
												$_SESSION["cart"]["product"][$nextItem]['sub_total']=$_POST['quantity']*$row['price'];

											
		                      }
            }
    
//echo "<pre>"; print_r($_SESSION['cart']['product']);
  
/*$name=$product['product_Name'];
$tot=$product['sub_total'];*/
/*/$cart[]=$product;
/*$total=array_column($product, 'product_Name');
print_r($total); exit;
$sum = 0;
foreach($product as $name=>$tot)
{
   $sum+= $tot;
}
echo $sum;*/
//$_SESSION["cart"]["product"][]=$product;

header('location:cart.php');
?>
</body>
</html>