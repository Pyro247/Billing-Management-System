<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/forgotPassword.css?<?php echo time(); ?>" />


      <!-- Javascript for Loader -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"
        integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- For Loader -->
   <script type="text/javascript">
        $(window).on("load", function () {
            $(".loader-wrapper").fadeOut('xslow');
        });

        window.FontAwesomeConfig = {
            searchPseudoElements: true
        }

    </script>

    <title>Document</title>
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


    <div class="forgot_wrapper">

        <form action="../html/reset_password.php">
        <img src="../images/logo.png" alt="">
            <span class="fyp">Forgot your password?</span>
            <p>Don't worry! Resseting your password is easy. Just type in the email you used to register with us.</p>

            <input type="email" name="email" id="email" placeholder="Email" required>
            <button type="submit" name="submit">Submit</button>
            
            <span class="foot">Did you remember your password? <a href="./login.php">Try logging in</a></span>
        </form>
    </div>
</body>
</html>