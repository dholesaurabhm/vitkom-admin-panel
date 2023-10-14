@extends('layouts.master')
@section('title')
   Continent
@endsection
@section('css')

@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
    Address Location
@endslot
@slot('title')
    Continent
@endslot
@endcomponent
    <div class="row">
     
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div>
                                    <h6 class="" >Continent</h6>
                                  
                                </div>
                                  {{-- @if(Auth::user()->role==1)
                                   
                                    @else
                                    <input type="hidden" name="seller_id" id="seller_id" value={{Auth::user()->seller_id}}>
                                    @endif --}}
                            </div>
                         


                            <div class="col-sm-6 text-end">
                                <div>
                                    <button class="btn btn-info add-btn" data-bs-toggle="modal"
                                    data-bs-target="#showModal"><i class="ri-add-fill me-1 align-bottom"></i> Add Continent</button>
                                    {{-- <a href="{{url('/add_table')}}" class="btn btn-success" ><i
                                            class="ri-add-line align-bottom me-1"></i> Add Category</a> --}}
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    {{-- <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all"
                                            role="tab">
                                            All <span class="badge badge-soft-danger align-middle rounded-pill ms-1">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published"
                                            role="tab">
                                            Published <span class="badge badge-soft-danger align-middle rounded-pill ms-1">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft"
                                            role="tab">
                                            Draft
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h5 class="card-title mb-0">Ajax Datatables</h5>
                                    </div> --}}
                                    <div class="card-body">
                                        <table id="continent_list" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No</th>
                                                    <th>Short Name</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            {{-- <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Extn.</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


    <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
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
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Continent?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-continent">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header bg-soft-info p-3">
                <h5 class="modal-title" id="exampleModalLabel">Continent</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close" id="close-modal"></button>
            </div>
            <form id="continent_form" autocomplete="off">
                <div class="modal-body">
                  
                    <div class="row g-3">
                        <input type="hidden" name="user_id" id="user_id" value={{Auth::user()->id}}>
                        <input type="hidden" id="continent_id" name="continent_id" class="form-control" value=""/>
                        <div class="col-lg-12">
                            <div>
                                <label for="date" class="form-label">Date</label>
                                {{-- <input type="text" id="continent_date" name="continent_date" class="form-control" placeholder="Select Date" required /> --}}
                                <input type="text" class="form-control curr_date" id="continent_date" name="continent_date" data-provider="flatpickr" data-date-format="Y-m-d" data-deafult-date="2023-09-25">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="short_name" class="form-label">Short Name</label>
                                <input type="text" id="short_name" name="short_name" class="form-control" placeholder="Enter Short Name" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Continent Name" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="code" class="form-label">Code</label>
                                <input type="text" id="code" name="code" class="form-control" placeholder="Enter Code" required />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                               <textarea name="description" class="form-control" id="description"></textarea>
                            </div>
                        </div>
                      
                    </div>
               
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="savesection()">Save</button>
           
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- <script src="{{ URL::asset('assets/js/pages/select2.init.js') }}"></script> --}}

<script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
    $(document).ready(function(){
       // $('.curr_date').attr('deafult-date','2023-02-01')

     var section_table =$('#continent_list').DataTable({
        proccessing: true,
        serverSide: true,
        searching: true,
        bFilter: true,
        ajax: {
            url: base_url+"continent/list",
            type: "POST",
            data:function(d) {
            d.res_id=$('[name=res_id]').val();
        },
            },
        columns: [
            { data: "id", render: function (data, type, row, meta) {return meta.row + meta.settings._iDisplayStart + 1;}},
            { data: 'short_name' },
            { data: 'name' },
            { data: 'code' },
            { data: 'description' },
            { data: 'continent_date' },
            { data: 'id',render:function(data,type,row){ 
                return `<div class="dropdown">
						<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="ri-more-fill"></i>
						</button>
						<ul class="dropdown-menu dropdown-menu-end">
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item edit-list" data-edit-id='${data}' href="#" onclick="openEditmodel(${data})"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
						<li class="dropdown-divider"></li>
						<li><a class="dropdown-item remove-list" href="#" data-id='${data}' onclick="opendeletmodel(${data})" ><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
						</ul>
						</div>`
            } 
             },

           
        ]
    });

    
    });

    function opendeletmodel(id)
    {
        console.log(id)
        $('#removeItemModal').modal('show');
          $("#delete-continent").replaceWith('<a href="#" class="btn btn-danger m-2" id="delete-continent" onclick="deleteContinent('+id+')">Yes, Delete it</a>');
    }

    function deleteContinent(id)
      {
          $('#removeItemModal').modal('hide');
        $.ajax({
                type: "POST",
                url: base_url+"continent/delete",
                data: {continent_id:id,user_id:$('#user_id').val()},
                success: function(result) {
                    console.log("ajax data=", result)
                    if(result.success==true)
                    {
                        $('#continent_list').DataTable().ajax.reload();
                    }      
                    toast_success(result.message)
                },
                error: function(error) {
                    console.log(error)
                    toast_error(error.responseJSON.message)
                 }
                });
    
      }


      function savesection()
      {
        if($('#short_name').val() !='')
        {
            if($('#continent_id').val() =='')
            {
                url=base_url+"continent/create"
            }
            else{
                url=base_url+"continent/update/"+$('#continent_id').val()
            }
            $.ajax({
                type: "POST",
                url: url,
                data: $('#continent_form').serialize(),
                success: function(result) {
                    console.log("ajax data=", result)
                    if(result.success==true)
                    {
                        $('#continent_list').DataTable().ajax.reload();
                    }      
                    $('#showModal').modal('hide');
                    toast_success(result.message)
                },
                error: function(xhr, status, error) {
                    let errors_msg="";
                    $.each( xhr.responseJSON.errors, function( key, value ) {
                                errors_msg+=`${value}\n`;
                     });
                    toast_error(errors_msg)
                 }
                });
        }
        else{
            toast_error('Please Enter Section Name');
        }
      }
     
      function openEditmodel(id)
      {
        console.log(id)
        $.ajax({
                type: "POST",
                url: base_url+"continent/show",
                data: {continent_id:id},
                success: function(result) {
                    console.log("ajax data=", result)
                    if(result.success==true)
                    {
                      $('#short_name').val(result.data.short_name);
                      $('#continent_id').val(result.data.id);
                      $('#continent_date').val(result.data.continent_date);
                      $('#name').val(result.data.name);
                      $('#code').val(result.data.code);
                      $('#description').html(result.data.description);
                      $('#showModal').modal('show');
                    }      
                  
                },
                error: function(error) {
                    toast_error(error.responseJSON.message)
                 }
                });
      }


    </script>
@endsection
