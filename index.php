<?php
    include_once 'init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="./Css_files/main.css?<?php echo time(); ?>" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"
        integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Web-based Billing Management System</title>
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

    <!--NAVIGATION-->
    <nav>
        <div class="nav2">
            <img src="./images/logo.png" alt="">
            <div class="nav2-text">
                <span>Pyro Colleges Inc.</span>
                <p>Excellence at its finest.</p>
            </div>
        </div>

    </nav>


    <!--MAIN FORM-->
    <main>
        <div class="login-box">
            <img src="./images/logo.png" alt="">
            <div class="login-header">
                <p>Login</p>
            </div>
            <form action="">
                <div class="login__">
                    <i class="fas fa-user-tie"></i><input type="email" name="" id="" placeholder="Email Address">
                </div>

                <div class="login__">
                    <i class="fas fa-lock"></i><input type="password" name="" id="" placeholder="Password">

                </div>
                <button type="submit">Login</button>

                <p class="form_p log-reg"><a class="span_login">Login</a> | <a href="./html/registration.php"
                        class="span_register">Register</a></p>

                <a href="./html/registrar_access.php" class="form_p forgot-pass">Forgot Password?</a>

            </form>

        </div>

    </main>


    <script type="text/javascript">
        $(window).on("load", function () {
            $(".loader-wrapper").fadeOut('xslow');
        });

    </script>



</body>

</html>