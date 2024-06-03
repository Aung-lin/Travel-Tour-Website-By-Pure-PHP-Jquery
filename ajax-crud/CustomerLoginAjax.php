<?php
session_start();
require 'connect.php'; 

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$username = $_POST['username'];
$password = $_POST['password'];

if (checkCredentials($connect, $username, $password)) {
    $_SESSION['login_attempts'] = 0;


    $check = "SELECT * FROM customers WHERE CustomerEmail = '$username' AND Password = '$password'";
    $query = mysqli_query($connect, $check);
    $count = mysqli_num_rows($query);

    $array = mysqli_fetch_array($query);
    $cid = $array['CustomerID'];
    $Cname = $array['FirstName'];
    $email = $array['CustomerEmail'];
    $phno = $array["CustomerPhoneNo"];
    $_SESSION['id'] = $cid;
    $_SESSION['name'] = $Cname;
    $_SESSION['Cphno'] = $phno;
    $_SESSION['Cemail'] = $email;


    echo json_encode(['status' => 'success']);
} else {
  
    $_SESSION['login_attempts']++;
    echo json_encode(['status' => 'failure', 'attempts' => $_SESSION['login_attempts']]);


    if ($_SESSION['login_attempts'] >= 3) {
        

        $_SESSION['login_attempts']=0;
      
    }
}

function checkCredentials($connect, $email, $password) {
    $check = "SELECT * FROM customers WHERE CustomerEmail = '$email' AND Password = '$password'";
    $query = mysqli_query($connect, $check);
    $count = mysqli_num_rows($query);
    return $count > 0;
}


?>
