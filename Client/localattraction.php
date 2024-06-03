<?php
require '../ajax-crud/connect.php';



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Local Attractions Page</title>
  </head>

  <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  <body>
  <!-- start navigation bar -->

  <?php
    include('Navbar.php')

    ?>
    <!-- end navigation bar -->

    <div class="clear-fix"></div>
    <!-- start Feature Image -->
    <section class="LocalABgImg">
      <div class="LocalABackground">
        <div class="FeaturesDetailNav">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; <span>› &nbsp;</span> </a>
          <a href=""> Local Attractions</a>
        </div>
        <div>
          <div class="col span_1_of_2 leftFeatureBg">
            <h1>Local Attractions</h1>
          </div>
          <div class="col span_1_of_2 rightFeatureBg">
          <i class="fa-solid fa-location-dot"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- End Feature Image -->
    <div class="clear-fix"></div>

    <section class="LocalAMiddleContent">
      <h1>Attraction Places Near By</h1>
      <p>Filter By Each Campsite : </p>
      <select name="Campsites" id="FilterCampsite" >
        <?php
         $SelectCampsites = "SELECT * FROM campsite";
         $res = mysqli_query($connect,$SelectCampsites);
          $count = mysqli_num_rows($res);
          echo "<Option value=''>All Campsites</Option>";
          for($i=0;$i<$count;$i++){
              $TypeArr = mysqli_fetch_array($res);
              $Id = $TypeArr["CampsiteID"];
              $Name = $TypeArr["CampsiteName"];

              echo "<Option value='$Id'>$Name</Option>";

          }

        ?>
</select>
<div class="clear-fix"></div>

<!-- Start Location Atrractions Row -->

          <div class="LocalAttractionsCart" id="DyanmicLocalAttractions">

          </div>


<!-- END Location Atrractions Row -->


    </section>


    <div class="clear-fix"></div>
    <!-- start footer -->
    <footer>
      <div class="upperFooter">
        <div class="col span_1_of_2 LogoWeb">
          <img src="../Image/gwsc_logo.png" alt="" />
          <h3>Global Wild Swimming and Camping</h3>
        </div>
        <div class="col span_1_of_2">
          <div class="social-icon">
            <a href="https://www.facebook.com/">
              <i class="fa-brands fa-facebook"></i
            ></a>
            <a href="https://www.instagram.com/?hl=en"
              ><i class="fa-brands fa-instagram"></i
            ></a>
            <a href="https://twitter.com/?lang=en"
              ><i class="fa-brands fa-twitter"></i
            ></a>
            <a href="https://www.youtube.com/"
              ><i class="fa-brands fa-youtube"></i
            ></a>
          </div>
        </div>
      </div>
      <div class="clear-fix"></div>
      <div class="wholeFooter">
        <div class="col span_1_of_5 unitcolumn">
          <ul>
            <li>
              <h5><a href="">Page Links</a></h5>
            </li>
            <li><a href="">Home</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">RSS FEED</a></li>
            <li><a href="">Package</a></li>
            <li><a href="">Reviews</a></li>
            <li><a href=""></a></li>
          </ul>
        </div>
        <div class="col span_1_of_5 unitcolumn">
          <ul>
            <li>
              <h5><a href="">Lastest Information</a></h5>
            </li>
            <li><a href="">Informations</a></li>
            <li><a href="">Features</a></li>
            <li><a href="">Local Attractions</a></li>
            <li><a href="">Customer Information</a></li>
          </ul>
        </div>
        <div class="col span_1_of_5 unitcolumn">
          <ul>
            <li>
              <h5><a href="">Contact Us</a></h5>
            </li>
            <li><a href="">331 Pyay Rd, Yangon , Myanmar</a></li>
            <li>
              <a href=""><span>PhoNo :</span>+ 9757241200</a>
            </li>
            <li>
              <a href=""><span>Email :</span>azlin1@gmail.com</a>
            </li>
            <li>
              <a href="">Myanmar</a>
            </li>
          </ul>
        </div>
        <div class="col span_2_of_5 UniqueColumn">
          <h5>Subscribe To Our Channel</h5>
          <p>For Upcoming Information Along With Our Notifications</p>

          <button>Subscribe</button>
        </div>
      </div>
      <div class="clear-fix"></div>
      <div class="lowerfooter">
        <div class="col span_1_of_2 leftLowerFooter">
          <p>Terms of Service |<a href="">Privacy Policy</a></p>
        </div>
        <div class="col span_1_of_2 rightLowerFooter">
          <p>All Rights Reserved. @2023 GWSC, Inc. DMCA Protected.</p>
        </div>
        <marquee behavior="" direction=""
          ><i class="fa-solid fa-cloud-sun-rain"></i
          ><?php 
        echo 'Temperature: ' . $temperatureCelsius . '°C';?>

          . Total View Count
          <span><?php echo $rowViewCount["SUM(ViewCount)"]?></span> . Currently
          On Local Attractions Page
        </marquee>
      </div>
    </footer>
    <!-- end footer -->


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script >  
  $(document).ready(function () {
    $('#FilterCampsite').change(function (){
              FilterCampsite();
            });

            FilterCampsite();

            function FilterCampsite(){
              let FilterCampsite  = $("#FilterCampsite").val();
              if (FilterCampsite !== '') { 
              $.ajax({
                    url: "../ajax-crud/FilterCampsites.php",
                    method: "POST",
                    data: {FilterCampsite:FilterCampsite },
                    success: function (data) {
          
                        $("#DyanmicLocalAttractions").html(data);
                    }
                });
              }else{

                $.ajax({
                  url: "../ajax-crud/FilterAllLocalAttractions.php",
                  method:"get",
                  success: function(data){
                    $("#DyanmicLocalAttractions").html(data);
                  }

                });
                // $("#DyanmicLocalAttractions").html('<h1>Hello<h1/>');
              }
            }
            
  });
 </script>  
  </body>
</html>
