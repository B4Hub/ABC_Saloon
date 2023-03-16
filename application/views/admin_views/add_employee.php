<?php
if($status == 'exists'){
    ?>
<script>
Toastify({
  text: "Employee with this mobile number already exists!!",
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
</style>

            
    <div class="page-heading">
        <h3>Add New Employee</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="section">
            


    <div class="card col-md-6">
                <div class="card-header d-flex">
                    
                    
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url() ?>Admin/RegisterEmployee" method="post" class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Employee Name :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Name" name="cust_name" id="cust_name" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Employee Email :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="email" class="form-control" placeholder="Email" name="cust_email" required 
                                                id="cust_email">
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                invalid email
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Employee Mobile :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="cust_phno" name="cust_phno" placeholder="Mobile" required>
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                this phone is already exists.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Employee Salary :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="number" class="form-control" id="emp_salary" name="emp_salary" placeholder="Salary" required>
                                            <!-- <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                this phone is already exists.
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Employee Status:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="active" type="radio" name="status" id="edit-active-btn"
                                                            >
                                                        <label class="form-check-label" for="edit-active-btn">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="inactive" type="radio" name="status" id="edit-inactive-btn"
                                                            >
                                                        <label class="form-check-label" for="edit-inactive-btn">
                                                            Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                               

                                <div class="col-md-4">
                                    <label>Employee Role Id :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Role Id" required>
                                            <!-- <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                this phone is already exists.
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Employee Branch Id :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="emp_branch_id" name="emp_branch_id" placeholder="Branch Id" required>
                                            <!-- <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                this phone is already exists.
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Employee Gender :</label>
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
                                
                                
                                
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" id="cust_reg_btn" class="btn btn-primary me-1 mb-1">Add Employee</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div> 
    <script>
        $(document).ready(()=>{
            $('#cust_reg_btn').on('click',()=>{
                let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                let testMobile = /^(\+\d{1,3}[- ]?)?\d{10}$/;
                const name = $('#cust_name').val()
                const email = $('#cust_email').val()
                const mobile = $('#cust_phno').val()
                const gender = $('input[name=gender]:checked').val()
                if(!testEmail.test(email)){
                    
                    $('#cust_email').addClass('is-invalid')
                    $('#cust_email').next().text('invalid email')

                    if(!testMobile.test(mobile)){
                        
                        $('#cust_phno').addClass('is-invalid')
                        $('#cust_phno').next().text('invalid mobile')
                    }else{
                        $('#cust_phno').removeClass('is-invalid')
                    }
                }else{
                    $('#cust_email').removeClass('is-invalid')
                    
                    if(!testMobile.test(mobile)){
                        
                        $('#cust_phno').addClass('is-invalid')
                        $('#cust_phno').next().text('invalid mobile')
                    }else{
                        $('#cust_phno').removeClass('is-invalid')

                        $.ajax({
                            url: '<?= base_url() ?>Admin/RegisterEmployee',
                            method: 'POST',
                            data: {cust_name:name,cust_email:email,cust_phno:mobile,gender:gender},
                            success:(data)=>{
                                if(data.status === 'mobile_exists'){
                                    $('#cust_phno').addClass('is-invalid')
                                    $('#cust_phno').next().text('this mobile number already exists.')
                                    Toastify({
                                        text: "Employee with this mobile number already exists!!",
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
                                }
                                if(data.status === 'registration_success'){
                                    top.location.href="http://localhost/ABC_Saloon/Admin/EmployeesList"
                                }
                            }
                        })
                    }
                }

            })
        })
    </script>