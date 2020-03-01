$(document).ready(function(){

    load_json_data('Routes');

    function load_json_data(id, parent_id)
      {
        var html_code = '';
        $.getJSON('data/filter1.json', function (data) 
         {
            html_code += '<option value="">Select '+id+'</option>';
            $.each(data, function(key, value){
              if(id == 'Routes')
                {
                  if(value.parent_id == '0')
                    {
                      html_code += '<option value="'+value.name+'" data-id="'+value.id+'">'+value.name+'</option>';
                    }
                }
              else
                {
                  if(value.parent_id == parent_id)
                    {
                      html_code += '<option value="'+value.name+'" data-id="'+value.id+'">'+value.name+'</option>';
                    }
                }
            });
            $('#'+id).html(html_code);
         });
      }

    $(document).on('change', '#Routes', function(){
      var Route_id = $(this).val();
      if(Route_id != '')
        {
          load_json_data('colleges', Route_id);
        }
      else
        {
          $('#colleges').html('<option value="">Select college</option>');
        }
      });
  });