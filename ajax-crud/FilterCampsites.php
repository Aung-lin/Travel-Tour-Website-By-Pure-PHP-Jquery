<?php
require 'connect.php';
$FilterCampsite = !empty($_POST['FilterCampsite']) ? $_POST['FilterCampsite'] : '';


$Select_Query= "Select * from pitch where CampsiteID = $FilterCampsite" ;
$Run_query = mysqli_query($connect, $Select_Query);
$count = mysqli_num_rows($Run_query);



if ($Run_query && $count>0) {
  while ($row = mysqli_fetch_array($Run_query)) {
    
      for ($i = 1; $i < 4; $i++) {
     
          ?>
          <div class="col span_1_of_4 cartLA"> 
              <div class="CartSpecificLA" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.3)), url('../Pitch-Img/<?= $row["localImage".$i] ?>');">
                  <h3><?php echo $row["LocalName".$i] ?></h3>
              </div>
          </div>
          <?php
      }
  }
}

          ?>