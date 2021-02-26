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
    var p_prod = 1;
    var p_service = 2;

    fireQuery2();


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
        p_prod = 0;
        p_service = 0
        fireQuery();
        fireQuery3();
        fireQuery4();
    });
    $("#price").change(function () {
        fireQuery();
        fireQuery3();
    });

    fireQuery();
    fireQuery3();
    fireQuery4();





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
        if (type.length == 0) { p_prod = 3; p_service = 3 }
        if (type.includes("My services")) { p_service = 2; }
        if (type.includes("My products")) { p_prod = 1; }
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
                    dataSource: $.map(obj, function (value, index) { return [value]; }),
                    pageSize: 8,
                    pageNumber: 1,
                    callback: function (data, pagination) {
                        $('.buyBtn').click(function () {
                            var productID = this.parentElement.id;
                            user_info_product(productID);
                        });
                        $.getJSON('data/filter1.json', function (info) {
                            $.each(info, function (key, value) {
                                ($(`.clg_name`).length) ? $(`.clg_name.${value.id}`).html("College name: " + value.name) : "";
                            })
                        });
                    }
                })
            }
        });
    }

    function fireQuery2() {
        getvariables();
        $.ajax({
            url: "./php/fetch_data_only.php",
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
                var min_price = 10
                var max_price = 10;

                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    max_price = (max_price >= parseInt(value.Price)) ? max_price : parseInt(value.Price);;
                })
                console.log(max_price)
                //slider filter
                $('#price_show').html(min_price + ' - ' + max_price);
                $('#hidden_minimum_price').val(min_price);
                $('#hidden_maximum_price').val(max_price);
                $('#price_range').slider({
                    range: true,
                    min: min_price,
                    max: max_price,
                    values: [min_price, max_price],
                    step: 5,
                    stop: function (event, ui) {
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        fireQuery();
                    }
                });
            }
        });
    }


    // Profile code 
    function fireQuery3() {
        getvariables();
        $.ajax({
            url: "./php/fetch_data_profile.php",
            method: "POST",
            data: { sortPrice: sortPrice, prod_service: p_prod },
            success: function (data) {
                if (data == 404) {
                    
                } else {
                    $('.filter_data_profile').html(data);
                    var obj = $(".product-card");
                    $('#pagination').pagination({
                        dataSource: $.map(obj, function (value, index) { return [value]; }),
                        pageSize: 8,
                        pageNumber: 1,
                        callback: function (data, pagination) {
                            $('.buyBtn').click(function () {
                                var productID = this.parentElement.id;
                                user_info_product(productID);
                            });
                            $.getJSON('data/filter1.json', function (info) {
                                $.each(info, function (key, value) {
                                    ($(`.clg_name`).length) ? $(`.clg_name.${value.id}`).html("College name: " + value.name) : "";
                                })
                            });
                        }
                    })

                }
            }
        });
    }
    function fireQuery4() {
        getvariables();
        $.ajax({
            url: "./php/fetch_data_profile.php",
            method: "POST",
            data: { action: action, prod_service: p_service },
            success: function (data) {
                if (data == 404) {
                    $('.filter_data_services').html("<h3>No Data Found</h3>");
                } else {
                    $('.filter_data_services').html(data);
                }
                if (p_service == 3) {
                    $('.filter_data_services').html("");
                }
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
                $('#' + productID + '.card-body.product').append(data);
                $('#' + productID + '.card-body.product .buyBtn').prop("disabled", true);
            }
        });
    }

})




