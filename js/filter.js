$(document).ready(function () {
    //collect variable for filter
    var action = "post";
    var minimum_price = "";
    var maximum_price = "";
    var route = "";
    var college = "";
    var branch = "";
    var semester = "";
    var subject = "";
    var type = "";
    var sortPrice = "";

    //slider filter
    $('#price_range').slider({
        range: true,
        min: 10,
        max: 1000,
        values: [10, 1000],
        step: 5,
        stop: function (event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            fireQuery();
        }
    });

    $("#Route").change(function () {
        fireQuery();
    });
    $("#college").change(function () {
        fireQuery();
    });
    $("#branches").change(function () {
        fireQuery();
    });
    $("#semester").change(function () {
        fireQuery();
    });
    $("#subject").change(function () {
        fireQuery();
    });
    $("#subject").change(function () {
        fireQuery();
    });
    //checkbox filter
    $('.common_selector').click(function () {
        fireQuery();
    });
    $("#price").change(function () {
        fireQuery();
    });

    fireQuery();


    


    function getvariables() {
        //update variable for filter
        action = "post";
        minimum_price = $('#hidden_minimum_price').val();
        maximum_price = $('#hidden_maximum_price').val();
        route = $('#Route').val();
        branch = $('#branches').val();
        college = $('#college').val();
        semester = $('#semester').val();
        subject = $('#subject').val();
        type = get_filter('type');
        sortPrice = $('#price').val();
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
            url: "./php/fetch_data.php",
            method: "POST",
            data: {
                action: action,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                route: route,
                college: college,
                branch: branch,
                semester: semester,
                subject: subject,
                type: type,
                sortPrice: sortPrice
            },
            success: function (data) {
                $('.filter_data').html(data);
                var obj = $(".product-card");
                $('#pagination').pagination({
                    dataSource: $.map(obj, function(value, index){return [value];}),
                    pageSize: 8,
                    pageNumber: 1,
                    callback: function(data, pagination) {
                        // template method of yourself
                        $('.filter_data').html(data);
                        $('.buyBtn').click(function () {
                            var productID = this.parentElement.id;
                            user_info_product(productID);
                        });
                        $.getJSON('data/filter1.json', function (data) {
                            $.each(data, function (key, value) {
                              $(`.clg_name.${value.id}`).html("College name: "+value.name);
                            })
                          });
                    }
                })
            }
        });
    }

    function user_info_product(productID) {
        $.ajax({
            url: "./php/get_user_info.php",
            method: "POST",
            data: {
                productID: productID
            },
            success: function (data) {
                // alert(data);
                $('#'+productID+'.card-body').append(data);
                $('#'+productID+'.card-body .buyBtn').prop( "disabled", true );
            }
        });
    }

})




