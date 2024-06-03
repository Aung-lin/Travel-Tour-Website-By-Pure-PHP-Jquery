<?php
session_start();
require '../ajax-crud/connect.php';



if (isset($_POST['BtnBook'])) {
    $PackageId= $_POST["pkid"];
    if(!isset($_SESSION['id'])){
        echo "<script>window.alert('Please Login First')</script>";
         echo "<script>window.location='detail.php?id=$PackageId'</script>";
    }
    else{
        $Sid=$_SESSION['id'];
        $SelectedPerson = (int)$_POST["NoOfPerson"];
        $Date = $_POST["CampDate"];
        $CusID= $Sid;
        $PackageId= $_POST["pkid"];
        
        $QuerySelectedPackagePrice= "Select PackagePrice from pitch where PackageID=$PackageId";
        $Run_QuerySelectedPackagePrice=mysqli_query($connect, $QuerySelectedPackagePrice);
        $rowPackagePrice= mysqli_fetch_assoc($Run_QuerySelectedPackagePrice);
        $PackagePrice = $rowPackagePrice["PackagePrice"];
        echo $PackagePrice;
        $TotalAmount =  $PackagePrice*$SelectedPerson;

        $query ="INSERT into bookings(Date,TotalPerson,TotalAmount,CustomerID,PackageID) 
        Values('$Date',$SelectedPerson,$TotalAmount,$CusID,$PackageId)";
        $finalRes=  mysqli_query($connect, $query);
        if($finalRes){
            
          echo "<script>window.alert('Successfully')</script>";
          echo "<script>window.location='detail.php?id=$PackageId'</script>";
        
        
        }
          else{
              echo 'smth wrong';
        }

    }

  
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>