<?php
$status='';
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
        <h3>Change Password</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="section">
            


    <div class="card col-md-6">
                <div class="card-header d-flex">
                    
                    
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url() ?>Admin/RegisterCustomer" method="post" class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Current Password:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="Old Password" name="current_pass" id="current-pass" required>
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                Incorrect Password.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>New Password:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="New Password" name="new_pass" required 
                                                id="new-pass">
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                invalid email
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Confirm Password:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="position-relative">
                                            
                                            <input type="text" class="form-control" id="confirm-pass" name="confirm_pass" placeholder="Confirm New Password" required>
                                            <div class=" invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                this phone is already exists.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" id="change-pass-btn" class="btn btn-primary me-1 mb-1">Change Password</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Cancel</button>
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
            $('#change-pass-btn').on('click',()=>{
                let newPass = $('#new-pass').val()
                let confirmPass = $('#confirm-pass').val()
                let currentPass = $('#current-pass').val()
                
                if(newPass != confirmPass){
                    $('#confirm-pass').addClass('is-invalid')
                    $('#confirm-pass').next().text('two passwords not matched.')
                }else if (newPass == '' || confirmPass == '' || currentPass == ''){
                    $('#confirm-pass').addClass('is-invalid')
                    $('#confirm-pass').next().text('please fill all fields.')
                    $('#current-pass').addClass('is-invalid')
                    $('#current-pass').next().text('password cannot be empty.')
                    $('#new-pass').addClass('is-invalid')
                    $('#new-pass').next().text('password cannot be empty.')
                
                
                }else if( confirmPass == ''){
                    $('#confirm-pass').addClass('is-invalid')
                    $('#confirm-pass').next().text('password cannot be empty.')
                }else if( currentPass == ''){
                    $('#current-pass').addClass('is-invalid')
                    $('#current-pass').next().text('password cannot be empty.')
                }else if (newPass == ''){
                    $('#new-pass').addClass('is-invalid')
                    $('#new-pass').next().text('password cannot be empty.')
                }else{
                    $('.is-invalid').next().text('')
                    $('.is-invalid').removeClass('is-invalid')


                        $.ajax({
                            url: '<?= base_url() ?>Admin/UpdatePass',
                            method: 'POST',
                            data: {current_pass:currentPass,new_pass:newPass},
                            success:(data)=>{
                                if(data.status === 'incorrect_pass'){
                                    $('#current-pass').addClass('is-invalid')
                                    $('#current-pass').next().text('Incorrect Password.')
                                    Toastify({
                                        text: "The password you entered is incorrect.",
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
                                }else if(data.status === 'pass_changed'){
                                    Toastify({
                                        text: data.message,
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
                                    $('.is-invalid').next().text('')
                                    $('.is-invalid').removeClass('is-invalid')
                                }
                                
                            }
                        })
                }
            })

            $('#confirm-pass').on('focus',function(){
                $('#confirm-pass').removeClass('is-invalid')
                $('#confirm-pass').next().text('')
            })

        })

          
    </script>