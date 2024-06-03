<?php
require 'connect.php';

$searchName = !empty($_POST['SearchName']) ?  $_POST['SearchName'] : '';


$Select_Query= "Select r.Titile,r.Url from rssfeed r where r.Titile like '$searchName%'";
$Run_query = mysqli_query($connect, $Select_Query);
$count = mysqli_num_rows($Run_query);

if($count>0){
    while($row= mysqli_fetch_array($Run_query)){

?>
        <div>
        <a href="<?= $row['Url'] ?>"><?php echo $row['Titile'] ?></a>    
        </div>
        


<?php


    }


}else{
        ?>
    <div>No Results Found</div>
  
    <?php
}



?>