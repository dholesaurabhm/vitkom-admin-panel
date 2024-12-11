
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.report1'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form id="investorWiseForm" onsubmit="return validateInvestorWiseForm();">
    <!-- Your form inputs here -->
</form>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding: 10px;">
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;"> Inestor Wise Total Investment Report </h5> 
                           
                        </div>  
                        <div class="card-body">
                            <div class="row py-4">
                                <div class="col-md-3"> 
                                   <select name="type" id="type" class="form-select" required> 
                                    <option value="1">Mutual Fund</option>
                                    <option value="2">Bond</option>
                                    <option value="3">Life Insurance</option>
                                    <option value="4">Health Insurance</option>
                                    <option value="5">General Insurance</option>
                                   </select>
                                </div>

                                <div class="col-md-3"> 
                                 
                                     <input type="date" class="form-control" id="start_date" name="start_date" onchange="setmin()" value="" />
                                 </div>
                                 <div class="col-md-3"> 
                                     <input type="date" class="form-control" id="end_date" name="end_date" value="" />
                                 </div>
         
                                 <div class="col-md-3"> 
                                     <button type="button" class="btn btn-primary" onclick="search()">Search</button>
                                 </div>
                                
                              </div>
                            <table id="mb_table" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Investor</th>
                                        <th>Investment Type</th>
                                        <th>Transaction Amount ₹</th>
                                        <th>Transaction Date</th>
                                        <th>Transaction Type</th>
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
                                <label for="typeinput" class="form-label">Sub Type<span class="red">*</span></label>
                                <select class="form-select mb-3" aria-label="Default select example">
                        
                                   <option value="1">1</option>
                                   <option value="2">2</option>
                        
                                </select>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="investedamountInput" class="form-label">Invested Amount ₹<span class="red">*</span></label>
                                <input type="pay-amount" class="form-control" id="amount" placeholder="Enter Invested Amount" required>
                            </div>
                        </div><!--end col-->
                       
                        <div class="col-sm-6">
                            <div>
                                <label for="currentamountInput" class="form-label">Current Amount ₹<span class="red">*</span></label>
                                <input type="currentamount" class="form-control" id="amount" placeholder="Enter Current Amount" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="lifeinsuranceInput" class="form-label">Life Insurance<span class="red">*</span></label>
                                <input type="lifeinsurance" class="form-control" id="lifeinsurance" placeholder="Enter Life Insurance" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="medicalinsuranceInput" class="form-label">Medical Insurance<span class="red">*</span></label>
                                <input type="medicalinsurance" class="form-control" id="medicalinsurance" placeholder="Enter Medical Insurance" required>
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
function validateInvestorWiseForm() {
    // Fetch values from the form
    var investorName = document.getElementById('name').value;
    var investedAmount = document.getElementById('amount').value;
    var currentAmount = document.getElementById('currentAmount').value;
    var lifeInsurance = document.getElementById('lifeInsurance').value;
    var medicalInsurance = document.getElementById('medicalInsurance').value;

    // Perform validation
    if (investorName.trim() === '') {
        alert('Investor Name is required.');
        return false;
    }

    if (isNaN(investedAmount) || investedAmount <= 0) {
        alert('Please enter a valid Invested Amount.');
        return false;
    }

    // Add similar validations for other fields

    return true; // If all validations pass, the form will be submitted
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

      var client_table =$('#mb_table').DataTable({
      proccessing: true,
      serverSide: true,
      searching: false,
      bFilter: true,
      dom: 'Bfrtip',
        buttons: [
            'pageLength', 'csv', 'excel'
        ],
      ajax: {
          url: base_url+"report_mb",
          type: "POST",
          data:function(d) {
          d.type=$('#type').val();
          d.start_date=$('#start_date').val();
          d.end_date=$('#end_date').val();
      },
          },
      columns: [
         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
          { data: 'client_name' },
          { data: 'investment_type' },
          { data: 'total_holding'},
          { data: 'investment_date'},
          { data: 'transaction_type' },
      ]
  });
});

function setmin(){
    var start=$('#start_date').val();
    $('#end_date').attr({"min" : start});
}

function search()
{
    $('#mb_table').DataTable().ajax.reload();
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/report1_master.blade.php ENDPATH**/ ?>