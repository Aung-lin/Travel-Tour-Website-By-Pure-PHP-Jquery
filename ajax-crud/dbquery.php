<?php

include('connect.php');

// $pitches = "Create table pitch
//  (
//     PackageID int NOT Null auto_increment primary key ,
//     PackageName varchar(30),
//     PackagePrice decimal,
//     Duration varchar(20),
//     Description varchar(255),
//     PackageImage varchar(255),
//     localImage1 varchar(255),
//     localImage2 varchar(255),
//     localImage3 varchar(255),
//     LocalName1 varchar(50),
//     LocalName2 varchar(50),
//     LocalName3 varchar(50),
//     location varchar(55),
//     status varchar(30),
//     ViewCount int,
//     PackageTypeID int,
// 	Foreign Key (PackageTypeID) References packageType(PackageTypeID),
//     CampsiteID int, 
//     Foreign Key (CampsiteID) References campsite(CampsiteID)


//  )";

// $query = mysqli_query($connect, $pitches);

// if ($query) {

//     echo "pitch  Table Successfully";
// } else {

//     echo "Error in DB statement";
// }

//PackageType

// $packagetypetable = "Create table PackageType
//  (
//   PackageTypeID int NOT Null primary key AUTO_Increment,
//   PackageTypeName varchar(30)
// )";




// $query=mysqli_query($connect,$packagetypetable);
// if($query)
// {
//  echo "PackageType table successfully";
// }
// else
// {
//  echo "Error in DB statement";
// }

// //Campsite

    $site="CREATE table Campsite
    (
        CampsiteID int NOT NULL Primary Key Auto_Increment,
        CampsiteName varchar(50),
        CountryName varchar(50)
    )
";
    $query=mysqli_query($connect,$site);

 

    if ($query)
    {
        echo "Campsite Table is created successfully!!!";
    }else
    {
        echo "There is an error in Campsite Table.";
    }


//     //Feature

//     $feature="Create table Features(
// 		FeatureID int not null PRIMARY KEY,
//     	FeatureIcon varchar(150),
//     	FeatureName varchar(50),
// 		FeatureType varchar(50)
// )
// ";
//     $query=mysqli_query($connect, $feature);

 

//     if ($query)
//     {
//         echo "Feature Table is created successfully!!!";
//     }else
//     {
//         echo "There is an error in Feature Table.";
//     }

//     //pitchFeature Dummy 

//     $pitchFeature="Create table PitchFeature(
//         FeatureID int not null,
//         PackageID int NOT Null,
//         Foreign Key (PackageID) References pitch(PackageID),
//         Foreign Key (FeatureID) References features(FeatureID),
//         Primary Key(FeatureID,PackageID)
//     )
// ";
//     $query=mysqli_query($connect, $pitchFeature);

 

//     if ($query)
//     {
//         echo "PitchFeature Table is created successfully!!!";
//     }else
//     {
//         echo "There is an error in Campsite Table.";
//     }

//     //Admin 

    // $Admin="CREATE table Admin
    // (
    //     AdminID int NOT NULL Primary Key Auto_Increment,
    //     AdminName varchar(30),
    //    AdminEmail varchar(50),
    //     PhoneNumber varchar(30),
    //     AdminAddress varchar(100),
    //     Password varchar(30)
        
    //     )";
    // $query=mysqli_query($connect, $Admin);

 

    // if ($query)
    // {
    //     echo "Admin Table is created successfully!!!";
    // }else
    // {
    //     echo "There is an error in Admin Table.";
    // }

//     //Customer 

    $Customer="CREATE table customers
    (
        CustomerID int NOT NULL Primary Key Auto_Increment,
     FirstName varchar(50),
         LastName varchar(50),
         CustomerEmail varchar(50),
         CustomerPhoneNo varchar(30),
         CustomerAddress varchar(100),
         Password varchar(30)
        )";
    $query=mysqli_query($connect, $Customer);

 

    if ($query)
    {
        echo "Customer Table is created successfully!!!";
    }else
    {
        echo "There is an error in Customer Table.";
    }

//     //Reviews
//     $Reviews="Create table Reviews(

// 		ReviewId int NOT NULL Primary Key Auto_Increment,
//     	Stars int ,
//     	CustomerID int,
//         Status int Default 0, 
//     	ReviewParagraph varchar(100),
//     	FOREIGN key(CustomerID) REFERENCES customers(CustomerID),
//        ReviewDate Date

// )";
//     $query=mysqli_query($connect, $Reviews);

 

//     if ($query)
//     {
//         echo "Reviews Table is created successfully!!!";
//     }else
//     {
//         echo "There is an error in Reviews Table.";
//     }

//      //Bookings

//      $Bookings="Create table bookings(
//          BookingID int Not Null Primary Key Auto_Increment,
//          Date date,
//          TotalPerson int,
//          TotalAmount decimal,
//          CustomerID int,
//      Foreign Key(CustomerID) references customers(CustomerID),
//          PackageID int,
//      Foreign Key(PackageID) references pitch(PackageID)
     
//      )";
//     $query=mysqli_query($connect, $Bookings);

 

//     if ($query)
//     {
//         echo "Bookings Table is created successfully!!!";
//     }else
//     {
//         echo "There is an error in Bookings Table.";
//     }

//     //Contact
    $Contact="Create table contact(
        ContactID int Not Null Primary Key Auto_Increment,
        NameOfInterview varchar(30),
        Subject varchar(30),
        Question varchar(100),
        CustomerID int,
    Foreign Key(CustomerID) references customers(CustomerID)
    
    )";
   $query=mysqli_query($connect, $Contact);



   if ($query)
   {
       echo "Contacts Table is created successfully!!!";
   }else
   {
       echo "There is an error in Contact Table.";
   }