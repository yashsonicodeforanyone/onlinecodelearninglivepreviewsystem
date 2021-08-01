<?php
include "../includes/database.php";
if(isset($_POST['email'])){

    $email = $_POST['email'];
    $enterpin = $_POST['enterpin'];
$actualotp = $_POST['ot'];
$token = $_POST['token'];

if ($enterpin == $actualotp) {

    

    $loginid=bin2hex(random_bytes(20));
$verify="verify";
$resultinsert=mysqli_query($con,"UPDATE `user` SET `loginid`='$loginid',`status`='$verify' WHERE `email`='$email' and `token`='$token'");
if($resultinsert)
{
    require '../../../mailfolder/PHPMailerAutoload.php';
$mail = new PHPMailer();
// $mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;
$mail->Username = "Onlinefree8888@gmail.com";     #this email is only used to practice purpose 
$mail->Password = "Abc@12345678";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("Onlinefree8888@gmail.com", "yash soni");
$mail->AddReplyTo("Onlinefree8888@gmail.com");
$mail->AddAddress("$email");
$mail->Subject =  "Verify Succesful";
$mail->WordWrap   = 80;
$content = "Hello,You have Successful Registered your login id is $loginid";
$mail->MsgHTML($content);
$mail->IsHTML(true);
if (!$mail->Send()) {
    
  echo 'not internet';
} else {
    
  echo 'registerd succesful';

  //    header("Location:../shop.php?user_id=$token");


}
}
}else{
    echo "otp wrong";
}



}    


?>