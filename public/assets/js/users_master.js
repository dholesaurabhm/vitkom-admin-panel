//  function validateForm() {
//             let form = document.forms["employeeForm"];
//             let name = form.elements["employee_name"].value.trim();
//             let email = form.elements["emplyee_mail_id"].value.trim();
//             let password = form.elements["password_input"].value;
//             let joiningDate = form.elements["employee_joining_date"].value;
//             let endDate = form.elements["employee_end_date"].value;

//             if (!/^[a-zA-Z]+$/.test(name)) {
//                 alert('Name should contain only letters');
//                 return false;
//             }

//             if (name === '' || email === '' || password === '' || joiningDate === '') {
//                 alert('Please fill in all required fields.');
//                 return false;
//             }

//             saveuser();

//             return true;
//         }


        function saveuser()
        {
          if($('#name').val() !='' && $('#email').val() !='' && $('#password').val() !='' && $('#joining_date').val() !='')
          {
              if($('#user_id').val() =='')
              {
                  url=base_url+"user/create"
              }
              else{
                  url=base_url+"user/update/"+$('#user_id').val()
              }
              $.ajax({
                  type: "POST",
                  url: url,
                  data: $('#employeeForm').serialize(),
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


        function edituser(id)
        {
          console.log(id)
          $.ajax({
            type: "POST",
            url: base_url+"user/show",
            data: {user_id:id},
            success: function(result) {
                console.log("ajax data=", result)
                if(result.success==true)
                {
                  $('#user_id').val(result.data.id);
                  $('#name').val(result.data.name);
                  $('#email').val(result.data.email);
                  $('#password').val(result.data.normal_password);
                  $('#joining_date').val(result.data.joining_date);
                  $('#end_date').val(result.data.end_date);
                  $('#status').val(result.data.status);
                  $('#userModel').modal('show');
                }      
              
            },
            error: function(error) {
                toast_error(error.responseJSON.message)
             }
            });
        }
        