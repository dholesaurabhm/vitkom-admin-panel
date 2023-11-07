@extends('layouts.master')
@section('title') @lang('translation.client') @endsection
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
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Client Details</h5> 
                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                        </div>    
                        <div class="card-body">
                             <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Email ID</th>
                                        <th>Pancard Number</th>
                                        <th>Aadhar Number</th>
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Client Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="clientForm" onsubmit="return validateClientForm();">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div>
                                <label for="nameInput" class="form-label">Name<span class="red">*</span></label>
                                <input type="text" class="form-control client_name" id="client_name" placeholder="Enter name" required>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-sm-6">
                            <div>
                                <label for="MobileNumberInput" class="form-label">Mobile Number<span class="red">*</span></label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter Mobile Number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="emailInput" class="form-label">Email ID<span class="red">*</span></label>
                                <input type="email" class="form-control email_id" id="email_id" placeholder="Enter email id" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="pancardInput" class="form-label">Pan NO<span class="red">*</span></label>
                                <input type="text" class="form-control pancard_no" id="pancard_no" placeholder="Enter Pancard Number" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="aadharcardInput" class="form-label">Aadhar NO<span class="red">*</span></label>
                                <input type="text" class="form-control pancard_no" id="aadhar_no" placeholder="Enter Aadhar Number" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="dateofBirth" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="dateofbirth" required>
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="genderInput" class="form-label">Gender</label>
                                <select class="form-select mb-2" id="gender" aria-label="Default select example">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
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
<script src="{{ URL::asset('/assets/js/clients_master.js') }}"></script>

@endsection
