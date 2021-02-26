<?php
session_start();
//index.php

include('php/database_connection.php');
// include('php/fetch_data.php');

//for total count data
$countSql = "SELECT COUNT(Product_Id) FROM products";
$tot_result = $connect->prepare($countSql);
$tot_result->execute();
$row = $tot_result->fetchAll();
$total_records = $tot_result->rowCount();

// $total_records = $row[0];  
// $tot_result = mysqli_query($connect, $countSql);  
// $row = mysqli_fetch_row($tot_result);  
// $total_records = $row[0];  
$total_pages = ceil($total_records / $limit);

?>
<!doctype html>
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

  <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-2 border filter_bar">

        <h5 class="text-capitalize my-5">Hello <?php echo $_SESSION['User_Name'] ?></h5>
        <h5 class="text-capitalize my-3 mx-4">Filters</h5>

        <div class="form-group mx-4">
          <div class="checkbox">
            <label><input type="checkbox" class="common_selector type" value="My products" checked> My products</label>
          </div>

          <div class="checkbox">
            <label><input type="checkbox" class="common_selector type" value="My services" checked> My services</label>
          </div>

        </div>

        <!-- Button trigger modal -->
        <p class="mx-4"><button type="button" class="btn btn-primary text-capitalize" data-toggle="modal" data-target=".bd-example-modal-xl">
            Add product
          </button></p>

        <p class="mx-4"><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalLong">
            Add services
          </button></p>

      </div>
      <!-- /.col-lg-2 -->

      <div class="col-lg-10">

        <div class="row my-3">
          <div class="col-12">


            <div class="form-group float-right ">
              <select class="form-control mr-sm-2 rounded-0" id="price" name="sortby">
                <option class="text-capitalize hl" value="highToLow">Price: high to low</option>
                <option class="text-capitalize" value="lowToHigh">Price: low to high</option>
                <option class="text-capitalize" value="new">What's new</option>
              </select>
            </div>

          </div>
        </div>

        <div class="border-top p-3 product_page">
          <div class="row filter_data_profile"></div>
          <div class="row filter_data_services"></div>
        </div>

        <div id="target-content" class="clearfix">
        </div>

        <div aria-label="Page navigation example" id="pagination"></div>

      </div>
      <!-- /.col-lg-10 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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
                  <input type="email" class="form-control col-sm-4" required name="Email_Id" id="Email_Id_add" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus value=<?php echo $_SESSION['Email_Id']?>>
                  <small id="itemcheck"></small>
                </div>
              </div>


              <div class="table-responsive">
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
              </div>


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
            Sign In
            </button>
          </div>
        </div>

        <div class="modal-footer">

        </div>

      </div>
    </div>
  </div>
  <!-- /.Modal -->



  <!------------Service modal ----------------->
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
                  <input type="email" class="form-control col-sm-11 disabled" required name="Email_Id" id="Email_Id" aria-describedby="Email_IdHelp" placeholder="Enter Email Id" autofocus value=<?php echo $_SESSION['Email_Id'] ?>>
                  <small id="itemcheck"></small>
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-4">Name</label>
                <div class="col">
                  <input type="text" class="form-control col-sm-11 disabled" required name="User_Name" id="User_Name" aria-describedby="User_NameHelp" placeholder="Enter Name" value=<?php echo $_SESSION['User_Name'] ?> >
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

  <?php include 'php/footer.php'; ?>
  <?php include 'php/flinks.php'; ?>

  <script type="text/javascript">
    // $(document).ready(function(){
    //   jQuery("#target-content").load("php/response.php?page=1");
    // })

    jQuery("#pagination li").on('click', function(e) {
      e.preventDefault();
      jQuery("#target-content").html('loading...');
      jQuery("#pagination li").removeClass('active');
      jQuery(this).addClass('active');
      var pageNum = this.id;
      console.log(pageNum);
      jQuery(".filter_data").load("php/response.php?page=" + pageNum);
    });

    $('#sort').on('change', function() {
      $.post('php/fetch_data.php', {
        sort: $(this).val()
      }, function(response) {
        $('#sort-ajax').html(response);
      });
    });
  </script>
  <script type="text/javascript" src="js/filter.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
  <script type="text/javascript" src="js/signup.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/sell_product.js"></script>
  <!-- <script>
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$('#signupform').validate();</script> -->
</body>

</html>