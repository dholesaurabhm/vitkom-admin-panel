
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.report2'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding: 10px;">
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;"> Inestor Wise Upcoming Renewal </h5> 
                            
                        </div>  
                        <div class="card-body">
                     <div class="row py-4">
                      
                       <div class="col-md-4"> 
                        
                            <input type="date" class="form-control" id="start_date" name="start_date" onchange="setmin()" value="" />
                        </div>
                        <div class="col-md-4"> 
                            <input type="date" class="form-control" id="end_date" name="end_date" value="" />
                        </div>

                        <div class="col-md-4"> 
                            <button type="button" class="btn btn-primary" onclick="search()">Search</button>
                        </div>
                       
                     </div>
                            <table id="renewal" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Investor</th>
                                        <th>Insurance Type</th>
                                        <th>Insurance Plan</th>
                                        <th>Renuwal Amount ₹</th>
                                        <th>Renewal Date</th>
                                        
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div> 
</div>

<form id="investorForm" onsubmit="return validateInvestorForm();">
    <!-- Your form inputs here -->
</form>

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Inestor Wise Total Investment Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria        -label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div>
                                <label for="nameInput" class="form-label">Investor Name<span class="red">*</span></label>
                                <input type="name" class="form-control" id="name" placeholder="Enter Scheme Name" required>
                        
                                  
                            </div>
                        </div><!--end col-->
                          <div class="col-sm-6">
                            <div>
                                <label for="typeinput" class="form-label">Insurance Type<span class="red">*</span></label>
                                <select class="form-select mb-3" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="RenualamountInput" class="form-label">Renuwal Amount ₹<span class="red">*</span></label>
                                <input type="pay-amount" class="form-control" id="amount" placeholder="Enter Renuwal Amount" required>
                            </div>
                        </div><!--end col-->
                       
                                                
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
function validateInvestorForm() {
    var investorName = document.getElementById('name').value;
    var renuwalAmount = document.getElementById('amount').value;

    if (investorName.trim() === '') {
        alert('Investor Name is required.');
        return false;
    }

    if (isNaN(renuwalAmount) || renuwalAmount <= 0) {
        alert('Please enter a valid Renuwal Amount.');
        return false;
    }

    return true; // Submits the form if all validations pass
}
</script>
<!-- apexcharts -->

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>


<script>
    $(document).ready(function(){

    var start = moment().subtract(29, 'days');
    var end = moment();
    $('#start_date').val(start.format('YYYY-MM-DD'));
    $('#end_date').val(end.format('YYYY-MM-DD'));

      var client_table =$('#renewal').DataTable({
      proccessing: true,
      serverSide: true,
      searching: false,
      bFilter: true,
      dom: 'Bfrtip',
    buttons: [
        'pageLength', 'csv', 'excel'
    ],
   
    //   dom: 'lBfrtip',
    //     buttons: [
    //         {
    //             extend: 'csv',
    //             filename: 'Renewal'
    //         },
    //         {
    //             extend: 'excel',
    //             filename: 'Renewal'
    //         }
    //     ],
      ajax: {
          url: base_url+"report_insurance",
          type: "POST",
          data:function(d) {
          d.start_date=$('#start_date').val();
          d.end_date=$('#end_date').val();
      },
          },
      columns: [
         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
          { data: 'proposer_name' },
          { data: 'plan_type' },
          { data: 'plan_name'},
          { data: 'total_permium'},
          { data: 'renewal_date' },
      ]
  });
});

function setmin(){
    var start=$('#start_date').val();
    $('#end_date').attr({"min" : start});
}

function search()
{
    $('#renewal').DataTable().ajax.reload();
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/report2_master.blade.php ENDPATH**/ ?>