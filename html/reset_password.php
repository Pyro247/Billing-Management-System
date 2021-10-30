<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/reset_password.css?<?php echo time(); ?>" />

    
        <!-- Javascript for Loader -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"
        integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- For Loader -->
    <script type="text/javascript">
        $(window).on("load", function () {
            $(".loader-wrapper").fadeOut('xslow');
        });

        window.FontAwesomeConfig = {
            searchPseudoElements: true
        }

    </script>


        <!-- Javascript for Loader -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"
        integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- For Loader -->
    <script type="text/javascript">
        $(window).on("load", function () {
            $(".loader-wrapper").fadeOut('xslow');
        });

        window.FontAwesomeConfig = {
            searchPseudoElements: true
        }

    </script>

    <title>Reset Password</title>
</head>
<body>
        <!-- LOADER! -->
        <div class="loader-wrapper" id="loader-wrapperID">
            <div class="wrapper">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="shadow"></div>
                <div class="shadow"></div>
                <div class="shadow"></div>
                <span>Pyro Colleges Inc.</span>
            </div>
        </div>
        <!-- LOADER -->
      
        <div class="parentContainer">

        <div class="reset_pass_wrapper" id="otp_page_id">
        <form action="" method="POST">
            <img src="../images/email.png" alt="">
            <span class="fyp">Check your email!</span>
            <p>We've sent you an One-Time-Pin(OTP) on your email <span class="email_span"><?= $_SESSION['email'];?></span>. Please enter the OTP below to proceed in resetting your password.</p>
            <input type="hidden" name="email" value="<?= $_SESSION['email'];?>">
            <input type="number" name="otp" id="otp" placeholder="One-Time-Pin" required autocomplete="off">
            <button type="button" name="verifiedOtp" id="verifiedOtp">Submit</button>
            <span class="foot">Did you remember your password? <a href="./login.php">Try logging in</a></span>
        </form>
        <!-- <button onclick="change_view()">temporary to view change pass</button> -->
    </div>
                
    
    <div class="reset_pass_wrapper change__" id="reset_page_id">
        <form action="../includes/resetPassword.inc.php" method="POST">
            <img src="../images/change_pass.png" alt="">
            <span class="fyp">Enter your new password</span>
            <input type="hidden" name="email" value="<?= $_SESSION['email'];?>">
            <input type="password" name="password" id="password" required autocomplete="off" placeholder="New Password">
            <input type="password" name="confirmPass" id="confirmPass" required autocomplete="off" placeholder="Confirm Password">
            <button type="button" name="changePass" id="change">Change</button>
        </form>
    </div>
</div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#verifiedOtp').click(function (e) { 
                e.preventDefault();
                if($('#otp').val() == 0){
                    Swal.fire(
                        'Empty Field',
                        'No OTP entered',
                        'info'
                    )
                }else{
                    $.ajax({
                    type: "POST",
                    url: "../includes/resetPassword.inc.php",
                    data: {
                        'verifiedOtp': 1,
                        'otp': $('#otp').val(),
                        'email': '<?= $_SESSION['email'];?>'
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response)
                        if(response.status == 'info'){
                            Swal.fire({
                                icon: 'info',
                                text: 'OTP is expired',
                                confirmButtonText: 'Ok'
                            }).then(function() {
                                window.location.replace("../html/forgotPassword.php");
                            });
                        }else if(response.status == 'error'){
                            Swal.fire({
                                icon: response.status,
                                text: response.message,
                                confirmButtonText: 'Ok'
                            })
                        }else{
                            change_view()
                        }
                    }
                });
                }
            });
            $('#change').click(function (e) { 
                e.preventDefault();
                if($('#password').val() != $('#confirmPass').val()){
                    Swal.fire(
                        'Password not match',
                        're-enter your disired password',
                        'info'
                    )
                }else{
                    $.ajax({
                    type: "POST",
                    url: "../includes/resetPassword.inc.php",
                    data: {
                        'changePass': 1,
                        'email': '<?= $_SESSION['email'];?>',
                        'password': $('#password').val(),
                        'confirmPass': $('#confirmPass').val()

                    },
                    dataType: "json",
                    success: function (response) {
                        Swal.fire({
                                icon: response.status,
                                text: response.message,
                                confirmButtonText: 'Ok'
                        }).then(function() {
                            window.location.replace("../html/login.php");
                        });
                        
                    }
                });
                }
                
            });
        });
    </script>
    <script type="text/javascript">
    let otp_page = document.getElementById('otp_page_id');
    let reset_page = document.getElementById('reset_page_id');
        function change_view(){
            otp_page.classList.toggle('hide');
            reset_page.classList.toggle('active')
            
        }
    </script>
    
</body>
</html>