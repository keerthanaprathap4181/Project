<?php include 'home_header.php';

$q2="SELECT CURDATE() as m";                            
	$res=select($q2); 
	


if (isset($_POST['register'])) 
{
	extract($_POST);
	$password=md5($_POST['pwd']);

    $qy="select * from login where username='$email' and password='$password'";
    $r=select($qy);
    if (sizeof($r)>0) 
    {
       alert("User is already Exist");
    }

	else{
    $ql="insert into login values(null,'$email','$password','patient','0')";
    $r=insert($ql);
    
    $qu="insert into patients values(null,'$r','$fname','$lname','$phone','$email','$hn','$place','$gn','$bg','$dob')";
    insert($qu);
    alert("registered successfully");
    return redirect("home.php");  
    }	
	
	}
	


?>

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


<form method="post"  >

    <center>
        <h1 style="padding-top: 2em">Patient Registration</h1>
        <table class="table" style="width: 500px;color: black ;">
            <tr>
                <th>FirstName</th>
                <td><input type="text" style="text-transform:capitalize;" name="fname" required class="form-control"></td>
            </tr>
            <tr>
                <th>LastName</th>
                <td><input type="text" style="text-transform:capitalize;" name="lname" required class="form-control"></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" title='Phone Number (Format: 9999-9999)'  minlength="10" maxlength="10" pattern="[6-9]{1}[0-9]{9}" name="phone" required class="form-control"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email"  name="email" required class="form-control"></td>
            </tr>
            <tr>
                <th>Date Of Birth</th>
                <td><input type="date" id="newDate" checkDateTime="" max="<?php echo $res[0]['m'] ?>" name="dob" required class="form-control"></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><input type="radio" name="gn" required  value="male">Male
                <input type="radio" name="gn" required  value="female">Female

                </td>
            </tr> 
            <tr>
                <th>House Name</th>
                <td><input type="text" style="text-transform:capitalize;" name="hn" required class="form-control"></td>
            </tr>
            <tr>
                <th>Blood Group</th>
                <td><select name="bg" required="" class="form-control">
                   <!--  <option>choose</option> -->
                    <option>o+ve</option>
                    <option>o-ve</option>
                    <option>A+ve</option>
                    <option>A-ve</option>
                    <option>B+ve</option>
                    <option>B-ve</option>
                    <option>AB+ve</option>
                    <option>AB-ve</option>

                </select></td>
            </tr>
            <tr>
                <th>Place</th>
                <td><input type="text" style="text-transform:capitalize;" name="place" required class="form-control"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input name="pwd" required id="password" type="password" onkeyup='check();' class="form-control"></td>
            </tr> 

              <tr>
                <th>Confirm Password</th>
                <td><input type="password" name="cpwd" id="confirm_password"  onkeyup='check();' required class="form-control"></td>
                <td><span id='message'></span></td>
            </tr>               
            
                
            <tr><td align="center" colspan="2"><input type="submit" name="register" value="REGISTER" class="btn btn-success"></td></tr>
            
        </table>


    </center>
    
</form>

           