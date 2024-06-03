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

$SelectQuery = "SELECT * FROM campsite";
$Run_SelectQuery= mysqli_query($connect,$SelectQuery );


if(isset($_POST["submit"])){


    $name = $_POST["Name"];
    $location = $_POST["location"];
    $Cname = $_POST["CName"];
    
    $query ="INSERT into campsite(CampsiteName,CountryName) Values('$name','$Cname')";
    $finalRes=  mysqli_query($connect, $query);



    if($query){
    echo "<script>window.alert('Successfully')</script>";
    echo "<script>window.location='campsite.php'</script>";
    }else{
      echo "<script>window.alert('Data not added')</script>";
    }

}


if(isset($_POST['delete']))
{
    $id =$_POST['delid'];

    $query = "DELETE FROM campsite WHERE CampsiteID= $id";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        echo "<script>window.location='campsite.php'</script>";
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
    <title>Campsite Control Panel</title>

    
    <link rel="stylesheet" href="../CSS/tempHome.css<?php echo '?'.mt_rand(); ?>"  />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <style>


  </style>
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
            <a id="secChild" href="dashboard2.php">
              <span class="nav-link"><i class="fa-solid fa-box"></i>Pitch</span>
            </a>
          </li>
          <li class="nav-item">
            <a id="firstChild" href="campsite.php">
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
        <form action="campsite.php" method="POST">
        
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

     <!--  Modal Box for adding data -->

<!-- The Modal -->
<div id="modalDialog" class="modal">
  <div class="modal-content animate-top">
    <div class="modal-header">
      <h5 class="modal-title">Add Data To Campsite Table</h5>
      <button type="button" class="close">
        <span aria-hidden="true">x</span>
      </button>
    </div>
    <div class="modal-body">
        <form class="" action="campsite.php" method="post" autocomplete="off" enctype="multipart/form-data">
        
        <div class="col span_1_of_1 form-left">
        <label for="Name">Campsite Name </label>
        <br>
            <input type="text" name="Name" required value=""> 
            <br>
            <label for="location">Country Name </label>
            
            <br>
            <input type="text" name="CName" required value=""> 
      
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
    <h2>Data Table | For Campsite View</h2>

      <button id="addData">Add Data</button>

      </div>


      <div class="data-table">
      <table class="pitch-Table" >
  <thead>
  <th>CampsiteID</th>
    <th> CampsiteName</th>

    <th>CountryName	</th>

    <th>Update</th>
    <th>Delete</th>
  </thead>
<?php

if($Run_SelectQuery){
  while($row= mysqli_fetch_array($Run_SelectQuery)){
    ?>
    <tbody>
    
      <td><?php echo $row['CampsiteID'];?></td>
    <td> <?php echo $row['CampsiteName']; ?></td>

    <td> <?php echo $row['CountryName']; ?></td>
  
    
    <form class="" action="UpdatePitch.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <!-- <input type="hidden" name="id" value="<?php echo $row['CampsiteID'];?>"> -->
    <td> 
    <a href="http://localhost/L5%20ASSIGNMENT%20PJ/Admin/UpdateCampsite.php?CampID=<?= $row['CampsiteID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>  
   
    </td>
    </form>
    <form class="" action="campsite.php" method="post">
    <input type="hidden" name="delid" value="<?= $row['CampsiteID'];?>">
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
