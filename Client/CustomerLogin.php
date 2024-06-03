<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Customer Login Form</title>
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
    <div class="CustomerloginForm" >
      <div id="countdown"></div>
      <h2  >Customer Login</h2>
      <span class="banner"
        >For <span></span> <span id="g">G</span> <span id="w">W</span>
        <span id="s">S</span> <span id="c">C</span></span
      >
      <form action="CustomerLogin.php" method="POST" id="loginForm">
        <div class="inputbox">
          <input type="gmail" name="txtEmail" id="username" value="" required />
          <span><i class="fa-solid fa-user"></i>User Email</span>
        </div>
        <div class="inputbox">
          <div class="inputbox">
            <input type="password" name="txtpassword" id="password" value="" required />
            <span><i class="fa-solid fa-lock"></i>Password</span>
          </div>
        </div>

  <div class="clear-fix"></div>

        <div class="g-recaptcha" data-sitekey="6LfXZ3soAAAAAP_XwRc8D6_CUtyWxUUUz6FZUC-7"></div>
        <input type="submit" id="CusLogin" value="Login" name="btnlogin" />
      </form>
      <p>Don't You Have an account? <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CustomerRegister.php">Register Now</a></p>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script>

$(document).ready(function() {

    $(document).on('click','#CusLogin',()=>{
      let res =grecaptcha.getResponse();
      if(res.length==0){
        alert("Please Verify You Are not Robot");
        return false;
      }
    });
  })


  $(document).ready(function() {
            var countdownInterval; 

            $("#loginForm").submit(function(e) {
                e.preventDefault();
                var username = $("#username").val();
                var password = $("#password").val();
                $.ajax({
                    type: "POST",
                    url: "../ajax-crud/CustomerLoginAjax.php", 
                    data: {
                        username: username,
                        password: password
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            window.alert("Login successful");
                            window.location.href = 'http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php';
                        } else if (response.status === "failure") {
                          window.alert("Login failed. Attempts remaining: " + (3 - response.attempts));
                            if (response.attempts >= 3) {
                                $("#username, #password, #CusLogin").prop("disabled", true);
                                startCountdown(10*60,000);
                                $("#username").val('');
                                $("#password").val('');
                            }
                        }
                    },
                    error: function() {
                        $("#message").text("Error occurred during login.");
                    }
                });
            });

            function startCountdown(duration) {
                var timer = duration, minutes, seconds;
                countdownInterval = setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    seconds = seconds < 10 ? '0' + seconds : seconds;

                    $("#countdown").text("Time remaining: " + minutes + ":" + seconds);

                    if (--timer < 0) {
                        clearInterval(countdownInterval);
                        $("#username, #password, #CusLogin").prop("disabled", false);
                        $('#countdown').html('');
                        $('#username, #password').val('');
                    }
                }, 1000);
            }
        });




  </script>
</html>


