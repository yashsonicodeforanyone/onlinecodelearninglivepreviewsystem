<?php

//index.php

include "includes/database.php";

$base_url = 'http://localhost/website%20my/User/userfinal/'; //

$message = '';

if(isset($_POST["send"]))
{
    require '../../mailfolder/PHPMailerAutoload.php';
 $mail = new PHPMailer;
 $mail->IsSMTP();
 $mail->Host = 'smtpout.secureserver.net';
 $mail->Port = '80';
 $mail->SMTPAuth = true;
 $mail->Username = 'onlinefree8888@gmail.com';
 $mail->Password = 'Abc@12345678';
 $mail->SMTPSecure = '';
 $mail->From = 'info@webslesson.info';
 $mail->FromName = 'Webslesson.info';
 $mail->AddAddress($_POST["receiver_email"]);
 $mail->WordWrap = 50;
 $mail->IsHTML(true);
 $mail->Subject = $_POST['email_subject'];

 $track_code = md5(rand());

 $message_body = $_POST['email_body'];

 $message_body .= '<img src="'.$base_url.'email_track.php?code='.$track_code.'" width="1" height="1" />';
 $mail->Body = $message_body;

 if($mail->Send())
 {
  $data = array(
   ':email_subject'   =>  $_POST["email_subject"],
   ':email_body'    =>  $_POST["email_body"],
   ':email_address'   =>  $_POST["receiver_email"],
   ':email_track_code'   =>  $track_code
  );
  $email= $_POST["receiver_email"];
  
  $query = "INSERT INTO `user`(`loginid`, `email`, `status`, `mailopenornot`) VALUES ('$track_code','$email','notverify','0')";

 $insert=mysqli_query($con,$query);
  if($insert)
  {
   $message = '<label class="text-success">Email Send Successfully1</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Email Send Successfully12</label>';
 }

}

function fetch_email_track_data($con)
{
 $query = "SELECT * FROM `user`";
 $statement = mysqli_query($con,$query);
 
 $total_row = mysqli_num_rows($statement);
 $output = '
 <div class="table-responsive">
  <table class="table table-bordered table-striped">
   <tr>
    <th width="25%">Email</th>
 
    <th width="10%">sent/or not</th>
    <th width="20%">open/not</th>
   </tr>
 ';
 if($total_row > 0)
 {
  while($row = mysqli_fetch_assoc($statement))
  {
   $status = '';
   if($row['mailopenornot'] == '1')
   {
    $status = '<span class="label label-success">Open</span>';
   }
   else
   {
    $status = '<span class="label label-danger">Not Open</span>';
   }
   $output .= '
    <tr>
     <td>'.$row["email"].'</td>
   
     <td>'.$status.'</td>
     <td>'.$row["mailopenornot"].'</td>
    </tr>
   ';
  }
 }
 else
 {
  $output .= '
  <tr>
   <td colspan="4" align="center">No Email Send Data Found</td>
  </tr>
  ';
 }
 $output .= '</table>';
 return $output;
}


?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Track Email Open or not using PHP</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">How to Track Email Open or not using PHP</h3>
   <br />
   <?php
   
   echo $message;

   ?>
   <form method="post">
    <div class="form-group">
     <label>Enter Email Subject</label>
     <input type="text" name="email_subject" class="form-control" required />
    </div>
    <div class="form-group">
     <label>Enter Receiver Email</label>
     <input type="email" name="receiver_email" class="form-control" required />
    </div>
    <div class="form-group">
     <label>Enter Email Body</label>
     <textarea name="email_body" required rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="send" class="btn btn-info" value="Send Email" />
    </div>
   </form>
   
   <br />
   <h4 align="center">Sending Email Open or not status</h4>
   <?php 
   
   echo fetch_email_track_data($con);

   ?>
  </div>
  <br />
  <br />
 </body>
</html>





