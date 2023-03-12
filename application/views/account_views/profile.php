
<style>
    .table tr:hover{
        background: var(--bs-gray-100);
    }
</style>

            
    <div class="page-heading">
        <h3>Profile</h3>
    </div>
    <div class="page-content">
    <!-- Basic Tables start -->
    <section class="section">
            <div class="row match-height">
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            
                            
                        </div>
                        <div class="card-body w-100">
                            <div class="profile-avatar text-center">
                                <div class="avatar avatar-xl m-auto bg-primary">
                                    <div class="avatar-content">J</div>
                                </div>
                                <h4 class=" mt-2"><?php echo $user_data->emp_name ?></h4>
                                <p class="fs-6 text-dark"><?php echo $user_data->role_name ?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="card-title">Personal Details</div>
                            
                        </div>
                        <div class="card-body w-100">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left ">
                                                <div class="position-relative">
                                                    <input disabled type="text" class="form-control" placeholder="Name" value="<?php echo $user_data->emp_name ?>"
                                                        id="first-name-icon">
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
                                                    <div class="input-group">
                                                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $user_data->emp_email ?>"id="first-name-icon">
                                                        <div class="input-group-append">
                                                            <span class="input-group-item btn text-primary" id="basic-addon1"> <i class="fa-solid fa-pen"></i> </span>
                                                        </div>
                                                    </div>    
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
                                                    <div class="input-group">
                                                        
                                                        <input type="number" class="form-control" placeholder="Mobile" value="<?php echo $user_data->emp_phno ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text btn text-primary" id="basic-addon1"> <i class="fa-solid fa-pen"></i> </span>
                                                        </div>
                                                    </div>   
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
