
var base_url='https://vitkom.tlpl.in/api/'

var file_url='https://vitkom.tlpl.in'


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
