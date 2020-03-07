<?php
  echo "<script src='js/detail.js'></script>";

//fetch_data.php

include('database_connection.php');



if(isset($_POST["action"]))
{

  $query = "SELECT * FROM services where 1";
  // $query = "SELECT * FROM services WHERE Service_Id IN  (SELECT User_Id FROM user_service) ";
  if(isset($_POST["route"]) && !empty($_POST["route"]) ){
    if($_POST["route"] == 1){$_POST["route"] = "central";}
    if($_POST["route"] == 2){$_POST["route"] = "Harbour";}
    if($_POST["route"] == 3){$_POST["route"] = "Trans-Harbour";}
    if($_POST["route"] == 4){$_POST["route"] = "Western";}

    $query .= " AND Region ='".$_POST["route"]."' ";
  }
  if(isset($_POST["college"]) && !empty($_POST["college"]) ){
    $query .= " AND College_Id ='".$_POST["college"]."' ";
  }
  if(isset($_POST["branch"]) && !empty($_POST["branch"]) ){
    $query .= " AND Branch ='".$_POST["branch"]."' ";
  }
  if(isset($_POST["Service_Type"]) && !empty($_POST["Service_Type"]))
  {
   $service_filter = implode("','", $_POST["Service_Type"]);
   $query .= "
    AND Service_Type IN('".$service_filter."')
   ";
  }

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
        <div class="card-body">
          <h5 class="card-title">'. $row['Service_Type'] .'</h5>
          <p class="card-text">College Name: '. $row['College'] .'</p>
          <p class="card-text">Description: '. $row['Description'] .'</p>
          <button type="button" name="view" class="btn btn-warning view" id="'.$row["Service_Id"].'" >Seller Description</button>       
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
 }
 else
 {
  $output = "No data found";
 }
 echo $output;
}

?>