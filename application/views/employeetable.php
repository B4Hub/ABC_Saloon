<?php

if($status == 'success'){
    ?>
<script>
Toastify({
  text: "New Customer Added Successfully",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#55a630",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'error'){
    ?>
<script>
Toastify({
  text: "Something went wrong !!",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#fb5607",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'deleted'){
    ?>
<script>
Toastify({
  text: "Customer Successfully Deleted!!",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#fb5607",//red
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'updated'){
    ?>
<script>
Toastify({
  text: "Customer Successfully Updated!!",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#55a630",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}elseif($status == 'exists'){
    ?>
<script>
Toastify({
  text: "Customer with this mobile number already exists!!",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#fb5607",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}

?>
<style>
    .table tr:hover{
        background: var(--bs-gray-100);
    }
    textarea:focus, input:focus{
        outline: none;
    }
</style>

            
    <div class="page-heading">
        <h3>Customers</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="section">
            <!-- Edit Customer modal Modal -->
            <div class="modal fade " id="edit_modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <form action="<?php echo base_url()?>Admin/EditCustomer" method="post">
                        <div class="modal-content">
                            
                        <form class="form form-horizontal">
                            <input type="hidden" name="cust_id" value="" id="edit_cust_id">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Customer Details
                                </h5>
                                <button type="button" class="btn" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa fa-close" data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="name" placeholder="Name"
                                                        id="edit_name">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                                        id="edit_email">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Mobile</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" name="mobile" id="edit_phno" placeholder="Mobile">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="m" type="radio" name="gender" id="edit-male-btn"
                                                            >
                                                        <label class="form-check-label" for="edit-male-btn">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="f" type="radio" name="gender" id="edit-female-btn"
                                                            >
                                                        <label class="form-check-label" for="edit-female-btn">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-danger me-auto"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Go Back</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" >
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Save Changes</span>
                                </button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
            <!-- MOdal Endas-->
            <!-- Vertically Centered modal Modal -->
            <div class="modal fade " id="customer-details-modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Customer Details
                            </h5>
                            <button type="button" class="btn" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fa fa-close" data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="profile-head d-flex align-items-center m-3">
                                <div class="avatar bg-primary avatar-xl">
                                    <div class="avatar-content" id="prof_name">J</div>
                                </div>
                                <div class="cust_name ms-3">
                                    <h5 style="margin-bottom:0px;" class=""id="cust_name">John</h5>
                                    <span class="btn text-primary p-0" style="font-size:0.9rem;" id="edit_cust_btn" data-bs-toggle="modal"
                                    onclick="send_edit_data()"
                                data-bs-target="#edit_modal" data-bs-dismiss="modal"> <i style="font-size:0.8rem;" class="fa fa-pencil"></i> Edit Customer</span>
                                </div>
                                <div class="badge bg-success ms-auto">
                                    Active Customer
                                </div>
                            </div>
                            <hr>
                            <div class="cust_details d-flex justify-content-between">
                                <div class="detail m-3 d-flex flex-column">
                                    <span class="text-dark">Customer ID</span>
                                    <span class=" text-secondary"id="cust_id">1546</span>
                                </div>
                                <div class="detail m-3 d-flex flex-column">
                                    <span class="text-dark">Mobile</span>
                                    <span class=" text-secondary"id="cust_phno">1546</span>
                                </div>
                                <div class="detail m-3 d-flex flex-column">
                                    <span class="text-dark">Email</span>
                                    <span class=" text-secondary"id="cust_email">1546@gmail.com</span>
                                </div>
                                
                            </div>
                            <div class="cust_details d-flex justify-content-between">
                                <div class="detail m-3 d-flex flex-column">
                                    <span class="text-dark">Gender</span>
                                    <span class=" text-secondary"id="cust_gender">Male</span>
                                </div>
                                
                                
                            </div>
                            <h5 id="customer_name_modal" class="text-center"></h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn text-danger me-auto"
                                data-bs-dismiss="modal" data-bs-toggle="modal"
                                id="cust_delete_btn"
                                onclick="send_delete_data()"
                                data-bs-target="#customer-delete-modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Delete Customer</span>
                            </button>
                            <a type="button" class="btn btn-warning mx-auto" href="<?php echo base_url()?>Admin/Alerts">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Send Alert</span>
                            </a>
                            <form action="<?php echo base_url() ?>Admin/BookAppointment" method="post">
                                <input type="hidden" name="book_cust_id" value="" id="book_cust_id">
                                <button type="submit" class="btn btn-primary ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Book Appointment</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MOdal Endas-->


            <!--  DELETE modal Modal -->
            <div class="modal fade " id="customer-delete-modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 id="delete_title"class="modal-title text-danger">This Customer will be deleted !!
                            </h5>
                            <button type="button" class="btn" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i class="fa fa-close" data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            You cannot access this data after deleted...
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Cancel</span>
                            </button>
                            <form action="<?php echo base_url() ?>Admin/DeleteCustomer" method="post">
                                <input id="delete_cust_id" type="hidden" value="" name="cust_id">
                                <button id="delete_customer_btn" onclick="delete_customer()" type="submit" class="btn btn-danger ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span id="cust_delete_name" class="d-none d-sm-block">Delete Anyway?</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MOdal DELETE Endas-->


            <div class="card">
                <div class="card-header d-flex">
                    
                    <div class="" style="margin-left:auto ;">
                        <a href="<?php echo base_url()?>Admin/AddCustomer" class="btn btn-primary">Add New Customer</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-center">Gender</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $cnt=0;
                                foreach($customers as $employee){
                                    ?>
                                    <tr role="button" id="customer<?php echo $cnt ?>" onclick="customer_details(<?php echo $cnt ?>)" data-bs-toggle="modal"
                                data-bs-target="#customer-details-modal" data-name="<?php echo $employee['cust_name'] ?>"
                                 data-id="<?php echo $employee['cust_id'] ?>" data-mobile="<?php echo $employee['cust_phno'] ?>"
                                  data-email="<?php echo $employee['cust_email'] ?>" data-gender="<?php echo $employee['cust_gender'] ?>">
                                        <td><?php echo $employee['cust_name'] ?></td>
                                        <td><?php echo $employee['cust_email'] ?></td>
                                        <td><?php echo "xxxxx xx".substr($employee['cust_phno'],7) ?></td>
                                        <td class="text-center"><?php if($employee['cust_gender'] == 'm'){ echo 'Male <i class="text-primary fa fa-mars"></i>';}else{ echo ' Female <i style="color:#e83e8c" class="fa fa-venus"></i>';} ?></td>
                                        <td>
                                            <span class="badge bg-success"><?php echo $employee['cust_status'] ?></span>
                                        </td>
                                
                                    </tr>
                                    <?php
                                    $cnt++;
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
    <script src="<?php echo base_url() ?>app_assets/vendors/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>app_assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>app_assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script>
// Jquery Datatable
let jquery_datatable = $("#table1").DataTable();
const customer_details = (id)=>{
    let name = $('#customer'+id).data('name');
    let cust_id = $('#customer'+id).data('id');
    let mobile = $('#customer'+id).data('mobile');
    let email = $('#customer'+id).data('email');
    let gender = $('#customer'+id).data('gender');
    $('#cust_name').text(name);
    $('#cust_id').text(cust_id);
    $('#cust_phno').text(mobile);
    $('#cust_email').text(email);
    $('#prof_name').text(name[0]);
    $('#book_cust_id').val(cust_id);

    if(gender === 'm'){
        $('#cust_gender').html('Male <i class="text-primary fa fa-mars"></i>');
    }else{
        $('#cust_gender').html('Female <i style="color:#e83e8c" class="fa fa-venus"></i>');
    }
    $("#cust_delete_btn").attr('data-id',cust_id);
    $("#cust_delete_btn").attr('data-name',name);
    $("#edit_cust_btn").attr('data-id',cust_id);
    $("#edit_cust_btn").attr('data-name',name);
    $("#edit_cust_btn").attr('data-email',email);
    $("#edit_cust_btn").attr('data-mobile',mobile);
    $("#edit_cust_btn").attr('data-gender',gender);


    
}


    const send_delete_data = ()=>{
        let name = $('#cust_delete_btn').attr('data-name');
        let cust_id = $('#cust_delete_btn').attr('data-id');
        $('#cust_delete_name').html('Delete '+name+' Anyway');
        $('#delete_title').html('Delete '+name+' ??');
        $('#delete_cust_id').val(cust_id);
    };
    const send_edit_data = ()=>{
        let name = $('#edit_cust_btn').attr('data-name');
        let cust_id = $('#edit_cust_btn').attr('data-id');
        let email = $('#edit_cust_btn').attr('data-email');
        let mobile = $('#edit_cust_btn').attr('data-mobile');
        let gender = $('#edit_cust_btn').attr('data-gender');
        $('#edit_name').val(name);
        $('#edit_phno').val(mobile);
        $('#edit_email').val(email);
        $('#edit_cust_id').val(cust_id);
        $('#edit_prof_name').text(name[0]);
        if(gender === 'm'){
            $('#edit-male-btn').attr('checked','checked');
        }else{
            $('#edit-female-btn').attr('checked','checked');

        }
    };
    function book_appointment(){
        let cust_id =$('#cust_id').text();

    }
</script>

</div>