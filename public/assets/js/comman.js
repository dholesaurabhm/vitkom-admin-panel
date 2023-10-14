
var base_url='http://127.0.0.1:8000/api/'

var file_url='http://127.0.0.1:8000'


function alert_success(msg)
{
    Swal.fire({
        title: 'Success',
        text: msg,
        icon: 'success',
        confirmButtonClass: 'btn btn-primary w-xs mt-2',
        buttonsStyling: false,
        showCloseButton: true
       })
}


function alert_error(msg)
{
    Swal.fire({
        title: 'Error',
        text: msg,
        icon: 'Error',
        confirmButtonClass: 'btn btn-primary w-xs mt-2',
        buttonsStyling: false,
        showCloseButton: true
    })
}


function toast_success(msg)
{
  Toastify({
    newWindow: true,
    text: msg,
    gravity:'top',
    position: 'right',
    className: "bg-success",
    stopOnFocus: true,
    offset: {
      x:  50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
      y: 10, // vertical axis - can be a number or a string indicating unity. eg: '2em'
    },
    duration: 3000,
    close:  true,
    
  }).showToast();
}

function toast_error(msg)
{
  Toastify({
    newWindow: true,
    text: msg,
    gravity:'top',
    position: 'right',
    className: "bg-danger",
    stopOnFocus: true,
    offset: {
      x:  50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
      y: 10, // vertical axis - can be a number or a string indicating unity. eg: '2em'
    },
    duration: 3000,
    close:  true,
    
  }).showToast();
}

function continent_list()
{
  $.ajax({
  url: base_url+"continent/show",
  type: "POST",
  success: function(result){
      console.log(result);
      var list = $(".continent_list");
      //list.append(new Option('All',''))
      $.each(result.data, function(index, item) {
      list.append(new Option(item.name, item.id));
      });
  }
});
}


function country_list()
{
  $.ajax({
  url: base_url+"country/show",
  type: "POST",
  success: function(result){
      console.log(result);
      var list = $(".country_list");
      list.empty().append(new Option('Select Country',''))
      $.each(result.data, function(index, item) {
      list.append(`<option value="${item.id}" data-continent_name=${item.continent_name}>${item.name}</option>`);
      });
  }
});
}


function state_list(id)
{
  $.ajax({
  url: base_url+"state_list",
  type: "POST",
  data:{country_id:id},
  success: function(result){
      console.log(result);
      var list = $(".state");
      list.empty().append(new Option('Select State',''))
      $.each(result.data, function(index, item) {
      list.append(new Option(item.state_name, item.id));
      });
      if(seller_details.address.state!=undefined ||seller_details.address.state!='')
      {
        $('#state').val(seller_details.address.state).trigger('change'); 
      }
  }
});
}

function city_list(id)
{
  $.ajax({
  url: base_url+"city_list",
  type: "POST",
  data:{state_id:id},
  success: function(result){
      console.log(result);
      var list = $(".city");
      list.empty().append(new Option('Select City',''))
      $.each(result.data, function(index, item) {
      list.append(new Option(item.city_name, item.id));
      });
      if(seller_details.address.city!=undefined ||seller_details.address.city!='')
      {
        $('#city').val(seller_details.address.city).trigger('change'); 
      }
  }
});
}


function currency_list()
{
  $.ajax({
  url: base_url+"currency_list",
  type: "POST",
  data:{},
  success: function(result){
      console.log(result);
      var list = $(".currency");
      list.empty().append(new Option('Select Currency',''))
      $.each(result.data, function(index, item) {
      list.append(new Option(item.currency_code +' - '+item.currency_name, item.id));
      });
      // if(seller_details.company.currency_id!=undefined ||seller_details.company.currency_id!='')
      // { 
      //   console.log("currency :"+seller_details.company.currency_id)
      //   $('#currency').val(seller_details.company.currency_id).trigger('change'); 
      // }
  }
});
}

