<?php
    include_once '../init.php';
    if(isset($_POST['checkID'])){
        $user_id = $_POST['user_id'];
        $checkID = new CheckId($user_id);
        if($checkID->checkId()){
            header('Location: ./formRegistration.php');
            setcookie("user_id", $user_id);
        } else {
            echo 'Not Found';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../Css_files/registration.css?<?php echo time(); ?>" />
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
    <nav>
        <div class="nav2">
        <img src="../images/logo.png" alt="">
            <div class="nav2-text">
                <span>Pyro Colleges Inc.</span>
                <p>Excellence at its finest.</p>
            </div>
        </div>

        <div class="navright">

        </div>
    </nav>

    <!-- Validator -->

    <div class="popup-validator" id="popup-id">
        
        <form action="" method="POST">
            <h3>Please enter ID number</h3>
            <input type="number" name="user_id" id="" placeholder="ID number">
            <input type="submit" name="checkID" value="Submit">
            <p>Already have an account? <a href="../index.php">Login Here</a></p>
        </form>
    </div>
    <script type="text/javascript">
    $(window).on("load", function(){
            $(".loader-wrapper").fadeOut('xslow');
        });

        
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>