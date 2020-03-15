<?php

//fetch_data.php

include('database_connection.php');


  if(isset($_POST["productID"])){

 $query = "SELECT Email_Id FROM products WHERE product_Id = '".$_POST["productID"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $emailid = "";

 foreach($result as $row){
    $emailid .= $row["Email_Id"];
    }

 $query = "SELECT * FROM user_info WHERE Email_Id = '".$emailid."'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 

 $output = '';
 if($total_row > 0)
 {
   $rowNo = 1;
  foreach($result as $row)
  {
   $output .= '
      <p>'. $row['User_Name'] .'</p>
      <p>'. $row['Email_Id'] .'</p>
      <p>'. $row['Mobile_No'] .'</p>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;

}

?>