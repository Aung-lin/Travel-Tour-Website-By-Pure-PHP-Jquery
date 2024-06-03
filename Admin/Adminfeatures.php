<?php
session_start();
require '../ajax-crud/connect.php';
if(!isset($_SESSION['aid'])){
  echo "<script>
  window.alert('You Need To Login First')</script>";
  echo "<script>
  window.location='AdminLogin.php'</script>";
}else{
    $adminId= $_SESSION['aid'];
    $SelectQuery = "SELECT * from admins where AdminID=$adminId"; 
$Run_SelectAdmin=mysqli_query($connect,$SelectQuery); 
$rowAdmin =mysqli_fetch_assoc($Run_SelectAdmin);
}

$SelectQuery = "SELECT * FROM features";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );


$SelectSpecificId= "SELECT * FROM features ORDER BY 	FeatureID DESC LIMIT 1";
$Run_SelectSpecificId= mysqli_query($connect,$SelectSpecificId );

if(isset($_POST["submit"])){

  $lastRow = mysqli_fetch_assoc($Run_SelectSpecificId);
  $count = $lastRow["FeatureID"]+1;
    $Fname = $_POST["FeatureName"];
    $Ficon = $_POST["FeatureIcon"];
    $Ftype = $_POST["FeatureType"];
    
    $query ="INSERT into features(FeatureID,FeatureIcon,FeatureName,FeatureType) Values($count,'$Ficon','$Fname','$Ftype')";
    $finalRes=  mysqli_query($connect, $query);



    if($finalRes){
    echo "<script>window.alert('Successfully')</script>";
    echo "<script>window.location='Adminfeatures.php'</script>";
    }else{
       echo error.message; 
    }

}


