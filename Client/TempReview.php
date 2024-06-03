<?php
session_start();
require '../ajax-crud/connect.php';

echo $_SESSION['id'];

if (isset($_POST['btnReview'])) {

    if(!isset($_SESSION['id'])){
        echo "<script>window.alert('Please Login First')</script>";
         echo "<script>window.location='review.php'</script>";
    }
    else{
     
        $Sid= $_SESSION['id'];
        $Review= $_POST['reviewtxt'];
        $ReviewStar= (int)$_POST['stars'];
        $CusID = $Sid;
        $currentDate = date("Y-m-d");
  
  
        
        $query ="INSERT into reviews(Stars,	CustomerID,	ReviewParagraph,ReviewDate)
        Values($ReviewStar,$CusID,'$Review','$currentDate')";
        $finalRes=  mysqli_query($connect, $query);
        if($finalRes){
          echo "<script>window.alert('Successfully')</script>";
          echo "<script>window.location='review.php'</script>";
        
        
        }
          else{
            die("Query failed: " . mysqli_error($connect));
              echo 'smth wrong';
        }
  
    }
  
  
    }


?>