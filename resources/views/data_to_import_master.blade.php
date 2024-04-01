@extends('layouts.master')
@section('title') Import Client Data @endsection
@section('css')

@endsection
@section('content')
<div class="row">
    <div class="col">

      
        <div class="h-100">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding: 10px;">
                            <div class="row g-4">
                                <div class="col-sm-3">
                                    <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Import Client Data</h5> 
                                </div>
                                <div class="col-sm-9 text-end">
                                   
                                {{-- <button class="btn btn-success" onclick="showreportmodel('purchaseModel')"><i
                                                class="ri-add-line align-bottom me-1"></i> Import Purchase Report</button>
                                   
                                <button class="btn btn-success" onclick="showreportmodel('redemptionModel')"><i
                                            class="ri-add-line align-bottom me-1"></i> Import Redemption Report</button>

                                <button class="btn btn-success" onclick="showreportmodel('lifeModel')"><i 
                                                class="ri-add-line align-bottom me-1"></i> Import Life Insurance Report</button>
                               <button class="btn btn-success" onclick="showreportmodel('healthModel')"><i
                                                    class="ri-add-line align-bottom me-1"></i> Import Health Insurance Report</button>                 --}}
                                       
                                </div>
                               
                            </div>
                            <div class="row g-4">
                                <div class="col-md-3">
                                     <button class="btn btn-success" onclick="showreportmodel('purchaseModel')"><i
                                    class="ri-add-line align-bottom me-1"></i> Import Purchase Report</button>
                                </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-success" onclick="showreportmodel('redemptionModel')"><i
                                        class="ri-add-line align-bottom me-1"></i> Import Redemption Report</button>
                                    </div>
                                    <div class="col-md-3"> 
                                        <button class="btn btn-success" onclick="showreportmodel('lifeModel')"><i 
                                        class="ri-add-line align-bottom me-1"></i> Import Life Insurance Report</button>
                                    </div>
                                    <div class="col-md-3"> 
                                         <button class="btn btn-success" onclick="showreportmodel('healthModel')"><i
                                        class="ri-add-line align-bottom me-1"></i> Import Health Insurance Report</button>       
                                      </div>

                                      <div class="col-md-3"> 
                                        <button class="btn btn-success" onclick="showreportmodel('bondModel')"><i
                                       class="ri-add-line align-bottom me-1"></i> Import Bonds Report</button>       
                                     </div>
                    
                            </div>
                        </div>    
                        <div class="card-body">
                             <table id="import_table" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Report Type</th>
                                        <th>User Name</th>
                                        <th>Date</th>
                                        <th>Download</th>
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

<div class="modal fade" id="purchaseModel" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Purchase Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="purchaseForm"  enctype="multipart/form-data">
                    <input type="hidden" name="file_type" id="file_type" value="1" class="form-control">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="form-control">
                    <h4>Downlod Purchase Report Format - <a href="{{url('/')}}/products/purchase_format.csv" class="btn btn-primary" target="download"><i class="ri-file-download-fill"></i> Download</a></h4>
                    <div class="row g-3">
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="purchasereport" class="form-label">Import Purchase Report<span class="red">*</span></label>
                                <input type="file" name="transaction_file" class="form-control transaction_file" id="transaction_file" accept=".csv" required>
                            </div>
                        </div><!--end col-->
                     
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="savefile('purchase')">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="redemptionModel" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Redemption Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="redemptionForm"  enctype="multipart/form-data">
                    <input type="hidden" name="file_type" id="file_type" value="2" class="form-control">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="form-control">
                    <h4>Downlod Redemption Report Format - <a href="{{url('/')}}/products/redemption_format.csv" class="btn btn-primary" target="download"><i class="ri-file-download-fill"></i> Download</a></h4>
                    <div class="row g-3">
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="redemptionreport" class="form-label">Import Redemption Report<span class="red">*</span></label>
                                <input type="file" name="transaction_file" class="form-control transaction_file" id="transaction_file" accept=".csv" required>
                            </div>
                        </div><!--end col-->
                     
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="savefile('redemption')">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lifeModel" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Life Insurance Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="lifeForm"  enctype="multipart/form-data">
                    <input type="hidden" name="file_type" id="file_type" value="3" class="form-control">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="form-control">
                    <h4>Downlod Life Insurance Report Format - <a href="{{url('/')}}/products/life_format.csv" class="btn btn-primary" target="download"><i class="ri-file-download-fill"></i> Download</a></h4>
                    <div class="row g-3">
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="redemptionreport" class="form-label">Import Life Insurance Report<span class="red">*</span></label>
                                <input type="file" name="transaction_file" class="form-control transaction_file" id="transaction_file" accept=".csv" required>
                            </div>
                        </div><!--end col-->
                     
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="savefile('life')">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="healthModel" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Health Insurance Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="healthForm"  enctype="multipart/form-data">
                    <input type="hidden" name="file_type" id="file_type" value="4" class="form-control">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="form-control">
                    <h4>Downlod Health Insurance Report Format - <a href="{{url('/')}}/products/health_format.csv" class="btn btn-primary" target="download"><i class="ri-file-download-fill"></i> Download</a></h4>
                    <div class="row g-3">
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="redemptionreport" class="form-label">Import Health Insurance Report<span class="red">*</span></label>
                                <input type="file" name="transaction_file" class="form-control transaction_file" id="transaction_file" accept=".csv" required >
                            </div>
                        </div><!--end col-->
                     
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="savefile('health')">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bondModel" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Bonds Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bondForm"  enctype="multipart/form-data">
                    <input type="hidden" name="file_type" id="file_type" value="5" class="form-control">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="form-control">
                    <h4>Downlod Bond Report Format - <a href="{{url('/')}}/products/bond_format.csv" class="btn btn-primary" target="download"><i class="ri-file-download-fill"></i> Download</a></h4>
                    <div class="row g-3">
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="redemptionreport" class="form-label">Import Bond Report<span class="red">*</span></label>
                                <input type="file" name="transaction_file" class="form-control transaction_file" id="transaction_file" accept=".csv" required >
                            </div>
                        </div><!--end col-->
                     
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="savefile('bond')">Submit</button>
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
  <div id="removeTransaction" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Transaction?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-transaction">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('script')
<!-- apexcharts -->

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/import_master.js') }}"></script>
<script>
    $(document).ready(function(){
      var import_table =$('#import_table').DataTable({
      proccessing: true,
      serverSide: true,
      searching: true,
      bFilter: true,
      ajax: {
          url: base_url+"listImportTransaction",
          type: "POST",
          data:function(d) {
         // d.res_id=$('[name=res_id]').val();
      },
          },
      columns: [
         // { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
          { data: 'report_type' },
          { data: 'user_name' },
          { data: 'trans_date'},
          { data: 'file_path',render:function(data,type,row){ 
              return `<a href="${file_url}/${data}" class="btn btn-success " target="download"><i class="ri-file-download-fill"></i> Download</a>`
          } 
           },
          { data: 'id',render:function(data,type,row){ 
            return `<button class="btn btn-danger" data-id='${data}' onclick="deletemodel(${data})"><i class="ri-delete-bin-fill"></i> Delete</button>`
            //   return `<div class="dropdown">
            //           <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            //           <i class="ri-more-fill"></i>
            //           </button>
            //           <ul class="dropdown-menu dropdown-menu-end">
            //           <li><a class="dropdown-item remove-list" href="#" data-id='${data}' onclick="deletemodel(${data})" ><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
            //           </ul>
            //           </div>`
          } 
           },
          
         
      ]
  });
    });
</script>
@endsection