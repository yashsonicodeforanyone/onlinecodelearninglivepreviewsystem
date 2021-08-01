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
                <div class="col-lg-12">
                    <form action="backendsection/addcourse.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add Code</strong> Course
                        </div>
                        <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Course Title</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="titles" placeholder="Text" class="form-control"  required><small class="form-text text-muted">Like (introduction,for loop,while loop etc)</small></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Select Video</label></div>
                                    <!-- <div class="col-12 col-md-9"><input type="url" id="email-input" name="youtubelink" placeholder="Enter Email" class="form-control" required><small class="help-block form-text">Select your video</small></div> -->
                                    <div class="col-12 col-md-9"><input type="file" name="videofile" accept="video/*" class="form-control-file" required><small class="help-block form-text">Select your video</small></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                    <div class="col-12 col-md-9"><textarea name="descriptionofvideo"  rows="3" placeholder="Content..." class="form-control" required></textarea></div>
                                </div>


<?php
$selectcat=mysqli_query($con,"SELECT * FROM `category`");
$row=mysqli_num_rows($selectcat);


?>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select Course Category</label></div>
                                    <div class="col-12 col-md-6">
                                        <select name="selectcoursecategory" class="form-control" required>
<?php
if($row > 0){

    while($data=mysqli_fetch_assoc($selectcat)){
echo "<option value='".$data['coursename']."'>".$data['coursename']."</option>";        
    }

}else{

    ?>

<option disabled >Add Category</option>

    <?php
}
?>

                                        
   
   
   
                                        </select>
   
                                    </div>
                                    <div class="col-12 col-md-3" id="btncategory">

                                    </div>
                                </div>

                                
                                
                                
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select Code language</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="selectcodelanguage" class="form-control" required>
                                            <option value="HTML,CSS,JAVASCRIPT">HTML,CSS,JAVASCRIPT</option>
                                            <option value="PHP">PHP</option>
                                            <option value="Python">Python</option>
                                           
                                        </select>
                                    </div>

                                </div>






                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Do you want to try it?</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label  p-2">
                                                <input type="radio" id="radio1" name="tryitornot" value="1" class="form-check-input" required>yes
                                            </label><br>
                                            <label for="inline-radio2" class="form-check-label  p-2">
                                                <input type="radio" id="radio2" name="tryitornot" value="0" class="form-check-input" required>no
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class="form-control-label"> file</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label  p-2">
                                                <input type="radio" id="inline-radio1" name="filetype" onclick="zipornot(this.value)" value="zip" class="form-check-input"  required>Zip
                                            </label><br>
                                            <label for="inline-radio2" class="form-check-label  p-2">
                                                <input type="radio" id="inline-radio2" name="filetype" onclick="zipornot(this.value)" value="singles" class="form-check-input" required>Single files
                                            </label>
                                            <label for="inline-radio2" class="form-check-label  p-2">
                                                <input type="radio" id="inline-radio2" name="filetype" onclick="zipornot(this.value)" value="both" class="form-check-input" required>Zip/Single
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div id="Addedhere">
                                    <div class="row form-group p-2 pt-3 pb-2" style="border: 1px solid green;">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">file name</label></div>
                                        <div class="col-12 col-md-8"><input type="text" id="text-input" name="filename[]"  placeholder="Text" class="form-control"><small class="form-text text-muted" required>Like (index.php,index.py,index.html etc)</small></div>
                                        <div class="fa-hover col-md-1"><span class="added" style="border: 1px solid black;"><i class="fa fa-plus-circle"></i></span></div>
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Enter Code</label></div>
                                        <div class="col-12 col-md-9"><textarea name="file_text[]" id="textarea-input" rows="3" placeholder="Content..." class="form-control" name="filedescription"></textarea></div>

                                    </div>
                                </div>





                                <div class="row form-group ziped">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Select zip file</label></div>
                                    <div class="col-12 col-md-9"><input type="file" name="zipfile" accept=".zip"  class="form-control-file" ></div>
                                </div>
                            
                        </div>







                        <div class="card-footer">
                            <button type="submit" name="addcourse" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
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

<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>

    var btn = '<a href="categoryaddform.php"><span class="btn btn-primary">Add New Category</span></a>';
    $('#btncategory').html(btn);



    function zipornot(value) {
        if (value == "zip") {
            $('#Addedhere').hide();
            $('.ziped').show();
        } else if (value == "singles") {
            $('#Addedhere').show();
            $('.ziped').hide();

        } else if (value == "both") {
            $('#Addedhere').show();
            $('.ziped').show();

        }
    }
    $('#Addedhere').hide();
    $('.ziped').hide();






    $(document).on('click', '.added', function() {
        var html = '';
        html += '<div class="row form-group p-2 pt-3 pb-2" style="border: 1px solid green;" id="rm"><div class="col col-md-3 pt-2"><label for="text-input" class=" form-control-label">file name</label></div><div class="col-12 col-md-8 pt-2"><input type="text" id="text-input" name="filename[]" placeholder="Text" class="form-control" required><small class="form-text text-muted">Like (index.php,index.py,index.html etc)</small></div><div class="fa-hover col-md-1 pt-2"><button class="remove" style="border: 1px solid black;"><i class="fa fa-minus-circle"></i></button></div><div class="col col-md-3 pt-2"><label for="textarea-input" class=" form-control-label">Enter Code</label></div><div class="col-12 col-md-9"><textarea name="file_text[]" id="textarea-input" rows="3" placeholder="Content..." class="form-control" required></textarea></div></div>';
        $('#Addedhere').append(html);
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('#rm').remove();
    });
</script>

</body>

</html>