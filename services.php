<?php 

//index.php

include('php/database_connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include 'php/hlinks.php';?>
    <title>Aakrut</title>
  </head>
  <body>

  <?php include 'php/navbar.php';?>

  <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-2 border">
 
        <h5 class="text-capitalize my-3">Filters</h5>

        <div class="form-group">  
          <label for="route">Route</label>
          <select class="form-control" id="Route">
          </select>
        </div>

        <div class="form-group">  
          <label for="college">College</label>
          <select class="form-control" id="college">
            <option value="">Select College</option>
          </select>
        </div>

        <div class="form-group">   
          <label for="branch">Branch</label>
          <select class="form-control" id="branches">
            <option value="">Select Branch</option> 
          </select>
        </div>

        <div class="form-group">
          <label for="text-capitalize">Services</label>
          <?php
            $query = "SELECT DISTINCT(Service_Type) FROM services ORDER BY Service_Id DESC";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach($result as $row)
              {
          ?>
                <div class="checkbox">
                   <label><input type="checkbox" class="selector Service_Type" value="<?php echo $row['Service_Type']; ?>"  > <?php echo $row['Service_Type']; ?></label>
                </div>
          <?php
              }
          ?>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModalLong">
                    I am available for work
        </button>

      </div>
      <!-- /.col-lg-2 -->
      
      <div class="col-lg-10">

        <div class="border-top p-3">
          <div class="row filter2_data"></div>
        </div>


      </div>
      <!-- /.col-lg-10 -->

    </div> 
    <!-- /.row -->

  </div>
  <!-- /.container -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          
          <div class="modal-header">
            <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Available for work</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="box border p-3">

              <form name="serviceDetails" id="serviceDetails" autocomplete="on">

                <div class="form-group row">
                  <label for="email" class="col-sm-4">Email Id</label>
                  <div class="col">
                    <input type="email" class="form-control col-sm-11" required name="Email_Id" id="Email_Id" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus>
                    <small id="itemcheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-4">Name</label>
                  <div class="col">
                    <input type="text" class="form-control col-sm-11" required name="User_Name" id="User_Name" aria-describedby="User_NameHelp" placeholder="Enter Name">
                    <small id="namecheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edu" class="col-sm-4">Mobile</label>
                  <div class="col">
                    <input type="number" class="form-control col-sm-11" required name="User_Mobile" minlength=10 id="User_Mobile" aria-describedby="User_MobileHelp" placeholder="Enter mobile number">
                    <small id="educheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="service" class="col-sm-4">Service</label>
                  <div class="col">
                    <select class="form-control col-sm-11" name="Service_Type" id="Service_Type" required>
                      <option>Assingment Writing</option>
                      <option>Mini Project</option>
                      <option>Final Year Project</option>
                      <option>Drawing</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="description" class="col-sm-4">Description</label>
                  <div class="col">
                    <textarea class="form-control col-sm-11" required rows="3" name="Description" id="Description" aria-describedby="DescriptionHelp" placeholder="Enter Description"></textarea>
                    <small id="namecheck"></small>
                  </div>
                </div>

                <div class="form-group row">  
                  <label for="route" class="col-sm-4">Route</label>
                  <div class="col">
                    <select class="form-control col-sm-11" id="Routes" name="Region" required>
                    </select>
                  </div>
                </div>

                <div class="form-group row">  
                  <label for="college" class="col-sm-4">College</label>
                  <div class="col">
                    <select class="form-control col-sm-11" id="colleges" name="College_Id" required>
                      <option value="">Select College</option>
                    </select>
                  </div>
                </div>
   

                <input class="btn btn-primary" type="submit" name="submit" id="availableWork" value="Submit">
              </form> 

            </div>
          </div>

          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div> -->

        </div>
      </div>
    </div>
  <!-- /.Modal -->
  <script src="js/detail.js"></script>
  <script src="js/filter_service.js"></script>

  <?php include 'php/footer.php';?>
  <?php include 'php/flinks.php';?>

 </body>
</html>