<?php

//fetch_data.php

include('database_connection.php');
// echo $_POST["action"]."<br>".$_POST["minimum_price"]."<br>".$_POST["maximum_price"]."<br>".$_POST["college"]."<br>".$_POST["branch"]."<br>".$_POST["semester"]."<br>".$_POST["subject"]."<br>".$_POST["type"];
// echo json_encode($_POST);
if($_POST["route"] == 1){$_POST["route"] = "central";}
if($_POST["route"] == 2){$_POST["route"] = "Harbour";}
if($_POST["route"] == 3){$_POST["route"] = "Trans-Harbour";}
if($_POST["route"] == 4){$_POST["route"] = "Western";}

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
              $query .= "ORDER BY Price DESC";
            }
          else if($_POST["sortPrice"] == "lowToHigh") {
              $query .= "ORDER BY Price ASC ";      
            }
        } 

// echo $query;

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();



 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
    <div class="col-lg-3 col-md-4 mb-4">
      <div class="card h-100 shadow">
        <img src="./images/product/'. $row['Product_Img'] .'" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">'. $row['Product_Name'] .'</h5>
          <p class="card-text">Price: '. $row['Price'] .'</p>
          <p class="card-text">College Name: '. $row['College_Name'] .'</p>
          <p class="card-text">Brach: '. $row['Branch'] .'</p>
          <p class="card-text">Semester: '. $row['Semester'] .'</p>
          <p class="card-text">Subject: '. $row['Subject'] .'</p>
          <p class="card-text">Type: '. $row['Type'] .'</p>
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