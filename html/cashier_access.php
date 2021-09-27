<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/cashier_access.css?<?php echo time(); ?>" />


 

    <title>Cahsier</title>
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

        <script type="text/javascript">
        window.onload = function(){
                let loader = document.getElementById('loader-wrapperID')
                loader.style.opacity = "0"
                loader.style.visibility = "hidden"
                loader.style.pointerEvents = "none"
        }
        </script>
<!-- LOADER -->





        
    <div class="nav__bar">
      <div class="nav__bar_two">
      <img src="../images/logo.png" alt="">
          <div class="nav__bar_two_text">
              <span>Pyro Colleges Inc.</span>
              <p>Excellence at its finest.</p>
          </div>
      </div>
    
    </div>
</body>
</html>