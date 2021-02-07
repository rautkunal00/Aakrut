<!doctype html>

<?php
session_start();
?>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include 'php/hlinks.php'; ?>
  <title>Aakrut</title>
</head>

<body>

  <?php include 'php/navbar.php'; ?>
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

              <input class="btn btn-primary mb-4" type="submit" name="submit_profile" id="submit_profile" value="Submit">

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
  <!-- /.Modal -->


  <div class="">
    <div id="about" class="m-5">
      <h2 class="text-capitalize">About Us</h2>
      <p>It’s an Aakrut, We are helps you to sell/shared or buy books,stationary and other study material in a best price for you and your pocket also. Aakrut knows the importance of the education in your life. Aakrut helps you to get best and premium quality of the products which demanding more in your beautiful life with price comparing show for you. The products we provide are good in rating and low in budget. Aakrut also provide the services which try to make your academic and professional life easy and meaningful. We are connecting the nearby people around you to get a better quality of service in sutaible time period to get your job done.</p>
    </div>
  </div>


  <?php include 'php/footer.php'; ?>
  <?php include 'php/flinks.php'; ?>
  <script type="text/javascript" src="js/filter.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/signup.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/sell_product.js"></script>

</body>

</html>