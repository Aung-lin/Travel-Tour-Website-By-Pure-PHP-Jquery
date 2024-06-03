 <?php
require '../ajax-crud/connect.php';

// $SelectQuery1 = "SELECT * FROM pitch where PackagePrice=2343";
// $Run_SelectQuery= mysqli_query($connect,$SelectQuery1 );

// $SelectQuery2 = "SELECT * FROM pitch where PackagePrice=2323";
// $Run_SelectQuery2= mysqli_query($connect,$SelectQuery2 );

// $SelectQuery4 = "SELECT location FROM pitch where PackageTypeID = $location";
// $Run_SelectQueryMotorhome= mysqli_query($connect,$SelectQuery4 );
// $rowN = mysqli_fetch_assoc($Run_SelectQueryMotorhome);


$SelectQuery1 = "SELECT * FROM pitch where PackageTypeID = 10";
$Run_SelectQueryCaravan= mysqli_query($connect,$SelectQuery1);

$SelectQuery2 = "SELECT * FROM pitch where PackageTypeID = 12";
$Run_SelectQueryTent= mysqli_query($connect,$SelectQuery2 );

$SelectQuery3 = "SELECT * FROM pitch where PackageTypeID = 11";
$Run_SelectQueryMotorhome= mysqli_query($connect,$SelectQuery3 );

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Information Page</title>


    <link rel="stylesheet" href="CSS/tempHome.css<?php echo '?'.mt_rand(); ?>" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
    <!-- Start Modal Box -->
    <div
    id="contentDiv"
    class="modalInfo" >

      <div  class="modal-content animate-top">
        <div class="modal-body"  >
      
        
         <div   id="IframeID"></div>
          
        </div>
      </div>
    </div>
    <!-- End Modal Box -->
    <div class="clear-fix"></div>

<?php
    include('Navbar.php')

    ?>
    <div class="clear-fix"></div>
    <!-- start Feature Image -->
    <section class="InfoBgImg">
      <div class="InfoBackground">
        <div class="FeaturesDetailNav">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; <span>› &nbsp;</span> </a>
          <a href=""> Info</a>
        </div>
        <div>
          <div class="col span_1_of_2 leftFeatureBg"><h1>Information</h1></div>
          <div class="col span_1_of_2 rightFeatureBg">
            <i class="fa-regular fa-newspaper"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- End Feature Image -->
    <div class="clear-fix"></div>

    <!-- Start Information Of Caravan Pitch -->
    <section class="SpecificInfoPitch">
      <h1>Caravan Pitch</h1>
      <div class="InforCartSection">

      <?php

if($Run_SelectQueryCaravan){
  while($row= mysqli_fetch_array($Run_SelectQueryCaravan)){

    ?>
    <div class="col span_1_of_3 info-feature">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/detail.php?id=<?= $row["PackageID"] ?>" class="InfoLink">
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
                <h3><?php echo $row["PackageName"] ?> – <span><?php echo $row["Duration"] ?> Days</span></h3>
                <span class="Infostatus"><?php echo $row["status"] ?></span>
              </div>
              <div class="InfoMap">
              <i
    class="fa-solid fa-map-location-dot toggleDiv"
    data-status="<?=  $row["PackageID"]?>"
></i>

              </div>
            </div>
          </a>

          <div class="CartInformationBody">
            <div class="Informationicon">
              <div class="col span_1_of_3"><h4>Features Included</h4></div>

              <div class="col span_2_of_3 InfoFeatureIcon">

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
            </div>
            <div class="clear-fix"></div>
            <div class="InfoBottom">
              <div class="left-bottom">
                <span>Local Attractions</span>
                <p><?php echo $row["LocalName1"] ?>, <?php echo $row["LocalName2"] ?>, <?php echo $row["LocalName3"] ?></p>
              </div>
            </div>
          </div>
        </div>

<?php
  }}

      ?>
      
      </div>
    </section>
    <!-- END Information Of Caravan Pitch -->

    <div class="clear-fix"></div>

    <!-- Start Information Of Mortorhome Pitch -->
    <section class="SpecificInfoPitch">
      <h1> Motorhome Pitch</h1>
      <div class="InforCartSection">
        
      <?php

