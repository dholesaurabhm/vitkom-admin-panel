
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.order-details'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Order <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Orders Details <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <input type="hidden" name="seller_id" id="seller_id" value=<?php echo e(Auth::user()->seller_id); ?>>
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                   <div class="d-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order #<?php echo e($id); ?></h5>
                        <div class="flex-shrink-0" id="status_action">
                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModel"><i class="ri-download-2-fill align-middle me-1"></i> Approve Order</button>

                            <button  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModel"><i class="ri-download-2-fill align-middle me-1"></i> Reject Order</button>

                        </div>
                   </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap align-middle table-borderless mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                  <th scope="col">Product Details</th>
                                  <th scope="col">Item Price</th>
                                  <th scope="col">Quantity</th>
                                  
                                  <th scope="col" class="text-end">Total Amount</th>
                                  
                                </tr>
                              </thead>
                            <tbody id="product_list">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card" style="display:none;">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                        <div class="flex-shrink-0 mt-2 mt-sm-0">
                            <a href="javasccript:void(0;)" class="btn btn-soft-info btn-sm mt-2 mt-sm-0"><i class="ri-map-pin-line align-middle me-1"></i> Change Address</a>
                            <a href="javasccript:void(0;)" class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"><i class="mdi mdi-archive-remove-outline align-middle me-1"></i> Cancel Order</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="profile-timeline">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingOne">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-0 fw-semibold">Order Placed - <span class="fw-normal">Wed, 15 Dec 2021</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">An order has been placed.</h6>
                                        <p class="text-muted">Wed, 15 Dec 2021 - 05:34PM</p>

                                        <h6 class="mb-1">Seller has proccessed your order.</h6>
                                        <p class="text-muted mb-0">Thu, 16 Dec 2021 - 5:48AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingTwo">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="mdi mdi-gift-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Packed - <span class="fw-normal">Thu, 16 Dec 2021</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="mb-1">Your Item has been picked up by courier patner</h6>
                                        <p class="text-muted mb-0">Fri, 17 Dec 2021 - 9:45AM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingThree">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-success rounded-circle">
                                                    <i class="ri-truck-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-15 mb-1 fw-semibold">Shipping - <span class="fw-normal">Thu, 16 Dec 2021</span></h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body ms-2 ps-5 pt-0">
                                        <h6 class="fs-14">RQK Logistics - MFDS1400457854</h6>
                                        <h6 class="mb-1">Your item has been shipped.</h6>
                                        <p class="text-muted mb-0">Sat, 18 Dec 2021 - 4.54PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingFour">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-light text-success rounded-circle">
                                                    <i class="ri-takeaway-fill"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Out For Delivery</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <div class="accordion-header" id="headingFive">
                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFile" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs">
                                                <div class="avatar-title bg-light text-success rounded-circle">
                                                    <i class="mdi mdi-package-variant"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-0 fw-semibold">Delivered</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div><!--end accordion-->
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-xl-3">
            

            <div class="card">
                <div class="card-header">
                   <div class="d-flex">
                        <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                        
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 vstack gap-3">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>" alt="" class="avatar-sm rounded" id="customer_avater">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                   <h6 class="fs-14 mb-1" id="customer_name"></h6>
                                   <p class="text-muted mb-0">Customer</p>
                                </div>
                            </div>
                        </li>
                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16" ></i><span id="customer_email"></span></li>
                        
                    </ul>
                </div>
            </div><!--end card-->
            
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping Address</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                        <li class="fw-medium fs-14" id="ship_name"></li>
                        <li id="ship_mobile"></li>
                        <li id="ship_address"></li>
                        <li id="ship_city"></li>
                        <li id="ship_zipcode"></li>
                    </ul>
                </div>
            </div><!--end card-->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Payment Details</h5>
                </div>
                <div class="card-body">
                    
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Payment Method:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0" id="payment_method"></h6>
                         </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                           <p class="text-muted mb-0">Total Amount:</p>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0" id="payment_total"></h6>
                         </div>
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->

       <!-- removeItemModal -->
       
    <div class="modal fade" id="approveModel" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Approve Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);">
                        <div class="row g-3">
                            
                           
                            <div class="col-xxl-6">
                                <label for="emailInput" class="form-label">Delivery Date</label>
                                <input type="date" class="form-control" id="delivery_date" placeholder="Select Delivery Date">
                              
                            </div><!--end col-->

                            <div class="col-xxl-6">
                                <label for="emailInput" class="form-label">Delivery Time</label>
                                <input type="time" class="form-control" id="delivery_time" placeholder="Select Delivery Time">
                            </div><!--end col-->
                         
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="approve_order()">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rejectModel" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Reject Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);">
                        <div class="row g-3">
                            
                           
                            <div class="col-xxl-6">
                                <label for="emailInput" class="form-label">Reason</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3">Sorry ! Currently this product is not present. 
                                </textarea>
                            </div><!--end col-->
                         
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="reject_order()">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/notifications.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script>
         var order_id='<?php echo e($id); ?>';
            var seller_id=$('#seller_id').val();
         $(document).ready(function(){
            getdetails();
            var current_date = new Date().toISOString().split("T")[0];
            console.log(current_date)
            $('#delivery_date').attr('min',current_date)
        });

        function getdetails()
        {
            if(order_id!=0)
            {
                $.ajax({
                type: "POST",
                url: base_url+"order_details",
                data: {order_id:order_id,seller_id:seller_id},
                success: function(result) {
                    console.log("ajax data=", result)
                    if(result.data.address)
                    {
                        if(result.data.customer)
                        {
                           $('#customer_name').text(result.data.customer.name);
                           $('#customer_email').text(result.data.customer.email);
                        }
                        $('#ship_name').text(result.data.address.name);
                        $('#ship_mobile').text(result.data.address.mobile_no);
                        $('#ship_address').text(result.data.address.address);
                        $('#ship_city').text(result.data.address.city);
                        $('#ship_zipcode').text(result.data.address.zipcode);
                        $('#payment_method').text(result.data.address.payment_method);
                        $('#payment_total').text(result.data.address.total_payment);
                        if(result.data.address.seller_status!=0)
                        {
                            $('#status_action').hide();
                        }
                    
                        var list='';
                       // for(var i = 0; i < (result.data.product).length; i++) {
                        (result.data.product).forEach(function(el, index) {
                           list+= `<tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                <img src="${file_url}/${el.image}" alt="" class="img-fluid d-block">
                                            </div>
                                           <div class="flex-grow-1 ms-3">
                                                <h5 class="fs-15"><a href="apps-ecommerce-product-details" class="link-primary">${el.product_name}</a></h5>
                                           </div>
                                        </div>
                                    </td>
                                    <td>${el.currency} ${el.price}</td>
                                    <td>${el.quantity}</td>
                                   
                                    <td class="fw-medium text-end">
                                        ${el.currency} ${el.price * el.quantity}
                                    </td>
                                   
                                </tr>`;
                            });
                        $('#product_list').append(list);
// <td class="fw-medium text-end">
   // <button type="button" class="btn btn-success" onclick="openapprovemodel(${el.id})">Approve</button>
                                      //  <button type="button" class="btn btn-danger" onclick="update_status(${el.id},2)">Reject</button>  </td>
                        
                    }      
                },
                error: function(error) {
                    console.log(error)
                    $('#error_msg').attr('data-toast-text',error.responseJSON.message).trigger('click');
                 }
                });
            }
        }

        function update_status(id,status)
        {
            $.ajax({
                type: "POST",
                url: base_url+"order_item_status/",
                data: {item_id:id,status:status},
                success: function(result) {
                    console.log("ajax data=", result)     
                    $('#success_msg').attr('data-toast-text',result.message).trigger('click');
                },
                error: function(error) {
                    console.log(error)
                    $('#error_msg').attr('data-toast-text',error.responseJSON.message).trigger('click');
                 }
                });
    
        }

    // function openapprovemodel(id)
    // {
    //     console.log(id)
    //     $('#approveModel').modal('show');
       
    // }

    function approve_order()
        {
            var delivery_date=$('#delivery_date').val();
            var delivery_time=$('#delivery_time').val();
           
            if(delivery_date =='' && delivery_time =='')
            {
                $('#error_msg').attr('data-toast-text','Please Select Delivery Date and Time').trigger('click');
            }
            else{
            $.ajax({
                type: "POST",
                url: base_url+"approve_order",
                data: {order_id:order_id,seller_id:seller_id,delivery_date:delivery_date,delivery_time:delivery_time},  
                success: function(result) {
                    console.log("ajax data=", result)   
                    $('#approveModel').modal('hide');  
                    $('#success_msg').attr('data-toast-text',result.message).trigger('click');
                    window.location.href='/orders';
                },
                error: function(error) {
                    console.log(error)
                    $('#error_msg').attr('data-toast-text',error.responseJSON.message).trigger('click');
                 }
                });
            }
    
        }

        
    function reject_order()
        {
            var reason=$('#reason').val();
        
            if(reason =='' )
            {
                $('#error_msg').attr('data-toast-text','Please Enter Reason').trigger('click');
            }
            else{
            $.ajax({
                type: "POST",
                url: base_url+"reject_order",
                data: {order_id:order_id,seller_id:seller_id,reason:reason},  
                success: function(result) {
                    console.log("ajax data=", result)   
                    $('#rejectModel').modal('hide');  
                    $('#success_msg').attr('data-toast-text',result.message).trigger('click');
                    window.location.href='/orders';
                },
                error: function(error) {
                    console.log(error)
                    $('#error_msg').attr('data-toast-text',error.responseJSON.message).trigger('click');
                 }
                });
            }
    
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\order_now_admin\resources\views/orders_details.blade.php ENDPATH**/ ?>