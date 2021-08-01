<?php
// header file include doctype to body tak
session_start();
include "includes/database.php";
if(isset($_GET['id'])){
$id=$_GET['id'];
    
$select=mysqli_query($con,"SELECT * FROM `courses` WHERE `uniqueid`='$id'");
    $row=mysqli_num_rows($select);
    
    if($row == "1"){
$data=mysqli_fetch_assoc($select);



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
            <div class="animated">

                <div class="card">
                    <div class="card-header" style="text-align: center; font-weight:600; font-size:larger;">
                       
                        <strong class="card-title" v-if="headerText" >Coding section</strong>
                    </div>
                   
                           
                  </div>
                  <div class="car-body">
              <div class="container">
              
    <!--Section: Best Features-->
    <section id="code" class="text-center">

        <!-- Heading -->
      

        <!--Grid row-->
        <div class="row d-flex justify-content-center mb-4" >
        
        <video src="../../media/video/<?php echo $data['youtubelink']; ?>" width="80%" autoplay loop controls ></video>

     
    </div>
    <!--Grid row-->

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-3 offset-md-2">
              

                <h2><?php echo $data['titile']; ?></h2>

                <p>
                <?php echo $data['description']; ?>
                </p>
     
     <?php
     if($data['tryitornot']=='1'){

        if($data['Codelanguage']=='PHP'){

            echo "<a href='phpcompiler.php?id=".$_GET['id']."'> <button class='btn-primary'> Live Preview</button></a>";
        }else if($data['Codelanguage']=='HTML,CSS,JAVASCRIPT'){
            echo "<a href='htmlcssjscompiler.php?id=".$_GET['id']."'> <button class='btn-primary'> Live Preview</button></a>";
            
        }else if($data['Codelanguage']=='Python'){
            echo "<a href='pythoncompiler.php?id=".$_GET['id']."'> <button class='btn-primary'> Live Preview</button></a>";
            
        }
         
        }else{
            
            echo "<span class='btn btn-primary'>NO Live Preview</button></span>";
     }
     
     ?>
     


                
                <?php
$filetype=$data['filetype'];
if(($filetype == "singles") || ($filetype == "both")){
    
    $foldernam=$data['folderpathname'];
    $filesname=$data['singlesfile'];
    // echo $foldernam,$filesname;
    $filesname=explode(",",$filesname);
    $count=count($filesname)-1;
 
  

    
    // echo "$y";
    
    

    
    ?>
    <hr>


                <h3>Sources Code For <?php echo $data['titile'];?></h3>
                
                <center><p>Copy And Use Code (:)</p></center>
                <?php
                for ($i=0; $i <$count ; $i++) { 
      
      $y=file_get_contents("../../media/file/".$foldernam."/singlefile/".$filesname[$i]);
  
      ?>   
                    <p>File <?php echo $i+1; ?></p>   
                <div class="code-box-copy">
                    <button class="code-box-copy__btn" data-clipboard-target="#example-head<?php echo $i+1; ?>" title="Copy"></button>
                    <pre><p><?php echo $filesname[$i]; ?></p><code class="language-html" id="example-head<?php echo $i+1; ?>"><?php echo $y; ?></code></pre>
                </div>
       <script>
            $('.code-box-copy').codeBoxCopy({
                tooltipText: 'Copied',
                tooltipShowTime: 1000,
                tooltipFadeInTime: 300,
                tooltipFadeOutTime: 300
            });
            </script>
     
     


<!-- <p>Html page</p>
                <div class="code-box-copy">
                    <button class="code-box-copy__btn" data-clipboard-target="#example-head1" title="Copy"></button>
                    <pre><p>html.php</p><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
&lt;link href=&quot;prism/prism.min.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;link href=&quot;prism/prism.min.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;link href=&quot;code-box-copy/css/code-box-copy.css&quot; rel=&quot;stylesheet&quot;&gt;
&lt;script src=&quot;js/jquery.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;prism/prism.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;clipboard/clipboard.min.js&quot;&gt;&lt;/script&gt;
&lt;script src=&quot;code-box-copy/js/code-box-copy.js&quot;&gt;&lt;/script&gt;
&lt;!-- Cod Box Copy end --&gt;
</code></pre>
                </div>
       <script>
            $('.code-box-copy').codeBoxCopy({
                tooltipText: 'Copied',
                tooltipShowTime: 1000,
                tooltipFadeInTime: 300,
                tooltipFadeOutTime: 300
            });
            </script>
               -->
            

<?php 
                }
}
?>











            </div>
            <!--Grid column-->

            <!--Grid column-->
             
        </div>
        <!--Grid row-->

    </section>


              </div>
              </div>
  
              <?php
$filetype=$data['filetype'];
if(($filetype == "zip") || ($filetype == "both")){
    $foldernam=$data['folderpathname'];
?>

              <!-- Comment  -->
              <hr>
              <center><h3>Download</h3></center>
<div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1" >
                    
                    <?php   
                   
                    $path="../../media/video/".$foldernam."/zip/".$data['zipfile'];

                    ?>
                                <div class="form-actions form-group"><center><a download="<?php echo $data['zipfile']; ?>" href="<?php echo $path; ?>"><button class="btn btn-success btn-lg"><i class="fa fa-download"></i>Download Now</button></a></center></div>
                            
                    </div>

            </div>



<?php 
}
?>




















              
            <hr>

            <footer class="page-footer font-small" style="border:1px solid black; border-radius:10px; background-color:lightblue; color:white;" >

<div class="footer-copyright text-center py-3" style="border-top:1px solid black; background-color:cadetblue;">© 2020 Copyright:
  <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
</div>
<!-- Copyright -->

</footer>

            


    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>


</div><!-- /#right-panel -->


<!-- Right Panel -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- <script>


$('.code-box-copy').codeBoxCopy({
                tooltipText: 'Copied',
                tooltipShowTime: 1000,
                tooltipFadeInTime: 300,
                tooltipFadeOutTime: 300
            });


$('.carousel').carousel({
            interval: 3000,
        });




</script> -->
<script>
$(window).scroll(function(){

if($(this).scrollTop() > 400){
// $('.gotop').show();
$('.gotop').fadeIn('100');
}else{
$('.gotop').fadeOut('100');
// $('.gotop').hide();

}


});

$('.gotop').click(function(){
    console.log("click");
    $('html, body').animate({scrollTop:0},100);
});
</script>
    
</body>
</html>
<?php


    }else{
        header("Location:listofcourse.php");
    }
}
    ?>