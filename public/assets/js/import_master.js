function showreportmodel(form)
{
    console.log(form)
   // $('#employeeForm')[0].reset()
    $('#'+form).modal('show');
}


function savefile(form_name)
{
    var form_type=$('#'+form_name+' [name=file_type]').val();
    var formData = new FormData($('#'+form_name)[0]);
  if(form_type !='')
  {
    url=base_url+"importTransaction"
      
      $.ajax({
          type: "POST",
          url: url,
          data: formData,
          processData: false,
          contentType: false,
          success: function(result) {
              console.log("ajax data=", result)
              if(result.success==true)
              {
                  $('#user_table').DataTable().ajax.reload();
              }      
             $('#userModel').modal('hide');
             toast_success(result.message)
          },
          error: function(xhr, status, error) {
              let errors_msg="";
              $.each( xhr.responseJSON.errors, function( key, value ) {
                          errors_msg+=`${value}\n`;
               });
              toast_error(errors_msg)
           }
          });
  }
  else{
      toast_error('Please Fill the Form');
  }
}


function deletemodel(id)
        {
            console.log(id)
            $('#removeTransaction').modal('show');
              $("#delete-transaction").replaceWith('<a href="#" class="btn btn-danger m-2" id="delete-table" onclick="deleteTransaction('+id+')">Yes, Delete it</a>');
        }
    
        function deleteTransaction(id)
          {
              $('#removeTransaction').modal('hide');
            $.ajax({
                    type: "POST",
                    url: base_url+"deleteTransaction",
                    data: {transaction_id:id},
                    success: function(result) {
                        console.log("ajax data=", result)
                        if(result.success==true)
                        {
                            $('#import_table').DataTable().ajax.reload();
                        }      
                        toast_success(result.message)
                    },
                    error: function(error) {
                        console.log(error)
                        toast_error(error.responseJSON.message)
                     }
                    });
        
          }