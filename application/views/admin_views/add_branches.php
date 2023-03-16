<?php
if($status == 'exists'){
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
</style>

            
    <div class="page-heading">
        <h3>Add New Branch</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="section">
            


    <div class="card col-md-6">
                <div class="card-header d-flex">
                    
                    
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url() ?>Admin/AddBranch" method="post" class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Branch Name :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Name" name="branch_name" id="branch_name" required>
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                name is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Branch Address :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Address" id="branch_address" name="branch_address" required 
                                                id="branch_address">
                                             <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                address is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Branch City :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="branch_city" name="branch_city" placeholder="City" required>
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                city is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Branch State :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="branch_state" name="state" placeholder="State" required>
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                state is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Branch Country :</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="branch_country" name="branch_country" placeholder="Country" required>
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Country is required.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <label>Customer Gender :</label>
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
                                </div> -->
                               
                                
                                
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" id="cust_reg_btn" class="btn btn-primary me-1 mb-1">Add Branch</button>
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
                const branch_name = $('#branch_name').val()
                const branch_address = $('#branch_address').val()
                const branch_city = $('#branch_city').val()
                const branch_state = $('#branch_state').val()
                const branch_country = $('#branch_country').val()
                if(branch_name == ''){
                    $('#branch_name').addClass('is-invalid')
                    $('#branch_name').focus()
                    return false
                }else{
                    $('#branch_name').removeClass('is-invalid')
                }

                if(branch_address == ''){
                    $('#branch_address').addClass('is-invalid')
                    $('#branch_address').focus()
                }else{
                    $('#branch_address').removeClass('is-invalid')
                }

                if(branch_city == ''){
                    $('#branch_city').addClass('is-invalid')
                    $('#branch_city').focus()
                }else{
                    $('#branch_city').removeClass('is-invalid')
                }

                if(branch_state == ''){
                    $('#branch_state').addClass('is-invalid')
                    $('#branch_state').focus()
                }else{
                    $('#branch_state').removeClass('is-invalid')
                }
                if(branch_country == ''){
                    $('#branch_country').addClass('is-invalid')
                    $('#branch_country').focus()
                }else{
                    $('#branch_country').removeClass('is-invalid')
                }

            })
        })
    </script>