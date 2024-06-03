<?php
require '../ajax-crud/connect.php';

$searchName = isset($_POST['SearchName']) ? mysqli_real_escape_string($connect, $_POST['SearchName']) : '';
$FilterCountry = isset($_POST['FilterCountryBox']) ? mysqli_real_escape_string($connect, $_POST['FilterCountryBox']) : '';
$FilterCommon = isset($_POST['FilterCommon']) ? $_POST['FilterCommon'] : '';
$selectedFilters = isset($_POST['selectedFilters']) ? $_POST['selectedFilters'] : [];

$order = $FilterCommon == 'ViewCount' ? 'DESC' : 'ASC';

$whereClause = '';

//Search by specific name 
if (!empty($searchName)) {
    $whereClause = "p.PackageName LIKE '$searchName%'";
}


if (!empty($selectedFilters)) {
    $checkboxFilters = implode(',', $selectedFilters);
    $whereClause .= !empty($whereClause) ? " AND " : "";
    $whereClause .= "p.PackageTypeID IN ($checkboxFilters)";
}


//Filter by Country 
if (!empty($FilterCountry)) {
    $whereClause .= !empty($whereClause) ? " AND " : "";
    $whereClause .= "p.CampsiteID = $FilterCountry";
}

$Select_Query = "SELECT p.* FROM pitch p";
if (!empty($whereClause)) {
    $Select_Query .= " WHERE $whereClause";
}
$Select_Query .= " ORDER BY p.$FilterCommon $order";
$Run_query = mysqli_query($connect, $Select_Query);
$count = mysqli_num_rows($Run_query);


if ($Run_query) {
    if($count>0){

        while($row= mysqli_fetch_array($Run_query)){

      $SelectPackageType= "Select PackageTypeName FROM packageType where PackageTypeID=" .$row ['PackageTypeID'];
      $Run_PackageType= mysqli_query($connect, $SelectPackageType );    
      $rowPackageType= mysqli_fetch_assoc($Run_PackageType);
          
          
           
            ?> 
                <div class="Pitch-cart">
                  <div class="col span_2_of_5 LeftCart">
                  <div class="imageCart">
                      <img src="../Pitch-img/<?= $row["PackageImage"] ?>" alt="" />
                      <iframe
                        src="<?= $row["location"] ?>"
                        width="600"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                      ></iframe>
                    </div>
                  </div>
                  <div class="col span_3_of_5 RightCart">
             
                    <div class="PitchCartHeader">
                    <span class="PkViewCount"><i class="fa-solid fa-eye"></i> <?php echo $row['ViewCount'] ?></span>
                      <h2><?php echo $row['PackageName']; ?></h2>
                         <span><?php echo $rowPackageType["PackageTypeName"] ?></span>
        
                      <p>
                   
                
                    <div class="clearfix"></div>
                      <?php echo $row['Description']; ?>
                      </p>
                    </div>
                    <div class="PitchCartMiddle">
                      <p><b>Status : </b><span><?php echo $row['status']; ?></span></p>
                    </div>
                    <div class="PitchCartLower">
                      <div class="col span_1_of_2 cartPrice">
                        <h5>Price</h5>
                        <p class="Cartprice">$ <span><?php echo $row['PackagePrice']; ?></span>/person</p>
                      </div>
                      <div class="col span_1_of_2 cartDay">
                        <h5>Days</h5>
                        <span><?php echo $row['Duration']; ?></span>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                 
                    <div class="col span_1_of_2 PitchBtn">
                      <a href="detail.php?id=<?= $row['PackageID'] ?>">View Details</a>
        
                    </div>

                    </div>
                  </div>
                </div>
                <?php
        
        }
        
    }else{
        echo "<h2>No Data Found</h2>";
    }

   
}else{
    echo "Query Error: " . mysqli_error($connect);
}
?>
