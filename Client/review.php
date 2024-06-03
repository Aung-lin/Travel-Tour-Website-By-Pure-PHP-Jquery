<?php
require '../ajax-crud/connect.php';




$SelectQuery = "SELECT * FROM reviews where Status=1 ";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );

$SelectStars = "SELECT CAST(AVG(Stars) AS DECIMAL(10, 1)) AS AverageStars FROM reviews where Status=1";
$Run_SelectStars=mysqli_query($connect,$SelectStars);
  $rowStars = mysqli_fetch_assoc($Run_SelectStars);



// if (isset($_POST['btnReview'])) {

//   if(!isset($_SESSION['id'])){
//       echo "<script>window.alert('Please Login First')</script>";
//        echo "<script>window.location='review.php'</script>";
//   }
//   else{
  
//       $Review= $_POST['reviewtxt'];
//       $ReviewStar= (int)$_POST['stars'];
//       $CusID = $Sid;
//       $currentDate = date("Y-m-d");


      
//       $query ="INSERT into reviews(Stars,	CustomerID,	ReviewParagraph,	ReviewDate)
//       Values($ReviewStar,$CusID,'$Review','$currentDate')";
//       $finalRes=  mysqli_query($connect, $query);
//       if($finalRes){
//         echo "<script>window.alert('Successfully')</script>";
//         echo "<script>window.location='review.php'</script>";
      
      
//       }
//         else{
//             echo 'smth wrong';
//       }

//   }


//   }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review Page</title>
  </head>
  <link rel="stylesheet" href="CSS/tempHome.css<?php echo '?'.mt_rand(); ?>" />

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
  include('Navbar.php');
  
  ?>
    <!-- end navigation bar -->

    <div class="clear-fix"></div>

    <!-- start Review Image -->
    <section class="ReviewBgImg">
      <div class="ReviewBackground">
        <div class="FeaturesDetailNav">
          <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Client/CampHome.php">Home &nbsp; <span>› &nbsp;</span> </a>
          <a href=""> Reviews</a>
        </div>
        <div>
          <div class="col span_1_of_2 leftFeatureBg"><h1>Reviews</h1></div>
          <div class="col span_1_of_2 rightFeatureBg">
            <i class="fa-solid fa-star"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- End Review Image -->
    <div class="clear-fix"></div>

    <!-- start Review Content -->

    <section class="FeatureMiddleContent">
    <h1> Reviews From Our Customers</h1>
      <div class="full-review">
        <div class="col span_1_of_3 OverAllReview">
          <div class="ReviewBox">
            <h3>
              Overall Ratings Of <span id="g">G</span> <span id="w">W</span>
              <span id="s">S</span> <span id="c">C</span>
            </h3>
            <div class="ReviewIcon">
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="Ratings">
              <p><span><?php echo $rowStars['AverageStars'] ?></span> Ratings Out Of <span>5</span></p>
            </div>
          </div>
        </div>
        <div class="col span_2_of_3 RightReview">
          <form action="TempReview.php" method="POST">
            <div class="ReviewForm">
              <h3>How was your Feelings On This Website?</h3>
              <div class="startratings">
                <input
                  type="radio"
                  name="stars"
                  value="5"
                  id="rating5"
                  required
                />
                <label for="rating5"></label>

                <input type="radio" name="stars" value="4" id="rating4" />
                <label for="rating4"></label>

                <input type="radio" name="stars" value="3" id="rating3" />
                <label for="rating3"></label>

                <input type="radio" name="stars" value="2" id="rating2" />
                <label for="rating2"></label>

                <input type="radio" name="stars" value="1" id="rating1" />
                <label for="rating1"></label>
              </div>
              <textarea
                name="reviewtxt"
                id=""
                cols="50"
                rows="2"
                placeholder="Give A Honest Review To Us"
              ></textarea>
              <div class="Reviewbtn">
                <button type="submit" name="btnReview">Submit Review</button>
              </div>
            </div>
          </form>

          <div class="clear-fix"></div>
          <div class="CustomersReview">
            <!-- start specific Customer Reviews -->


            <?php
            if($Run_SelectQuery){
  while($row= mysqli_fetch_array($Run_SelectQuery)){
    $SelectCustomerName = "SELECT C.FirstName, C.LastName FROM customers C, reviews R WHERE C.CustomerID = R.CustomerID AND  R.CustomerID= " . $row["CustomerID"] ;
    $CusName= mysqli_query($connect,$SelectCustomerName);
    $rowCusName = mysqli_fetch_assoc($CusName);
    ?>

 
            <div class="specificCustomerReview">
              <div class="col span_2_of_3 leftCusReview">
                <p class="CusName"><span>A</span><?php echo $rowCusName['FirstName']  ?></p>
                <p class="DateCus"><?php echo $row["ReviewDate"] ?></p>
              </div>
              <div class="col span_1_of_3 rightCusReview">
                <div class="cusRating">
                  <span> <?php echo $row["Stars"] ?></span><i class="fa-solid fa-star"></i>
                </div>
              </div>
              <div class="clear-fix"></div>
              <div class="cusDescription">
                <p>
                  <?php echo $row["ReviewParagraph"] ?>
                </p>
              </div>
            </div>

            <?php

}
}else{
echo "No record Found";
};
?>
            <!-- end specific Customer Reviews -->
          </div>
        </div>
      </div>
    </section>
    <!-- end Review Content -->


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
          On Reviews Page
        </marquee>
      </div>
    </footer>
    <!-- end footer -->
  </body>
</html>
