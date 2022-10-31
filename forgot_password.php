<?php 
include 'home_header.php';

if(isset($_POST['forgot'])){
  extract($_POST);

    echo $q="select email,username,login_id from login inner join doctors using(login_id) where username='$uname' and phone='$ph' union select email,username,login_id from login inner join patients using(login_id) where username='$uname' and phone='$ph'";
      $res=select($q);
      if(sizeof($res)>0){
        $lid=$res[0]['login_id'];
        $email=$res[0]['email'];
        return redirect("set_new_password.php?lid=$lid&email=$email");
  }

  else{
    alert("Invalid Details");
    return redirect("home.php?lid=$lid");
  }
  

}
 ?>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h2>Forgot Password<span class="text-primary">.</span></h2>
            <form method="post" action="" enctype="multipart/form-data" >
              <table class="table" style="width: 500px;color: black">
                <tr width="500">
                  <td>Username:</td>
                  <td><input type="text" class="form-control" name="uname"></td>
                </tr>
                <tr>
                  <td>Phone:</td>
                  <td><input type="text" class="form-control" name="ph"></td>
                </tr>
                <tr>
                  <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="forgot" value="Submit"></td>
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