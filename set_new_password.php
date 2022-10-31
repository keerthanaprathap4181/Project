<?php 
include 'home_header.php';
extract($_GET);

if(isset($_POST['confirm'])){
  extract($_POST);
  if($passw=$cpassw){


    $q="UPDATE `login` SET `password`='".md5($_POST['cpassw'])."' WHERE `login_id`='$lid'";
    update($q);
    
    try{
  
  echo $email=$email;
  echo $passw=$cpassw;

   require("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; 
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "healhospitals06@gmail.com"; 
$mail->Password = "fkqmbzfyeqznxeln";


$mail->From = "Heal Hospital";
$mail->FromName = "healhospitals06@gmail.com"; 
$mail->AddAddress($email);                  
$mail->Subject ="New Password";
$mail->Body    = str_replace("<br />", "\n", nl2br("Hi sir,\nYour New Password : $cpassw")) ;
$mail->AltBody = "";

if(!$mail->Send())
{
  
   ?>
    <script type="text/javascript">
  alert("mail not  send");
  // window.location="usercheckandverifyotp.php";
  </script>
   
   <?php
}
else
{
  echo ' send';
  ?>
    <script type="text/javascript">
       alert("Password Successfully Changed..");
    redirect("home.php");

  alert("mail send succesfully!!!!!!!Check your email ");
    window.location="adminhome.php";
  </script>
   
   <?php
}
  }catch (Exception $e)
  
{
  echo $e;
}
// }
 
/////////////////////////////////////////////////////////mail////////////////////////////////////// 



              
        // else
        // {
        //  alert("Time Occupied");
        // }
    // return redirect('adminmanageschedule.php');
return redirect("home.php");
}
}
 ?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                             <h2>Set New Password<span class="text-primary">.</span></h2>
            <form method="post" action="" enctype="multipart/form-data" >
              <table class="table" style="width: 500px;color: black">
                <tr width="500">
                  <td>New Password:</td>
                  <td><input type="text" class="form-control" name="passw"></td>
                </tr>
                <tr>
                  <td>Confirm Password:</td>
                  <td><input type="text" class="form-control" name="cpassw"></td>
                </tr>
               
                <tr>
                  <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="confirm" value="Confirm"></td>
                </tr> 

               
              </table>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


  
  
<?php 
include 'footer.php';
 ?>