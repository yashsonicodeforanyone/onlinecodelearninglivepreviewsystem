

<?php

session_start();

include "includes/database.php";

if(isset($_POST["login"]))
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


$sql1="SELECT * FROM `admin` WHERE `email`='$email' OR `phone`='$email' ";
$res1=mysqli_query($con,$sql1);


if(mysqli_num_rows($res1)>0)
{

$data=mysqli_fetch_assoc($res1);
$password2=$data['password'];
if(password_verify($password,$password2)){
    
    $_SESSION['email']=$data['email'];
    ?>

    <script>
    swal("Good job!", "You clicked the button!", "success");
   setTimeout(function () {
    window.location.replace("http://localhost/website%20my/Admin/index.php");
       
   }, 2000);
        
    
    </script>
    
   <?php
}else{
    ?>
   <script>
    swal("Wrong Password!", "You have wrong password!", "error");
   setTimeout(function () {
    window.location.replace("http://localhost/website%20my/Admin/login.php");
       
   }, 2000);
        
    
    </script>
    <?php
}

}else{
?>
   <script>
    swal("Check Your Id!", "You have Email/Phone!", "warning");
   setTimeout(function () {
    window.location.replace("http://localhost/website%20my/Admin/login.php");
       
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
<!doctype html>
<head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>


    <style>
body {
    background: #222D32;
    font-family: 'Roboto', sans-serif;
}
 
.login-box {
    margin-top: 75px;
    height: auto;
    background: #1A2226;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
 
.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
 
.login-title {
    margin-top: 15px;
    text-align: center;
    font-size: 30px;
    letter-spacing: 2px;
    margin-top: 15px;
    font-weight: bold;
    color: #ECF0F5;
}
 
.login-form {
    margin-top: 25px;
    text-align: left;
}
 
input[type=text] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}
 
input[type=password] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid #0DB8DE;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}
 
.form-group {
    margin-bottom: 40px;
    outline: 0px;
}
 
.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #1A2226;
    color: #ECF0F5;
}
 
input:focus {
    outline: none;
    box-shadow: 0 0 0;
}
 
label {
    margin-bottom: 0px;
}
 
.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}
 
.btn-outline-primary {
    border-color: #0DB8DE;
    color: #0DB8DE;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
 
.btn-outline-primary:hover {
    background-color: #0DB8DE;
    right: 0px;
}
 
.login-btm {
    float: left;
}
 
.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}
 
.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}
 
.loginbttm {
    padding: 0px;
}
</style>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>
 
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label class="form-control-label" style="color:white">Email/Phone</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style="color:white">PASSWORD</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
 
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary" name="login">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>
</html>


<?php

}

?>