if($Run_SelectQueryMotorhome){
  while($row= mysqli_fetch_array($Run_SelectQueryMotorhome)){
    ?>
    <div class="col span_1_of_3 info-feature">
    <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/detail.php?id=<?= $row["PackageID"] ?>" class="InfoLink">
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
                <h3><?php echo $row["PackageName"] ?> – <span><?php echo $row["Duration"] ?> Days</span></h3>
                <span class="Infostatus"><?php echo $row["status"] ?></span>
              </div>
              <div class="InfoMap">
                <i
                  class="fa-solid fa-map-location-dot toggleDiv"
               
                  data-status="<?= $row['PackageID']?>"
           
                ></i>
              </div>
            </div>
          </a>

          <div class="CartInformationBody">
            <div class="Informationicon">
              <div class="col span_1_of_3"><h4>Features Included</h4></div>

              <div class="col span_2_of_3 InfoFeatureIcon">

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
            </div>
            <div class="clear-fix"></div>
            <div class="InfoBottom">
              <div class="left-bottom">
                <span>Local Attractions</span>
                <p><?php echo $row["LocalName1"] ?>, <?php echo $row["LocalName2"] ?>, <?php echo $row["LocalName3"] ?></p>
              </div>
            </div>
          </div>
        </div>

<?php
  }}

      ?>
      
     
      </div>
    </section>
    <!-- END Information Of Mortohome Pitch -->

    <div class="clear-fix"></div>

    <!-- Start Information Of Tent Pitch -->
    <section class="SpecificInfoPitch">
      <h1>Tent Pitch</h1>
      <div class="InforCartSection">
      <?php

if($Run_SelectQueryTent){
  while($row= mysqli_fetch_array($Run_SelectQueryTent)){
    ?>
    <div class="col span_1_of_3 info-feature">
    <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/detail.php?id=<?= $row["PackageID"] ?>" class="InfoLink">
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
                <h3><?php echo $row["PackageName"] ?> – <span><?php echo $row["Duration"] ?> Days</span></h3>
                <span class="Infostatus"><?php echo $row["status"] ?></span>
              </div>
              <div class="InfoMap">
              <i
            class="fa-solid fa-map-location-dot toggleDiv"
            data-status="<?=  $row["PackageID"]?>"
 >  
  </i>


              </div>
            </div>
          </a>

          <div class="CartInformationBody">
            <div class="Informationicon">
              <div class="col span_1_of_3"><h4>Features Included</h4></div>

              <div class="col span_2_of_3 InfoFeatureIcon">

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
            </div>
            <div class="clear-fix"></div>
            <div class="InfoBottom">
              <div class="left-bottom">
                <span>Local Attractions</span>
                <p><?php echo $row["LocalName1"] ?>, <?php echo $row["LocalName2"] ?>, <?php echo $row["LocalName3"] ?></p>
              </div>
            </div>
          </div>
        </div>

<?php
  }}

      ?>
    </section>
    <!-- END Information Of Tent Pitch -->
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
          On Information Page
        </marquee>
      </div>
    </footer>
    <!-- end footer -->

    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
 

      var contentDiv = document.getElementById("contentDiv");


      $(document).ready(function () {
        $('.toggleDiv').mouseover(function () {
          contentDiv.style.display = "block";
    var val = $(this).data('status'); // Assuming you store the status as a data attribute

    console.log(val);

    if (val) {
        $.ajax({
            type: 'POST',
            url: '../ajax-crud/Infoajax.php',
            data: 'PackageID=' + val,
            success: function (html) {
                $('#IframeID').html(html);
            },
            error: function () {
                // Handle the error here, e.g., display an error message.
                $('#contentDiv').html('<p>Error loading content</p>');
            }
        });
    } else {
        $('#contentDiv').html('<p value="">Nth here</p>');
    }
});

$('body').click(function () {

    contentDiv.style.display = "none";
  
   
    });

});


</script>
  </body>
</html>
