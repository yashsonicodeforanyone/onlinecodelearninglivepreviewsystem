<?php
include "includes/database.php";
if(isset($_GET["code"]))
{
    $token=$_GET['code'];
    $x=1;
 $query="UPDATE `user` SET `mailopenornot`='$x' WHERE `token`='$token'";
$result=mysqli_query($con,$query);

 }
?>