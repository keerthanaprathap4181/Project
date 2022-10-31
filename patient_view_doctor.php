<?php 
include 'connection.php';
$lid=$_SESSION['login_id'];
extract($_GET);

if(!isset($_SESSION["login_id"])) 
{
    header("Location:home.php");
}

if (isset($_POST['reset'])) 
{
  return redirect("patient_view_doctor.php");
}


 ?>


 <!DOCTYPE HTML>
<html>
<head>
<title>Hospital Management System</title>
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
  
<script type="text/javascript">
  function TestOnTextChange()
  {

    var a= document.getElementById("amt").value;
    var b= document.getElementById("qua").value;
    var c=document.getElementById("quantity").value;
    if (parseInt(c)>=parseInt(b)){
      var s=parseInt(a)*parseInt(b)
    }else{
      alert("please select less quantity ");
    }

    document.getElementById("total").value=s;
  
    
  }
 </script>


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
font-size:10px; 
border-radius: 40%;
} 

     .buttonB { 
background-color:   #1E90FF;  
border: none; 
color: white; 
padding: 12px 70px; 
text-align: center; 
text-decoration: none; 
display: inline-block; 
margin: 2px 6px; 
cursor: pointer; 
font-size:10px; 
border-radius: 40%;
}
  </style>        


<center>
<h1>View Doctors</h1>
<form method="post">
<table class="table" style="width: 500px">
  <tr>
    <th><select name="doc" class="form-control">
      <?php 
        $q2="select * from doctors";
        $r=select($q2);
        foreach ($r as $key)
        {
         ?>
        <option value="<?php echo $key['doctor_id'] ?>"><?php echo $key['first_name']; ?> <?php echo $key['last_name']; ?> (<?php echo $key['qualification']; ?>)</option>
         <?php
        }
       ?>
    </select></th>
    <td><input class="btn btn-success" type="submit" name="search" value="Search"></td>
    <td><input class="btn btn-warning" type="submit" name="reset" value="Reset"></td>
  </tr>
</table>
</form>
  </center>


  <center>
   <form>
     <?php 


     if (isset($_POST['search'])) 
{
  extract($_POST);
  $q="select * from doctors where doctor_id='$doc'";
  $ress=select($q);

    foreach ($ress as $rs) { ?>
    <table class="table" style="width: 400px;font-style: italic;font-family: monospace;font-size: 21px">
      <tr>
        <td colspan="2" align="center"><a href="<?php echo $rs['photo'] ?>"><img src="<?php echo $rs['photo'] ?>" height="100" width="100"></a></td>
      </tr>
      <tr>
        <th style="color: black">Name</th>
         <td style="color: black"><?php echo $rs['first_name'] ?> <?php echo $rs['last_name'] ?></td>
      </tr>
      <tr>
        <th style="color: black">Phone</th>
        <td style="color: black"><?php echo $rs['phone'] ?></td>
      </tr>
      <tr>
        <th style="color: black">Email</th>
         <td style="color: black"><?php echo $rs['email'] ?></td>

      </tr>

  <?php }
   ?>
</table>

<h2 style="font-style: italic;font-family: monospace;font-size: 21px">Appointment Date</h2>
<p>
<?php 



$q5="SELECT * FROM `schedule` WHERE `doctor_id`=$doc";
$rss=select($q5); 
$sdate=$rss[0]['date'];

if (sizeof($rss)>0) 
{
  # code...




foreach ($rss as $key) 
{
 ?>

 
    <a class="btn btn-info" href="patient_select_doctor.php?sid=<?php echo $key['schedule_id'] ?>&dt=<?php echo $key['date']; ?>"><?php echo $key['date']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


 <?php
}
?>
 <br>

<?php
}

}
?>

<?php 
 if (isset($_GET['sid'])) 
{
  extract($_GET);
  $date = $rss[0]['start_time'];
$newDate=$date;
$date1 = $rss[0]['end_time'];
$a=array();
while($date1>=$newDate)
{
  $newDate = date('H:i:s', strtotime($newDate. ' +5 minutes'));


  if($date1>=$newDate)
  {
    array_push($a,$newDate);
  }
}
// print_r($a);
}

?>
  </center>


</div>
<!--inner block end here-->
<!--copy rights start here-->
<!-- <div class="copyrights">
   <p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div> -->  
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
                    <li><a href="patient_home.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
                    
                    
                     <li id="menu-academico" ><a href="patient_view_doctor.php"><i class="fa fa-envelope nav_icon"></i><span>View Doctors</span><div class="clearfix"></div></a></li>
                  <li><a href="patient_view_bookings.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>View Booking</span><div class="clearfix"></div></a></li>
                  <li id="menu-academico" ><a href="patient_send_feedback.php"><i class="fa fa-bar-chart"></i><span>Send Feedback</span><div class="clearfix"></div></a></li>
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