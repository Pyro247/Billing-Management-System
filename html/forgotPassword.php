<?php
    session_start();
?>
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- For Loader -->
    <script type="text/javascript">
        $(window).on("load", function () {
            closeLoader()
        }); 
        function openLoader(){
            $(".loader-wrapper").fadeIn('xslow');
        }
        function closeLoader(){
            $(".loader-wrapper").fadeOut('xslow');
        }

    </script>

    <title>Forgot Password</title>
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

        <form action="" method="POST">
        <img src="../images/logo.png" alt="">
            <span class="fyp">Forgot your password?</span>
            <p>Don't worry! Resseting your password is easy. Just type in the email you used to register with us.</p>

            <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off">
            <button type="button" name="submit" id="submit">Submit</button>
            
            <span class="foot">Did you remember your password? <a href="./login.php">Try logging in</a></span>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#submit').click(function (e) { 
                e.preventDefault();
                if($('#email').val() == ''){
                    Swal.fire(
                        'Empty Field',
                        'No email entered',
                        'info'
                    )
                }else{
                    $.ajax({
                    type: "POST",
                    url: "../includes/resetPassword.inc.php",
                    beforeSend: function() {
                        openLoader()
                    },
                    data: {
                        'submit': 1,
                        'email': $('#email').val()
                    },
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response)
                        if(response.status == 'success'){
                            window.location.replace("../html/reset_password.php");
                        }else{
                            Swal.fire({
                                icon: response.status,
                                text: response.message,
                                confirmButtonText: 'Ok'
                            })
                        }
                    },
                    complete: function() {
                        closeLoader()
                    },
                });
                }
                
            });
        });
    </script>
</body>
</html>