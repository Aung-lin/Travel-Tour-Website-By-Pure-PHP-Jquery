 <?php
require '../ajax-crud/connect.php';


function isStrongPassword($password,$password2) {
  $errors = [];

  if (strlen($password) < 8) {
      $errors[] = 'The password should be at least 8 characters long.';
  }

  if (!preg_match('/[A-Z]/', $password)) {
      $errors[] = 'Password should contain at least one uppercase letter.';
  }

  if (!preg_match('/[a-z]/', $password)) {
      $errors[] = 'Password should contain at least one lowercase letter.';
  }

  if (!preg_match('/[!@#$%^&*]/', $password)) {
      $errors[] = 'The password should contain at least one special character (e.g., !@#$%^&*).';
  }if($password!==$password2){
    $errors[] = 'The password New Password and Retype Password should be equal';
  }



  return $errors;
}

if (isset($_POST['AdminRegister'])) {
  $name = $_POST['AdminName'];
  $address = $_POST['AdminAddress'];
  $email = $_POST['AdminEmail'];
  $password1 = $_POST['AdminPassword1'];
  $password2 = $_POST['AdminPassword2'];

  $passwordErrors = isStrongPassword($password1,$password2);

  if (empty($passwordErrors)) {
      // all password conditions are okay 
      $checkemail = "SELECT * FROM admins WHERE AdminEmail ='$email'";
      $res = mysqli_query($connect, $checkemail);
      $count = mysqli_num_rows($res);

      if ($count > 0) {
          echo "<script>window.alert('Admin Email already exists!')</script>";
          echo "<script>window.location='Adminreg.php'</script>";
      } else {
          $insert = "INSERT INTO admins(AdminName, AdminEmail, AdminAddress, Password) VALUES('$name','$email','$address','$password1')";
          $finalresult = mysqli_query($connect, $insert);

          if ($finalresult) {
              echo "<script>window.alert('Successfully')</script>";
              echo "<script>window.location='AdminLogin.php'</script>";
          }if (!$finalresult) {
     
            echo "Error: " . mysqli_error($connect);
        }
      }
  } else {
      //id  Password does not meet conditions
      foreach ($passwordErrors as $error) {
          echo "<script>window.alert('$error')</script>";
          break;
      }
     
  }
}
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>"  />
    <title>Admin Register</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

<style>
  .AdminRegisterForm form .inputbox input[type="email"]{
    font-size: 70%;
  margin-bottom: 12%;
  }
</style>
  </head>
  <body>
    <div class="AdminRegisterForm">
      <h2>Admin Registeration</h2>
      <span class="banner"
        >For <span></span> <span id="g">G</span> <span id="w">W</span>
        <span id="s">S</span> <span id="c">C</span></span
      >
      <form action="Adminreg.php" Method="POST">
        <div class="inputbox">
          <input type="email" name="AdminEmail" required />
          <span><i class="fa-solid fa-envelope"></i>Enter Your Email</span>
        </div>
        <div class="inputbox">
          <input type="text" name="AdminName" value="<?php echo $name; ?>" required />
          <span><i class="fa-solid fa-user"></i>Enter Your Name</span>
        </div>

        <div class="inputbox">
          <input type="text" name="AdminAddress" required />
          <span><i class="fa-solid fa-location-dot"></i></i>Enter Your Address</span>
        </div>
        <div class="inputbox">
          <div class="inputbox">
            <input type="password" name="AdminPassword1" required />
            <span><i class="fa-solid fa-lock"></i>Type New Password</span>
          </div>
        </div>
        <div class="inputbox">
          <div class="inputbox">
            <input type="password" name="AdminPassword2" required />
            <span><i class="fa-solid fa-lock"></i>Type Password Again</span>
          </div>
        </div>
        <input type="submit" value="Register Now" name="AdminRegister" />
      </form>
      <p>Our Privacy Policy? <a href="">Here</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>

      
      $(document).ready(function () {
            $('input[type="text"]').val(''); 
            $('input[type="password"]').val('');
            console.log(2);
        });
    </script>
  </body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="staffreg.php" method="POST">
      <h1>Staff registeration</h1>
      <label for="txtid">Staff Name</label>
      <input type="text" name="txtname" placeholder="Enter Staff FirstName" />
      <br />

      <label for="">Staff Email</label>
      <input type="email" name="txtemail" placeholder="Enter Staff Id" />
      <br />

      <label for="">Staff Phno</label>
      <input type="text" name="txtPhno" placeholder="Enter Staff Phno" />
      <br />
      <label for="">Staff Password</label>
      <input type="text" name="txtPassword" placeholder="Enter Staff Address" />
      <br />
      <label for="">Staff Address</label>
      <input type="text" name="txtAddress" placeholder="Enter Staff Password" />
      <br />

      <button name="btnCusRegister">Register</button>
    </form>
  </body>
</html> -->
