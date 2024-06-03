<?php
require '../ajax-crud/connect.php';

$SelectQuery = "SELECT * FROM pitch";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );


$SelectSpecificId= "SELECT * FROM pitch ORDER BY 	PackageID DESC LIMIT 1";
$Run_SelectSpecificId= mysqli_query($connect,$SelectSpecificId );

if(isset($_POST["submit"])){
  $lastRow = mysqli_fetch_assoc($Run_SelectSpecificId);
  $count = $lastRow["PackageID"];
  $PithchId= $count+1;
  $name = $_POST["name"];
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


  
  
  
//Alert box for not uploading images
  if($_FILES["Img1"]["error"] == 4 || $_FILES["Img2"]["error"] == 4 || $_FILES["Img3"]["error"] == 4 ||  $_FILES["Img4"]["error"] == 4  ){
    echo
    "<script> alert('All images has to be uploaded'); </script>"
    ;
  }
  else{

    echo gettype( $SelectedCampsite);
   
          echo gettype( $PithchId);
          print_r($PithchId);
  //Willdelete Testing
  $validImageFormat = ['jpg', 'jpeg', 'png'];
  $maxFileSize = 1000000; // 1 MB in bytes
  
    $ImgArray=[];

  for ($i = 1; $i <= 4; $i++) {
      $nameKey = "Img" . $i;
      $sizeKey = "Img" . $i;
      $tmpNameKey = "Img" . $i;
  
      $Namefile = $_FILES[$nameKey]["name"];
      $fileSize = $_FILES[$sizeKey]["size"];
      $tmpName = $_FILES[$tmpNameKey]["tmp_name"];
  
      $imageExtension = explode('.', $Namefile);
      $imageExtension = strtolower(end($imageExtension));
  
      if (!in_array($imageExtension, $validImageFormat)) {
          echo "<script>alert('Invalid Image Format for $Namefile');</script>";
      } elseif ($fileSize > $maxFileSize) {
          echo "<script>alert('Image Size Is Too Large for $Namefile');</script>";
      } else {
          // Generate a unique ID for the new image name
          $newImageName = uniqid() . '.' . $imageExtension;


          // Move the uploaded file to a new location
          move_uploaded_file($tmpName, '../Pitch-Img/' . $newImageName);
          array_push($ImgArray, $newImageName);
      }
  }
        $query ="INSERT into pitch(PackageID,PackageName,PackagePrice,Duration,Description,PackageImage,localImage1,localImage2,localImage3,LocalName1,LocalName2,LocalName3,location,status,PackageTypeID,CampsiteID) 
       
        Values($PithchId,'$name',$Price,'$Duration','$Description','$ImgArray[0]','$ImgArray[1]','$ImgArray[2]','$ImgArray[3]','$Lname1','$Lname2','$Lname3','$location','$Status',$SelectedType,$SelectedCampsite)";
        $finalRes=  mysqli_query($connect, $query);


       
        if (isset($_POST["FeatCheckboxes"]) && is_array($_POST["FeatCheckboxes"])){
          $SelectedCheckedBox = $_POST["FeatCheckboxes"];
  
          foreach($SelectedCheckedBox as $val){
              $queryDummy ="INSERT into pitchfeature(FeatureID,PackageID) Values($val,$PithchId)";
            mysqli_query($connect, $queryDummy);
          }
        }

        if($finalRes){
        echo "<script>window.alert('Successfully')</script>";
        echo "<script>window.location='dashboard2.php'</script>";

      
      }
        else{
          die("Query failed: " . mysqli_error($connect));
            echo 'something wrong';
}
        unset($ImgArray);
   
  //Willdelte Testing








  }
}
?>
