// 
$(document).ready(function () {
    $('#submit_Login').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'php/login.php',
            type: "post",
            data: $('#LoginForm').serialize(),
            success: function (result) {
                if (result == 1) {
                    alert("You are already registerd");
                }
                else if (result) {
                    console.log(result);
                    location.href = "index.php"
                } else {
                    console.log(result);
                    alert("Username and passwoed is incorrect");
                }
            }
        })
    })
    $('#Login_nav').click(function (e) {
        console.log($('#Login_nav').html())
        var isLogout = ""+$('#Login_nav').html();
        if(isLogout=="Logout "){
            $.ajax({
                url: 'php/logout.php',
                type: "post",
                success: function (result) {
                    console.log(result)
                    location.href = "index.php"
                }
            })
        }else if($('#Login_nav').html()=="Login"){
           
        }
        
    })

    
})