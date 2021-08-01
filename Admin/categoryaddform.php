<?php
// header file include doctype to body tak
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
  
  }else{
    header("location:login.php");
  }
include "includes/database.php";
include "includes/header.php";


// <!-- Left Panel -->
// <!-- aside bar sidenav.php aside to aside -->

include "includes/sidenav.php";


?>

<!-- /#left-panel -->
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
                    <div class="col-lg-6 offset-lg-3">
                       
                       
                       
<?php
if(isset($_GET['edit'])){

    $id=$_GET['edit'];
$select=mysqli_query($con,"SELECT * FROM `category` WHERE `sno`='$id'");
$row=mysqli_num_rows($select);

if($row > 0){
    $data=mysqli_fetch_assoc($select);


 ?>
                       
                       
                        <form action="backendsection/addcategory.php" method="post" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Category</strong> Form
                            </div>
                            <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Couse Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="coursename" value="<?php echo $data['coursename']; ?>" placeholder="Enter Course Name" class="form-control" required><span class="help-block" >like(php,python,java)</span></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Course Category</label></div>
                                        <div class="col-12 col-md-9"> <select name="category" class="form-control" required>
                                     <?php
                                     $x="";
                                       if($data['coursecategory'] == "Tutorial"){
$x="selected";
                                       }

?>
                                       <option value="Tutorial" <?php echo $x; ?>>Tutorial</option>
                                       <?php
                                     $x="";
                                       if($data['coursecategory'] == "quiz"){
$x="selected";
                                       }

?>
  
                                            <option value="quiz" <?php echo $x; ?>>quiz</option>
                                            <?php
                                     $x="";
                                       if($data['coursecategory'] == "exercise"){
$x="selected";
                                       }

?>
                                            <option value="exercise" <?php echo $x; ?>>Exercise</option>
  
                                            <?php
                                     $x="";
                                       if($data['coursecategory'] == "problem"){
$x="selected";
                                       }

?>
                                            <option value="problem" <?php echo $x; ?>>Problem</option>
                                        </select></div>
                                    </div>
                                    
                                   
                                
                            </div>
                            <input type="hidden" name="uniqid" value="<?php  echo $data['uniqid']; ?>">
                            <div class="card-footer">
                                <button type="submit" name="updatecategory" class="btn btn-primary btn-lg ">
                                     Update
                                </button>
                            </div>

                        </div>
</form>


<?php
}
}else{
?>
<form action="backendsection/addcategory.php" method="post" class="form-horizontal">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Category</strong> Form
                            </div>
                            <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Couse Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="coursename" placeholder="Enter Course Name" class="form-control" required><span class="help-block">like(php,python,java)</span></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Course Category</label></div>
                                        <div class="col-12 col-md-9"> <select name="category" class="form-control" required>
                                            <option value="Tutorial">Tutorial</option>
                                            <option value="quiz">quiz</option>
                                            <option value="exercise">Exercise</option>
                                            <option value="problem">Problem</option>
                                        </select></div>
                                    </div>
                                    
                                   
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="addcategory" class="btn btn-primary btn-lg ">
                                     Add
                                </button>
                            </div>

                        </div>
</form>
<?php

}
?>
                   
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
<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>
</html>
