<?php
session_start();
include('database_connection.php');


$EmailId = "";
$Password = "";

if (isset($_POST['User_Name'])) {
   $UserName = $_POST['User_Name'];
}
if (isset($_POST['Email_Id'])) {
   $EmailId = $_POST['Email_Id'];
}
if (isset($_POST['Password'])) {
   $Password = $_POST['Password'];
}
if (isset($_POST['User_Mobile'])) {
   $UserMobile = $_POST['User_Mobile'];
}

$query = "SELECT * FROM `user_info` WHERE Email_Id='$EmailId' AND Password='$Password'";
$result = $connect->query($query);
$rowcount = $result->rowCount();

if ($rowcount > 0) {
   $_SESSION['Email_Id'] = $EmailId;
   $_SESSION['valid'] = true;
   $query = "SELECT * FROM `user_info` WHERE Email_Id='$EmailId' AND Password='$Password'";
   $statement = $connect->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   $_SESSION['User_Name'] = $result[0]['User_Name'];
   $_SESSION['Mobile_No'] = $result[0]['Mobile_No'];
   echo 1;
} else {
   $_SESSION['valid'] = false;
   echo false;
}
