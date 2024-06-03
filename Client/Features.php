<?php
require '../ajax-crud/connect.php';
$SelectQuery = "SELECT * FROM pitch";
$Run_SelectQueryForFeatures= mysqli_query($connect,$SelectQuery);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feature Page</title>
    <link rel="stylesheet" href="../CSS/grid.css<?php echo '?'.mt_rand(); ?>" media="all" />
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
    <!-- start navigation bar -->

    <!-- start navigation bar -->

    <?php
    include('Navbar.php')

    ?>
    <!-- end navigation bar -->
    <!-- end navigation bar -->

    <div class="clear-fix"></div>
    <!-- start Feature Image -->
    <section class="FeatureBgImg">
      <div class="FeatureBackground">
        <div class="FeaturesDetailNav">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; <span>› &nbsp;</span> </a>
          <a href=""> Features</a>
        </div>
        <div>
          <div class="col span_1_of_2 leftFeatureBg"><h1>Features</h1></div>
          <div class="col span_1_of_2 rightFeatureBg">
            <i class="fa-solid fa-radio"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- End Feature Image -->
    <div class="clear-fix"></div>

    <!-- start Feature Carts -->
    <section class="FeatureMiddleContent">
      <h1>Facilities From Each Pitch</h1>

      <div class="FeatureCarts">
        <?php

if($Run_SelectQueryForFeatures){
  while($row= mysqli_fetch_array($Run_SelectQueryForFeatures)){
    ?>
        <div class="col span_1_of_3 cart-feature">
          <div
            class="CartFeatureBgimg"
            style="
              background-image: linear-gradient(
                  rgba(0, 0, 0, 0.2),
                  rgba(0, 0, 0, 0.3)
                ),
                url('../Pitch-img/<?= $row["PackageImage"] ?>');
            "
          >
            <div class="InfoHeader">
              <h3><?php echo $row["PackageName"] ?> <span><?php echo $row["Duration"] ?> Days</span></h3>
              <span class="Infostatus"><?php echo $row["status"] ?></span>
            </div>
          </div>
          <div class="CartFeatureBody">
            <div class="Featuresicon">
              <h4>Features Included :</h4>

              <div class="InfoFeatureIcon">
              <?php 
              $SelectFeaturesIcon = "SELECT f.FeatureIcon FROM features f, pitch p, pitchfeature pf WHERE p.PackageID = pf.PackageID AND f.FeatureID = pf.FeatureID AND p.PackageID = " . $row['PackageID'];
                $rowFeature= mysqli_query($connect,$SelectFeaturesIcon);

            
                while($rowF = mysqli_fetch_assoc($rowFeature)){
                  ?>
               <i class="<?= $rowF["FeatureIcon"] ?>"></i>


              <?php 
                }
                ?>
              </div>

              <div class="FeatureNotes">
                <p>
                  <b>Notes:</b>

                  <?php 
              $SelectFeaturesName = "SELECT f.FeatureName FROM features f, pitch p, pitchfeature pf WHERE p.PackageID = pf.PackageID AND f.FeatureID = pf.FeatureID AND p.PackageID = " . $row['PackageID'];
                $rowName= mysqli_query($connect,$SelectFeaturesName);

            
                while($rowN = mysqli_fetch_assoc($rowName)){
                  ?>
              <span class="IconFeatureName"><?= $rowN["FeatureName"]?></span>,
       

              <?php 
                }
                ?>

              
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php
      }}
    
          ?>
      </div>
    </section>
    <!-- end Feature Carts -->

    <div class="clear-fix"></div>
    <!-- Start Facilities and Amenities -->
    <section class="FacilitiesAndAmen">
      <div class="">
        
        
          <div class="FeatureBtnGroup">
          <button onclick="ShowFeature ()">Facilities</button>
        <button onclick="ShowAmenities()">Amenities</button>
        <button onclick="ShowWearable()">Wearable Technology</button>
    </div>
   
       
        
        
      
        <div class="FormFeatures" id="smth">


        <div class="SpecificCategory">
                <h1>Feautred Facilites</h1>
                <p>There all of features from every sites</p>
              </div>
          <?php

           $SelectFacilites=  "SELECT FeatureIcon, FeatureName from features WHERE FeatureType='Facilities'";
            $Run_SelectFacilites= mysqli_query($connect,$SelectFacilites);
            if($Run_SelectFacilites){
              ?>
                 <div class="WholeCategory">;
                  <?php
              while($row= mysqli_fetch_array($Run_SelectFacilites)){
                ?>
             
             <div class="col span_1_of_5 unitFAW">
              <i class="<?= $row["FeatureIcon"]?>"></i>
             <p><?php echo $row["FeatureName"]?></p>
             </div>
          
                  
                 
                <?php
              }
            ?>
            </div>
            <?php
            }else{
                ?>
                <h2>There's no facilites here</h2>

<?php
              }

          ?>
   
        </div>

        <div class="FormFeatures" id="smth1">
        <div class="SpecificCategory">
                <h1>Feautred Amenities</h1>
                <p>There all of Amenities from every sites</p>
              </div>

        <?php

