<?php 
include 'connection.php';

$q2="SELECT CURDATE() as m";                            
	$res=select($q2);
	
if(!isset($_SESSION["login_id"])) 
{
    header("Location:home.php");
}
else
{
	if(isset($_POST['doctor'])){


	extract($_POST);

	$password=md5($_POST['psw']);

    $qy="select * from login where username='$email' and password='$password'";
    $r=select($qy);
    if (sizeof($r)>0) 
    {
       alert("User is already Exist");
    }

	else{

	$dir = "static/uploads/";
	$file = basename($_FILES['img']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("images_").".".$file_type;
	if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
	{


			$q="INSERT INTO `login`(`username`,`password`,`usertype`,`status`) VALUES('$email','$password','doctor','0')";
			$ids=insert($q);
			$qry="INSERT INTO `doctors`(`login_id`,`first_name`,`last_name`,`phone`,`email`,`place`,`qualification`,`license_no`,`dob`,`gender`,`photo`) VALUES('$ids','$fname','$lname','$phone','$email','$place','$qlf','$lno','$dob','$gn','$target')";
			insert($qry);
			alert("Added Successfull");
			return redirect('admin_doctor_registration.php');

		}
		else
		{
			echo "file uploading error occured";
		}
	}
}

if(isset($_GET['d_id'])){
	extract($_GET);
	$qf="update login set status='0' where login_id='$d_id'";
	update($qf);
	

	redirect("admin_doctor_registration.php");
}
if(isset($_GET['u_id'])){
	extract($_GET);
	$qc="select * from doctors where login_id='$u_id'";
	$rsc=select($qc);
}
if(isset($_POST['update_doctor'])){
	extract($_POST);
	extract($_GET);
	$qb="update doctors set first_name='$fname',last_name='$lname',phone='$phone',email='$email',place='$place' where  login_id='$u_id'";
	update($qb);
	redirect("admin_doctor_registration.php");

}
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

	  <style type="text/css">
    table
    {
      color: black;
      font-style: italic;
      font-family: monospace;
      font-size: 18px;
    }
    h1
    {
      color: black;
      font-style: italic;
      font-family: monospace;
      font-size: 22px;
    }
  </style>

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



<script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
<script>
    $(function() {
        $("input[name='fname']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^A-Za-z ]/g, ''));

        });
        $("input[name='lname']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^A-Za-z ]/g, ''));

        });
        // $("input[name='dob']").on('input', function(e) {
        //     $(this).val($(this).val().replace(/[^0-9/]/g, ''));

        // });
        
        $("input[name='phone']").on('input', function(e) {
        	$(this).val($(this).val().replace(/[^0-9]/g, ''));
            
        });
        $("input[name='pincode']").on('input', function(e) {
        	$(this).val($(this).val().replace(/[^0-9]/g, ''));
            
        });
        $("input[name='email']").on('input', function(e) {
              var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{1,}/.test(this.value);
                if(!re) {
                    $('#eerror').show();
                } else {
                    $('#eerror').hide();
                }

        });
        $("input[name='address']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^A-Za-z0-9()/. ]/g, ''));

        });
        $("input[name='place']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^A-Za-z ]/g, ''));

        });
            
        $("input[name='pwd']").on('input', function(e) {
        	$(this).val($(this).val().replace(/[^0-9A-Za-z@/. ]/g, ''));
            
        });
    });



   var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>

