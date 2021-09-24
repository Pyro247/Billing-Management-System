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
        <form action="">
        <img src="../images/email.png" alt="">
            <span class="fyp">Check your email!</span>
            <p>We've sent you an One-Time-Pin(OTP) on your email <span class="email_span">email@example.com</span>. Please enter the OTP below to proceed in resetting your password.</p>
            <input type="numer" name="otp" id="otp" placeholder="One-Time-Pin" required autocomplete="off">
            <button type="submit" name="submit">Submit</button>
            <span class="foot">Did you remember your password? <a href="./login.php">Try logging in</a></span>
            
        </form>
        <button onclick="change_view()">temporary to view change pass</button>
    </div>

    
    <div class="reset_pass_wrapper change__" id="reset_page_id">
        <form action="./html/login.php">
            <img src="../images/change_pass.png" alt="">
            <span class="fyp">Enter your new password</span>
            <input type="password" name="" id="" required autocomplete="off" placeholder="New Password">
            <input type="password" name="" id="" required autocomplete="off" placeholder="Confirm Password">
            <button type="submit" name="submit">Change</button>
        </form>
    </div>
</div>
    
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