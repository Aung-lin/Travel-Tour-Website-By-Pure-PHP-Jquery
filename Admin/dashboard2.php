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




$SelectQuery = "SELECT * FROM pitch";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );





$SelectType = "SELECT * FROM packagetype";
$res = mysqli_query($connect, $SelectType);


if(isset($_POST['delete']))
{
    $id = $_POST['delid'];
    $query = "DELETE FROM pitch WHERE PackageID='$id' ";
    $query1 = "DELETE FROM pitchfeature WHERE PackageID= '$id'";
    $query_run = mysqli_query($connect, $query);
    $query_run2= mysqli_query($connect, $query1);
    if($query_run && $query_run2)
    {
        echo '<script> alert("Data Deleted"); </script>';
        echo "<script>window.location='dashboard2.php'</script>";
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}


//Logout Button 
if(isset($_POST["AdminLogout"])){
  echo '<script> alert("Successfully LogOut"); </script>';
  unset($_SESSION['aid']);
  echo "<script>window.location='AdminLogin.php'</script>";
}



// if(isset($_POST["submit"])){
//   $SelectedCampsite = $_POST["Campsites"];

// }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pitches Control Panel</title>

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
            <a id="firstChild" href="dashboard2.php">
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
            <a id="fourth" href="Adminfeatures.php">
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
        <form action="dashboard2.php" method="POST">
        
          <button type="submit" name="AdminLogout"><i class="fa-solid fa-right-from-bracket"></i> Log Out
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



     <!--  Modal Box for adding data -->

<!-- The Modal -->
<div id="modalDialog" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Add Data To Pitch Table</h5>
      <button type="button" class="close">
        <span aria-hidden="true">x</span>
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="admincontrolpanel.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
        <div class="col span_1_of_2 form-left">
        <label for="name">Name :</label>
        <br>
            <input type="text" name="name" required value="" placehodler="PackageName"> 
            <br>
            <label for="Img1">Package Image</label>
            <br>
            <input type="file" name="Img1"  accept=".jpg, .jpeg, .png"  value="" required> 
            <br>
            <label for="location">Location </label>
            <br>
            <input type="text" name="location" required value=""> 
            <br>
           
            <label for="LName1">Local Name 1  </label>
            <br>
            <input type="text" name="LName1" required value=""> 
            <br>
            <label for="LName2">Local Name 2 : </label>
        <br>
            <input type="text" name="LName2" required value=""> 
            <br>
            <label for="LName3">Local Name 3 : </label>
            <br>
            <input type="text" name="LName3" required value=""> 
            <br>
            <label for="Img2">Local Image 1 : </label>
            <br>
            <input type="file" name="Img2" accept=".jpg, .jpeg, .png" required value=""> 
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
      
                    echo "<Option value='$Id'>$Name</Option>";
      
                }
      
              ?>
      </select>
      <br>
      <label for="Img4">Local Image 2 : </label>
            <br>
            <input type="file" name="Img4" accept=".jpg, .jpeg, .png" required value=""> 
            <br>
            <label for="Img3">Local Image 3 : </label>
            <br>
            <input type="file" name="Img3" accept=".jpg, .jpeg, .png" required value=""> 
            <br>
        </div>
        

        <div class="col span_1_of_2 form-right">
           
            <label for="Price">Price : </label>
            <br>
            <input type="number" name="Price" required value=""> 
            <br>
            <label for="Descri">Description : </label>
            <br>
            <input type="text" name="Descri" required value=""> 
            <br>
            <label for="Status">Status : </label>
            <br>
            <input type="text" name="Status" required value=""> 
            <br>
            <label for="Duration">Duration : </label>
            <br>
            <input type="text" name="Duration" required value="">
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
      
                    echo "<Option value='$Id'>$Name</Option>";
      
                }
      
              ?>
      </select>
      <br>

                <label class="featureHeader">Select Avaliable Features : </label>

                <br>
            <?php
              $SelectFeature ="SELECT * FROM features";
              $resFeature = mysqli_query($connect, $SelectFeature);
              $count = mysqli_num_rows($resFeature);

                  for($i=0;$i<$count;$i++){
                    $FeatureArr = mysqli_fetch_array($resFeature);
                    $Id= $FeatureArr["FeatureID"];
                    $Name = $FeatureArr["FeatureName"];
                    echo  "<input type='checkbox' name='FeatCheckboxes[]' value='$Id'  ><label>$Name</label> <br>";
                  }
        

            ?>
                
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


<div class="clearfix"></div>
      <div class="header-dataTable">
    <h2>Data Table | For Pitch View</h2>

      <button id="addData">Add Data</button>

      </div>


      <div class="data-table">
      <table class="pitch-Table" >
  <thead>
  <th>PackageID</th>
    <th> PackageName</th>
    <th>PackagePrice</th>
    <th>Duration</th>
    <th>status</th>
    <th>CampSiteID</th>
    <th>Update</th>
    <th>Delete</th>
  </thead>
<?php

if($Run_SelectQuery){
  while($row= mysqli_fetch_array($Run_SelectQuery)){
    ?>
    <tbody>
      <td><?php echo $row['PackageID'];?></td>
    <td> <?php echo $row['PackageName']; ?></td>
    <td> <?php echo $row['PackagePrice']; ?></td>
    <td> <?php echo $row['Duration']; ?></td>
    <td> <?php echo $row['status']; ?></td>
    <td> <?php echo $row['PackageTypeID']; ?></td>
    
    <form class="" action="UpdatePitch.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <!-- <input type="hidden" name="id" value="<?php echo $row['PackageID'];?>"> -->
    <td>
    <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Admin/UpdatePitch.php?upID=<?= $row['PackageID'];?>"><i class="fa-solid fa-pen-to-square"></i></a>  
   
    </form>
    <form class="" action="dashboard2.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="delid" value="<?php echo $row['PackageID'];?>">
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
