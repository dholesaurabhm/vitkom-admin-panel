


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