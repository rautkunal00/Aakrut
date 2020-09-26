// 
$(document).ready(function(){ 
    var otp = "";
    $('#signupNext').hide();
    $('#otpNext').hide();
    $('#otp_err').hide();
    $('#otp_succ').hide();

    $("#signupform").validate({
        submitHandler: function(form) {
            $.ajax({
                url:'php/signup.php',
                type:"post",
                data:$('#signupform').serialize(),
                success:function(result){
                    if(result==1){
                        alert("You are already registerd");
                    }
                    else if(result){
                        console.log(result);
                        otp = result;
                        $('#signup').prop( "disabled", true );
                        $('#signupNext').show();
                        alert("Form submitted successfully");
                    }else{
                        console.log(result);
                        $('#signupNext').hide();
                        alert("Something is wrong! Please try again"+result);
                    }
                }
            })
        }
       });

    
    $('#otpVerify').click(function(e){
        e.preventDefault();
       console.log($('#otpinput')[0].value);
       console.log(otp);
       console.log($('#otpinput')[0].value==otp);
       if($('#otpinput')[0].value==otp){
        $.ajax({
            url:'php/signup.php',
            type:"post",
            data:$('#signupform').serialize()+"&Create_user=true",
            success:function(result){
                if(result==1){
                    alert("You are already registerd");
                }
                else if(result){
                    console.log(result);
                    $('#otpNext').show();
                    $('#otpVerify').hide();
                    $('#otpinput').prop( "disabled", true );
                    $('#otp_err').hide();
                    $('#otp_succ').show();
                }else{
                    console.log(result);
                }
            }
        })
            
        }else{
            $('#otp_err').show();

       }
    })

})