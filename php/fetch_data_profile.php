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

// ==============================Products=============================================
$output = '';
if ($_POST["prod_service"] == 1) {
  $query = "SELECT * FROM products WHERE Email_Id = '" . $_SESSION['Email_Id'] . "'";


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
          <button type="button" id="delete_prod" class="btn buyBtn btn-danger rounded-2 text-capitalize float-right"><i class="far fa-trash-alt"></i></button>
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
    $_SESSION['product_data'] = 0;
    if ($_SESSION['product_data'] == 0){
      $output = 404;
    }
  }
}


// ==============================Services=============================================

if ($_POST["prod_service"] == 2) {
  $query = "SELECT * FROM services where Email_Id = '" . $_SESSION['Email_Id'] . "'";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();

  $output = '';
  if ($total_row > 0) {
    foreach ($result as $row) {
      $output .= '
      <div class="col-lg-3 col-md-4 mb-4">
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title">' . $row['Service_Type'] . '</h5>
            <p class="card-text">College Name: ' . $row['College'] . '</p>
            <p class="card-text">Description: ' . $row['Description'] . '</p>
            <button type="button" name="view" class="btn btn-warning view" id="' . $row["Service_Id"] . '" >Seller Description</button>     
            <button type="button" id="delete_service" class="btn buyBtn btn-danger rounded-2 text-capitalize float-right"><i class="far fa-trash-alt"></i></button>  
          </div>
        </div>
      </div>
      
      <div id="post_modal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content"> 
            <div class="modal-header">
              <h4 class="modal-title">Seller Description</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="post_detail">
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      ';
    }
  } else {
    $_SESSION['service_data'] = 0;
    if ($_SESSION['service_data'] == 0 && $_SESSION['product_data'] == 0){
      $output = 404;
    }
  }
}

if ($_POST["prod_service"] == 3){
  $output = '<h3>Select filter for see your data</h3>';
}

echo $output;
