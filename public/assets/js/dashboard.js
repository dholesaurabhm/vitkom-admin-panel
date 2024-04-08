function getclientlist()
{
    var search=$('#search').val();
    console.log('call')
  $.ajax({
    type: "POST",
    url: base_url+"client/show",
    data: {search:search},
    success: function(result) {
        console.log("ajax data=", result)
        let row='';
        $.each(result.data, function(index, item) {
            row+=`<tr class="client_row">
            <td>
                <h4 class="text-truncate fs-14 fs-medium mb-0">ID: ${item.id}</h4>
            </td>
            <td>
                <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>${item.name}</h4>
            </td>
            <td>
                <p class="text-muted mb-0">${item.email}</p>
            </td>
            <td>
                <p class="text-muted mb-0">${item.mobile_no}</p>
            </td>
            <td class="text-end">
               <a href="${file_url}/user_dashboard/${item.id}" target="_blank">View Dashboad</a>
            </td>
        </tr>`;
        });

          $('#client_list tbody').empty().append(row);
    
      
    },
    error: function(error) {
        toast_error(error.responseJSON.message)
     }
    });
}


function getclient(data={})
{
    var limit=20;
    var search=$('#search').val();
  $.ajax({
  url: base_url+"client/show",
  type: "POST",
  data: {search:search},
  success: function(result){
      console.log(result);
      var list = $(".client_list");
      list.empty();
      list.append(new Option('Please Select Client',''))
      $.each(result.data, function(index, item) {
        list.append(`<option value="${item.name}">${item.name}</option>`);
      });
  }
});
}

function convert(num)
{
    var conv=(Math.ceil(num)).toLocaleString()
     return "&#8377; " +conv;
}

function getcount(data={})
{
 
  $.ajax({
  url: base_url+"getdashboard_count",
  type: "POST",
  data: {},
  success: function(result){
      console.log(result);
      if(result.success==true)
      {
        $("#anum").html(convert(result.data.anum));
        $("#sip").html(convert(result.data.sip));
        $("#redemption").html(convert(result.data.redemption));
        $("#active_client").html(result.data.active_client);
     
      }
  }
});
}