<?php
session_start();
unset($_SESSION["Email"]);
unset($_SESSION["type"]);
//session_destroy();
session_unset();
header("Location:cat.php");
?>