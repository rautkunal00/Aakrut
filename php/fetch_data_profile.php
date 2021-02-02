<?php

//fetch_data.php
session_start();

include('database_connection.php');

//pagination
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}
$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;


// echo json_encode($_POST);
// if($_POST["route"] == 1){$_POST["route"] = "central";}
// if($_POST["route"] == 2){$_POST["route"] = "Harbour";}
// if($_POST["route"] == 3){$_POST["route"] = "Trans-Harbour";}
// if($_POST["route"] == 4){$_POST["route"] = "Western";}


  $query = "SELECT * FROM products WHERE 	Email_Id = '".$_SESSION['Email_Id']."'";


  if (isset($_POST["sortPrice"])) {
    if ($_POST["sortPrice"] == "highToLow") {
      $query .= " ORDER BY Price DESC";
    } else if ($_POST["sortPrice"] == "lowToHigh") {
      $query .= " ORDER BY Price ASC ";
    } else if ($_POST["sortPrice"] == "new") {
      $query .= " ORDER BY Date_Added ASC ";
    }
  }
  $query .= " LIMIT $offset, $no_of_records_per_page";

  // echo $query;

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();

  $total_row = $statement->rowCount();


  $total_rows = $statement->rowCount();
  $total_pages = ceil($total_rows / $no_of_records_per_page);







  $output = '';
  if ($total_row > 0) {
    $rowNo = 1;
    foreach ($result as $row) {
      $output .= '
    <div class="col-lg-3 col-md-4 mb-4 product-card">
      <div class="card h-100">
        <img src="./images/product/' . $row['Product_Img'] . '" class="card-img-top mr-auto ml-auto mt-3 mb-3" alt="...">
        <div class="card-body" id="' . $row['Product_Id'] . '">
          <div class="card-title"><div class="mt-auto mb-auto text-center">' . $row['Product_Name'] . '</div></div>
          <div class="card-text price_div"><label class="stock mt-auto mb-auto">IN STOCK</label> <label class="price">Rs. ' . $row['Price'] . '</label></div>
          <p class="card-text">' . $row['Branch'] . ' <br>(sem ' . $row['Semester'] . ')</p>
          <p class="card-text"> ' . $row['Subject'] . '</p>
          <p class="card-text">Type: ' . $row['Type'] . '</p>
          <p class="card-text clg_name ' . $row['College_Name'] . '" id=""></p>
          <p class="card-text">Description: ' . $row['Description'] . '</p>
        </div>
      </div>
    </div>
   ';
    }
    if ($total_row == 3) {
      $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
    }
    if ($total_row == 2) {
      $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
      $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
    }
    if ($total_row == 1) {
      $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
      $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
      $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
    }
  } else {
    $output = '<h3>No Data Found</h3>';
  }
  echo $output;

