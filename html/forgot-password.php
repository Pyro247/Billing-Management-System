<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/forgot-password.css?<?php echo time(); ?>" />

    <title>Document</title>
</head>
<body>
    <!-- FORGOT PASSWORD -->
    <div class="popup-forgot-password" id="forgot-bodyId">
        <h2 id="forgot-main-title">Forgot Password?</h2>
        <img src="/images/worried.png" alt="" class="forgot-passwordImg" id="forgot-passwordImgID">
        <h4 id="forgot-password-title">Did someone forgot their password?</h4>
        <p id="forgot-ok">That's ok...</p>
        <p id="forgot-message">Just enter the email address you've used to register with us and we'll send you a reset code!</p>
        <form action="">
            <input type="email" name="" id="forgot-email-input" required placeholder="Email Address" class="forgot-password-input">
            <input type="submit" value="Send" class="forgot-password-btn" id="forgot-btn" onclick="forgot_otp()">
        </form>
    </div>



    <!-- OTP SEND POPUP-->
    <div class="forgot-password-otp" id="otpId">
        <h3>OTP Verification</h3>
        <div class="otp-box">
            <p>We've sent a verification code to your email.
            Please enter the OTP below to reset your password.</p>
        </div>
        <form action="">
        <input type="text" name="" id="" placeholder="One time pin">
        <input type="submit" value="Submit">
        </form>
        
    </div>

    <script type="text/javascript">
        function forgot_otp(){
            let otpId = document.getElementById('otpId');
            let bodyId = document.getElementById('forgot-bodyId');
            otpId.classList.toggle('active');
            bodyId.classList.toggle('active');
        }
    </script>
</body>
</html>