
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registration.css?<?php echo time(); ?>" />

    <!-- JS LOADER -->
    <script type="text/javascript">
        // Onload loader transition
        $(window).on("load", function(){
                $(".loader-wrapper").fadeOut('xslow');
        });

        
    </script>


    <title>Registration | University Example</title>
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

    
    <!-- NAVBARRRRRRRRRRR -->
    

    <!-- Validator -->
    <?php
        include_once '../includes/checkId.php';
    ?>
    <img src="../images/register_bg.jpg" alt="Pyro University" class="bg">
    <div class="popup-validator" id="popup-id">
    <a href="../index.html" class="back_link"><i class="fas fa-arrow-circle-left"></i></a>
        <form action="" method="POST">

            

            <img src="../images/logo.png" alt="">
            <span class="below_image">Billing Management system</span>

            <span class="below_image__">Register</span>
            
            <h3>Please enter ID number</h3>
            <input type="number" name="userId" id="" placeholder="ID number">
            <input type="submit" name="checkID" id="checkID" value="Submit">
<<<<<<< HEAD
            <p>Already have an account? <a href="./login.php">Login Here</a></p>
=======
            <p>Already have an account? <a href="../html/login.php" class="login_link">Login Here</a></p>
            
>>>>>>> fbc931c86c79f90991d237ad00cd58baa70ca1d0

        </form>
    </div>
    


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>