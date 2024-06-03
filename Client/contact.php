


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Page</title>
  </head>
  <link rel="stylesheet" href="../CSS/tempHome.css" />

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
    <section class="ContactBgImg">
      <div class="ContactBackground">
        <div class="FeaturesDetailNav">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; <span>› &nbsp;</span> </a>
          <a href=""> Contact</a>
        </div>
        <div>
          <div class="col span_1_of_2 leftFeatureBg"><h1>Contact</h1></div>
        </div>
      </div>
    </section>
    <!-- End Feature Image -->

    <div class="clear-fix"></div>

    <section class="ContactType">
      <h1>Let's connect to know each other</h1>
      <div class="wholeContact">
        <div class="col span_1_of_2 CartPhone">
          <div class="phone">
            <h3>Phone</h3>
            <div class="Telephone">
              <h5><i class="fa-solid fa-phone"></i> Telephone</h5>
              <p>+ 931530189</p>
            </div>
            <div class="Mobile">
              <h5><i class="fa-solid fa-mobile"></i> Mobile</h5>
              <p>+ 9757241200</p>
            </div>
          </div>
        </div>
        <div class="col span_1_of_2 CartEmail">
          <div class="emailContent">
            <h3>Email Address</h3>
            <div class="Email">
              <h5><i class="fa-solid fa-message"></i> Email</h5>
              <p>azlin1@gmail.com</p>
            </div>
            <div class="CustomerSupport">
              <h5><i class="fa-solid fa-user-tie"></i> CustomerSupport</h5>
              <p>linoscarr724@gmail.com</p>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="clear-fix"></div>

    <!-- start ask question -->
    <section class="QuestionSesion">
      <div class="ContactImg">
        <form action="TempContact.php" method="POST">
          <div class="formcontrol">
            <h1>Ask a question</h1>
            <input type="text" name="txtName" placeholder="Your Name" value="" required />
            <br />
            <input type="text" name="txtSubj" placeholder="Subject" value="" required />
            <br />
            <textarea
              name="txtQuestion"
              cols="57"
              rows="10"
              placeholder="Type a question here"
            ></textarea>
            <br />
            <div class="Privicy"><a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/PrivacyPolicy.php">Our Privicy Policy</a></div>

            <button type="submit" name="btnContact">
              <i class="fa-regular fa-paper-plane"></i>Send Message
            </button>
          </div>
        </form>
      </div>
    </section>

    <!-- end ask question -->
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
          On Contact Page
        </marquee>
      </div>
    </footer>
    <!-- end footer -->
  </body>
</html>