if(isset($_POST['delete']))
{
    $id = $_POST['delid'];

    $query = "DELETE FROM features WHERE FeatureID=$id ";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        echo "<script>window.location='Adminfeatures.php'</script>";
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

if(isset($_POST["AdminLogout"])){
  echo '<script> alert("Successfully LogOut"); </script>';
  unset($_SESSION['aid']);
  echo "<script>window.location='AdminLogin.php'</script>";
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Features Control Panel</title>


    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>"  />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
    <!-- Start Side Panel -->
    <div class="span_1_of_5 sidenav">
      <div class="sidenav-header">
        <div class="sidenav-header">
          <i class="fa-solid fa-stop"></i>
          <span class="">Admin Control Panel</span>
        </div>
      </div>
      <hr />
      <div class="nav-items">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a id="fourthChild" href="dashboard2.php">
              <span class="nav-link"><i class="fa-solid fa-box"></i>Pitch</span>
            </a>
          </li>
          <li class="nav-item">
            <a id="secChild" href="campsite.php">
              <span class="nav-link"
                ><i class="fa-solid fa-tents"></i>CampSite</span
              >
            </a>
          </li>
          <li class="nav-item">
            <a id="thirdChild" href="PackageType.php">
              <span class="nav-link"
                ><i class="fa-solid fa-file-invoice"></i>PackageType</span
              >
            </a>
          </li>
          <li class="nav-item">
            <a id="firstChild" href="Adminfeatures.php">
              <span class="nav-link"> <i class="fa-solid fa-radio"></i>Features</span>
            </a>
          </li>
          <li class="nav-item">
            <a id="fifthChild" href="Adminbookings.php">
              <span class="nav-link"
                ><i class="fa-solid fa-bookmark"></i>Booking Lists</span
              >
            </a>
          </li>
          <li class="nav-item">
            <a id="sixthChild" href="AdminReview.php">
              <span class="nav-link"
                ><i class="fa-solid fa-comment-dots"></i>Reviews Lists</span
              >
            </a>
          </li>
          <li class="nav-item">
            <a id="seventhChild" href="AdminClients.php">
              <span class="nav-link"
                ><i class="fa-solid fa-users"></i>Clients Lists</span
              >
            </a>
          </li>
          <li class="nav-item">
            <a id="eightChild" href="Contact.php">
              <span class="nav-link"
                ><i class="fa-solid fa-address-book"></i>Contact Lists</span
              >
            </a>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
      <ul class="AdminLogout">
      <li class="nav-item">
        <form action="Adminfeatures.php" method="POST">
        
          <button name="AdminLogout"><i class="fa-solid fa-right-from-bracket"></i> Log Out
          </button>
         
    
        </form>
      </li>
      </ul>
    </div>

    <!-- End Side Panel -->

    <div class="navbar span_5_of_7" id="navbarBlur">
      <!-- Start Nav  -->
      <nav class="nav-location">
     
     <div class="col span_1_of_2">
     <img src="../Image/gwsc_logo.png" alt="" />
     </div>


     <div class="col span_1_of_2 adminInfo">
     <div>

     <label for="AdminName">Admin Name : </label> <input type="text" value="<?= $rowAdmin["AdminName"] ?>" name="AdminName" disabled>
     

     </div>
     </div>

     </nav>

     <!-- End Nav -->


<div class="clearfix"></div>

<!-- The Modal -->
<div id="modalDialog" class="modal">
  <div class="modal-content animate-top">
    <div class="modal-header">
      <h5 class="modal-title">Add Data To Feature Table</h5>
      <button type="button" class="close">
        <span aria-hidden="true">x</span>
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="Adminfeatures.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
        <div class="col span_1_of_1 form-left">
        <label for="FeatureName">FeatureName</label>
        <br>
            <input type="text" name="FeatureName" required value=""> 
            <br>
            <label for="FeatureIcon">FeatureIcon</label>
            <br>
            <input type="text" name="FeatureIcon" required value=""> 
            <br>
            <label for="FeatureType">FeatureType</label>
            <br>
            <input type="text" name="FeatureType" required value=""> 
           
      
      
        </div>
        

       
           
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary close">Close</button>
      <button type = "submit" class="btn btn-primary" name = "submit">Submit</button>
 
    </div>
    </form>
  </div>
</div>
      <!-- End Modal Box for adding data -->



      <div class="header-dataTable">
    <h2>Data Table | For Feature View</h2>

      <button id="addData">Add Data</button>

      </div>


      <div class="data-table">
      <table class="pitch-Table" >
  <thead>
  <th>FeatureID</th>
   
    <th>FeatureName</th>
    <th>FeatureType</th>

    <th>Update</th>
    <th>Delete</th>
  </thead>
<?php

if($Run_SelectQuery){
  while($row= mysqli_fetch_array($Run_SelectQuery)){
    ?>
    <tbody>

      <td><?php echo $row['FeatureID'];?></td>
  
    <td> <?php echo $row['FeatureName']; ?></td>
    <td> <?php echo $row['FeatureType']; ?></td>
  
    
    <form class="" action="UpdatePitch.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['CampsiteID'];?>">
    <td> 
      <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Admin/UpdateAdminFeature.php?FID=<?= $row['FeatureID']  ?>"><i class="fa-solid fa-pen-to-square"></i></a>
      <!-- <button type="submit" name="update"  id="update"><i class="fa-solid fa-pen-to-square"></i> -->
    </button> </td>
    </form>
    <form class="" action="Adminfeatures.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="delid" value="<?php echo $row['FeatureID'];?>">
    <td><button type="submit" name="delete" id="delete"><i class="fa-solid fa-trash"> </i></button></td>
    </form>
    </tbody>
    <?php

  }
}else{
  echo "No record Found";
};

?>

      </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
      var modal = $("#modalDialog");

      var btn = $("#addData");


      var span = $(".close");

      $(document).ready(function () {



        btn.on("click", function () {
          modal.show();
        });

        span.on("click", function () {
          modal.fadeOut();
        });
      });

  


      $("body").bind("click", function (e) {
        if ($(e.target).hasClass("modal")) {
          modal.fadeOut();
        }
      });
    </script>
  </body>
</html>
