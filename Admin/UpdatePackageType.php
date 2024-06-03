<?php
require '../ajax-crud/connect.php';


$PackageTypeID= $_GET["PackageTypeID"];
echo $PackageTypeID;

$SelectQuery = "SELECT * FROM packageType where PackageTypeID=$PackageTypeID";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );


if($Run_SelectQuery){  
  $row= mysqli_fetch_array($Run_SelectQuery);
  }

if(isset($_POST["PackageTypUpdatesubmit"])){
 
  $PKid= $_POST['id'];
  $PKName= $_POST['Name'];

  $Query_PackageType= "UPDATE packageType SET PackageTypeName = '$PKName' WHERE PackageTypeID = $PKid  ";
  $Run_Query_PackageType= mysqli_query($connect,$Query_PackageType);

  if($Run_Query_PackageType){
    echo "<script>window.alert('Successfully')</script>";
    echo "<script>window.location='PackageType.php'</script>";
 }else{
    echo "<script>window.alert('Data Not Updated')</script>";
    echo "<script>window.location='UpdatePackageType.php?PackageTypeID=$PKid'</script>";
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
      <h5 class="modal-title">Update Data To PackageType Table</h5>
      <button type="button" class="close">
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="UpdatePackageType.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
          <div class="col form-left">

          <input type="hidden" name="id" value="<?= $row['PackageTypeID'];?>">
            <label for="name">PackageType Name :</label>
            <br>
                <input type="text" name="Name" required value="<?=  $row['PackageTypeName'];?>" placehodler="PackageName"> 
                <br>        
               
                
         
            </div>           

           
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary close">Back</button>
      <button type = "submit" class="btn btn-primary" name ="PackageTypUpdatesubmit">Update</button>
 
    </div>
    </form>
  </div>
</div>
  <!-- End Modal Box for updating data-->


</body>
</html>