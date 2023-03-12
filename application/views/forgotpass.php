

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app_assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app_assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app_assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/app_assets/css/pages/auth.css">
    <link rel="stylesheet" href="<?php echo base_url()?>app_assets/vendors/toastify/toastify.css">
    <!-- JQuery CDN link  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>app_assets/vendors/toastify/toastify.js"></script>

<style>
    #hidepass{
        cursor: pointer;
    }
    #hidepass:hover{
        color: green;
    }
</style>


</head>

<body>
<?php
if($status == 'failure'){
    ?>
<script>
Toastify({
  text: "Check your email & password and Try again",
  duration: 10000,
  destination: "",
  newWindow: true,
  close: true,
  gravity: "bottom", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true,
  backgroundColor: "#ff5a5f",
  onClick: function(){} // Callback after click
}).showToast();
</script>
    <?php
}

?>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 m-auto col-12">
        <div id="auth-left" class="text-center">
            <div class="auth-logo">
                <a href="index.html"><img src="<?php echo base_url() ?>/app_assets/images/logo/logo.png" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Forgot Password</h1>
            <p class="auth-subtitle mb-5">Fill your details</p>

            <div id="email_form" class="form-group position-relative has-icon-right mb-4">
                <input type="text" class="form-control form-control-xl" name="email" placeholder="Username or Email">
                
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Request confirmation code</button>
            </div>
            <form id="code_form" action="<?php echo base_url() ?>Admin/resetpassword" method="post">
                <div class="form-group position-relative has-icon-right mb-4">
                    <input type="text" class="form-control form-control-xl" name="code" placeholder="Enter Code">  
                </div>
                <div class="form-group position-relative has-icon-right">
                    
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                    
                    <div class="form-control-icon cursor-pointer">
                        <i id="hidepass" class="bi bi-eye"></i>
                    </div>
                </div>   
                <button type="button" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset Password</button>
            </form>
            <div class="text-center mt-5 text-lg fs-5">
                <p><a class="font-bold" href="<?php base_url()?>Admin/">Sign In</a></p>
            </div>
        </div>
    </div>
    
</div>

    </div>
</body>
<script>
    $(document).ready(function(){
        $('#code_form').hide();
        $('#email_form button').on('click',function(e){
            e.preventDefault();
            var email = $('input[name="email"]').val();
            $.ajax({
                url: '<?php echo base_url() ?>Admin/requestCode',
                type: 'post',
                data: {email:email},
                success: function(data){
                    if(data.status){
                        $('#email_form').hide();
                        $('#code_form').show();
                    }else{
                        Toastify({
                            text: "Check your email & password and Try again",
                            duration: 10000,
                            destination: "",
                            newWindow: true,
                            close: true,
                            gravity: "bottom", // `top` or `bottom`
                            position: "center", // `left`, `center` or `right`
                            stopOnFocus: true,
                            backgroundColor: "#ff5a5f",
                            onClick: function(){} // Callback after click
                            }).showToast();
                        }
                    }
                })
            })

            $('#code_form button').on('click',function(e){
                e.preventDefault();
                var code = $('input[name="code"]').val();
                $.ajax({
                    url: '<?php echo base_url() ?>Admin/resetpassword',
                    type: 'post',
                    data: {code:code, password: $('input[name="password"]').val()},
                    success: function(data){
                        if(data.status){
                            $('#code_form').hide();
                            $('#password_form').show();
                        }else{
                            Toastify({
                                text: "Check your email & password and Try again",
                                duration: 10000,
                                destination: "",
                                newWindow: true,
                                close: true,
                                gravity: "bottom", // `top` or `bottom`
                                position: "center", // `left`, `center` or `right`
                                stopOnFocus: true,
                                backgroundColor: "#ff5a5f",
                                onClick: function(){} // Callback after click
                                }).showToast();
                        }
                    }
                })
            })
        })




    var pass = document.querySelector('input[name="password"]');
    var hidepass = document.querySelector('#hidepass');
    hidepass.addEventListener('click', function(){
        if(pass.type == 'password'){
            pass.type = 'text';
            hidepass.classList.remove('bi-eye');
            hidepass.classList.add('bi-eye-slash-fill');
        }else{
            pass.type = 'password';
            hidepass.classList.remove('bi-eye-slash-fill');
            hidepass.classList.add('bi-eye');
        }
    })



</script>

</html>
