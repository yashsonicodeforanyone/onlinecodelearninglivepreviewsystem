<?php
include "database.php";
?>

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Home </a>
                    </li>
                    
                   




                    <li class="menu-title">COURSE</li><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                    <li>
                        <a href="categoryaddform.php"><i class="menu-icon fa fa-laptop"></i>Add Course Category </a>
                    </li>
                    <li>
                        <a href="addcoursemainform.php"><i class="menu-icon fa fa-laptop"></i>Add Course </a>
                    </li>
                    <li>
                        <a href="listofcategory.php"><i class="menu-icon fa fa-laptop"></i>List of cagtegory </a>
                    </li>
                    <li>
                        <a href="listofcourse.php"><i class="menu-icon fa fa-laptop"></i>List of Course </a>
                    </li>
                        
                        
                    </li>
                   
                   
                    <li class="menu-title">Users</li><!-- /.menu-title -->

                   
        <?php
$approveuser=mysqli_query($con,"SELECT * FROM `user` WHERE `status`='verify' AND `adminapprove`='0' AND `block`='0' AND `reject`='0'");
$approverow=mysqli_num_rows($approveuser);


$Pendinguser=mysqli_query($con,"SELECT * FROM `user` WHERE `status`='notverify'");
$pendinguserrow=mysqli_num_rows($Pendinguser);



$rejectuser=mysqli_query($con,"SELECT * FROM `user` WHERE `status`='notverify' AND `adminapprove`='0' AND `block`='0' AND `reject`='1'");
$rejectuserrow=mysqli_num_rows($rejectuser);


$rejectuser=mysqli_query($con,"SELECT * FROM `user` WHERE `status`='notverify' AND `adminapprove`='0' AND `block`='0' AND `reject`='1'");
$rejectuserrow=mysqli_num_rows($rejectuser);



$blockuser=mysqli_query($con,"SELECT * FROM `user` WHERE `status`='verify' AND `adminapprove`='1' AND `block`='1' AND `reject`='0'");
$blockuserrow=mysqli_num_rows($blockuser);



$facebookuser=mysqli_query($con,"SELECT * FROM `facebookuser`");
$facebookuserrow=mysqli_num_rows($facebookuser);

$gmailuser=mysqli_query($con,"SELECT * FROM `facebookuser`");
$gmailuserrow=mysqli_num_rows($gmailuser);



$contactselct=mysqli_query($con,"SELECT * FROM `message`");
$contactrow=mysqli_num_rows($contactselct);
if($contactrow > 0){
    $contactrow=$contactrow;
}else{
    $contactrow="0";
}
         ?>
 
                    <li class="menu-item-has-children dropdown">
                   
                    <li>
                        <a href="Approveduser.php"><i class="menu-icon fa fa-laptop"></i>Approved User<span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $approverow; ?></span> </a>
                    </li>
                    <li>
                        <a href="pendinguser.php"><i class="menu-icon fa fa-laptop"></i>Pending Users <span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $pendinguserrow; ?></span></a>
                    </li>
                    <li>
                        <a href="rejectuser.php"><i class="menu-icon fa fa-laptop"></i>Rejected User<span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $rejectuserrow; ?></span></a>
                    </li>
                    <li>
                        <a href="blockuser.php"><i class="menu-icon fa fa-laptop"></i>Block User<span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $blockuserrow; ?></span></a>
                    </li>
                    <li>
                        <a href="facebookuser.php"><i class="menu-icon fa fa-laptop"></i>Facebook User<span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $facebookuserrow; ?></span></a>
                    </li>
                    <li>
                        <a href="gmailuser.php"><i class="menu-icon fa fa-laptop"></i>Gmail User<span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $gmailuserrow; ?></span></a>
                    </li>
                    <li>
                        <a href="Message.php"> <i class="menu-icon ti-email"></i>Message<span class="badge" style="border:1px solid lightblue; border-radius:50%;"><?php echo $contactrow; ?></span></a>
                    </li>
                        
                    </li>
                   








                    <li class="menu-title">Course By Category</li><!-- /.menu-title -->

                        <?php
$selectsidenav=mysqli_query($con,"SELECT `category` FROM `courses`");
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
    
    $select1=mysqli_query($con,"SELECT * FROM `courses` WHERE `category`='$x[$i]'");
$selectrow1=mysqli_num_rows($select1);
$z="";
$k="";
if($i== 1){
    $z="";
    // $k="active";
}
if($selectrow1 > 0){


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
    echo "<li class='active'><i class=''></i><center>--NO--</center></li>";
}
?>

<?php
}
?>

                    

                 
                                     
                    
<li class="menu-title ">Admin</li><!-- /.menu-title -->
                 

                    <li >
                        <a href="backendsection/logout.php"><i class="menu-icon fa fa-laptop"></i>Logout </a>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>