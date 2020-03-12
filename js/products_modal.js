$(document).ready(function () {
  var count = 0;
  var quantity = 0;
  $(document).on('click', '.add', function () {
    count++;
    quantity++;
    var html = '';
    html += '<tr>';
    html += '<th scope="row"><input type="number" name="quantity" readonly class="form-control form-control-sm input-number quantity" value="1"></th>';
    html += '<td><input type="text" name="Product_Name' + quantity + '" required class="form-control form-control-sm Product_Name"></td>';
    html += '<td><input type="file" name="Product_Img' + quantity + '" required class="form-control-file Product_Img"></td>';
    html += '<td><select class="form-control form-control-sm Region" name="Region' + quantity + '" id="Route_modal' + quantity + '"></select></td>';
    html += '<td><select class="form-control" name="College_Name' + quantity + '" id="college' + quantity + '"><option value="">Select College</option></select></td>';
    html += '<td><input type="text" name="Branch' + quantity + '" required class="form-control form-control-sm Branch"></td>';
    html += '<td><input type="text" name="Semester' + quantity + '" required class="form-control form-control-sm Semester"></td>';
    html += '<td><input type="text" name="Subject' + quantity + '" required class="form-control form-control-sm Subject"></td>';
    html += '<td><input type="text" name="Price' + quantity + '" required class="form-control form-control-sm Price"></td>';
    html += '<td><select name="Type' + quantity + '" required class="form-control-sm Type"><option>Study Material</option><option>Stationary</option><option>Reference Books</option></select>';
    html += '<td><input type="text" name="Description' + quantity + '" required class="form-control form-control-sm Description"></td>';
    html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button></td>';
    $('tbody').append(html);
    $('.quantity')[quantity - 1].value = quantity;
    load_json_data('Route_modal' + quantity + '',"",quantity);

    $(document).on('change', '#Route_modal' + quantity + '', function () {
      var Route_id = $(this).val();
      if (Route_id != '') {
        load_json_data('college' + quantity + '', Route_id);
      }
      else {
        $('#college').html('<option value="">Select college</option>');
      }
    });
  });

  $(document).on('click', '.remove', function () {
    $(this).closest('tr').remove();
    var tempquantity = quantity - 1;
    while (tempquantity != 0) {
      $('.quantity')[tempquantity - 1].value = tempquantity;
      tempquantity--;
    }

    if (quantity > 0) {
      quantity--;
    }
  });




  function load_json_data(id, parent_id,no) {
    var html_code = '';
    $.getJSON('data/filter1.json', function (data) {
      html_code += '<option value="">Select ' + id + '</option>';
      $.each(data, function (key, value) {
        if (id == 'Route_modal'+no+'') {
          if (value.parent_id == '0') {
            html_code += '<option value="' + value.id + '">' + value.name + '</option>';
          }
        }
        else {
          if (value.parent_id == parent_id) {
            html_code += '<option value="' + value.id + '">' + value.name + '</option>';
          }
        }
      });
      $('#' + id).html(html_code);
    });
  }




});



