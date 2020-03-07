// $(document).ready(function(){

//   filter2_data();

//   function filter2_data()
//   {
//       $('.filter2_data').html('<div class="d-flex justify-content-center"><div class="spinner-grow" role="status"><span class="sr-only">Loading...</span></div></div>');
//       var action = 'fetch2_data';
//       var Service_Type = get_filter('Service_Type');
//       $.ajax({
//           url:"./php/fetch2_data.php",
//           method:"POST",
//           data:{action:action, Service_Type:Service_Type},
//           success:function(data){
//               $('.filter2_data').html(data);
//           }
//       });
//   }

//   function get_filter(class_name)
//   {
//       var filter = [];
//       $('.'+class_name+':checked').each(function(){
//           filter.push($(this).val());
//       });
//       return filter;
//   }


//   $('.selector').click(function(){
//       filter2_data();
//   });

  
//   });

