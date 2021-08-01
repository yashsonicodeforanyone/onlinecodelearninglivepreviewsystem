<?php
include "../includes/database.php";


if(isset($_GET['id'])){
    $token=$_GET['id'];
    echo $token;
$x=1;
    $sel=mysqli_query($con,"UPDATE `user` SET `mailopenornot`='$x' WHERE `token`='$token'");

}




?>