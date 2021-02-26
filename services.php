<?php 

//index.php
session_start();

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
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href=product.php><img class="d-block w-100" src="images/index_img/products.jpeg" alt="First slide"></a>
      </div>
      <div class="carousel-item">
        <a href=services.php><img class="d-block w-100 " src="images/index_img/services.jpeg" alt="Second slide"></a>
      </div>
      <div class="carousel-item">
        <a><img class="d-block w-100 " src="images/index_img/college-library.jpg" alt="Third slide"></a>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Modal -->
  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Sell your product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="box border p-3">

            <form name="productDetails" id="productDetails" autocomplete="on" enctype="multipart/form-data" method="post">

              <div class="form-group row">
                <label for="email" class="col-sm-1">Email Id:</label>
                <div class="col">
                  <input type="email" class="form-control col-sm-4" required name="Email_Id" id="Email_Id_add" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus>
                  <small id="itemcheck"></small>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-1">Password</label>
                <div class="col">
                  <input type="password" class="form-control col-sm-4" required name="Password" id="Password_add" placeholder="Enter Password">
                  <small id="itemcheck"></small>
                </div>
              </div>

              <input class="btn btn-primary mb-4" type="submit" name="login_profile" id="login_profile" value="Submit">

              <!-- <div class="table-responsive">
                  <span id="error"></span>
                  <table class="table table-bordered table-sm" id="item_table">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Region</th>
                        <th scope="col">College</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Description</th>
                        <th><button type="button" name="add" class="btn btn-success btn-sm add" id="add_btn"><i class="fas fa-plus"></i></button></th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div> -->


            </form>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_changes">Save changes</button>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade signup-modal-xl" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Sign up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="box border p-3">

            <form id="signupform" method="post" autocomplete="on">

              <div class="form-group row">
                <label for="email" class="col-sm-1">Email Id:</label>
                <div class="col">
                  <input type="email" class="form-control col-sm-4" required name="Email_Id" id="Email_Id" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus>
                  <small id="itemcheck"></small>
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-1">Name:</label>
                <div class="col">
                  <input type="text" class="form-control col-sm-4" required name="User_Name" id="User_Name" aria-describedby="User_NameHelp" placeholder="Enter Name">
                  <small id="namecheck"></small>
                </div>
              </div>

              <div class="form-group row">
                <label for="edu" class="col-sm-1">Mobile:</label>
                <div class="col">
                  <input type="number" class="form-control col-sm-4" required name="User_Mobile" id="User_Mobile" minlength=10 aria-describedby="User_MobileHelp" placeholder="Enter mobile number">
                  <small id="educheck"></small>
                </div>
              </div>
              <input class="btn btn-primary text-capitalize mb-4" type="submit" name="signup" id="signup" value="Submit">
              <input class="btn btn-primary text-capitalize mb-4" type="submit" name="next" id="signupNext" data-toggle="modal" data-target=".otp-modal-xl" data-dismiss="modal" value="Next">


            </form>

          </div>
        </div>

        <div class="modal-footer">

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade otp-modal-xl" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Verify your Email ID</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="box border p-3">

            <form name="otpCheck" id="otpCheck" autocomplete="on">
              <div class="alert alert-danger" id="otp_err">
                OTP does not match.
              </div>
              <div class="alert alert-success" id="otp_succ">
                <strong>Success!</strong> OTP match successfully.
              </div>
              <p>Enter OTP send to your Email ID</p>
              <div class="form-group row">
                <label for="email" class="col-sm-1">OTP:</label>
                <div class="col">
                  <input class="form-control col-sm-4" required name="otp" id="otpinput" placeholder="Enter OTP" autofocus>
                  <small id="itemcheck"></small>
                </div>
              </div>

              <input class="btn btn-primary" type="submit" name="otpVerify" id="otpVerify" value="Verify">
              <input class="btn btn-primary" type="submit" name="otpNext" id="otpNext" data-toggle="modal" data-target=".bd-example-modal-xl" data-dismiss="modal" value="Next">
            </form>

          </div>
        </div>

        <div class="modal-footer">

        </div>

      </div>
    </div>
  </div>



  <div class="modal fade start-modal-xl" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title text-capitalize" id="exampleModalScrollableTitle">Sell your product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="box border p-3">

            <p>Are you a new user?</p>
            <p>Please signup for proceed further</p>
            <button type="button" class="btn btn-primary text-capitalize mb-4" data-toggle="modal" data-target=".signup-modal-xl" data-dismiss="modal">
              Sign Up
            </button>
            <p>Already register?</p>
            <button type="button" class="btn btn-primary text-capitalize mb-4" data-toggle="modal" data-target=".bd-example-modal-xl" data-dismiss="modal">
              Sell product
            </button>
          </div>
        </div>

        <div class="modal-footer">

        </div>

      </div>
    </div>
  </div>

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
        <!-- <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModalLong">
                    I am available for work
        </button> -->

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
                    <input type="email" class="form-control col-sm-11" required name="Email_Id" id="Email_Id" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus value=<?php echo $_SESSION['Email_Id'] ?> disabled>
                    <small id="itemcheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="name" class="col-sm-4">Name</label>
                  <div class="col">
                    <input type="text" class="form-control col-sm-11" required name="User_Name" id="User_Name" aria-describedby="User_NameHelp" placeholder="Enter Name"  value=<?php echo $_SESSION['User_name'] ?> disabled>
                    <small id="namecheck"></small>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="edu" class="col-sm-4">Mobile</label>
                  <div class="col">
                    <input type="number" class="form-control col-sm-11" required name="User_Mobile" minlength=10 id="User_Mobile" aria-describedby="User_MobileHelp" placeholder="Enter mobile number" value=<?php echo $_SESSION['Mobile_No'] ?>>
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
  <script type="text/javascript" src="js/login.js"></script>

  <?php include 'php/footer.php';?>
  <?php include 'php/flinks.php';?>

 </body>
</html>