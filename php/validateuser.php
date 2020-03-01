<?php 

include('database_connection.php');


$EmailId="";
if(empty($_POST["Email_Id"])) {
    $output = false;
    echo $output;
}else{
    $EmailId=$_POST['Email_Id'];
    $query = "SELECT * FROM `user_info` WHERE Email_Id='$EmailId'";
    $result = $connect->query($query);
    $rowcount= $result->rowCount();
    if($rowcount == 1){
        echo 1;
    }else{
        echo 2;
    }
}



?>