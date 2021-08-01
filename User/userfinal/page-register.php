
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
$mail->Password = "Enter your gmail Password";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("Enter you gmail", "Enter your gmail name");
$mail->AddReplyTo("Enter you gmail");
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


        
        
        $name=$_POST['name'];
$name=mysqli_real_escape_string($con,$name);  
$name=htmlentities($name);
    
  

$email=$_POST['email'];
$email=mysqli_real_escape_string($con,$email);  
$email=htmlentities($email);

$number=$_POST['number'];
$number=mysqli_real_escape_string($con,$number);  
$number=htmlentities($number);



$password=$_POST['password'];
$password=mysqli_real_escape_string($con,$password);
$password=htmlentities($password);


$options = [
    'cost' => 12,
    'salt' => 'Welcometofreshshopsite',
];
$password=password_hash($password, PASSWORD_BCRYPT, $options);

$verify="verify";
$sql1="SELECT * FROM `user` WHERE `email`='$email' && `status`='$verify'";
$res1=mysqli_query($con,$sql1);


$loginid="";
$token=bin2hex(random_bytes(10));

if(mysqli_num_rows($res1)>0)
{
    ?>
    <script>
     swal("Already Register !", "You have already register!", "warning");
    setTimeout(function () {
     window.location.replace("http://localhost/website%20my/User/userfinal/page-register.php");
        
    }, 1000);
         
     
     </script>
 
 <?php
    
}else{
    $verify="notverify";
    $sql2="SELECT * FROM `user` WHERE `email`='$email' && `status`='$verify'";
    $res2=mysqli_query($con,$sql2);
    


   $rowss=mysqli_num_rows($res2);
   if($rowss > 0)
   {

        $sqlinsert="UPDATE `user` SET `name`='$name',`token`='$token',`phone`='$number',`password`='$password' WHERE `email`='$email' && `status`='$verify'";
        $updateque=mysqli_query($con,$sqlinsert); 
        
        
    }else{
        
        $sqlinsert="INSERT INTO `user`(`name`, `loginid`, `phone`, `email`, `password`, `token`,`status`) VALUES ('$name', '$loginid', '$number' ,'$email','$password','$token','$verify')";   #this is enter a value in database
        $updateque=mysqli_query($con,$sqlinsert);  #isme ki query databaase me gayi hai kai nahi
        
        
    }
    
    if($updateque){
    $pass=random_int(100000,999999);
    
  
    
    

    $message_body = '<center>Thanks for come </center><hr>';
    
    $message_body .= 'your otp is '.$pass.' '.'thsnks for come ';
    
    mailersent($email,'otp verify',$message_body);
    
        $_SESSION['email']=$email;
        $_SESSION['otp']=$pass;
        $_SESSION['token']=$token;
        ?>
    <script>
       swal("Super!", "Pleae Verify !", "success");
    setTimeout(function () {

     window.location.replace("http://localhost/website%20my/User/userfinal/backendsection/verify.php");
        
    }, 2000);
         
     
     </script>
 
 <?php

    
    
    }
    
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
                            <label>Enter</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="tel" class="form-control" placeholder="Enter Number" name="number" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                            <span style="position: absolute; right:58px; bottom:410px; transform:translate(0,-50%); "><i onclick="toggle()" class="fa fa-eye" id="eye" aria-hidden="true" style="font-size: 22px;  color:lightcoral;"></i></span>
                        </div>
                        <div class="form-group">
                            <label>Conform Password</label>
                            <input type="password" id="password2" class="form-control" onkeyup="passwordverify(this.value)" placeholder="Conform Password" required>
                            <p style="color:red;" id="error" ></p>
                            
                            
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            
                        </div>
                        <button name="signup" type="submit"  class="btn btn-success btn-flat m-b-30 m-t-30" id="submitbtn" >Sign Up</button>
                        <div class="social-login-content">
                            <div class="social-button">
                               <a href="<?php echo $facebook_login_url; ?>"><button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign Up with facebook</button></a>
                               
					<button class="login100-form-btn" disabled="true" style="background-image:linear-gradient(to top,red,lightgreen); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; width:100%; height:40px;"> <a href="<?php echo $login_button ?> "  style="text-decoration: none; color:white; ">Login with google</a></button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="page-login.php"> Sign in Here</a></p>
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
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

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
        document.getElementById("password2").setAttribute("type","password");
        state=false;
    }else{
        document.getElementById("password").setAttribute("type","text");
        document.getElementById("password2").setAttribute("type","text");
        document.getElementById("eye").removeAttribute("class");
        document.getElementById("eye").setAttribute("class","fa fa-eye-slash");
        document.getElementById("eye").style.color='#5887ef';
        state=true;
     
    }
}

       
function passwordverify(a){
    var x=$("#password").val();
    var lengthofpassword1=x.length;
    if(lengthofpassword1 > 0){

    if(a == x){
        document.getElementById("submitbtn").removeAttribute("disabled","disabled");
     $("#error").html("");   

    }else{

     $("#error").html("**Please Enter Correnct Password**");   
        document.getElementById("submitbtn").setAttribute("disabled","disabled");

    }
    }else{
     $("#error").html("**Please Enter Password**");   
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