<?php
require '../ajax-crud/connect.php';


$CampID= $_GET["CampID"];

$SelectQuery = "SELECT * FROM campsite where CampsiteID=$CampID";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );


if($Run_SelectQuery){  
  $row= mysqli_fetch_array($Run_SelectQuery);
  }

if(isset($_POST["CampsiteUpdatesubmit"])){
  $cid= $_POST['id'];
  $CampName= $_POST['CampsiteName'];
  $CountryName= $_POST['CountryName'];

  $Query_CampSite= "Update Campsite SET CampsiteName='$CampName', CountryName='$CountryName' where CampsiteID = $cid";
  $Run_Query_CampSite= mysqli_query($connect,$Query_CampSite);

  if($Run_Query_CampSite){
    echo "<script>window.alert('Successfully')</script>";
    echo "<script>window.location='campsite.php'</script>";
 }else{
    echo "<script>window.alert('Data Not Updated')</script>";
    echo "<script>window.location='UpdateCampsite.php?CampID=$cid'</script>";
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
      <h5 class="modal-title">Update Data To Campsite Table</h5>
      <button type="button" class="close">
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="UpdateCampsite.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
          <div class="col form-left">

          <input type="hidden" name="id" value="<?= $row['CampsiteID'];?>">
            <label for="name">CampsiteName :</label>
            <br>
                <input type="text" name="CampsiteName" required value="<?=  $row['CampsiteName'];?>" placehodler="PackageName"> 
                <br>        
                <label for="location">Country Name</label>
                <br>
                <input type="text" name="CountryName" required value="<?=  $row['CountryName'];?>"> 
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