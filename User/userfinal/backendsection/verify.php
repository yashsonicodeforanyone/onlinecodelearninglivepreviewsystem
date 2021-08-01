<?php
include "../includes/database.php";
session_start();
if(isset($_GET['id'])){
    session_destroy();
    header("Location:../page-login.php");
}
if(isset($_SESSION['email']) && ($_SESSION['otp']) && ($_SESSION['token']))   #to check the user click a signup page or not
{




$email=$_SESSION['email'];          
$email=mysqli_real_escape_string($con,$email);  
$email=htmlentities($email);

$actotp=$_SESSION['otp'];          
$actotp=mysqli_real_escape_string($con,$actotp);  
$actotp=htmlentities($actotp);



$token=$_SESSION['token'];
$token=mysqli_real_escape_string($con,$token);
$token=htmlentities($token);






?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../assets/js/ajax.js"></script>
<style>
    * {
                padding: 0;
                margin: 0;
                
            }
            
 
            .container {
                width: 30%;
                height: 30%;
                border: 2px solid black;
                position: relative;
                left: 50%;
                top: 50%;
                transform: translate(-50%, 4%);
                justify-content: center;
                align-items: center;
                background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));

                
                border-radius: 10px;
                opacity:1.0 !important;
                
               

                
            }

            .box {


                
                
                text-align: center;
                padding: 20px;


            }
            
            input[type=tel] {
                border: 2px solid black;
                padding: 2px;
                font-size: 20px;
                border-radius: 10px;
                text-align: center;
                
            }
            
            button,
            input[type=submit] {
                width: 100px;
                height: 30px;
                border-width: 2px;
                border-radius: 10px;
                
            }

            
            input {
                margin: 10px 0px 6px 11px;
            }

            h3 {
                padding-top: 15px;
            }
            </style>
  
  </head>
  <body>
        
        
      
  
      
  <div class="container">
                  <h3 style="text-align: center;">ENTER OTP</h3>
                  <p style="text-align: center;">**You have only 5 minutes for registration **</p>
                  <p style="text-align: center;">**Please check your email otp is send**</p>
                  <div class="box">
                      <form id="myform" name="myformdata" >
  
                          <input type="tel" max="6" name="enterpin" onkeyup="pin(this.value)" title="Enter Six Digit Pin " placeholder="Please Enter Otp" required><br>
                          <p style="color: red;" id="error"></p>
                          <input type="hidden" name="ot"  value="<?php echo  $actotp; ?>">
                          <input type="hidden" name="email" value="<?php echo  $email; ?>">
                          <input type="hidden" name="token" value="<?php echo  $token; ?>">
                          
                          <input type="submit" value="Otp verify" name="submit" id="submitbtn">
                          <a href="verify.php?id=cancel"><input type="button" value="Cancel" name="cancel"></a>
  
                        </form>
                        
                    </div>
                    
                </div>
                
                
                
                
                <?php
  
  


  

  ?>
<script>

// setInterval(function(){
// console.log("done");
// },5000);

var x=0;
document.getElementById("submitbtn").setAttribute("disabled","disabled");

function pin(a){
    var lengthofpin=a.length;
    if(lengthofpin == 6){
        
        document.getElementById("submitbtn").removeAttribute("disabled","disabled");
    }else{
        
        document.getElementById("submitbtn").setAttribute("disabled","disabled");
    }
   }
var x=0;
$("#submitbtn").on("click",function(e){ 

   x=x+1;
   $.ajax({
       url:'otpvalidation.php',
       type:'post',
       data:$('#myform').serialize(),
        success:function(result){
            if(result == "otp wrong"){
var y="wrong otp only ";
var resu=y.concat(" ",3-x," chance left");
if(3-x==0){
    
  window.location='http://localhost/website%20my/User/userfinal/page-register.php';
   
}
                $('#error').html(resu);
            }else if(result == "not internet"){
                alert("Email not sent");

            }else if(result == "registerd succesful"){
                swal("Succesfully!", "Your Login Success!", "success");
            
    
  window.location='http://localhost/website%20my/User/userfinal/page-login.php';
            
                
            }
        }
        
    });
    e.preventDefault();
});

</script>
</body>
</html>





<?php
}
?>