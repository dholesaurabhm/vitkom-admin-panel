@extends('layouts.master')
@section('title') @lang('translation.users') @endsection
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
                            <h5 class="card-title mb-0" style="width: 150px;clear: both;display: contents;line-height: 35px;">Admin Users</h5> 
                            <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;clear: both;display: block;"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Add New +</button>
                        </div>
                        <div class="card-body">
                            <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Employee Email ID</th>
                                        <th>Employee Password</th>
                                        <th>Employee Joining Date</th>
                                        <th>Employee End Date</th>
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
                <h5 class="modal-title" id="exampleModalgridLabel">Admin User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm" onsubmit="return validateForm();">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div>
                                <label for="empnameInput" class="form-label">Employee Name<span class="red">*</span></label>
                                <input type="text" class="form-control" id="firstName" placeholder="Emp name" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="empemailidInput" class="form-label">Employee Email ID<span class="red">*</span></label>
                                <input type="email" class="form-control" id="empemailid" placeholder="Emp email id" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="passwordInput" class="form-label">Password<span class="red">*</span></label>
                                <input type="password" class="form-control" id="passwordInput" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="empjoiningdate" class="form-label">Employee Joining Date<span class="red">*</span></label>
                                <input type="date" class="form-control" id="empjoiningdate" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-sm-6">
                            <div>
                                <label for="empenddate" class="form-label">Employee End Date</label>
                                <input type="date" class="form-control" id="empenddate">
                            </div>
                        </div><!--end col--> 
                        <div class="col-sm-6">
                            <div>
                                <label for="loginActivation" class="form-label">Login Activation</label>
                                <select class="form-select mb-3" id="loginActivation" aria-label="Default select example">
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
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
<script>
function validateForm() {
    var firstName = document.getElementById('firstName').value;
    var empemailid = document.getElementById('empemailid').value;
    var empjoiningdate = document.getElementById('empjoiningdate').value;
    var passwordInput = document.getElementById('passwordInput').value;

    if (firstName.trim() === '') {
        alert('Please enter Employee Name');
        return false; // Prevents form submission
    }

    if (empemailid.trim() === '') {
        alert('Please enter Employee Email ID');
        return false; // Prevents form submission
    }

    if (empjoiningdate.trim() === '') {
        alert('Please enter Employee Joining Date');
        return false; // Prevents form submission
    }

    if (passwordInput.trim() === '') {
        alert('Please enter Password');
        return false; // Prevents form submission
    }

    // Validation for other fields can be added similarly

    // If all validations pass, the form will be submitted
    return true;
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

<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

@endsection
