<?php 
include 'connection.php';
$lid=$_SESSION['login_id'];
$doc_id=$_SESSION['doc_id'];

if(!isset($_SESSION["login_id"])) 
{
    header("Location:home.php");
}
if (isset($_GET['aid'])) 
{
  extract($_GET);
  $q3="update bookings set status='Accepted' where book_id='$aid'";
  update($q3);
  alert("Accepted");
  return redirect("doctor_view_bookings.php");
}

if (isset($_GET['rid'])) 
{
  extract($_GET);
  $q3="update bookings set status='Rejected' where book_id='$rid'";
  update($q3);
  alert("Rejected");
  return redirect("doctor_view_bookings.php");
}


 ?>


 <!DOCTYPE HTML>
<html>
<head>
<title>Heal Hospitals</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="static/assets2/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="static/assets2/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="static/assets2/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="static/assets2/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="static/assets2/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="static/assets2/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
     <div class="mother-grid-inner">
             <!--header start here-->

<!--heder end here-->
   
<!--photoday-section--> 
            
               
            <div class="clearfix"></div>
                   
  <!--//photoday-section--> 
  <!--w3-agileits-pane--> 
    <!--//w3-agileits-pane--> 
<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
       var navoffeset=$(".header-main").offset().top;
       $(window).scroll(function(){
        var scrollpos=$(window).scrollTop(); 
        if(scrollpos >=navoffeset){
          $(".header-main").addClass("fixed");
        }else{
          $(".header-main").removeClass("fixed");
        }
       });
       
    });
    </script>
    <!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

              <style type="text/css">
    table
    {
      color: black;
      font-style: italic;
      font-family: monospace;
      font-size: 22px;
    }
    h3
    {
      color: black;
      font-style: italic;
      font-family: monospace;
      font-size: 28px;

    }
    th
    {
      color: black;
    }
  </style> 
<center>
<h1>View Bookings</h1>
<form method="post">
<table class="table" style="width: 800px">
  <tr>
    <th style="color: black">Patient</th>
    <th style="color: black">Date</th>
    <th style="color: black">Time</th>
    <th style="color: black">Fee</th>
    <th style="color: black">Status</th>
  </tr>
 <?php 
    $q1="SELECT *,CONCAT(first_name,' ',last_name) AS `name` FROM `schedule` INNER JOIN `bookings` USING(schedule_id) inner join patients using(patient_id) where doctor_id='$doc_id'";
    $r=select($q1);
    foreach ($r as $key) 
    {
     ?>
    <tr>
       <td style="color: black"><?php echo $key['name'] ?></td>
      <td style="color: black"><?php echo $key['date'] ?></td>
      <td style="color: black"><?php echo $key['time'] ?> </td>
      <td style="color: black"><?php echo $key['fee_amount'] ?></td>
      <?php 
      if ($key['status']=="pending") 
      {
        ?>
      <td><a class="btn btn-success" href="?aid=<?php echo $key['book_id'] ?>">Accept</a></td>
      <td><a class="btn btn-info" href="?rid=<?php echo $key['book_id'] ?>">Reject</a></td>
        <?php
      }else{
       ?>
       <td style="color: black"><?php echo $key['status'] ?></td>
       <?php
      }?>
      
    </tr>
     <?php
    }
  ?>
</table>
  </center>


</div>
<!--inner block end here-->
<!--copy rights start here-->
<!-- <div class="copyrights"> -->
   <!-- <p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p> -->
<!-- </div>   -->
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
      <!--/sidebar-menu-->
        <div class="sidebar-menu">
          <header class="logo1">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
          </header>
            <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
                 <ul id="menu" >
                    <li><a href="doctor_home.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
                    
                    
                     <li id="menu-academico" ><a href="doctor_schedule_consulting_times.php"><i class="fa fa-envelope nav_icon"></i><span>Schedule Consulting Time</span><div class="clearfix"></div></a></li>
                  <li><a href="doctor_view_bookings.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>View Booking</span><div class="clearfix"></div></a></li>

              <!--      <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Short Codes</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                       <ul id="menu-academico-sub" >
                       <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
                      </ul>
                    </li> -->
                 
               <!--      <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> UI Components</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                       <ul id="menu-academico-sub" >
                       <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
                      </ul>
                    </li> -->
                 <!--   <li><a href="admin_schedule_doctor_consulting_times.php"><i class="fa fa-table"></i>  <span>Schedule Consulting Time</span><div class="clearfix"></div></a></li> -->

                 <li><a href="logout.php"><i class="fa fa-table"></i>  <span>Logout </span><div class="clearfix"></div></a></li>


                  <!--   <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> UI Components</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                       <ul id="menu-academico-sub" >
                       <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
                      </ul>
                    </li> -->
                  <!--  <li><a href="tabels.html"><i class="fa fa-table"></i>  <span>Tables</span><div class="clearfix"></div></a></li> -->
                 <!--  <li><a href="maps.html"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Maps</span><div class="clearfix"></div></a></li> -->
                    <!--   <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                     <ul id="menu-academico-sub" >
                      <li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>
                      

                      </ul>
                   </li> -->
                 <!--  <li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul>
                    <li><a href="input.html"> Input</a></li>
                    <li><a href="validation.html">Validation</a></li>
                  </ul>
                  </li> -->
                  </ul>
                </div>
                </div>
                <div class="clearfix"></div>    
              </div>
              <script>
              var toggle = true;
                    
              $(".sidebar-icon").click(function() {                
                if (toggle)
                {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
                }
                else
                {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                  $("#menu span").css({"position":"relative"});
                }, 400);
                }
                      
                      toggle = !toggle;
                    });
              </script>
<!--js -->
<script src="static/assets2/js/jquery.nicescroll.js"></script>
<script src="static/assets2/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="static/assets2/js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->     
<!-- morris JavaScript -->  
<script src="static/assets2/js/raphael-min.js"></script>
<script src="static/assets2/js/morris.js"></script>
<script>
  $(document).ready(function() {
    //BOX BUTTON SHOW AND CLOSE
     jQuery('.small-graph-box').hover(function() {
      jQuery(this).find('.box-button').fadeIn('fast');
     }, function() {
      jQuery(this).find('.box-button').fadeOut('fast');
     });
     jQuery('.small-graph-box .box-close').click(function() {
      jQuery(this).closest('.small-graph-box').fadeOut(200);
      return false;
     });
     
      //CHARTS
      function gd(year, day, month) {
      return new Date(year, month - 1, day).getTime();
    }
    
    graphArea2 = Morris.Area({
      element: 'hero-area',
      padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
      data: [
        {period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
        {period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
        {period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
        {period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
        {period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
        {period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
        {period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
        {period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
        {period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
        {period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
      ],
      lineColors:['#ff4a43','#a2d200','#22beef'],
      xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
      pointSize: 2,
      hideHover: 'auto',
      resize: true
    });
    
     
  });
  </script>
</body>
</html>