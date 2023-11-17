// function validateClientForm() {
//     var ClientName = form.elements('ClientName').value;
//     var phone = form.elements('phone').value;
//     var emailid = form.elements('emailid').value;
//     var pancard = form.elements('pancard').value;
//     var Aadhar = form.elements('Aadhar').value;
//     var dateofBirth = form.elements('dateofBirth').value;
//     var gender = form.elements('gender').value;

//     if (ClientName.trim() === '') {
//         alert('Please enter a Name');
//         return false;
//     }
    
//     if (phone.trim() === '' || !phone.match(/[0-9]{3}-[0-9]{2}-[0-9]{3}/)) {
//         alert('Please enter a valid Mobile Number (e.g., XXX-XX-XXX)');
//         return false;
//     }
    
//     if (emailid.trim() === '') {
//         alert('Please enter an Email ID');
//         return false;
//     }
    
//     if (pancard.trim() === '') {
//         alert('Please enter a Pancard Number');
//         return false;
//     }

//     if (Aadhar.trim() === '') {
//         alert('Please enter an Aadhar Number');
//         return false;
//     }

//     if (dateofBirth.trim() === '') {
//         alert('Please enter a Date of Birth');
//         return false;
//     }

//     return true; 
// }


function saveclient()
        {
          if($('#name').val() !='' && $('#email').val() !='' && $('#mobile_no').val() !='' && $('#pan_no').val() !='' && $('#aadhar_no').val() !='' && $('#dob').val() !='' && $('#gender').val() !='')
          {
            if ($('#mobile_no').val() === '' || !$('#mobile_no').val().match(/[0-9]{3}[0-9]{2}[0-9]{3}/)) {
                toast_error('Please enter a valid Mobile Number (e.g., XXX-XX-XXX)');
                return false;
            }
            // var aadhar_regex = /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/;
            // if (!aadhar_regex.test($("#aadhar_no").val())) {
            //     toast_error("Please Enter Valid Aadhar card No.");
            //     return false;
            // }
            // var pan_regex = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
            // if (!pan_regex.test($("#pan_no").val())) {
            //     toast_error("Please Enter Valid Aadhar card No.");
            //     return false;
            // }
              if($('#client_id').val() =='')
              {
                  url=base_url+"client/create"
              }
              else{
                  url=base_url+"client/update/"+$('#client_id').val()
              }
              $.ajax({
                  type: "POST",
                  url: url,
                  data: $('#clientForm').serialize(),
                  success: function(result) {
                      console.log("ajax data=", result)
                      if(result.success==true)
                      {
                          $('#client_table').DataTable().ajax.reload();
                      }      
                     $('#clientModel').modal('hide');
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
              toast_error('Please Fill the Inputs');
          }
        }


        function editclient(id)
        {
          console.log(id)
          $.ajax({
            type: "POST",
            url: base_url+"client/show",
            data: {client_id:id},
            success: function(result) {
                console.log("ajax data=", result)
                if(result.success==true)
                {
                  $('#client_id').val(result.data.id);
                  $('#name').val(result.data.name);
                  $('#email').val(result.data.email);
                  $('#mobile_no').val(result.data.mobile_no);
                  $('#pan_no').val(result.data.pan_no);
                  $('#aadhar_no').val(result.data.aadhar_no);
                  $('#dob').val(result.data.dob);
                  $('#gender').val(result.data.gender)
                  $('#clientModel').modal('show');
                }      
              
            },
            error: function(error) {
                toast_error(error.responseJSON.message)
             }
            });
        }


        function deletemodel(id)
        {
            console.log(id)
            $('#removeClient').modal('show');
              $("#delete-client").replaceWith('<a href="#" class="btn btn-danger m-2" id="delete-table" onclick="deleteClient('+id+')">Yes, Delete it</a>');
        }
    
        function deleteClient(id)
          {
              $('#removeClient').modal('hide');
            $.ajax({
                    type: "POST",
                    url: base_url+"client/delete",
                    data: {client_id:id},
                    success: function(result) {
                        console.log("ajax data=", result)
                        if(result.success==true)
                        {
                            $('#client_table').DataTable().ajax.reload();
                        }      
                        toast_success(result.message)
                    },
                    error: function(error) {
                        console.log(error)
                        toast_error(error.responseJSON.message)
                     }
                    });
        
          }
    
        