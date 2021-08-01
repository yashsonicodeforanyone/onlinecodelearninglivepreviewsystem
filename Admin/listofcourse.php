<?php
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
  
  }else{
    header("location:login.php");
  }

include "includes/database.php";
?>


<?php
include "includes/header.php";

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
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Message</strong>
                            </div>

                            <div class="card-body">
                            <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
                                            <th>Sr. no</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Top View</th>
                                            <th>Live</th>
                                            <th>Show</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
        </thead>
                               
                                    <tbody>
                                    <?php
$x=0;
$select=mysqli_query($con,"SELECT * FROM `courses`");
$row=mysqli_num_rows($select);

if($row > 0){
while($data=mysqli_fetch_assoc($select)){
    $x=$x+1;

         ?>
                               
                               <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $data['titile']; ?></td>
                                            <td><?php echo $data['category']; ?></td>
                                            <td><?php echo $data['description']; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                        <td><form action="backendsection/addcourse.php" method="post" id="showtopd<?php echo $x; ?>">
                                        <input type="hidden" name="uniqid" value="<?php echo $data['uniqueid']; ?> ">
                                            <input type="hidden" name="topview" value="<?php echo $data['showtop']; ?>">
                                        <center>
                                        <?php
                                        $za="";
                                        if($data['showtop'] !='0'){
$za="checked";
                                        }
                                        
                                        ?>
                                        
                                        <input type="checkbox" <?php echo $za; ?> name="live" onclick="showtoped(<?php echo  $x; ?>)" id="checked"><center></form></td>



                                        <td><form action="backendsection/addcourse.php" method="post" id="checke<?php echo $x; ?>">
                                        <input type="hidden" name="uniqid" value="<?php echo $data['uniqueid']; ?> ">
                                            <input type="hidden" name="uplive" value="<?php echo $data['live']; ?>">
                                        <center>
                                        <?php
                                        $z="";
                                        if($data['live']=='0'){
$z="checked";
                                        }
                                        
                                        ?>
                                        
                                        <input type="checkbox" <?php echo $z; ?> name="live" onclick="checkedd(<?php echo  $x; ?>)" id="checked"><center></form></td>
                                            <td>
                                            <a href="code.php?id=<?php echo $data['uniqueid'];?>"><div class="btn btn-primary">Show Detail</div></a></td>
                                            
                                        <td> <form action="updatecourseform.php" method="post" id="update<?php echo $data['sno']; ?>">
                                        <input type="hidden" name="uniqid" value="<?php echo $data['uniqueid']; ?>" >
                                        <input type="hidden" name="updatecourse" >
                                        <div onclick="edited(<?php echo $data['sno']; ?>)" class="btn btn-primary" >Edit</div></form>
                                        </td>
                                        <td>
                                        <form action="backendsection/addcourse.php" id="<?php echo $data['sno']; ?>" method="post">
                                        
                                        <div onclick="deletedcour(<?php echo $data['sno']; ?>)"  class="btn btn-danger" >Delete</div><input type="hidden" name="uniqid" value="<?php echo $data['sno']; ?> ">
                                            <input type="hidden" name="delete">
                                            <input type="hidden" name="videoname" value="<?php echo $data['youtubelink']; ?> " >
                                
                                             </form></td>
                                        </tr>
           <?php

         }
         ?>
                                    </tbody>
                                </table>
  <?php

}
?>
  
                            </div>
                        </div>
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


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script src="assets/js/lib/data-table/jquery.dataTables.min.js"></script>
    
    

    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Blfrtip'
    } );
} );

       
       function checkedd(id){
    var x=document.getElementById("checke"+id);
    x.submit();
        
        }
     
       function showtoped(id){
        swal({
  title: "Are you sure?",
  text: "Show top, Can you added to top!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})

.then((willDelete) => {
  if (willDelete) {
    
    var x=document.getElementById("showtopd"+id);
    x.submit();
    


  } else {
    swal("Don't very,Not Added to top!");
   location.reload();
  }
});

    
        }
  </script>




<script>
function deletedcour(id){
    swal({
  title: "Are you sure?",
  text: "deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})

.then((willDelete) => {
  if (willDelete) {
    swal("Done ! Your course is deleted!", {
      icon: "success",
    });
    var x=document.getElementById(id);
    x.submit();
    


  } else {
    swal("Your course is safe!");
  }
});


}



function edited(id){
  swal({
  title: "Are you sure?",
  text: "Edit, You can course edit!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})

.then((willDelete) => {
  if (willDelete) {
    
    var x=document.getElementById("update"+id);
    x.submit();
    


  } else {
    swal("NO CHANGES!");
  }
});
}
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
