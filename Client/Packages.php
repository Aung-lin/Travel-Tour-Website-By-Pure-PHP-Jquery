<?php
require '../ajax-crud/connect.php';
$SelectQuery = "SELECT * FROM pitch";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Availability</title>
    
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

    <?php 

  include('Navbar.php');
  
  ?>
    <!-- end navigation bar -->

    <div class="clear-fix"></div>
    <!-- start Feature Image -->
    <section class="PackagesBgImg">
      <div class="PackagesBackground">
        <div class="FeaturesDetailNav">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; <span>› &nbsp;</span> </a>
          <a href="">Availability</a>
        </div>
        <div>
          <div class="col span_1_of_2 leftFeatureBg"><h1>Packages</h1></div>
          <div class="col span_1_of_2 rightFeatureBg">
          <i class="fa-solid fa-globe"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- End Feature Image -->
    <div class="clear-fix"></div>
    <section class="PackageMiddleContent">
      <h1>All Of Current Packages In Our Websites</h1>
      </section>
  
    <div class="Package-Container">
      <div class="col span_1_of_4 left-Filter">
        <div class="filter-head">
          <h3><i class="fa-solid fa-filter"></i>Filter Section</h3>
        </div>
        <div class="filter-filtering">
          <h3>Order By</h3>
          <select name="" id="Commonfilterbox">

          <option value="ViewCount">Most Viewed</option>
            <option value="PackagePrice">Order By Less Price</option>
            <option value="Duration">Order By Shortest Duration</option>
            <option value="PackageName">Alphabetical Order(A-Z)</option>
          </select>
        </div>

        <div class="Pitch-PackageName">
          <h3>Search By PackageName</h3>
          <input type="text" id="SearchPitchName" placeholder="Enter the Package Name" />
        </div>
        <!-- <div class="filter-duration">
          <h3>Duration</h3>
          <input type="number" placeholder="Type Day"/>
        </div> -->

        <div class="PitchesType">
          <h3>Types Of Pitches</h3> 
          <div class="btnPtypes">


   
        <?php
             $SelectPackageType ="SELECT * FROM packagetype";
             $resPackageType = mysqli_query($connect, $SelectPackageType);
             $count = mysqli_num_rows($resPackageType);

             if($count>0)
             while($row=mysqli_fetch_array($resPackageType))
             {
                ?>

 <input type="checkbox" name="<?= $row["PackageTypeName"] ?>" value="<?= $row["PackageTypeID"]?>" class="filter-checkbox"><label for="<?= $row["PackageTypeName"]?>"><?php echo $row["PackageTypeName"] ?> </label>
       <br>
              <?php
             }
            ?>

          </div>
        </div>

        <div class="Pitch-Country">
          <h3>Choose The Country</h3>
          <select name="" id="filterCoutryBox">
          <Option value="">All Campsites</Option>
            <?php

$SelectCampsite = "SELECT * FROM campsite";
$res = mysqli_query($connect, $SelectCampsite);
 $count = mysqli_num_rows($res);

 for($i=0;$i<$count;$i++){
     $TypeArr = mysqli_fetch_array($res);
     $Id = $TypeArr["CampsiteID"];
     $Name = $TypeArr["CountryName"];

     echo "<Option value='$Id'>$Name</Option>";

 }

          ?>
          
          </select>
        </div>

      
      </div>

      <!-- Start Dynamic Package -->

 

      <div class="col span_3_of_4 right-package" id="dynamicPackage">

      </div>
      <!-- eND Dynamic Package -->
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
    On Availability Page
  </marquee>
</div>
</footer>
<!-- end footer -->


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script type="text/javascript">

$(document).ready(function () {
 
            $("#SearchPitchName").keyup(function () {
              search();
            });

            $('#Commonfilterbox').change(function (){
              search();
            })

            $("#filterCoutryBox").change(function () {
              search();
           
            });
          
            $('.filter-checkbox').on('input', function () {
                  search();


            })
            search();

            function search() {
            
              var selectedFilters=get_CheckBox();
                let SearchName = $("#SearchPitchName").val();
                 let FilterCountryBox  = $("#filterCoutryBox").val();
                let FilterCommon = $("#Commonfilterbox").val();
               
                $.ajax({
                    url: "../ajax-crud/PackageAjax.php",
                    method: "POST",
                    data: { SearchName, FilterCountryBox,FilterCommon,selectedFilters:selectedFilters },
                    success: function (data) {
          
                        $("#dynamicPackage").html(data);
                    }
                });
            }
        });
      
        function get_CheckBox(){
        var Filters = [];
   $('.filter-checkbox:checked').each(function () {
 
    Filters.push($(this).val());
           console.log(Filters);
           
        });
        console.log(Filters);
        return Filters; 
      }

   
    </script>
  </body>

</html>
