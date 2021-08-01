<?php
include "../includes/database.php";

if(isset($_POST['addcategory'])){
$coursename=$_POST['coursename'];
$coursecategory=$_POST['category'];
$uniqid=bin2hex(random_bytes(5));


$insert=mysqli_query($con,"INSERT INTO `category`(`coursename`, `coursecategory`, `uniqid`) VALUES ('$coursename','$coursecategory','$uniqid')");
if($insert){
    header("Location:../listofcategory.php");
}

}


if(isset($_POST['updatecategory'])){
$coursename=$_POST['coursename'];
$coursecategory=$_POST['category'];

$uniqid=$_POST['uniqid'];


$insert=mysqli_query($con,"UPDATE `category` SET `coursename`='$coursename',`coursecategory`='$coursecategory' WHERE `uniqid`='$uniqid'");
if($insert){
    header("Location:../listofcategory.php");
}

}

if(isset($_POST['delete'])){
$uniqid=$_POST['uniqid'];

$insert=mysqli_query($con,"DELETE FROM `category` WHERE `uniqid`='$uniqid'");
if($insert){
    header("Location:../listofcategory.php");
}

}


?>