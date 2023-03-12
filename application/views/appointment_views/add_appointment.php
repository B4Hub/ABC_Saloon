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
        <h3>Add Appointment</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="section">
           
            



            <div class="card">
                <div class="card-header d-flex">
                    Jquery Datatable
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
                                <th>Booking</th>
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
                                        <div class="" style="margin-left:auto ;">
                                           <form action="<?php echo base_url()?>Admin/BookAppointment" method="post">
                                              <input type="hidden" name="book_cust_id" value="<?php echo  $employee['cust_id'] ?>">
                                              <button type="submit" class="btn btn-primary">Book Appointmnet</button>
                                           </form>
                                       </div>
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