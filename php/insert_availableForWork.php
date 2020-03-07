<?php  
include('database_connection.php');
 
     $Email_Id  = $_POST["Email_Id"];
     $User_Name  = $_POST["User_Name"];
     $User_Mobile = $_POST["User_Mobile"];
     $Service_Type = $_POST["Service_Type"];
     $Description = $_POST["Description"];
     $Region = $_POST["Region"];
     $College_Name = $_POST["College_Name"];
     $College_Id = $_POST["College_Id"];

  $query = "INSERT INTO `services` (Email_Id,User_Name,User_Mobile,Service_Type,Description,Region,College,College_Id) VALUES ('".$Email_Id."','".$User_Name."','".$User_Mobile."','".$Service_Type."','".$Description."','".$Region."','".$College_Name."','".$College_Id."')";
     
  $statement = $connect->prepare($query);
  $statement->execute();
  echo $query;
      

 ?> 
   