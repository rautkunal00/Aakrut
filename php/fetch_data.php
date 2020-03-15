<?php

//fetch_data.php

include('database_connection.php');

//pagination
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
} 
$no_of_records_per_page = 10;
$offset = ($pageno-1) * $no_of_records_per_page;


// echo json_encode($_POST);
// if($_POST["route"] == 1){$_POST["route"] = "central";}
// if($_POST["route"] == 2){$_POST["route"] = "Harbour";}
// if($_POST["route"] == 3){$_POST["route"] = "Trans-Harbour";}
// if($_POST["route"] == 4){$_POST["route"] = "Western";}

  if(isset($_POST["action"]))
  {
    $query = "SELECT * FROM products WHERE Is_Sell = '0'";

  if(isset($_POST["route"]) && !empty($_POST["route"]) ){
    $query .= " AND Region ='".$_POST["route"]."' ";
  }
  if(isset($_POST["branch"]) && !empty($_POST["branch"]) ){
    $query .= " AND Branch ='".$_POST["branch"]."' ";
  }
  if(isset($_POST["college"]) && !empty($_POST["college"]) ){
    $query .= " AND College_Id ='".$_POST["college"]."' ";
  }
  if(isset($_POST["semester"]) && !empty($_POST["semester"]) ){
    $query .= " AND Semester ='".$_POST["semester"]."' ";
  }
  if(isset($_POST["subject"]) && !empty($_POST["subject"]) ){
    $query .= " AND Subject ='".$_POST["subject"]."' ";
  }
  if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
  {
    $query .= " AND Price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' ";
  } 

  if(isset($_POST["type"])) {
    $brand_filter = implode("','", $_POST["type"]);
    $query .= "
    AND type IN('".$brand_filter."')
    ";
  }

    if(isset($_POST["sortPrice"])) { 
          if($_POST["sortPrice"] == "highToLow") {
              $query .= " ORDER BY Price DESC";
            }
          else if($_POST["sortPrice"] == "lowToHigh") {
              $query .= " ORDER BY Price ASC ";      
            }
          else if($_POST["sortPrice"] == "new") {
            $query .= " ORDER BY Date_Added ASC ";      
          }
        } 
        $query.= " LIMIT $offset, $no_of_records_per_page";

// echo $query;

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();

 $total_row = $statement->rowCount();

 
$total_rows = $statement->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
 






 $output = '';
 if($total_row > 0)
 {
   $rowNo = 1;
  foreach($result as $row)
  {
   $output .= '
    <div class="col-lg-3 col-md-4 mb-4 product-card">
      <div class="card h-100">
        <img src="./images/product/'. $row['Product_Img'] .'" class="card-img-top mr-auto ml-auto mt-3 mb-3" alt="...">
        <div class="card-body">
          <div class="card-title"><div class="mt-auto mb-auto text-center">'. $row['Product_Name'] .'</div></div>
          <div class="card-text price_div"><label class="stock mt-auto mb-auto">IN STOCK</label> <label class="price">Rs. '. $row['Price'] .'</label></div>
          <p class="card-text">'. $row['Branch'] .' <br>(sem '.$row['Semester'].')</p>
          <p class="card-text"> '. $row['Subject'] .'</p>
          <p class="card-text">Type: '. $row['Type'] .'</p>
          <p class="card-text" id="'. $row['College_Name'] .'"></p>
          <p class="card-text">Description: '. $row['Description'] .'</p>
        </div>
      </div>
    </div>
   ';
  }
   if($total_row == 3){
    $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
   }
   if($total_row == 2){
    $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
    $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
   }
   if($total_row == 1){
    $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
    $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
    $output .= '<div class="col-lg-3 col-md-4 mb-4"></div>';
   }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;

}

?>