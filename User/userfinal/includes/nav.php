


















<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">Code Learning System</a>

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                <!-- <div style="width:65px; height:11px ; position:absolute; margin-right:275px; margin-top:42px; border:1px solid black; background-color:white; color:white;"></div>                         -->
                  <div style="width: 4%;
    margin-right: 21%; position:absolute;
    margin-top: 1%;">

                      <div id="google_translate_element" ></div>
                    </div>



            <?php

             if(isset($_SESSION['login_id'])){
                 $token=$_SESSION['login_id'];
                 $sql21="SELECT * FROM `user` WHERE `loginid`='$token' ";
                 $res21=mysqli_query($con,$sql21);
                 $usersdata=mysqli_fetch_assoc($res21);
                 
                 ?>
            
            <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <h3 style="width:40px; background-color:blanchedalmond; border-radius:50%; text-align:center; border:1px solid aqua;" ><?php 
                           
                           if(isset($_SESSION['gemail'])){
                               $email=$_SESSION['gemail'];
                               echo strtoupper($email[0]); 
                            }else{
            $email=$usersdata['email'];
echo strtoupper($email[0]); 
            
                           }
            
            ?></h3>
                        </a>

                        <div class="user-menu dropdown-menu">

                            <a class="nav-link" href="backendsection/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
<?php
             
            }else{
                 ?>
  <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:40px; background-color:blanchedalmond; border-radius:50%; margin-top:3px; height:44px; border:1px solid aqua;">
                          </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="page-login.php"><i class="fa fa- user"></i>Login</a>
                            <a class="nav-link" href="page-register.php"><i class="fa fa- user"></i>Register</a>

                            
                        </div>
                    </div>


                 <?php

             }
            
?>
                </div>
            </div>
        </header>