// 
$(document).ready(function () {
    $('#submit_profile').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'php/signup.php',
            type: "post",
            data: $('#productDetails').serialize(),
            success: function (result) {
                if (result == 1) {
                    location.href = "profile.php"
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

    $('#logout').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: 'php/logout.php',
            type: "post",
            success: function (result) {
                if (result == 1) {
                    location.href = "index.php"
                }else {
                    console.log(result);
                    alert("Something went wrong");
                }
            }
        })
    })

    
})