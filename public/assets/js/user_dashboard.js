


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
  amcplan_list({amc_id:$('#amc_id').val()});
});

$('#scheme_id').change(function() {
  var scheme_name = $('#scheme_id option:selected').data('scheme_name');
  var isin = $('#scheme_id option:selected').data('isin');
  var current_nav = $('#scheme_id option:selected').data('nav');
  $('#scheme_name').val(scheme_name);
  $('#isin').val(isin);
  $('#current_nav').val(current_nav);
  $('#nav').val(current_nav);
});

// $('#purchase_date').change(function() {
//   if($('#amc_id').val() !='' && $('#scheme_id').val() !='' && $('#purchase_date').val() !='')
//   {
//     console.log('calling am')
//     amcplan($('#mutualfund_form').serialize());
//   }
//   else{
//     toast_error('Please Select Scheme Name and Purchase Date');
//   }
// });

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
          if($('#amc_id').val() !='' && $('#scheme_id').val() !='' && $('#folio_no').val() !='')
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


function amcplan(data={})
{
  console.log(amc_id)
  $.ajax({
  url: base_url+"getamc_plan",
  type: "POST",
  data:data,
  success: function(result){
      console.log(result);
     $('#nav').val(result.data.nav)
  }
});
}

function curr_unit()
{
  var amount=$('#invested_amount').val();
 
  var nav=$('#nav').val();
  var curr_nav=$('#current_nav').val();
  var current_unit=(amount/nav).toFixed(4);
  var current_value=(current_unit * curr_nav).toFixed(4);
  console.log(current_unit * curr_nav )
  $('#current_unit').val(current_unit);
  $('#current_value').val(current_value);
  $('#profit_loss').val((current_value - amount).toFixed(4));
}


