// 
$(document).ready(function(){
    $('#add_btn').prop( "disabled", true );
    $('#save_changes').prop( "disabled", true );
    $('#item_table').hide();
    $('#submit_sell').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'php/validateuser.php',
            type:"post",
            data:$('#productDetails').serialize(),
            success:function(result){
                if(result==1){
                    $('#item_table').show();
                    $('#add_btn').prop( "disabled", false );
                    $('#submit_sell').hide();
                    $('#save_changes').prop( "disabled", false );
                    // alert(result);
                }else if(result==2){
                    alert("You are not registered! Plese register first");
                }else{
                    alert("Something is wrong! Please try again"+result);
                }
            }
        })

    }) 
    $('#save_changes').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'php/addproduct.php',
            type:"post",
            data: new FormData(document.getElementById('productDetails')),
            contentType: false,
            cache: false,
            processData:false,
            success:function(result){
                if(result==1){
                    $('#productDetails')[0].reset();
                    $('#item_table').hide();
                    $('#Email_Id_add').prop( "disabled", false );
                    $('#add_btn').prop( "disabled", true );
                    $('#submit_sell').show();
                    $('#save_changes').prop( "disabled", true );
                    // alert(result);
                }else if(result==2){
                    alert("You are not registered! Plese register first "+result);
                }else{
                    alert("Something is wrong! Please try again "+result);
                }
            }
        })
    })

})