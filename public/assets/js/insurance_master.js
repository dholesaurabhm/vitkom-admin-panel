// document.addEventListener('DOMContentLoaded', function () {
    
//     const schemeForm = document.querySelector('#scheme_modal form');

//     schemeForm.addEventListener('submit', function (event) {
//         const insuranceSchemeName = document.querySelector('#insurance_scheme_name');
//         const selectedCompany = document.querySelector('#scheme_modal select');

//         if (!insuranceSchemeName.value.trim()) {
//             alert('Please enter the Insurance Scheme Name.');
//             event.preventDefault(); 
//         }

//         if (!selectedCompany.value) {
//             alert('Please select an Insurance Company.');
//             event.preventDefault();
//         }
//     });

//     const insurerForm = document.querySelector('#insurer_modal form');

    
//     insurerForm.addEventListener('submit', function (event) {
//         const insuranceCompanyName = document.querySelector('#insurance_company_name');

//         if (!insuranceCompanyName.value.trim()) {
//             alert('Please enter the Insurance Company Name.');
//             event.preventDefault(); 
//         }
//     });
// });

$('input[type=radio][name=scheme_type]').change(function() {
    getinsurertype(this.value);
});

function showschememodel()
{
    $("#scheme_form")[0].reset()
   // $('.insurer_list').empty()
    $('input[name="scheme_type"][value=1]').prop('checked', true).trigger('change');
    // $("#scheme_form").find('select').val("");
    // $("#scheme_form").find('input:radio, input:checkbox, select').removeAttr('checked').removeAttr('selected');
    $('#scheme_modal').modal('show');
}

function save()
        {
          if($('#company_name').val() !='' )
          {
           
              if($('#insurer_id').val() =='')
              {
                  url=base_url+"insurer_master/create"
              }
              else{
                  url=base_url+"insurer_master/update/"+$('#insurer_id').val()
              }
              $.ajax({
                  type: "POST",
                  url: url,
                  data: $('#insurer_form').serialize(),
                  success: function(result) {
                      console.log("ajax data=", result)
                      if(result.success==true)
                      {
                        $('#insurer_form')[0].reset();
                        getinsurer()
                      }      
                     $('#insurer_modal').modal('hide');
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
              toast_error('Please Fill the Company Name');
          }
        }


 function getinsurer()
        {
          $.ajax({
            type: "POST",
            url: base_url+"insurer_master/show",
            data: {},
            success: function(result) {
                console.log("ajax data=", result)
            },
            error: function(error) {
                toast_error(error.responseJSON.message)
             }
            });
        }    
        
        
    function getinsurertype(type)
        {
            console.log(type)
          $.ajax({
            type: "POST",
            url: base_url+"insurer_master/show",
            data: {type:type},
            success: function(result) {
                console.log("ajax data=", result)
                if(result.success==true)
                {
                    var list = $(".insurer_list");
                    list.empty().append(new Option('Select Company Name',''))
                    $.each(result.data, function(index, item) {
                    list.append(`<option value="${item.id}">${item.company_name}</option>`);
                    });
                }      
              
            },
            error: function(error) {
                toast_error(error.responseJSON.message)
             }
            });
        } 


    function savescheme()
        {
          if($('#insurer_id').val() !='' && $('#scheme_name').val() !='' && $('#z').val() !='')
          {
           
              if($('#scheme_id').val() =='')
              {
                  url=base_url+"scheme_master/create"
              }
              else{
                  url=base_url+"scheme_master/update/"+$('#scheme_id').val()
              }
              $.ajax({
                  type: "POST",
                  url: url,
                  data: $('#scheme_form').serialize(),
                  success: function(result) {
                      console.log("ajax data=", result)
                      if(result.success==true)
                      {
                        $('#scheme_table').DataTable().ajax.reload();
                      }      
                     $('#scheme_modal').modal('hide');
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
              toast_error('Please Fill the All Details');
          }
        }    
        
        

        function editscheme(id)
        {
          console.log(id)
          $.ajax({
            type: "POST",
            url: base_url+"scheme_master/show",
            data: {scheme_id:id},
            success: function(result) {
                console.log("ajax data=", result)
                if(result.success==true)
                {
                    $('#scheme_id').val(result.data.id);
                  $('input[name="scheme_type"][value='+result.data.scheme_type+']').prop('checked', true).trigger('change');
                  $('#scheme_name').val(result.data.scheme_name);
                  setInterval(function () {$('#insurer_id').val(result.data.insurer_id);}, 1000);
                  $('#nav').val(result.data.nav);
                  $('#scheme_modal').modal('show');
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
            $('#removeScheme').modal('show');
              $("#delete-scheme").replaceWith('<a href="#" class="btn btn-danger m-2" id="delete-scheme" onclick="deletescheme('+id+')">Yes, Delete it</a>');
        }
    
        function deletescheme(id)
          {
              $('#removeScheme').modal('hide');
            $.ajax({
                    type: "POST",
                    url: base_url+"scheme_master/delete",
                    data: {scheme_id:id},
                    success: function(result) {
                        console.log("ajax data=", result)
                        if(result.success==true)
                        {
                            $('#scheme_table').DataTable().ajax.reload();
                        }      
                        toast_success(result.message)
                    },
                    error: function(error) {
                        console.log(error)
                        toast_error(error.responseJSON.message)
                     }
                    });
        
          }
    
        