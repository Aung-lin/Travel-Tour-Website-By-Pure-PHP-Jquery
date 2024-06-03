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

if (isset($_POST['Customerlogin'])) {
   
    $CustomerEmail = $_POST['CEmail'];
    $CustomerName = $_POST['CName'];
    $CustomerName1 = $_POST['CName1'];
    $CustomerAddress = $_POST['CAddress'];
    $Customerpassword = $_POST['CPassword'];
    $CustomerReTypePassword = $_POST['CRenewPassword'];
    $CustomerPhone = $_POST["CPhone"];

    $passwordErrors = isStrongPassword( $Customerpassword,$CustomerReTypePassword);

    if (empty($passwordErrors)) {
      $checkemail = "SELECT * FROM customers WHERE CustomerEmail ='$CustomerEmail'";
      $res = mysqli_query($connect, $checkemail);
      $count = mysqli_num_rows($res);
  
      if ($count > 0) {
          echo "<script>window.alert('Email already exists!')</script>";
          echo "<script>window.location='CustomerRegister.php'</script>";
      } else {
  
          // $hashedPassword = password_hash($Customerpassword, PASSWORD_DEFAULT);
  
          $insert = "INSERT INTO customers(FirstName, CustomerEmail, CustomerPhoneNo, CustomerAddress, Password, LastName) VALUES ('$CustomerName', '$CustomerEmail', '$CustomerPhone', '$CustomerAddress', '$Customerpassword','$CustomerName1')";
  
          $finalresult = mysqli_query($connect, $insert);
  
          if ($finalresult) {
              echo "<script>window.alert('Successfully')</script>";
              echo "<script>window.location='CustomerLogin.php'</script>";
          
          } else {
            echo "Error: " . mysqli_error($connect);
          }
      }
    }else {
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
    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>" />
    <title>Input Field Animation</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

  </head>
  <body>
    <div class="CustomerRegisterForm">
      <h2>Customer Registeration</h2>
      <span class="banner"
        >For <span></span> <span id="g">G</span> <span id="w">W</span>
        <span id="s">S</span> <span id="c">C</span></span
      >
      <form id="CusRegForm" action="CustomerRegister.php" method="POST">
        <div class="inputbox">
          <input type="text" name="CEmail" required />
          <span><i class="fa-solid fa-envelope"></i>Enter Your Email</span>
        </div>
        <div class="inputbox">
          <input type="text" name="CName" required />
          <span><i class="fa-solid fa-user"></i>Enter Your First Name</span>
        </div>
        <div class="inputbox">
          <input type="text" name="CName1" required />
          <span><i class="fa-solid fa-user"></i>Enter Your LastName</span>
        </div>

        <div class="inputbox">
          <input type="text" name="CAddress" required />
          <span><i class="fa-solid fa-location-dot"></i></i>Enter Your Address</span>
        </div>
        <div class="inputbox">
          <input type="text" name="CPhone" required />
          <span><i class="fa-solid fa-location-dot"></i></i>Enter Your Phone No</span>
        </div>
        <div class="inputbox">
          <div class="inputbox">
            <input type="password" name="CPassword" required />
            <span><i class="fa-solid fa-lock"></i>Type New Password</span>
          </div>
        </div>
        <div class="inputbox">
          <div class="inputbox">
            <input type="password" name="CRenewPassword" required />
            <span><i class="fa-solid fa-lock"></i>Type Password Again</span>
          </div>
        </div>
        <input type="submit" value="Register Now" name="Customerlogin" />
      
      </form>
      <p>Our Privacy Policy? <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/PrivacyPolicy.php">Here</a></p>
    </div>

  </body>
</html>
