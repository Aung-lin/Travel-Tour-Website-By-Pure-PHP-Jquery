<?php
require 'connect.php';

if (!empty($_POST["PackageID"])) {
    $PkId = $_POST["PackageID"];
    $query = "SELECT PackageImage,PackageName, location FROM pitch WHERE PackageID = $PkId";
    $Run_SelectQuery = mysqli_query($connect, $query);
    $count = mysqli_num_rows($Run_SelectQuery);

    // Generate HTML to display images
    if ($count > 0) {
        $rowN = mysqli_fetch_assoc($Run_SelectQuery);
            $imageUrl = $rowN["PackageImage"];
            $PKName = $rowN["PackageName"];
            ?>

            <div class="DynamicMapBox">

            <img src="Image/gwsc_logo.png" alt="" />


            <h3>Location Of <?php echo $PKName ?></h3>
                <p>Click Anywhere to Disappear</p>
          
     
          
          <iframe
            src="<?= $rowN["location"] ?>"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
          </div>
          
<?php
        
    } else {
        echo '<p>No images available for this package</p>';
    }
}
?>
