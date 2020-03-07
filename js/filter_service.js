$(document).ready(function () {
    //collect variable for filter
    var action = "post";
    var route = "";
    var college = "";
    var branch = "";
    var Service_Type = "";


    $("#Route").change(function () {
        fireQuery();
    });
    $("#college").change(function () {
        fireQuery();
    });
    $("#branches").change(function () {
        fireQuery();
    });
    //checkbox filter
    $('.selector').click(function () {
        fireQuery();
    });

    fireQuery();





    function getvariables() {
        //update variable for filter
        action = "post";
        route = $('#Route').val();
        branch = $('#branches').val();
        college = $('#college').val();
        Service_Type = get_filter('Service_Type');
    }
    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }
    function fireQuery() {
        getvariables();
        $.ajax({
            url: "./php/fetch2_data.php",
            method: "POST",
            data: {
                action: action,
                route: route,
                college: college,
                branch: branch,
                Service_Type: Service_Type
            },
            success: function (data) {
                $('.filter2_data').html(data);
            }
        });
    }

})




