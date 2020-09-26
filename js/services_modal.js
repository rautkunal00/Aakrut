$(document).ready(function () {

     // $('#availableWork').click(function(e){   
     //    e.preventDefault(); 
     //    var data = $('#serviceDetails').serialize();  
     //      $.ajax({  
     //           url:"php/insert_availableForWork.php",  
     //           method:"POST",  
     //           data: data,  
     //           success:function(data)  
     //           {    
     //               alert("successfully added!!!"+data);
     //           }  
     //      });  
     // });  

     $("#serviceDetails").validate({
          submitHandler: function (form) {
               var data = ""
               $.getJSON('data/filter1.json', function (jdata) {
                    $.each(jdata, function (key, value) {
                         if (value.id == $('#serviceDetails #colleges').val()) {
                             data = $('#serviceDetails').serialize()+"&College_Name="+value.name;
                         }
                    });
               }).then(
                    ()=>{
                         $.ajax({
                              url: "php/insert_availableForWork.php",
                              method: "POST",
                              data: data,
                              success: function (data) {
                                   serviceDetails.reset();
                                   alert("successfully added!!!" + data);
                              }
                         });
                    }
               )
               
          }
     });
});


