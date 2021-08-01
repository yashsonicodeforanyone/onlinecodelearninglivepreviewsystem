<a href="javascript:void(0)" class="gotop" style="position: fixed; background-color:#fdbe33; color:#121518; height: 45px; width: 45px; right: 15px; bottom:15px; border-radius:50%;  text-align:center; font: size 20px; display:none;">
<i class="fa fa-chevron-up" style="margin-top:10px;"></i>
</a>




















<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">Code Learning System Admin</a>

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">

                <div id="google_translate_element" style="    width: 4%;
    margin-right: 16%;
    margin-top: 1%;"></div>





                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h3 style="width:40px; background-color:blanchedalmond; border-radius:50%; text-align:center; border:1px solid aqua;" ><?php $email=$_SESSION['email'];
            echo strtoupper($email[0]); ?></h3>
                        </a>

                        <div class="user-menu dropdown-menu">
                        
                            <p class="nav-link"><?php echo $_SESSION['email']; ?></p>
                           
                        <hr>
                            <a class="nav-link" href="backendsection/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>

                    </div>

                </div>
            </div>
        </header>