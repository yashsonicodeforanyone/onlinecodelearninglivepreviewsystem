<?php
include "database.php";

$curentpage=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

?>

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <?php
if($curentpage == "index.php"){
    echo " <li class='active'>";
}else{
    echo " <li >";
    
}
                ?>
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Home </a>
                    </li>
                   








                    <li class="menu-title">Course By Category</li><!-- /.menu-title -->

                        <?php
$selectsidenav=mysqli_query($con,"SELECT `category` FROM `courses` WHERE `live`='0'");
$selectrow=mysqli_num_rows($selectsidenav);
$x=array();
if($selectrow > 0){
    
    while($selectsidenavdata=mysqli_fetch_assoc($selectsidenav)){
        array_push($x,$selectsidenavdata['category']);
    }
}
// print_r($x);
$x=array_unique($x);
$y=implode(",",$x);
$x=explode(",",$y);
$count=count($x);

for ($i=0; $i < $count ; $i++) { 
    
    $select1=mysqli_query($con,"SELECT * FROM `courses` WHERE `category`='$x[$i]' && `live`='0'");
    $selectrow1=mysqli_num_rows($select1);
    $z="";
    $k="";
if($i== 1){
    $z="";
    // $k="active";
}
if($selectrow1 > 0){
    
    if($curentpage == $x[$i]){
        
        $z="active";

    }
    ?>

    <li class="menu-item-has-children dropdown <?php echo $z ?>">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i><?php echo $x[$i]; ?></a>
                        <ul class="sub-menu children dropdown-menu <?php echo $z; ?>">
                           <?php

while($selectsidenavdata=mysqli_fetch_assoc($select1)){
    
    

    echo "<li class='active'><i class='menu-icon ti-themify-logo'></i><a href='code.php?id=".$selectsidenavdata['uniqueid']."'>".$selectsidenavdata['titile']."</a></li>";
    
}
?>

</ul>
</li>
    <?php
    
}else{
    echo "<li class='active'><i class=''></i><center>--NO AVALAIBLE--</center></li>";
}
?>

<?php
}
?>

<li class="menu-title">User</li><!-- /.menu-title -->


<?php
if($curentpage == "page-login.php" || $curentpage == "pages-forget.php" || $curentpage == "page-register.php" ){
    echo "<li class='menu-item-has-children dropdown active'>";
}else{
    
    echo "<li class='menu-item-has-children dropdown'>";
    
}

?>

    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Account</a>
    <ul class="sub-menu children dropdown-menu">
    <?php
             if(isset($_SESSION['login_id'])){
                $token=$_SESSION['login_id'];
                $sql21="SELECT * FROM `user` WHERE `loginid`='$token'";
                $res21=mysqli_query($con,$sql21);
                $usersdata=mysqli_fetch_assoc($res21);
                
                ?>
        
        


        <li>

        <?php
    if(!(isset($_SESSION['gemail']))){
        ?>   

<li><i class="menu-icon fa fa-paper-plane"></i><a href="changepassword.php?id=<?php echo $usersdata['token']; ?>">Password Change</a></li>

        <?php
        }


                            ?>
        
<li><i class="menu-icon fa fa-paper-plane"></i><a href="backendsection/logout.php">Logout</a></li>
            <?php
             }else{
                 ?>
                 <?php
                 if($curentpage == "page-login.php"  ){
                     echo "<li class='active'>";
                 }else{
                     
                     echo "<li >";
                     
                 }
                 
                 ?>
 <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.php">Login</a></li>
        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.php">Register</a></li>
        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.php">Forget Pass</a></li>
                 <?php
             }

             ?>
       
        
    </ul>
    
</li>
<?php
             if(isset($_SESSION['login_id'])){

                 ?>

                    <li>
                        <a href="contactform.php"> <i class="menu-icon ti-email"></i>Contact Us<span class="badge" style="border:1px solid lightblue; border-radius:50%;">0</span></a>
                    </li>
                    
                    
                    <?php
             }else{
                 ?>
                 <li>
                     <a href="page-login.php"> <i class="menu-icon ti-email"></i>Contact Us<span class="badge" style="border:1px solid lightblue; border-radius:50%;">0</span></a>
                 </li>

                 <?php
             }

?>
                  
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>