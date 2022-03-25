<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","Oopals");
if(!$conn)
{
	echo "not connected";
}
$Name=$_POST["Name"];
$Phone=$_POST["Phone"];
$product_id=$_POST["product_id"];
$Email=$_POST["Email"];
$msg=$_POST["msg"];
$sql="INSERT into inquiry(Name,Phone,Email,product_id,msg) values('$Name','$Phone','$Email','$product_id','$msg')";
$res=mysqli_query($conn,$sql);
if(!$res)
{
	echo" not added in database";
}
ini_set("SMTP","localhost");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
ini_set("smtp_port","25");

// Please specify the return address to use
ini_set('sendmail_from', 'shah73rushabh@gmail.com'); 
if(isset($_POST['submit'])){
    $to = $_POST['Email']; // this is your Email address
    $from ="shah73rushabh@gmail.com" ; // this is the sender's Email address
    $first_name = $_POST['Name'];
    
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $Name . " wrote the following:" . "\n\n" . $_POST['msg'];
    $message2 = "Here is a copy of your message " . $Name . "\n\n" . $_POST['msg'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $Name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>



</body>
</html>