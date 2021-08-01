
<?php

session_start();





include("includes/database.php");


//                                 Signup with form
require '../../mailfolder/PHPMailerAutoload.php';
function mailersent($email,$subject,$msg){
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
$mail->Port     = 587;
$mail->Username = "Enter you gmail";     #this email is only used to practice purpose 
$mail->Password = "password";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("enter your gmail ", "enter your  name");
$mail->AddReplyTo("enter your gmail ");
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
            ?>
            <html>
            <body>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <?php

        
  

$email=$_POST['email'];
$email=mysqli_real_escape_string($con,$email);  
$email=htmlentities($email);



$password=$_POST['password'];
$password=mysqli_real_escape_string($con,$password);
$password=htmlentities($password);


$sql1="SELECT * FROM `user` WHERE `email`='$email'";
$res1=mysqli_query($con,$sql1);

// $loginid="";
// $token=bin2hex(random_bytes(10));

if(mysqli_num_rows($res1)>0)
{
    $sql2="SELECT * FROM `user` WHERE `email`='$email' && `loginid`!=''";
    $res2=mysqli_query($con,$sql2);
    if(mysqli_num_rows($res2) > 0){

    $data=mysqli_fetch_assoc($res1);
    $password2=$data['password'];
    if(password_verify($password,$password2)){
        
            $message_body = '<center>You have login successfully </center><hr>';
            
            $message_body .= 'thanks for come ';
            mailersent($email,'Login Successful',$message_body);
            $_SESSION['login_id']=$data['loginid'];
            ?>

            <script>
            swal("Good job!", "Your Login!", "success");
           setTimeout(function () {
            window.location.replace("http://localhost/website%20my/User/userfinal/index.php");
               
           }, 2000);
                
            
            </script>
            
           <?php
        }else{
            ?>
            <script>
             swal("Wrong Password!", "You have wrong password!", "error");
            setTimeout(function () {
             window.location.replace("http://localhost/website%20my/User/userfinal/page-login.php");
                
            }, 2000);
                 
             
             </script>
             <?php
            
        }
   }else{
    ?>
    <script>
     swal("Check Your Email!", "You are not verify !", "warning");
    setTimeout(function () {
     window.location.replace("http://localhost/website%20my/User/userfinal/page-login.php");
        
    }, 2000);
         
     
     </script>
 
 <?php

   }
 }else{
    ?>
    <script>
     swal("Check Your Email!", "You are not register!", "warning");
    setTimeout(function () {
     window.location.replace("http://localhost/website%20my/User/userfinal/page-login.php");
        
    }, 2000);
         
     
     </script>
 
 <?php
 

}   

    ?>
</body>
</html>
    <?php
}else{


        ?> 
       
        <?php
 
 
                                        
                                        
                                    
                                
                                //        Signup  over with form
                                    include "includes/config.php";

                                  //Signup start with gmail 
                                  
                                
                                
                                
                                                
                           
                                
                                    $login_button= $google_client->createAuthUrl();
                                                           
                                
                                    // <!-- //Signup over with gmail  -->
                                    
                                    

// facebook login

$facebook_helper = $facebook->getRedirectLoginHelper();

                                $facebook_permissions = ['email']; 

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/website%20my/User/userfinal/facebooklogin.php', $facebook_permissions);
    
    
    
    
    ?>                                  
    <!-- //Signup over with facebook  -->
                                
                                  
                              
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
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                            <span style="position: absolute; right:58px; bottom:320px; transform:translate(0,-50%); "><i onclick="toggle()" class="fa fa-eye" id="eye" aria-hidden="true" style="font-size: 22px;  color:lightcoral;"></i></span>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            
                        </div>
                        <button name="signup" type="submit"  class="btn btn-success btn-flat m-b-30 m-t-30" id="submitbtn" >Sign in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                               <a href="<?php echo $facebook_login_url; ?>"><button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign Ip with facebook</button></a>
                               
					<button class="login100-form-btn" disabled="true" style="background-image:linear-gradient(to top,red,lightgreen); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; width:100%; height:40px;"> <a href="<?php echo $login_button ?> "  style="text-decoration: none; color:white; ">Login with google</a></button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <a href="page-register.php"><p>Don't have account ? <a href="page-register.php"> Sign up here</a></p></a>
                        </div>
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




function ondone(event){


if(window.location.hash && window.location.hash == '#_=_'){
    window.location.hash='';
    history.pushState('',document.title,window.location.pathname);
    event.preventDefault();
}
}
ondone();

// function logedin(){
//    document.getElementById('btn-login').innerHTML = "Logged in";
//    setTimeout(()=>{},1200);
// }
//  function submited(){
     
//    document.getElementById('btn-submit').innerHTML = "Submited";
//    setTimeout(()=>{},1200);
// }
</script>


<script>
  



    var state=false;
function toggle(){
    if(state){
        document.getElementById("eye").style.color='#7a797e';
        document.getElementById("eye").removeAttribute("class");
        document.getElementById("eye").setAttribute("class","fa fa-eye");
        document.getElementById("password").setAttribute("type","password");
        state=false;
    }else{
        document.getElementById("password").setAttribute("type","text");
        document.getElementById("eye").removeAttribute("class");
        document.getElementById("eye").setAttribute("class","fa fa-eye-slash");
        document.getElementById("eye").style.color='#5887ef';
        state=true;
     
    }
}

       

</script>

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