// $(document).ready(function(){

//   filter_data();
  
// //   function filter_data()
// //   {
// //       $('.filter_data').html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
// //       var action = 'fetch_data';
// //       var minimum_price = $('#hidden_minimum_price').val();
// //       var maximum_price = $('#hidden_maximum_price').val();
// //       var type = get_filter('type');
// //       $.ajax({
// //           url:"./php/fetch_data.php",
// //           method:"POST",
// //           data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, type:type},
// //           success:function(data){
// //               $('.filter_data').html(data);
// //           }
// //       });
// //   }

//   function get_filter(class_name)
//   {
//       var filter = [];
//       $('.'+class_name+':checked').each(function(){
//           filter.push($(this).val());
//       });
//       return filter;
//   }


//   $('.common_selector').click(function(){
//       filter_data();
//   });

//   $('#price_range').slider({
//     range:true,
//     min:10,
//     max:65000,
//     values:[10, 65000],
//     step:500,
//     stop:function(event, ui)
//     {
//         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
//         $('#hidden_minimum_price').val(ui.values[0]);
//         $('#hidden_maximum_price').val(ui.values[1]);
//         filter_data();
//     }
// });
 
  
//   });

//   //  $price = isset($_GET['price']);
// // //  $query = "SELECT * FROM products ORDER BY Product_Id ".$price ;

// // if(isset($_POST["$price"]))  
// //     { 
// //       $i = 0;
// //       if($_REQUEST['price'] == "lowToHigh ")
// //       {
// //       $choice = "lowToHigh";
// //       }
// //       else 
// //       {
// //         $choice = "highToLow";
// //       }//and so on
      
// //       $query = ("SELECT * FROM Products ORDER BY ".$choice);
      
// //           //   if(['$price'] == "highToLow") {
// //           //     $query = "SELECT * from Products
// //           //      ORDER BY Product_Id DESC";
// //           //   } elseif(['$price'] == "lowToHigh") {
// //           //     $query = "SELECT * from Products
// //           //      ORDER BY Product_Id ASC";
// //           //   }
      
// //           // }


// //     } 