


    document.addEventListener('DOMContentLoaded', function () {
      let table = new DataTable('#mf-datatables', {
          // "ajax": 'assets/json/datatable.json'
      });
    }); 
    
    document.addEventListener('DOMContentLoaded', function () {
      let table = new DataTable('#bonds-datatables', {
          // "ajax": 'assets/json/datatable.json'
      });
    }); 
    
    document.addEventListener('DOMContentLoaded', function () {
      let table = new DataTable('#life-datatables', {
          // "ajax": 'assets/json/datatable.json'
      });
    }); 
    
    document.addEventListener('DOMContentLoaded', function () {
     let table = new DataTable('#medical-datatables', {});
    }); 
    
    document.addEventListener('DOMContentLoaded', function () {
     let table = new DataTable('#general-datatables', {});
    }); 

$( document ).ready(function() {
    $('.mutual_fund_btn').show();  
    amc_list();
});

$('#amc_id').change(function() {
  amcplan_list(this.value);
});

$('#scheme_id').change(function() {
  var scheme_name = $('#scheme_id option:selected').data('scheme_name');
  var current_nav = $('#scheme_id option:selected').data('nav');
  $('#scheme_name').val(scheme_name);
  $('#current_nav').val(current_nav);
});

function show_only_mutual_fund()
{
  $('.mutual_fund_btn').show();
  $('.bonds_btn').hide();
  $('.life_insurance_btn').hide();
  $('.medical_insurance_btn').hide();
  $('.general_insurance_btn').hide(); 
}

function show_only_bond()
{
  $('.mutual_fund_btn').hide();
  $('.bonds_btn').show();
  $('.life_insurance_btn').hide();
  $('.medical_insurance_btn').hide();
  $('.general_insurance_btn').hide();
}

function show_only_life_insurance()
{
  $('.mutual_fund_btn').hide();
  $('.bonds_btn').hide();
  $('.life_insurance_btn').show();
  $('.medical_insurance_btn').hide();
  $('.general_insurance_btn').hide();
}

function show_only_mediacal_insurance()
{
  $('.mutual_fund_btn').hide();
  $('.bonds_btn').hide();
  $('.life_insurance_btn').hide();
  $('.medical_insurance_btn').show();
  $('.general_insurance_btn').hide();
}

function show_only_general_insurance()
{
  $('.mutual_fund_btn').hide();
  $('.bonds_btn').hide();
  $('.life_insurance_btn').hide();
  $('.medical_insurance_btn').hide();
  $('.general_insurance_btn').show();
}

// mutual_fund_btn
// bonds_btn
// life_insurance_btn
// medical_insurance_btn
// general_insurance_btn

function savemutualfund()
        {
          if($('#amc_id').val() !='' && $('#scheme_id').val() !='' && $('#folio_no').val() !='' && $('#joining_date').val() !='')
          {
              if($('#mutual_id').val() =='')
              {
                  url=base_url+"mutual_fund/create"
              }
              else{
                  url=base_url+"mutual_fund/update/"+$('#mutual_id').val()
              }
              $.ajax({
                  type: "POST",
                  url: url,
                  data: $('#mutualfund_form').serialize(),
                  success: function(result) {
                      console.log("ajax data=", result)
                      if(result.success==true)
                      {
                          $('#mutual_fund_table').DataTable().ajax.reload();
                      }      
                     $('#mutual_fund_modal').modal('hide');
                     toast_success(result.message)
                  },
                  error: function(xhr, status, error) {
                      let errors_msg="";
                      $.each( xhr.responseJSON.errors, function( key, value ) {
                                  errors_msg+=`${value}\n`;
                       });
                     //  $('#mutual_fund_modal').modal('hide');
                      toast_error(errors_msg)
                   }
                  });
          }
          else{
              toast_error('Please Fill the Form');
          }
        }