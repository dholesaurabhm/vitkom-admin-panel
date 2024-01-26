function getclient()
{
    var search=$('#search').val();
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
               <a href="${file_url}/user_dashboard/${item.id}">View Dashboad</a>
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