
<?php


session_start();

if(isset($_SESSION['succes'])){
  
    unset($_SESSION['succes']);
}

include("includes/database.php");


if(isset($_POST["signup"]))
{
     
    
    ?>
    <html>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php



    $password=$_POST['password'];
$password=mysqli_real_escape_string($con,$password);    
$password=htmlentities($password);
    $password2=$_POST['password2'];
$password2=mysqli_real_escape_string($con,$password2);    
$password2=htmlentities($password2);
$token=$_POST['token'];
$token=mysqli_real_escape_string($con,$token);
$token=htmlentities($token);


$options = [
    'cost' => 12,
    'salt' => 'Welcometofreshshopsite',
];    
$password=password_hash($password, PASSWORD_BCRYPT, $options);



$sql1="SELECT * FROM `user` WHERE `token`='$token'";

$res1=mysqli_query($con,$sql1);


if(mysqli_num_rows($res1)>0)
{
    $resultinsert=mysqli_query($con,"UPDATE `user` SET `password`='$password' WHERE `token`='$token'");    
    
    if($resultinsert){

        unset($_POST["signup"]);


        $_SESSION['succes']="you have succesful change password";
        
        ?>

        <script>
        swal("Succedfully!", "Password Change Success!", "success");
       setTimeout(function () {
        window.location.replace("http://localhost/website%20my/User/userfinal/changepassword.php?id=<?php echo $token; ?>");
           
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


    

                                
if(isset($_GET['id'])){
$tokenid=$_GET['id'];    
    $sqlqueeryy="SELECT * FROM `user` WHERE `token`='$tokenid'";

    $resquer=mysqli_query($con,$sqlqueeryy);
    $rowsssss=mysqli_num_rows($resquer);
    if($rowsssss > 0){

        
        


        

    
    
                              
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
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                            <span style="position: absolute; right:58px; top:80px; transform:translate(0,-50%); "><i onclick="toggle()" class="fa fa-eye" id="eye" aria-hidden="true" style="font-size: 22px;  color:lightcoral;"></i></span>
                        </div>
                        <div class="form-group">
                            <label>Conform Password</label>
                            <input type="password" name="password2" id="password2" class="form-control" onkeyup="passwordverify(this.value)" placeholder="Conform Password" required>
                            <p style="color:red;" id="error" ></p>
                            

                            
                        </div>
                        <input type="hidden" name="token" value="<?php echo $_GET['id']; ?>">
                            
                        <button name="signup" type="submit"  class="btn btn-success btn-flat m-b-30 m-t-30" id="submitbtn" >Change Password</button>
                    
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
}else{
    
    session_destroy();
    header("location:page-login.php");
}
}
}

        ?>