function editmutual(id)
{
  console.log(id)
  $.ajax({
    type: "POST",
    url: base_url+"mutual_fund/show",
    data: {mutual_id:id},
    success: function(result) {
        console.log("ajax data=", result)
        if(result.success==true)
        {
          $('#mutual_id').val(result.data.id);
          $('#amc_id').val(result.data.amc_id).trigger('change');
        
          $('#folio_no').val(result.data.folio_no);
          $('#plan').val(result.data.plan);
        //  $('#purchase_date').val(result.data.purchase_date);
          $('#nav').val(result.data.nav);
          $('#invested_amount').val(result.data.invested_amount);
          $('#current_unit').val(result.data.current_unit);
          $('#current_value').val(result.data.current_value);
          $('#current_nav').val(result.data.current_nav);
          $('#profit_loss').val(result.data.profit_loss);
          $('#mutual_fund_modal').modal('show');
          setTimeout(function () {$('#scheme_id').val(result.data.scheme_id);  $('#scheme_name').val(result.data.scheme_name);}, 1000);
          let row='';
          $.each(result.data.report, function(index, item) {
              row+=`<tr>
              <th scope="row">${item.report_type} </th>
              <td>${item.trasaction_date}</td>
              <td>${item.nav}</td>
              <td>${item.invest_amount}</td>
              <td>${item.no_units}</td>
              <td>${item.stamp_duty ?? 0}</td>
           
          </tr>`;
          });
          //   <td>${item.balance_unit ?? 0}</td>
  
            $('#mutual_report tbody').empty().append(row);

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
      $("#delete-mutual").replaceWith('<a href="#" class="btn btn-danger m-2" id="delete-mutual" onclick="deletemutual('+id+')">Yes, Delete it</a>');
}

function deletemutual(id)
  {
      $('#removeScheme').modal('hide');
    $.ajax({
            type: "POST",
            url: base_url+"mutual_fund/delete",
            data: {mutual_id:id},
            success: function(result) {
                console.log("ajax data=", result)
                if(result.success==true)
                {
                    $('#mutual_fund_table').DataTable().ajax.reload();
                }      
                toast_success(result.message)
            },
            error: function(error) {
                console.log(error)
                toast_error(error.responseJSON.message)
             }
            });

  }


  
function editbond(id)
{
  console.log(id)
  $.ajax({
    type: "POST",
    url: base_url+"getbonds",
    data: {bond_id:id},
    success: function(result) {
        console.log("ajax data=", result)
        if(result.success==true)
        {
          $('#bond_id').val(result.data.id);
          $('#bond_name').val(result.data.bond_name);
          $('#scrip_name').val(result.data.scrip_name);
          $('#total').val(result.data.total);
          $('#platform').val(result.data.platform);
          $('#client_code').val(result.data.client_code);

          $('#bonds_modal').modal('show');
          let row='';
          $.each(result.data.report, function(index, item) {
              row+=`<tr>
              <th scope="row">${item.platform} </th>
              <td>${item.date_from}</td>
              <td>${item.status =='BUY' ? item.tot_purchase :item.tot_sale}</td>
              <td>${item.status}</td>
           
          </tr>`;
          });
          //   <td>${item.balance_unit ?? 0}</td>
  
            $('#bond_report tbody').empty().append(row);

        }      
      
    },
    error: function(error) {
        toast_error(error.responseJSON.message)
     }
    });
}

function editlife(id)
{
  console.log(id)
  $.ajax({
    type: "POST",
    url: base_url+"getlife_insurance",
    data: {life_id:id},
    success: function(result) {
        console.log("ajax data=", result)
        if(result.success==true)
        {
          $('#life_id').val(result.data.id);
          $('#proposer_name').val(result.data.proposer_name);
          $('#mode').val(result.data.mode);
          $('#total_permium').val(result.data.total_permium);
          $('#sum_assured').val(result.data.sum_assured);
          $('#risk_date').val(result.data.risk_date);
          $('#post_date').val(result.data.post_date);

          $('#issue_date').val(result.data.issue_date);
          $('#policy_no').val(result.data.policy_no);
          $('#company_name').val(result.data.company_name);
          $('#policy_no').val(result.data.policy_no);
          $('#lifeinsurance_modal').modal('show');
        }      
      
    },
    error: function(error) {
        toast_error(error.responseJSON.message)
     }
    });
}



function editlife(id)
{
  console.log(id)
  $.ajax({
    type: "POST",
    url: base_url+"getlife_insurance",
    data: {life_id:id},
    success: function(result) {
        console.log("ajax data=", result)
        if(result.success==true)
        {
          $('#life_id').val(result.data.id);
          $('#proposer_name').val(result.data.proposer_name);
          $('#mode').val(result.data.mode);
          $('#total_permium').val(result.data.total_permium);
          $('#sum_assured').val(result.data.sum_assured);
          $('#risk_date').val(result.data.risk_date);
          $('#post_date').val(result.data.post_date);
          $('#plan_name').val(result.data.plan_name);
          $('#issue_date').val(result.data.issue_date);
          $('#policy_no').val(result.data.policy_no);
          $('#company_name').val(result.data.company_name);
          $('#policy_no').val(result.data.policy_no);
          $('#lifeinsurance_modal').modal('show');
        }      
      
    },
    error: function(error) {
        toast_error(error.responseJSON.message)
     }
    });
}

function edithealth(id)
{
  console.log(id)
  $.ajax({
    type: "POST",
    url: base_url+"gethealth_insurance",
    data: {health_id:id},
    success: function(result) {
        console.log("ajax data=", result)
        if(result.success==true)
        {
          $('#health_id').val(result.data.id);
          $('#health_proposer_name').val(result.data.proposer_name);
          $('#health_mode').val(result.data.mode);
          $('#health_total_permium').val(result.data.total_permium);
          $('#health_sum_assured').val(result.data.sum_assured);
          $('#health_risk_date').val(result.data.risk_date);
          $('#health_post_date').val(result.data.post_date);

          $('#health_issue_date').val(result.data.issue_date);
          $('#health_policy_no').val(result.data.policy_no);
          $('#health_company_name').val(result.data.company_name);
          $('#health_plan_name').val(result.data.plan_name);
          $('#medical_insurance_modal').modal('show');
        }      
      
    },
    error: function(error) {
        toast_error(error.responseJSON.message)
     }
    });
}