$SelectAmenities=  "SELECT FeatureIcon, FeatureName from features WHERE FeatureType='Amenities'";
 $Run_SelectAmenities= mysqli_query($connect,$SelectAmenities);
 if( $Run_SelectAmenities){
  

  ?>
      <div class="WholeCategory">
                  <?php
   while($row= mysqli_fetch_array( $Run_SelectAmenities)){
     ?>
              
              <div class="col span_1_of_5 unitFAW">
              <i class="<?= $row["FeatureIcon"]?>"></i>
             <p><?php echo $row["FeatureName"]?></p>
             </div>
          
        
     
     <?php
   }
   ?>
   </div>
   <?php
  }else{
     ?>
     <h2>There's no facilites here</h2>

<?php
   }

?>
        </div>
        <div class="FormFeatures" id="wearable">
        <div class="SpecificCategory">
                <h1>Feautred Wearabes Technology</h1>
                <p>There all of wearables from every sites</p>
              </div>
              

              <div class="WholeCategory">
              
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-vr-cardboard"></i>
                    <p>Virtual Headsets</p>
                  </div>
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-headphones"></i>
                    <p>HeadPhones</p>
                  </div>
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-glasses"></i>
                    <p>Smart Glasses</p>
                  </div>
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-walkie-talkie"></i>
                    <p>Walkie Talkie</p>
                  </div>
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-pen"></i>
                    <p>Smart Pen</p>
                  </div>
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-mug-hot"></i>
                    <p>Smart Cup</p>
                  </div>
                  <div class="col span_1_of_5 unitFAW">
                  <i class="fa-solid fa-shirt"></i>
                    <p>Smart Clothing</p>
                  </div>


            
                 

              </div>
                
   
       

      </div>
    </section>
    <!-- End Facilities and Amenities -->

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
          On Feature Page
        </marquee>
      </div>
    </footer>
    <!-- end footer -->

    
  </body>
  <script>
    let divFormFeatures = document.getElementById("smth");
    let divFormAmenities = document.getElementById("smth1");
    let divFormWearable = document.getElementById("wearable");
    divFormWearable.style.display="none";
    divFormAmenities .style.display="none";
    const ShowFeature = () => {
      divFormFeatures.style.display = "block";
      divFormAmenities.style.display = "none";
      divFormWearable.style.display="none";
      
    };
    const ShowAmenities = () => {
      divFormFeatures.style.display = "none";
      divFormAmenities.style.display = "block";
      divFormWearable.style.display="none";
    };

    const ShowWearable=()=>{
      divFormFeatures.style.display = "none";
      divFormAmenities.style.display = "none";
      divFormWearable.style.display="block";
    }
  </script>
</html>
