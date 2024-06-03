<?php 
session_start();
require '../ajax-crud/connect.php';

if (isset($_POST['btnlogin'])) 
{
	$email=$_POST['txtEmail'];
	$password=$_POST['txtpassword'];

	$check="SELECT * From admins WHERE AdminEmail= '$email' AND Password='$password'";
  $query=mysqli_query($connect, $check);
  $count=mysqli_num_rows($query);

	if ($count>0) {
   
		$array=mysqli_fetch_array($query);
		$Aid=$array['AdminID'];
		$Aname=$array['AdminName'];
		$Aemail=$array['AdminEmail'];
 
		$_SESSION['aid']=$Aid;
		$_SESSION['aname']=$Aname;
		$_SESSION['aemail']=$Aemail;
			echo "<script>
			window.alert('Admin Login Successfully')</script>";
			echo "<script>
			window.location='dashboard2.php'</script>";
		}else
		{

  
      echo "<script>window.alert('Login Fail')</script>";
		}	
}

 ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Admin Login </title>
    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>"  />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  </head>
  <body>
    <div class="AdminloginForm">
      <h2>Admin Login</h2>
      <span class="banner"
        >For <span></span> <span id="g">G</span> <span id="w">W</span>
        <span id="s">S</span> <span id="c">C</span></span
      >
      <form action="AdminLogin.php" method="POST">
        <div class="inputbox">
          <input type="gmail" name="txtEmail" required />
          <span><i class="fa-solid fa-user"></i>User Email</span>
        </div>
        <div class="inputbox">
          <div class="inputbox">
            <input type="password" name="txtpassword" required />
            <span><i class="fa-solid fa-lock"></i>Password</span>
          </div>
          <div class="g-recaptcha" data-sitekey="6LfXZ3soAAAAAP_XwRc8D6_CUtyWxUUUz6FZUC-7"></div>
        </div>
        <input type="submit" id="AdLogin" value="Login" name="btnlogin" />
      </form>
      <p>Don't You Have an account? <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Admin/Adminreg.php">Register Now</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script>

    $(document).on('click','#AdLogin',()=>{
      let res =grecaptcha.getResponse();
      if(res.length==0){
        alert("Please Verify You Are not Robot");
        return false;
      }
      
    })


    

  </script>
  </body>
</html>
