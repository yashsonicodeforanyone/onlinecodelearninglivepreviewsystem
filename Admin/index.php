<?php
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
  
  }else{
    header("location:login.php");
  }


// header file include doctype to body tak
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
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
               

                    <div class="col-lg-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                            <!-- <h4 class="box-title">Top New feature</h4> -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  

  
  
  <ol class="carousel-indicators">
  <?php

$showtopdata=mysqli_query($con,"SELECT * FROM `courses` WHERE `showtop`='1' && `live`='0'");
$showtoprow=mysqli_num_rows($showtopdata);
for($i=0;$i<$showtoprow;$i++){

if($i==0){

  echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$i."' class='active'></li>";
}else{

  
  echo "<li data-target='#carouselExampleIndicators' data-slide-to='".$i."'></li>";
}

}
  ?>

   
  
  </ol>
  <div class="carousel-inner">


  <?php
  $k=0;
                          
                          while($selcttopdata=mysqli_fetch_assoc($showtopdata)){
       $k=$k+1;
               

       ?>

    <div class="carousel-item <?php if($k==1){ echo "active"; } ?>">   
    <video class="d-block w-100" src="../media/video/<?php echo $selcttopdata['youtubelink']; ?>"  ></video>

  <div class="carousel-caption d-none d-md-block">
    
    <h5><?php echo $selcttopdata['titile']; ?></h5>
    <h6><?php echo $selcttopdata['description']; ?></h6>
  </div>
    </div>
  <?php
                          }
  ?>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->


                <div class="row">
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
    
    $select1=mysqli_query($con,"SELECT * FROM `courses` WHERE `category`='$x[$i]' LIMIT 6");
    $select2forrow=mysqli_query($con,"SELECT * FROM `courses` WHERE `category`='$x[$i]'");
    $select2row=mysqli_num_rows($select2forrow);
    
   $z="";
   $k="";
    if($i== 1){
$z="";
// $k="active";
   }
                        ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                               
                                    
                                <h4 class="box-title"><?php echo ucwords($x[$i]." "."Section"); ?>  <span class="count"><?php echo mysqli_num_rows($select2forrow); ?></span> </h4>
                     
                               
                           <hr>
                            </div>
                            <div class="row" >
                               
                            <?php
                          
 while($selectsidenavdata=mysqli_fetch_assoc($select1)){
   ?>
   
      
                        <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top:10px; padding-left: 20px; padding-right: 20px;" >
                               
                        <div class="card" style="height:100%; width:100%; " >
                        <video style="width:100%;" src="../media/video/<?php echo $selectsidenavdata['youtubelink']; ?>" muted autoplay loop controls ></video>
                            <div class="card-body">
                               <a href="code.php?id=<?php echo $selectsidenavdata['uniqueid']; ?>"> <h4 class="card-title mb-3"><?php echo $selectsidenavdata['titile']; ?></h4></a>
                                <p class="card-text"><?php echo $selectsidenavdata['description']; ?></p>
                            </div>
                        </div>
                    </div>
      <?php
 }

      ?>
                                
                                
                                
                              
                            </div> <!-- /.row -->
<?php
if($select2row > 0){


?>

<center>

    <div class="card-body">
        <nav aria-label="Page navigation example">
            <a href="index.php?view_all=<?php echo $x[$i]; ?>"><button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo ucwords("All ".$x[$i]." Show"); ?>">
  View all
</button></a>
        </nav>
    </center>
<?php
}else{
    ?>
<h4 style="text-align:center;"><center>

        NO Course Available
  
</center>
</h4>
    <?php
}
?>
                                </div>
                            </div>
                        

                            <?php

}
?>
                        </div>
                        <!-- Footer -->
<!-- Footer -->
                    </div><!-- /# column -->
                    <hr>
<!-- Footer -->
<footer class="page-footer font-small" style="border:1px solid black; border-radius:10px; background-color:lightblue; color:white;" >

  <div class="footer-copyright text-center py-3" style="border-top:1px solid black; background-color:cadetblue;">© 2020 Copyright:
    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
                </div>
                
                
                
                <!--  /Traffic -->
                <div class="clearfix"></div>
                
                <a href="javascript:void(0)" class="gotop" style="position: fixed; background-color:#fdbe33; color:#121518; height: 45px; width: 45px; right: 15px; bottom:15px; border-radius:50%;  text-align:center; font: size 20px; display:none;">
<i class="fa fa-chevron-up" style="margin-top:10px;"></i>
</a>


     
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });

    </script>
     <script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}

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
$('#example').tooltip();
$('.carousel').carousel();

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>
