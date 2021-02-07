<?php

//fetch_data.php

include('database_connection.php');

  if(isset($_POST["Prod_Id"]))
  {
    $Prod_Id = $_POST["Prod_Id"];
    $query = "DELETE FROM `products` WHERE `products`.`Product_Id` = $Prod_Id";

  

    // echo $query;

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    echo "Product deleted successfully";

}

if(isset($_POST["Service_Id"]))
  {
    $Service_Id = $_POST["Service_Id"];
    $query = "DELETE FROM `services` WHERE `services`.`Service_Id` = $Service_Id";

  

    // echo $query;

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    echo "Service deleted successfully";

}
