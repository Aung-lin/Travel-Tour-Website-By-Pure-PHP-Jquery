<?php
session_start();
require '../ajax-crud/connect.php';

//Start Weather 
$WeatherApiKey = '8f1f5cafa3791d8390a2ea141fbff22b';
$UtubeApiKey="AIzaSyDsp7HoD3aOJf1ZPDL0_2ahiOlBT251idQ";
// $lat ='16.866070';
// $lon='96.195129';
$city_name='Yangon';
$googleUrl = 'https://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid=' . $WeatherApiKey;


$response = file_get_contents($googleUrl);

$data = json_decode($response, true);

$temperatureCelsius = $data['main']['temp'] - 273.15; // Convert from Kelvin to Celsius

// echo 'Temperature: ' . $temperatureCelsius . '°C';
$WeatherImg= "<img src='https://openweathermap.org/img/wn/04d@2x.png' >"; //View


//end Weather api

// Start View Count
$SelectQuery = "SELECT SUM(ViewCount) FROM pitch"; 
$Run_SelectQueryForViewCount=mysqli_query($connect,$SelectQuery); 
$rowViewCount =mysqli_fetch_assoc($Run_SelectQueryForViewCount);


if(isset($_SESSION['id'])){
  $PackageId = $_SESSION['id'];
}

$log = isset($_SESSION['id']) ? "Log Out": "Login";

if (isset($_POST['Btnlog'])) {
  
  session_destroy();
  echo "<script>
  window.location='CustomerLogin.php'
  </script>";
}  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>"  />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>

  <!-- The Customer Profile Modal -->
<div id="loginModal" class="Loginmodal">
  <div class="modal-content animate-top">
    <div class="modal-header">
      <h5 class="modal-title"><i class="fa-solid fa-user"></i>Customer Profile</h5>
      <button type="button" class="close">
        <span aria-hidden="true">x</span>
      </button>
    </div>
    <div class="Login-body">
        <form action="CampHome.php" method="POST" >
        <?php 

        if(isset($_SESSION['id'])){
        $name=  $_SESSION['name'];
        $CusPhNo=$_SESSION['Cphno'];
        $CusEmail=$_SESSION['Cemail'];
      
  ?>
            <div class="Profile-Account">
              

             <label for="CusName">Your Name :</label>  <input type="text" value="<?= $name ?>" disabled>
             <br>
             <label for="CusEmail">Your Email :</label> <input type="text" value="<?= $CusEmail ?>" disabled>
             <br>
             <label for="CusEmail">Your PhNo :</label> <input type="text" value="<?= $CusPhNo?>" disabled>
             <br>
            
            </div>
            <?php
      }

      else{
    
        ?>
          <div class="Profile-Account">
            <h3>Dear Customer,you are not still Login. </h3>
            <p>Now Let's Login</p>
            </div>
        <?php
      }
      ?>
        
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary close">Close</button>
      <button type = "submit" class="btn btn-primary-Cus" name ="Btnlog"><?php echo $log; ?></button>
 
    </div>
    </form>
  </div>
</div>
  <!-- End Modal Box for Customer Profile data-->
    <section class="top-nav">
      <div class="span_1_of_3 left-nav">
        <img src="../Image/gwsc_logo.png" alt="No Image fOUND" />
      </div>
      <input id="menu-toggle" type="checkbox" />

      <ul class="menu">
        <li id="first-li">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/Packages.php">Availability</a>
        </li>
        <li><a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/contact.php">Contact</a></li>
        <li><a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/Infomation.php">Info</a></li>
      </ul>

      <!-- Start search bar  -->
      <div class="span_1_of_3 flex-box">
        <div class="SearchBar">
          <input
            type="text"
            id="LiveSearchBar"
            value=""
            placeholder="Search What You Want"
          />
          <ul>
            <li class="fas fa-search"></li>
          </ul>
        </div>
        <div class="SearchResult" id="ResultSearch">
           
           </div>
           
      </div>
      <!-- End search bar -->
      <div class="span_1_of_8 overall-btn">
        <button id="btn-bell"><i class="fa-solid fa-rss"></i></button>
        <button id="login"><i class="fa-solid fa-user-large"></i></button>
      </div>
      <label class="menu-button-container" for="menu-toggle">
        <div class="menu-button"></div>
      </label>
    </section>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
      //Live Search Bar
      $(document).ready(() => {
        $("#LiveSearchBar").keyup(function () {
          LivesearchBar();
        });

        LivesearchBar();

        function LivesearchBar() {
          let SearchName = $("#LiveSearchBar").val().trim();
          if (SearchName !== "") {
            $.ajax({
              url: "../ajax-crud/LiveSearchBar.php",
              method: "POST",
              data: { SearchName: SearchName },
              success: function (data) {
                $("#ResultSearch").html(data);
              },
            });
          } else {
            $("#ResultSearch").html("");
          }
        }
      });

//Rssfeed
let RssIcon = $('#btn-bell');
$(document).ready(function () {
  RssIcon.on("click", function () {
    window.location.href = 'http://localhost/L5%20ASSIGNMENT%20PJ/Client/rssfeed.php';
        });
      });

      // start Customer Profile
      let modal = $("#modalDialog");

      let btn = $("#mbtn");
      let btnUpdate = $("#login");
      let Loginmodal = $("#loginModal");

      let span = $(".close");

      $(document).ready(function () {
        btn.on("click", function () {
          modal.show();
        });

        btnUpdate.on("click", () => {
          Loginmodal.show();
        });

        span.on("click", function () {
          modal.fadeOut();
          Loginmodal.fadeOut();
        });
      });

      $("body").bind("click", function (e) {
        if ($(e.target).hasClass("Loginmodal")) {
          modal.fadeOut();
          Loginmodal.fadeOut();
        }
      });
    </script>
  </body>
</html>
