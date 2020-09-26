<?php  
include('database_connection.php');
 
     $Email_Id  = $_POST["Email_Id"];
     $User_Name  = $_POST["User_Name"];
     $User_Mobile = $_POST["User_Mobile"];
     $Service_Type = $_POST["Service_Type"];
     $Description = $_POST["Description"];
     $Region = $_POST["Region"];
     $College_Name = $_POST["College_Name"];;
     $College_Id = $_POST["College_Id"];

     // Finding service ID
     $query = "SELECT * from services ORDER BY Service_Id DESC ";
     $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     
     if($result[0]['Service_Id']){
         $maxID = $result[0]['Service_Id'];
     }else{
         $maxID = 1;
     }  
     $maxID++; //new service ID

  $query = "INSERT INTO `services` (Service_Id,Email_Id,User_Name,User_Mobile,Service_Type,Description,Region,College,College_Id) VALUES ('".$maxID."','".$Email_Id."','".$User_Name."','".$User_Mobile."','".$Service_Type."','".$Description."','".$Region."','".$College_Name."','".$College_Id."')";
     
  $statement = $connect->prepare($query);
  $statement->execute();
  echo $query;
      

 ?> 
   