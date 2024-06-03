<?php

require '../ajax-crud/connect.php';






?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link rel="stylesheet" href="../CSS/tempHome.css"  />



    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
    
  </head>

  <body>


  <?php 
  include('Navbar.php');
  
  ?>

    <div class="clear-fix"></div>
    <!-- Start BackgroundImage -->
    <header class="middle-content">
      <div class="BgImg">
        <header>
          <h1>Explore the Great Outdoors with GWSC</h1>
          <p>
            Your Premier Destination for Wild Swimming and Camping Adventures!
            Discover pristine natural beauty and plan your next outdoor escape
            with us today.
          </p>
        </header>
        <ul class="middle-ul">
          <li>
            <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/localattraction.php" id="firstli"
              ><i class="fa-solid fa-location-crosshairs"></i>Local
              Attractions</a
            >
          </li>
          <li>
            <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/review.php"><i class="fa-regular fa-comment"></i>Make a Review</a>
          </li>
          <li>
            <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/Features.php"><i class="fa-solid fa-radio"></i>Features</a>
          </li>
          <li>
            <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/Packages.php" id="lastsli"
              >Book Now<i class="fa-solid fa-arrow-right"></i
            ></a>
          </li>
        </ul>
      </div>
</header>

    <!-- End BackgroundImage -->

    <!-- Start SlideShow -->
    <div class="clear-fix"></div>
    <h2 class="SlideShowContentHeader">
      Welcome from <span id="g">G</span>lobal <span id="w">W</span>ild
      <span id="s">S</span>wimming and <span id="c">C</span>amping
    </h2>
    <section class="SlideShowContent">
      <div class="col span_1_of_2">
        <div class="ImgSlide">

        </div>
      </div>

      <div class="col span_1_of_2 HomeParagraph">
        <p>
          Embark on an Extraordinary Wilderness Journey with GWSC - Your
          Ultimate Destination for Unconventional Camping and Invigorating Wild
          Swimming Adventures! Immerse yourself in the wonders of the natural
          world as you forge an intimate connection with Mother Nature. Whether
          you're craving an adrenaline-packed escapade or yearning for tranquil
          moments, our dedicated team is committed to crafting indelible moments
          that will last a lifetime.
        </p>
      </div>
    </section>
    <!-- End SlideShow -->
    <div class="clear-fix"></div>

    <!-- Start PitchType -->
    <h2 class="pitchesTypesHeader">Types Of Pitches In GWSC</h2>
    <section class="pitchesTypes">
      <div class="col span_1_of_3 pt">
        <img
          src="../Image/PCV459.seasonal_pitches.10_keith_and_alison_rogers_on_one_of_their_pitches_at_keal_lodge_perfect_for_stay_store.jpg"
          alt=""
        />
        <h3>Tent Pitches</h3>
        <p>
          Immerse yourself in nature at GWSC's tent pitches, where you can enjoy
          a rustic camping experience in pristine surroundings.
        </p>
      </div>
      <div class="col span_1_of_3 pt">
        <img src="../Image/tent-01.jpg" alt="" />
        <h3>Caravan Pitches</h3>
        <p>
          GWSC's caravan pitches offer a comfortable and convenient space with
          hookups for caravanners to enjoy the wilderness.
        </p>
      </div>
      <div class="col span_1_of_3 pt">
        <img src="../Image/hard.jpg" alt="" />
        <h3>Motorhome</h3>
        <p>
          GWSC's motorhome pitches provide spacious, well-equipped grounds for
          motorhome enthusiasts, ensuring a stress-free journey.
        </p>
        <p></p>
      </div>
    </section>

    <!-- END PitchType -->

    <div class="clear-fix"></div>
    <!-- Start Location -->
    <h2 class="LocationHeader">Locate Our Company In map</h2>
    <section class="CompnayLocation">
      <div class="CompanyMap">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.824747014888!2d96.12844617533848!3d16.785392584002686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb0d56d795d9%3A0x2a4ee546e89e5b98!2sAhlone%20Post%20Office!5e0!3m2!1sen!2smm!4v1695500387502!5m2!1sen!2smm"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    <!--End  location -->
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
          On Home Page
        </marquee>
      </div>
    </footer>
    <!-- end footer -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>

function myFunction() {
        var x = document.getElementById("myLinks");
        if (x.style.display === "block") {
          x.style.display = "none";
        } else {
          x.style.display = "block";
        }
      }


      $(document).ready(function () {
        let images = [
          "Image/1575967321Celtic Camping & Bunkhouse Accommodation 2 (Custom).jpg",
          "Image/wild-swimming-campsites.jpg",
          "Image/camping-ideas-1561136670.jpg",
        ]; // List of image URLs
        let currentImageIndex = 0;

        function showNextImage() {
          let imageUrl = "url('../" + images[currentImageIndex] + "')";

          let gradientColor1 = "rgba(0, 0, 0, 0.8)";
          let gradientColor2 = "rgba(0, 0, 0, 0.3)";
          let gradient =
            "linear-gradient(" +
            gradientColor1 +
            "," +
            gradientColor2 +
            "), " +
            imageUrl;

          $(".ImgSlide").css("background-image", gradient);
          currentImageIndex = (currentImageIndex + 1) % images.length;
        }

        showNextImage();

        setInterval(showNextImage, 2000);



      });







      // start Customer Profile
    </script>
  </body>
</html>
