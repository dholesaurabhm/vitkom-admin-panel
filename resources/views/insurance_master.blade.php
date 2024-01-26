@extends('layouts.master')
@section('title') @lang('translation.insurance') @endsection
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
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">  
                                @lang('translation.insurance')
                            </h5> 
                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;" onclick="showschememodel()" >
                                Add New Scheme
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;margin-right: 5px;"  data-bs-toggle="modal" data-bs-target="#insurer_modal">
                                Add New Insurer
                            </button>
                        </div>  
                        <div class="card-body">
                            <table id="scheme_table" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Insurance Company</th>
                                        <th>Scheme Name</th>
                                        <th>NAV</th>
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

<div class="modal fade" id="scheme_modal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Insurance Scheme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="scheme_form">
                    <div class="row g-3">
                        <input type="hidden" name="scheme_id" id="scheme_id">
                        <div class="col-sm-12">
                            <div>
                                <label for="nameInput" class="form-label">Insurance Type<span class="red">*</span></label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="scheme_type" id="1" value="1">
                                    <label class="form-check-label" for="1">LIFE INSURANCE</label>
                                </div><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="scheme_type" id="2" value="2">
                                    <label class="form-check-label" for="2">HEALTH INSURANCE</label>
                                </div><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="scheme_type" id="3" value="3">
                                    <label class="form-check-label" for="3">GENERAL INSURANCE</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div>
                                <label for="nameInput" class="form-label">Insurance Company Name<span class="red">*</span></label>
                                <select class="form-select mb-2 insurer_list" name="insurer_id" id="insurer_id">
                                    <option value="">Select Company Name</option>
                                </select>
                            </div>
                        </div>
                          <div class="col-sm-12">
                            <div>
                                <label for="typeinput" class="form-label">Insurance Scheme Name<span class="red">*</span></label>
                                <input type="text" class="form-control scheme_name" name="scheme_name" id="scheme_name" placeholder="Enter Insurance Scheme Name" required>
                            </div>
                        </div>

                        <div class="col-sm-12" style="display: none">
                            <div>
                                <label for="typeinput" class="form-label">NAV<span class="red">*</span></label>
                                <input type="text" class="form-control" id="nav" name="nav" placeholder="Enter NAV" value="1" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="savescheme()">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="insurer_modal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Insurance Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="insurer_form">
                    <input type="hidden" name="insurer_id" id="insurer_id">
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <div>
                                <label for="nameInput" class="form-label">Insurance Type<span class="red">*</span></label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insurance_type" id="1" value="1" checked>
                                    <label class="form-check-label" for="1">LIFE INSURANCE</label>
                                </div><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insurance_type" id="2" value="2">
                                    <label class="form-check-label" for="2">HEALTH INSURANCE</label>
                                </div><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="insurance_type" id="3" value="3">
                                    <label class="form-check-label" for="3">GENERAL INSURANCE</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div>
                                <label for="nameInput" class="form-label">Insurance Company Name<span class="red">*</span></label>
                                <input type="text" class="form-control company_name" id="company_name" name="company_name" placeholder="Enter Insurance Company Name" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="save()">Submit</button>
                            </div>
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
  <div id="removeScheme" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Scheme?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-scheme">Yes, Delete It!</button>
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
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/insurance_master.js') }}"></script>

<script>
    $(document).ready(function(){
      var scheme_table =$('#scheme_table').DataTable({
      proccessing: true,
      serverSide: true,
      searching: true,
      bFilter: true,
      ajax: {
          url: base_url+"scheme_master/list",
          type: "POST",
          data:function(d) {
         // d.res_id=$('[name=res_id]').val();
      },
          },
      columns: [
          { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
          { data: 'company_name' },
          { data: 'scheme_name' },
          { data: 'nav'},
          { data: 'id',render:function(data,type,row){ 
              return `<div class="dropdown">
                      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="ri-more-fill"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                      <li><a class="dropdown-item edit-list" data-edit-id='${data}' href="#" onclick="editscheme(${data})"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
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

@endsection
