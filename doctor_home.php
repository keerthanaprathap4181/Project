
<?php 
include 'connection.php';
$lid=$_SESSION['login_id'];

if(!isset($_SESSION["login_id"])) 
{
    header("Location:home.php");
}

 ?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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

    <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="font-size: 30px;font-style: italic;font-family: monospace;" href="doctor_home.php">Welcome..... <?php echo $_SESSION['dname'] ?></a> <i class="fa fa-angle-right"></i></li>
            </ol>
<!--four-grids here-->
    <div class="four-grids">
         
          
        <!--   <div class="col-md-3 four-grid">
            <div class="four-w3ls">
              <div class="icon">
                <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h3>Projects</h3>
                <h4>12,430</h4>
                
              </div>
              
            </div>
          </div> -->
        <!--   <div class="col-md-3 four-grid">
            <div class="four-wthree">
              <div class="icon">
                <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h3>Old Projects</h3>
                <h4>14,430</h4>
                
              </div>
              
            </div>
          </div> -->
          <div class="clearfix"></div>
        </div>
<!--//four-grids here-->
<!--agileinfo-grap-->
<!-- <div class="agileinfo-grap">
<div class="agileits-box">
<header class="agileits-box-header clearfix">
<h3>Statistics</h3>
  <div class="toolbar">
    <div class="pull-left">
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-xs">Daily</a>
        <a href="#" class="btn btn-default btn-xs active">Monthly</a>
        <a href="#" class="btn btn-default btn-xs">Yearly</a>
      </div>
    </div>
    <div class="pull-right">
      <div class="btn-group">
        <a aria-expanded="false" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
        Export <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu pull-right" role="menu">
        <li><a href="#">Export as PDF</a></li>
        <li><a href="#">Export as CSV</a></li>
        <li><a href="#">Export as PNG</a></li>
        <li class="divider"></li>
        <li><a href="#">Separated link</a></li>
        </ul>
      </div>
      <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i></a>
    </div>
  </div>
</header>
<div class="agileits-box-body clearfix">
<div id="hero-area"></div>
</div>
</div>
</div> -->
  <!--//agileinfo-grap-->
<!--photoday-section--> 
      
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
     .buttonA { 
background-color:   #1E90FF;  
border: none; 
color: white; 
padding: 12px 70px; 
text-align: center; 
text-decoration: none; 
display: inline-block; 
margin: 2px 6px; 
cursor: pointer; 
font-size:20px; 
border-radius: 40%;
} 
  </style>                     
                      <div class="col-sm-6 wthree-crd">
                            <div class="card">
                                <div class="card-body">
                                    <div class="widget widget-report-table">
                                        <header class="widget-header m-b-15">
                                        </header>
                                        
                                        <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                                            <div class="card-header">
                                              <h3 align="center">My Profile</h3>
                                             
                                          </div>
                                            <!-- <div class="col-md-6 col-sm-6 col-xs-6 ">
                                                <h2 class="text-right c-teal f-300 m-t-20">$21,235</h2>
                                            </div> -->
                                        </div>
                                        
<?php 
$q1="select * from doctors where login_id='$lid'";
$r=select($q1);

 ?>
                                        <div class="widget-body p-15">
                                            <table class="table table-bordered" style="width: 1000px">
                                                <thead>
                                                  <tr>
                                                    <td colspan="2" align="center"><img src="<?php echo $r[0]['photo']; ?>" height="100" width="100"></td>
                                                  </tr>
                                                    <tr>
                                                        <th style="color: black">First Name :</th>
                                                        <td style="color: black"><?php echo $r[0]['first_name']; ?></td>
                                                      </tr>
                                                      <tr>
                                                        <th style="color: black">Last Name :</th>
                                                         <td style="color: black"><?php echo $r[0]['last_name'] ?> </td>
                                                      </tr>
                                                      <tr>
                                                        <th style="color: black">Phone</th>
                                                        <td style="color: black"><?php echo $r[0]['phone'] ?></td>
                                                      </tr>
                                                      <tr>
                                                        <th style="color: black">Email</th>
                                                         <td style="color: black"><?php echo $r[0]['email']; ?></td>
                                                      </tr>
              
                                                      <tr>
                                                         <th style="color: black">Place</th>
                                                         <td style="color: black"><?php echo $r[0]['place'] ?></td> 
                                                      </tr>
                                                       <tr>
                                                          <th style="color: black">Gender</th>
                                                           <td style="color: black"><?php echo $r[0]['gender']; ?></td>
                                                       </tr>
                                                       <tr>
                                                          <th style="color: black">Specialization</th>
                                                            <td style="color: black"><?php echo $r[0]['qualification'] ?> </td>
                                                       </tr>
                                                         <tr>
                                                          <th style="color: black">License No</th>
                                                            <td style="color: black"><?php echo $r[0]['license_no'] ?> </td>
                                                       </tr>


                                                       <tr>
                                                        <th style="color: black">Dob</th>
                                                          <td style="color: black"><?php echo $r[0]['dob'] ?> </td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2" align="center"><a style="margin-left: -5em" href="doctor_edit_profile.php" class="buttonA">Edit</a></td>
                                                    </tr>
                                                   
                                            
                                               </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 w3-agileits-crd">
            
                            <div class="card card-contact-list">
          
              </div>
                        </div>
                      <!-- <div class="col-sm-4 w3-agile-crd">
                            <div class="card">
                                <div class="card-body card-padding">
                                    <div class="widget">
                                        <header class="widget-header">
                                            <h4 class="widget-title">Activities</h4>
                                        </header>
                                        <hr class="widget-separator">
                                        <div class="widget-body">
                                            <div class="streamline">
                                                <div class="sl-item sl-primary">
                                                    <div class="sl-content">
                                                        <small class="text-muted">5 mins ago</small>
                                                        <p>Williams has just joined Project X</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item sl-danger">
                                                    <div class="sl-content">
                                                        <small class="text-muted">25 mins ago</small>
                                                        <p>Jane has sent a request for access</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item sl-success">
                                                    <div class="sl-content">
                                                        <small class="text-muted">40 mins ago</small>
                                                        <p>Kate added you to her team</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item">
                                                    <div class="sl-content">
                                                        <small class="text-muted">45 minutes ago</small>
                                                        <p>John has finished his task</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item sl-warning">
                                                    <div class="sl-content">
                                                        <small class="text-muted">55 mins ago</small>
                                                        <p>Jim shared a folder with you</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div> -->
            <div class="clearfix"></div>
                   
  <!--//photoday-section--> 
  
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

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
 <!--   <p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p> -->
</div>  
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
                 
                    <!--   <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                     <ul id="menu-academico-sub" >
                      <li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>
                      

                      </ul>
                   </li> -->

               <!--    <li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
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