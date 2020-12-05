<?php
session_start();
   include('database_connection.php');


   $EmailId="";
   $Password="";
   if(empty($_POST["Email_Id"])) {
      $output = false;
      echo $output;
   }else{
      $EmailId=$_POST['Email_Id'];
      $Password=$_POST['Password'];
      $query = "SELECT * FROM `user_info` WHERE Email_Id='$EmailId' AND Password='$Password'";
      $result = $connect->query($query);
      $rowcount= $result->rowCount();
      if($rowcount == 1){
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['Email_Id'] = $_POST['Email_Id'];
         foreach($result as $row){
            $_SESSION['User_name'] = $row["User_Name"];
            $_SESSION['Mobile_No'] = $row["Mobile_No"];
         }

         echo $_SESSION['User_name'];
      }else{
         $_SESSION['valid'] = false;

         echo false;
      }
   }
