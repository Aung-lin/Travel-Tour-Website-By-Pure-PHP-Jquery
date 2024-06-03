<?php
require '../ajax-crud/connect.php';


$FeatureID= $_GET["FID"];
echo $FeatureID;

$SelectQuery = "SELECT * FROM features where FeatureID=$FeatureID";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );


if($Run_SelectQuery){  
  $row= mysqli_fetch_array($Run_SelectQuery);
  }

if(isset($_POST["CampsiteUpdatesubmit"])){
  $fid= $_POST['id'];

  $FName= $_POST['Name'];
  $Ficon= $_POST['Icon'];
  $Ftype= $_POST['Ftype'];
  $Query_CampSite= "UPDATE features SET FeatureName='$FName', FeatureIcon='$Ficon', FeatureType='$Ftype' where FeatureID = $fid";
  $Run_Query_CampSite= mysqli_query($connect,$Query_CampSite);

  if($Run_Query_CampSite){
    echo "<script>window.alert('Successfully')</script>";
    echo "<script>window.location='Adminfeatures.php'</script>";
 }else{
    echo "<script>window.alert('Data Not Updated')</script>";
    echo "<script>window.location='UpdateAdminFeature.php?FID=$fid'</script>";
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
      <h5 class="modal-title">Update Data To Feautre Table</h5>
      <button type="button" class="close">
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="UpdateAdminFeature.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
          <div class="col form-left">

          <input type="hidden" name="id" value="<?= $row['FeatureID'];?>">
            <label for="name">Feature Name :</label>
            <br>
                <input type="text" name="Name" required value="<?=  $row['FeatureName'];?>" placehodler="PackageName"> 
                <br>        
                <label for="location">Feature Icon</label>
                <br>
                <input type="text" name="Icon" required value="<?=  $row['FeatureIcon'];?>"> 
                <br>     
                <label for="location">Feature Type</label>
                <br>
                <input type="text" name="Ftype" required value="<?=  $row['FeatureType'];?>"> 
                <br>               
                
                
         
            </div>           

           
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary close">Back</button>
      <button type = "submit" class="btn btn-primary" name ="CampsiteUpdatesubmit">Update</button>
 
    </div>
    </form>
  </div>
</div>
  <!-- End Modal Box for updating data-->


</body>
</html>