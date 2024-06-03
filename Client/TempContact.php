<?php

session_start();
require '../ajax-crud/connect.php';



// $SelectQuery = "SELECT * FROM reviews";
// $Run_SelectQuery= mysqli_query($connect,$SelectQuery );

// $SelectStars = "SELECT AVG(Stars) FROM reviews";
// $Run_SelectStars=mysqli_query($connect,$SelectStars );
// $rowStars = mysqli_fetch_assoc($Run_SelectStars);



if (isset($_POST['btnContact'])) {

  if(!isset($_SESSION['id'])){
      echo "<script>window.alert('Please Login First')</script>";
       echo "<script>window.location='contact.php'</script>";
  }
  else{

    $Sid =$_SESSION['id'];
      $Name= $_POST['txtName'];
      $Subject= $_POST['txtSubj'];
      $CusID = $Sid;
     $Question = $_POST["txtQuestion"];


      
      $query ="INSERT into contact(NameOfInterview,Subject,CustomerID,Question)
      Values('$Name','$Subject',$CusID,'$Question')";
      $finalRes=  mysqli_query($connect, $query);
      if($finalRes){
        echo "<script>window.alert('Successfully, Thank you for sending message to us')</script>";
        echo "<script>window.location='contact.php'</script>";
      
      
      }
        else{
            echo 'smth wrong';
      }

  }


  }

?>