<?php
session_start();
include "includes/config.php";
include "includes/database.php";

//Signup start facebook 

date_default_timezone_set('Asia/Kolkata');


$dates=date("Y-m-d h:i:sa");



$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token']))
 {
  $access_token = $_SESSION['access_token'];
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }


 
 $graph_response = $facebook->get("/me?fields=name,email", $access_token);
 
 $facebook_user_info = $graph_response->getGraphUser();
//  print_r($facebook_user_info);
 
 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }
 
 if(!empty($facebook_user_info['email']))
 {
     $_SESSION['user_email'] = $facebook_user_info['email'];
    }
    
}


?>
    <?php 
    if(!(isset($facebook_login_url)))
    {
                
    $name = $_SESSION['user_name'];
    $email =  $_SESSION['user_email'];
    
    $token=bin2hex(random_bytes(15));
    // echo $random; 
 
    $select="SELECT * FROM `facebookuser` WHERE `email`='$email'";
    $fire=mysqli_query($con,$select);
    $row=mysqli_num_rows($fire);
    
    if($row>0){
        $data=mysqli_fetch_assoc($fire);
        $gettoken=$data['token'];
        $update="UPDATE `facebookuser` SET `token`='$token',`name`='$name',`email`='$email',`date`='$dates' WHERE `token`='$gettoken'";
        $updatequery=mysqli_query($con,$update);
        if($updatequery){
if(isset($_SESSION['login'])){
    $_SESSION['logout']=$token;
    header("Location:page-login.php");
    
}else{

    $_SESSION['logout']=$token;
    header("Location:page-register.php");
}


}
}else{
    
    
    
    $insert = "INSERT INTO `facebookuser`(`token`,`name`, `email`) VALUES ('$token','$name','$email')";
    $insertquery = mysqli_query($con, $insert);
    
    if ($insertquery) {
            if(isset($_SESSION['login'])){
                $_SESSION['logout']=$token;
                header("Location:page-login.php");
                
            }else{
            
                $_SESSION['logout']=$token;
                header("Location:page-register.php");
            }

        }
    }
      }
    
    ?>
   

<?php
//   Signup over with facebook 

  ?>

