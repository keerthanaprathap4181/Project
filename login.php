<?php include 'home_header.php';


if(isset($_POST['login'])){
  extract($_POST);
  //echo $password=md5($_POST['password']);

  $q="select * from login where username='$uname' and password='".md5($_POST['password'])."' and status='1'";
  $res=select($q);
  if(sizeof($res)>0){

   
    $_SESSION['login_id']=$res[0]['login_id'];
     $login_id= $_SESSION['login_id'];

    if($res[0]['usertype']=="admin"){
      return redirect("admin_home.php");
    }
    else if($res[0]['usertype']=="doctor"){
      $q="SELECT *,concat(first_name,' ',last_name) as dname FROM `doctors` WHERE `login_id`='$login_id'";
      $ress=select($q);
      if(sizeof($ress)>0){
        $_SESSION['doc_id']=$ress[0]['doctor_id'];
        $_SESSION['dname']=$ress[0]['dname'];
        $doc_id=$_SESSION['doc_id'];
        return redirect("doctor_home.php");
      }
    }
  

   
    else if($res[0]['usertype']=="patient"){
      $q="SELECT *,concat(first_name,' ',last_name) as name FROM `patients` WHERE `login_id`='$login_id'";
      $ress=select($q);
      if(sizeof($ress)>0){
         $_SESSION['patientid']=$ress[0]['patient_id'];
         $_SESSION['name']=$ress[0]['name'];
        $patientid=$_SESSION['patientid'];
        return redirect("patient_home.php");
      }
    }
   
   
  }
   else{
      alert("Username or Password Incorrect");
     
    }

  }
 ?>


       <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                       <form method="post" id="login" action="#" enctype="multipart/form-data" >
              <table class="table" style="width: 400px;color: white;background:opacity: 0.5;">
                 <h2 style="color: white">Login</h2>
                <tr width="500">
                  <td>Email:</td>
                  <td><input type="text" class="form-control" name="uname"></td>
                </tr>
                <tr>
                  <td>Password:</td>
                  <td><input type="password" class="form-control" name="password"></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="login" value="Login"></td>
                </tr> 

                <tr>
                  <td colspan="2" align="center"><a href="forgot_password.php" style="color : red">Forgot Password..</a></td>
                </tr> 

                <tr>
                  <td colspan="2" align="center">Don't have an account?<a href="patientregister.php">Signup</a></td>
                </tr> 
              </table>
            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->       

<?php include 'footer.php';    ?>     