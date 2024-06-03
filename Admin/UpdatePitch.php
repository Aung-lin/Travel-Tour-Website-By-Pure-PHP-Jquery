<?php
require '../ajax-crud/connect.php';


   $Upid=$_GET['upID'];


    $package = "Select * From pitch where PackageID ='$Upid'";
    $query = mysqli_query($connect,$package);

   

    if($query){  
    $row= mysqli_fetch_array($query);
    }
    
    if(isset($_POST["submit"])){
      $Pname = $_POST["name"];
      $id= $_POST["id"];
      $location = $_POST["location"];
      $Duration =$_POST["Duration"];
      $Lname1 = $_POST["LName1"];
      $Lname2= $_POST["LName2"];
      $Lname3 = $_POST["LName3"];
      $Price = $_POST["Price"];
      $Status= $_POST["Status"];
      $Description = $_POST["Descri"];
      $SelectedType = (int)$_POST["types"];
      $SelectedCampsite = (int)$_POST["Campsites"];

      $Query= "UPDATE Pitch SET PackageName = '$Pname', PackagePrice= $Price , Duration = '$Duration' , Description='$Description' , LocalName1='$Lname1' , LocalName2='$Lname2',LocalName3='$Lname3' ,location='$location', status='$Status' , PackageTypeID=$SelectedType , CampsiteID=$SelectedCampsite WHERE PackageID = $id";
      $Query_run= mysqli_query($connect,$Query);


      $OriginalDummyFeatures = "SELECT FeatureID FROM pitchfeature WHERE PackageID = $id";
      $Run_OriginalDummyFeatures = mysqli_query($connect, $OriginalDummyFeatures);
      $OriginalDummyFeatureArr = array();
      
      if ($Run_OriginalDummyFeatures) {
          while ($row = mysqli_fetch_assoc($Run_OriginalDummyFeatures)) {
              $OriginalDummyFeatureArr[] = $row['FeatureID'];
          }
      }
      
      if (isset($_POST["FeatCheckboxes"]) && is_array($_POST["FeatCheckboxes"])) {
          $SelectedCheckedBox = $_POST["FeatCheckboxes"];
          $identicalValues = array_intersect($OriginalDummyFeatureArr, $SelectedCheckedBox);
          $uniqueToArray1 = array_diff($OriginalDummyFeatureArr, $identicalValues);
          $uniqueToArray2 = array_diff($SelectedCheckedBox, $identicalValues);
      
          if (!empty($uniqueToArray1)) {
              foreach ($uniqueToArray1 as $valDel) {
                  $DelQuery_FeatureDummy = "DELETE FROM pitchfeature WHERE PackageID = $id AND FeatureID = $valDel";
                  mysqli_query($connect, $DelQuery_FeatureDummy);
                  echo $valDel;
              }
          } elseif (!empty($uniqueToArray2)) {
              foreach ($uniqueToArray2 as $valUpdate) {
                  // Define $PithchId before using it
                
                  $UpdateQuery_FeatureDummy = "INSERT INTO pitchfeature (FeatureID, PackageID) VALUES ($valUpdate, $id)";
                  echo $valUpdate;
                  mysqli_query($connect, $UpdateQuery_FeatureDummy);
              }
          }
      }
    


      if($Query_run){
         echo "<script>window.alert('Successfully')</script>";
         echo "<script>window.location='dashboard2.php'</script>";
      }else{
         echo "<script>window.alert('Data Not Updated')</script>";
         echo "<script>window.location='UpdatePitch.php?upID=$id'</script>";
      }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>"  />

</head>

<body>
   



 <!-- Start Modal Box for updating data-->


<!-- The Modal -->
<div id="UpdatemodalDialog" class="modal">
  <div class="modal-content animate-top">
    <div class="modal-header">
      <h5 class="modal-title">Update Data To Pitch Table</h5>
      <button type="button" class="close">
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="UpdatePitch.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
          <div class="col span_1_of_2 form-left">
            <label for="name">Name :</label>
            <br>
            <input type="hidden" name="id" value="<?= $row['PackageID'] ?>">
                <input type="text" name="name" required value="<?= $row['PackageName'] ?>" placehodler="PackageName"> 
                <br>        
                <label for="location">Location </label>
                <br>
                <input type="text" name="location" required value="<?= $row['location'] ?>"> 
                <br>               
                <label for="LName1">Local Name 1  </label>
                <br>
                <input type="text" name="LName1" required value="<?= $row['LocalName1'] ?>"> 
                <br>
                <label for="LName2">Local Name 2 : </label>
            <br>
                <input type="text" name="LName2" required value="<?= $row['LocalName2'] ?>"> 
                <br>
                <label for="LName3">Local Name 3 : </label>
                <br>
                <input type="text" name="LName3" required value="<?= $row['LocalName3'] ?>"> 
                <br>               
                <label for="Campsites">Choose a Campsite:</label>
                <br>
                <select name="Campsites" >
                  <?php
                   $SelectCampsites = "SELECT * FROM campsite";
                   $res = mysqli_query($connect,$SelectCampsites);
                    $count = mysqli_num_rows($res);
    
                    print_r($count);
          
                    for($i=0;$i<$count;$i++){
                        $TypeArr = mysqli_fetch_array($res);
                        $Id = $TypeArr["CampsiteID"];
                        $Name = $TypeArr["CampsiteName"];
                        if($row['CampsiteID']){
                          echo "<Option value='$Id' selected>$Name</Option>";
                        }else{
                          echo "<Option value='$Id'>$Name</Option>";
                        }
                        
          
                    }
          
                  ?>
          </select>
          <br>
         
            </div>           
            <div class="col span_1_of_2 form-right">
               
                <label for="Price" >Price : </label>
                <br>
                <input type="number" name="Price" required value="<?= $row['PackagePrice'] ?>"> 
                <br>
                <label for="Descri">Description : </label>
                <br>
                <input type="text" name="Descri" required value="<?= $row['Description'] ?>"> 
                <br>
                <label for="Status">Status : </label>
                <br>
                <input type="text" name="Status" required value="<?= $row['status'] ?>"> 
                <br>
                <label for="Duration">Duration : </label>
                <br>
                <input type="text" name="Duration" required value="<?= $row['Duration'] ?>">
                <br>
                <label for="types">Choose a Type:</label>
          
                <select name="types" >
                  <?php

                   $SelectType = "SELECT * FROM packagetype";
                   $res = mysqli_query($connect, $SelectType);
                    $count = mysqli_num_rows($res);
                 
          
                    for($i=0;$i<$count;$i++){
                        $TypeArr = mysqli_fetch_array($res);
                        $Id = $TypeArr["PackageTypeID"];
                        $Name = $TypeArr["PackageTypeName"];
                        if($row["PackageTypeID"]==$Id){
          
                        echo "<Option value='$Id' selected>$Name</Option>";
                        }else{
                          echo "<Option value='$Id'>$Name</Option>";
                        }
          
                    }
          
                  ?>
          </select>
          <br>
    
                    <label>Select Avaliable Features : </label>
    
                    <br>
                <?php
                  $SelectFeature ="SELECT * FROM features";
                  $resFeature = mysqli_query($connect, $SelectFeature);
                  $count = mysqli_num_rows($resFeature);

                  $SelectFeatureDummy= "SELECT FeatureID FROM pitchfeature WHERE PackageID=" .$row["PackageID"] ;
                  $resFeatureDummy =mysqli_query($connect, $SelectFeatureDummy);
                 

                  $DummyFeatureArr=array();
                  if ($resFeatureDummy) {
                    while ($row = mysqli_fetch_assoc($resFeatureDummy)) {
                      array_push($DummyFeatureArr,$row['FeatureID']);
                     
                    }}

                    
                      for($i=0;$i<$count;$i++){
                  
                        $FeatureArr = mysqli_fetch_array($resFeature);
                        $Id= $FeatureArr["FeatureID"];
                        $Name = $FeatureArr["FeatureName"];

                        if(in_array($Id, $DummyFeatureArr)){
                          echo  "<input type='checkbox' name='FeatCheckboxes[]' value='$Id'  checked ><label>$Name</label> <br>";

                        }else{
                          echo  "<input type='checkbox' name='FeatCheckboxes[]' value='$Id'  ><label>$Name</label> <br>";
                        }
                        
                       
                      }
            
    
                ?>
                    
            </div>
           
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary close">Back</button>
      <button type = "submit" class="btn btn-primary" name ="submit">Update</button>
 
    </div>
    </form>
  </div>
</div>
  <!-- End Modal Box for updating data-->



</body>
</html>

