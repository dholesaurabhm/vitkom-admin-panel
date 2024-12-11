
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.client'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding: 10px;">
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Client Details</h5> 
                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  onclick="showclientmodel()">Add New +</button>
                        </div>    
                        <div class="card-body">
                             <table id="client_table" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Email ID</th>
                                        <th>Pancard Number</th>
                                        
                                        <th>Action</th>
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

<div class="modal fade" id="clientModel" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Client Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clientForm" >
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control client_name" id="client_id" name="client_id" required>
                            <div>
                                <label for="nameInput" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control client_name" name="name" id="name" placeholder="Enter name" required>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="MobileNumberInput" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter Mobile Number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="emailInput" class="form-label">Email ID <span class="text-danger">*</span></label>
                                <input type="email" class="form-control email_id" id="email" name="email" placeholder="Enter email id" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="pancardInput" class="form-label">Pan NO <span class="text-danger">*</span></label>
                                <input type="text" class="form-control pancard_no" id="pan_no" name="pan_no" placeholder="Enter Pancard Number" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="dateofBirth" class="form-label">Date Of Birth  <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                        </div><!--end col--> 

                        <div class="col-sm-6">
                            <div>
                                <label for="aadharcardInput" class="form-label">Aadhar NO </label>
                                <input type="text" class="form-control aadhar_no" id="aadhar_no" name="aadhar_no" placeholder="Enter Aadhar Number" required>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="genderInput" class="form-label">Gender</label>
                                <select class="form-select mb-2" id="gender" name="gender" aria-label="Default select example">
                                    <option value="">Please Select Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveclient()">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>


  <!-- removeItemModal -->
  <div id="removeClient" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Client?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-client">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


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

<script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/clients_master.js')); ?>"></script>

<script>
    $(document).ready(function(){
      var client_table =$('#client_table').DataTable({
      proccessing: true,
      serverSide: true,
      searching: true,
      bFilter: true,
      ajax: {
          url: base_url+"client/list",
          type: "POST",
          data:function(d) {
         // d.res_id=$('[name=res_id]').val();
      },
          },
      columns: [
         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
          { data: 'name' },
          { data: 'mobile_no' },
          { data: 'email'},
          { data: 'pan_no' },
        //   { data: 'aadhar_no' },
          { data: 'id',render:function(data,type,row){ 
              return `<div class="dropdown">
                      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="ri-more-fill"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item edit-list" data-edit-id='${data}' href="#" onclick="editclient(${data})"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                      <li class="dropdown-divider"></li>
                      <li><a class="dropdown-item remove-list" href="#" data-id='${data}' onclick="deletemodel(${data})" ><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                      </ul>
                      </div>`
          } 
           },
          
         
      ]
  });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\vitkom-admin-panel\resources\views/client_master.blade.php ENDPATH**/ ?>