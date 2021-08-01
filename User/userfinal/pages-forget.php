
<?php

session_start();

if(isset($_SESSION['logout'])){
    
    $value= $_SESSION['logout'];
    if($value == 'Email is not register'){
        
        echo "<script>alert('".$value."');</script>";
        session_destroy();
        echo "<script>window.location.href='http://localhost/website%20my/User/userfinal/pages-forget.php';</script>";
        
    }
    else if($value=='Email is not Correct'){
        
        echo "<script>alert('".$value."');</script>";
        session_destroy();
        echo "<script>window.location.href='http://localhost/website%20my/User/userfinal/pages-forget.php';</script>";
    }
    else if($value=='Check your Mail'){
        
        echo "<script>alert('".$value."');</script>";
        session_destroy();
        echo "<script>window.location.href='http://localhost/website%20my/User/userfinal/page-login.php';</script>";
    }
    else if($value=='You are not verify'){
        
        echo "<script>alert('".$value."');</script>";
        session_destroy();
        echo "<script>window.location.href='http://localhost/website%20my/User/userfinal/pages-forget.php';</script>";
    }
    else{

    
    
    echo "<script>alert('done');</script>";
    
    
session_destroy();
echo "<script>window.location.href='http://localhost/website%20my/User/userfinal/pages-forget.php';</script>";
    }
}
else{




include("includes/database.php");


//                                 Signup with form
require '../../mailfolder/PHPMailerAutoload.php';
function mailersent($email,$subject,$msg){
    $mail = new PHPMailer();
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
$mail->Subject = "$subject";
$mail->WordWrap   = 80;
$content = "$msg";
$mail->MsgHTML($content);
$mail->IsHTML(true);
if (!$mail->Send()) {
    
    echo 'mail not send';
} 
}
        
        if(isset($_POST["signup"]))
        {
     

        
  

$email=$_POST['email'];
$email=mysqli_real_escape_string($con,$email);  
$email=htmlentities($email);




$sql1="SELECT * FROM `user` WHERE `email`='$email'";
$res1=mysqli_query($con,$sql1);

// $loginid="";
// $token=bin2hex(random_bytes(10));

if(mysqli_num_rows($res1)>0)
{
    $sql2="SELECT * FROM `user` WHERE `email`='$email' && `loginid`!=''";
    $res2=mysqli_query($con,$sql2);
    if(mysqli_num_rows($res2)>0){

        $data=mysqli_fetch_assoc($res1);
        $token=$data['token'];
        $link="http://localhost/website%20my/User/userfinal/changepassword.php?id=$token";
        $message_body = '<center>Click to link forget password</center><hr>';
        
        $message_body .= $link;
        $message_body .= '<hr><center> thanks for come</center> ';
        
        mailersent($email,'forget Password',$message_body);
        
        
        $_SESSION['logout']='Check your Mail';
        header("location:pages-forget.php");
    }else{
        $_SESSION['logout']='You are not verify';
        header("location:pages-forget.php");
    }   
}
        
        else{
            
            $_SESSION['logout']='Email is not Correct';
            header("location:pages-forget.php");



        }
    }

        ?> 
                 
                                
                              
<?php
// header file include doctype to body tak
include "includes/header.php";


// <!-- Left Panel -->
// <!-- aside bar sidenav.php aside to aside -->

include "includes/sidenav.php";


?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
<?php 
//  front nav.php header  to header
include "includes/nav.php";

?>


<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div class="content">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12" style="border: 1px solid black; border-radius:25px;">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="submitform">
                        <div class="login-form">
                        <p style="text-align:center;color:red;" id="error"></p>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                            <span style="position: absolute; right:58px; bottom:320px; transform:translate(0,-50%); "><i onclick="toggle()" class="fa fa-eye" id="eye" aria-hidden="true" style="font-size: 22px;  color:lightcoral;"></i></span>
                        </div> -->
                        
                            
                        <!-- </div> -->
                        <button name="signup" type="submit"  class="btn btn-success btn-flat m-b-30 m-t-30" id="submitbtn" >Sign Up</button>
                        
                    </div>
                </form>
                        </div>
                    </div>

            






</div><!-- .animated -->
</div><!-- .content -->
    


    <div class="clearfix"></div>

    

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>
<!--                             gmail login javascript -->
<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>






<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>
</html>
<?php
}
        ?>