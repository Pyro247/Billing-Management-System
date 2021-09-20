<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/login.css">

    <!-- FontAwsome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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



    <title>Login</title>
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


    <img src="../images/index_img/index_bg.jpg" alt="" class="bg">
    <div class="wrapper_l">
        <form action="">
            <a href="../index.html" class="back_link"><i class="fas fa-arrow-circle-left"></i></a>

            <img src="../images/logo.png" alt="">
            <span>Billing Management system</span>
            <hr>
            <div class="inputs_wrapper">
                <span>Login</span>

                    <div class="inputs">
                        <div class="input-user">
                            <i class="fas fa-user-tie">
                                <input type="text" name="" id="" placeholder="Email" required>
                            </i>
                        </div>

                    
                        <div class="input-user">
                            <i class="fas fa-key">
                                <input type="password" name="" id="" placeholder="Password" required>
                            </i>
                            
                        </div>
                        <button type="submit">Login</button>
                        
                        <a href="../html/forgot-password.php" class="fp">Forgot Password?</a>
                    </div>
                    
                    
                    <span>Dont have an account yet? <a href="..\html\registrationCheckID.php" class="reg_link">Register here</a></span>
            </div>
        </form>
    </div>


</body>
</html>