<center>
		<br>
		<h1>DOCTOR REGISTRATION</h1>
		<br><br>
		<?php 
			if(isset($_GET['u_id'])){
		 ?>
		
		<h3>Update Details</h3><br>
	<form method="post" enctype="multipart/form-data">
	<table class="table" style="width: 500PX;color: black">
		<tr>
			<th style="color: black">First Name</th>
			<td><input type="text" name="fname" value="<?php echo $rsc[0]['first_name']; ?>" pattern="[a-zA-Z\s]{0,30}" title="Only Characters Allowed" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Last Name</th>
			<td><input type="text" name="lname" value="<?php echo $rsc[0]['last_name']; ?>" pattern="[a-zA-Z\s]{0,30}"  required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Phone Number</th>
			<td><input type="text"  minlength="10" maxlength="10" pattern="[6-9]{1}[0-9]{9}" name="phone" value="<?php echo $rsc[0]['phone']; ?>" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Email</th>
			<td><input type="email" name="email" value="<?php echo $rsc[0]['email']; ?>" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Place</th>
			<td><input type="text" value="<?php echo $rsc[0]['place']; ?>" name="place" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Specialization</th>
			<td><input type="text" name="qlf" value="<?php echo $rsc[0]['qualification']; ?>" required class="form-control"></td>
		</tr>
			<tr>
			<th style="color: black"> License Number</th>
			<td><input type="text" value="<?php echo $rsc[0]['license_no']; ?>" name="lno" required class="form-control"></td>
		</tr>
		 <tr>
                <th style="color: black">Date Of Birth</th>
                <td><input type="date" value="<?php echo $rsc[0]['dob']; ?>" id="newDate" checkDateTime="" max="<?php echo $res[0]['m'] ?>" name="dob" required class="form-control"></td>
            </tr>
            <tr>
                <th style="color: black">Gender</th>
                <td><input type="radio" name="gn" required  value="male">Male
				<input type="radio" name="gn" required  value="female">Female

                </td>
            </tr> 
		<tr><td><br></td></tr>
		<tr>
			<td colspan="2" align="center"><input class="btn btn-info" type="submit" name="update_doctor" value="Update"></td>
		</tr>
	</table>
	</form>

	<?php	}
	else{

		?>
	<form method="post" enctype="multipart/form-data">
	<table class="table" style="width: 600PX;color: black">
		<tr>
			<th style="color: black">First Name</th>
			<td><input type="text" style="text-transform:capitalize;" name="fname" pattern="[Aa-Zz\s]+$" title="Only Characters Allowed" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Last Name</th>
			<td><input type="text" style="text-transform:capitalize;" name="lname" pattern="[a-zA-Z\s]{0,30}"  required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Phone Number</th>
			<td><input type="text" pattern="[6-9]{1}[0-9]{9}"  minlength="10" maxlength="10"  name="phone" required class="form-control" ></td>
		</tr>
		<tr>
			<th style="color: black">Email</th>
			<td><input type="email"  name="email"  required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Place</th>
			<td><input type="text" style="text-transform:capitalize;" name="place" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black">Specialization</th>
			<td><input type="text" style="text-transform:capitalize;" name="qlf" required class="form-control"></td>
		</tr>
		<tr>
			<th style="color: black"> License Number</th>
			<td><input type="text" name="lno" required class="form-control"></td>
		</tr>
		 <tr>
                <th style="color: black">Date Of Birth</th>
                <td><input type="date" id="newDate" checkDateTime="" max="<?php echo $res[0]['m'] ?>" name="dob" required class="form-control"></td>
            </tr>
            <tr>
                <th style="color: black">Gender</th>
                <td><input type="radio" name="gn" required  value="male">Male
				<input type="radio" name="gn" required  value="female">Female

                </td>
            </tr> 
            <tr>
               <th style="color: black">Photo </th>
			<td><input type="file" name="img" required class="form-control"></td>
            </tr> 
            <tr>
                <th style="color: black">Password</th>
                <td><input name="psw" required id="password" type="password" onkeyup='check();' class="form-control"></td>
            </tr> 

              <tr>
                <th style="color: black">Confirm Password</th>
                <td><input type="password" name="cpwd" id="confirm_password"  onkeyup='check();' required class="form-control"></td>
                <td><span id='message'></span></td>
            </tr>     
		<tr><td><br></td></tr>
		<tr>
			<td colspan="2" align="center"><input class="btn btn-info" type="submit" name="doctor" value="Register"></td>
		</tr>
	</table>
	</form>
	<?php
}
?>
<br><br>
<?php 
	$qq="SELECT *,concat(first_name,' ',last_name) as doctor_name FROM `doctors` inner join login using(login_id) where status='1'";
	$rs=select($qq);
	if(sizeof($rs)>0){ ?>


<h2>Doctor Details</h2><br>
<table class="table" style="color: black;width: 1000px">
	<tr>
		<th style="color: black">Name</th>
		<th style="color: black">Specialization</th>
		<th style="color: black">Place</th>
		<th style="color: black">Phone</th>
		<th style="color: black">Email</th>
		<th style="color: black">License Number</th>
		<th style="color: black">Date Of Birth</th>
		<th style="color: black">Gender</th>
		<th style="color: black">Photo</th>
		<th style="color: black"></th>
	</tr>
	<?php 
		foreach ($rs as $r) { ?>
			
	
	<tr>
		
		<td style="color: black"><?php echo $r['doctor_name']; ?></td>
		<td style="color: black"><?php echo $r['qualification']; ?></td>
		<td style="color: black"><?php echo $r['place']; ?></td>
		<td style="color: black"><?php echo $r['phone']; ?></td>
		<td style="color: black"><?php echo $r['email']; ?></td>
		<td style="color: black"><?php echo $r['license_no']; ?></td>
		<td style="color: black"><?php echo $r['dob']; ?></td>
		<td style="color: black"><?php echo $r['gender']; ?></td>
		<td style="color: black"><a href="<?php echo $r['photo']; ?>"><img src="<?php echo $r['photo']; ?>" height="100" width="100"></a></td>
		<td style="color: black">
			<a  href="?u_id=<?php echo $r['login_id'] ?>"><img src="static/edit.png" height="30" width="30"></a>
		<a href="?d_id=<?php echo $r['login_id'] ?>"><img src="static/delete.png" height="30" width="30"></a> 
		</td>
	</tr>
	<?php	}
	 ?>
</table>
<?php	}
 ?>


	</center>

</div>
<!--inner block end here-->
<!--copy rights start here-->
<!-- <div class="copyrights">
   <p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>  --> 
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
                    <li><a href="admin_home.php"><i class="fa fa-tachometer"></i> <span>Home</span><div class="clearfix"></div></a></li>
                    
                    
                     <li id="menu-academico" ><a href="admin_doctor_registration.php"><i class="fa fa-envelope nav_icon"></i><span>Add Doctors</span><div class="clearfix"></div></a></li>


                  <li><a href="admin_view_doctors.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>View Doctors</span><div class="clearfix"></div></a></li>


                   <li><a href="admin_view_patients.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>View Patients</span><div class="clearfix"></div></a></li>


                  <li id="menu-academico" ><a href="admin_view_payment_details.php"><i class="fa fa-bar-chart"></i><span>View Payments</span><div class="clearfix"></div></a></li>

                  <!--  <li id="menu-academico" ><a href="home.php"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Logout</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                       <ul id="menu-academico-sub" >
                       <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
                      <li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
                      </ul>
                    </li> -->
                  <li id="menu-academico" ><a href="logout.php"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Logout</span><div class="clearfix"></div></a></li>


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






