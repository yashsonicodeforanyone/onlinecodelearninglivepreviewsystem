<?php
session_start();
include "includes/config.php";
include "includes/database.php";
date_default_timezone_set('Asia/Kolkata');


$dates=date("Y-m-d h:i:sa");



if (isset($_GET["code"])) {

 
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if (!isset($token['error'])) {

     $google_client->setAccessToken($token['access_token']);


     $_SESSION['access_token'] = $token['access_token'];
     // echo $_SESSION['access_token'];
 

     $google_service = new Google_Service_Oauth2($google_client);


     $data = $google_service->userinfo->get();
     // print_r($data);


//                                     take  name
     if (!empty($data['given_name'])) {

         $_SESSION['user_first_name'] = $data['given_name'];
         // echo $_SESSION['user_first_name'];
     }
     
     //                             
     if (!empty($data['family_name'])) {
         $_SESSION['user_last_name'] = $data['family_name'];
         // echo $_SESSION['user_last_name'];
     }
     
     if (!empty($data['email'])) {
         $_SESSION['user_email_address'] = $data['email'];
         // echo $_SESSION['email'];
     }
 }
}





if(!(isset($login_button))){
    ?>
    <html>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php

    $random=random_bytes(15);        
    $firstname = $_SESSION['user_first_name'];
    $lastname = $_SESSION['user_last_name'];
    $email =  $_SESSION['user_email_address'];
    $name = $firstname . ' ' . $lastname;
    
    $token=bin2hex(random_bytes(15));
    // echo $random; 
 
    $select="SELECT * FROM `gmailuser` WHERE `email`='$email'";
    $fire=mysqli_query($con,$select);
    $row=mysqli_num_rows($fire);
    
    if($row>0){
        $data=mysqli_fetch_assoc($fire);
        $gettoken=$data['token'];
        // $update="UPDATE `email` SET `token`='$token',`name`='$name',`email`='$email' WHERE `token`='$gettoken'";
        $update="UPDATE `gmailuser` SET `token`='$token',`name`='$name',`email`='$email',`date`='$dates' WHERE `token`='$gettoken'";
        $updatequery=mysqli_query($con,$update);
        if($updatequery){
          


                            if(isset($_SESSION['login'])){
                                $_SESSION['login_id']=$token;
                                $_SESSION['gemail']=$email;
                                ?>
                    
                                <script>
                                swal("Good job!", "Your Gmail Login!", "success");
                               setTimeout(function () {
                                window.location.replace("http://localhost/website%20my/User/userfinal/index.php");
                                   
                               }, 2000);
                                    
                                
                               </script>
                                
                               <?php
                    
                }else{
                    $_SESSION['gemail']=$email;
                    $_SESSION['login_id']=$token;
                    ?>
        
                    <script>
                    swal("Good job!", "Your Gmail Login!", "success");
                    setTimeout(function () {
                        window.location.replace("http://localhost/website%20my/User/userfinal/index.php");
                        
                    }, 2000);
                    
                    
                    </script>
                    
                   <?php
                }
                
            }
        }else{
            
            
            
            $insert = "INSERT INTO `gmailuser`(`token`,`name`, `email`) VALUES ('$token','$name','$email')";
            $insertquery = mysqli_query($con, $insert);
            
            if ($insertquery) {
                if(isset($_SESSION['login'])){
                    $_SESSION['login_id']=$token;
                    $_SESSION['gemail']=$email;
                    ?>
                    
                                <script>
                                swal("Good job!", "Your Gmail Login!", "success");
                                setTimeout(function () {
                                    window.location.replace("http://localhost/website%20my/User/userfinal/index.php");
                                    
                                }, 2000);
                                
                                
                                </script>
                                
                               <?php
            
        }else{
            $_SESSION['gemail']=$email;
            $_SESSION['login_id']=$token;
            ?>

            <script>
            swal("Good job!", "Your Gmail Login!", "success");
           setTimeout(function () {
            window.location.replace("http://localhost/website%20my/User/userfinal/index.php");
               
           }, 2000);
                
            
            </script>
            
           <?php
        }

    }
 
}
?>
    </body>
</html>

<?php
}


?>