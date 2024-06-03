<?php
session_start();
require '../ajax-crud/connect.php';
$PackageId = $_GET['id'];


$SelectQuery = "SELECT * FROM pitch where PackageID= $PackageId";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );
$rowPackageDetail= mysqli_fetch_array($Run_SelectQuery);

$SelectQuery_PackageType = 'SELECT PackageTypeName FROM packagetype where PackageTypeID = '.$rowPackageDetail['PackageTypeID'];
$Run_SelectQuery_PackageType= mysqli_query($connect,$SelectQuery_PackageType );
$rowPackageType =  mysqli_fetch_array($Run_SelectQuery_PackageType);

$SelectViewCount = "UPDATE pitch SET ViewCount = ViewCount + 1 WHERE PackageID = $PackageId";
$Run_SelectedViewCount= mysqli_query($connect,$SelectViewCount);


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

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />


  </head>
  <body>
    <div class="container-detail">
      <div class="detail-nav">
        <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; › </a>
        <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/Packages.php">   Packages &nbsp;  › </a>
        <a href="">  Packages &nbsp; Details</a>
      </div>
      <h2 class="PackageName"><?php echo $rowPackageDetail['PackageName'] ?></h2>
      <span class="PackageType"><?php echo $rowPackageType['PackageTypeName'] ?></span>
      <div class="detail-image">
        <div class="col span_2_of_3 Left-detail-img">
          <div class="left-detail-img">
            <img src="../Pitch-Img/<?= $rowPackageDetail["PackageImage"] ?>" alt="" />
          </div>
        </div>
        <div class="col span_1_of_3 right-detail-img">
          <div class="right-detail-img">
            <img src="../Pitch-Img/<?= $rowPackageDetail["localImage1"] ?>" alt="" />
            <br />
            <img
              id="sec-detail-img"
              src="../Pitch-Img/<?= $rowPackageDetail["localImage2"] ?>"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="detail-middle-content">
        <div class="col span_2_of_3 LeftSideDetail">
          <div class="detail-features">
            <h3>Features Included</h3>

            <div class="detail-icon">
            <?php 
              $SelectFeaturesIcon = "SELECT f.FeatureIcon FROM features f, pitch p, pitchfeature pf WHERE p.PackageID = pf.PackageID AND f.FeatureID = pf.FeatureID AND p.PackageID = " . $rowPackageDetail['PackageID'];
                $rowFeature= mysqli_query($connect,$SelectFeaturesIcon);
            
                while($rowF = mysqli_fetch_assoc($rowFeature)){
                  ?>
               <i class="<?= $rowF["FeatureIcon"] ?>"></i>


              <?php 
                }
                ?>
         
            </div>

            <div class="features-notes">
              <p>
                <b>Notes:</b>


        <?php 
              $SelectFeaturesName = "SELECT f.FeatureName FROM features f, pitch p, pitchfeature pf WHERE p.PackageID = pf.PackageID AND f.FeatureID = pf.FeatureID AND p.PackageID = " . $rowPackageDetail['PackageID'];
                $rowName= mysqli_query($connect,$SelectFeaturesName);

            
                while($rowN = mysqli_fetch_assoc($rowName)){
                  ?>
              <span class="IconFeatureName"><?= $rowN["FeatureName"]?></span>


              <?php 
                }
                ?>
              </p>
            </div>
          </div>
          <div class="DetailOverView">
            <h2 class="OverViewHeader">
              <i class="fa-solid fa-file"></i>Overview
            </h2>
            <div class="OverViewContent">
              <h3>Description</h3>
              <p class="DesParagraph">
               <?php echo $rowPackageDetail['Description'] ?>
              </p>

              <h3>Highlight</h3>

              <div class="HighlightPoint">
                <p><i class="fa-regular fa-square-check"></i><?php echo $rowPackageDetail['status'] ?></p>
                <p>
                  <i class="fa-regular fa-square-check"></i>$<span><?php echo $rowPackageDetail['PackagePrice'] ?></span>
                  per person
                </p>
              </div>
              
            </div>
          </div>
          <div class="WholedetailLA">
            

          <h2>Local Attractions</h2>
            <?php

for ($i = 1; $i <= 3; $i++) {

            ?>
            
              <div class="col span_1_of_3 detailLA">
                <div class="DetailLAImg" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.3)), url('../Pitch-Img/<?= $rowPackageDetail["localImage".$i] ?>');">
                  <h3><?php echo $rowPackageDetail["LocalName".$i] ?></h3>
              </div>
     

                  </div>
                  <?php
}

                  ?>
         

        </div>
        </div>
      </div>
    
        <div class="col span_1_of_3 RightSideDetail">
          <div class="detail-price">
            <div class="col span_2_of_3 PerPrice">
              <p>Price</p>
              <p id="amount">$ <span><?php echo $rowPackageDetail['PackagePrice'] ?></span> /person</p>
            </div>
            <div class="col span_1_of_3 PackageDuration">
              <p>Days</p>
              <span><?php echo $rowPackageDetail['Duration'] ?></span>
            </div>
            <div class="clear-fix"></div>
            <div class="Middle-DetailPrice">
              <p><i class="fa-solid fa-check"></i>ONLINE SECURED PAYMENT</p>
              <p><i class="fa-solid fa-check"></i>24/7 CUSTOMER SUPPORT</p>
              <p><i class="fa-solid fa-check"></i>FLEXIBILITY</p>
            </div>
            <div class="Lower-DetailPrice">
              <form action="Booking.php" method="POST">
                <div class="col span_1_of_2 LeftForm">
                  <label for="CampDate">Camping Date : </label>

                  <br />
                  <input
                    type="date"
                    name="CampDate"
                    placeholder="Travel Date"
                    required
                  />
                </div>
                <div class="col span_1_of_2 RightForm">
                  <label for="NOP">Numbers OF Person : </label>
                  <select name="NoOfPerson" id="">
                    <option value="1">1 Person</option>
                    <option value="2">2 Persons</option>
                    <option value="3">3 Persons</option>
                    <option value="4">4 Persons</option>
                    <option value="5">5 Persons</option>
                    <option value="6">6 Persons</option>
                    <option value="7">7 Persons</option>
                    <option value="8">8 Persons</option>
                  </select>
                </div>
                <div class="clear-fix"></div>
                <br />
                <input type="hidden" name="pkid" value="<?php echo $rowPackageDetail['PackageID'];?>">
                <input type="submit" value="Book NOW" id="Book" name="BtnBook" />
              </form>
            </div>
          </div>
          <div class="detail-Map">
            <iframe
              src="<?= $rowPackageDetail["location"] ?>"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </div>

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
    On Detail Package Page
  </marquee>
</div>
</footer>
<!-- end footer -->

  </body>
</html>
