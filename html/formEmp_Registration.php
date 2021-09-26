<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- AJAX JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registration.css?<?php echo time(); ?>" />
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
<?php if(isset($_SESSION['status']) == 'success'){?>
        <script>
            Swal.fire({
                title: '<?= $_SESSION['msg']; ?>',
                icon: '<?= $_SESSION['status']; ?>',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location = "./login.php";
            });
        </script>
    <?php }else{?>
        <script>
            Swal.fire({
                title: '<?= $_SESSION['msg']; ?>',
                icon: '<?= $_SESSION['status']; ?>',
                confirmButtonText: 'OK'
            });
        </script>
    <?php } unset($_SESSION['status']);?>
    <div class="parent_container__">
<div class="container active" id="container__id">

    <form action="../includes/registration.inc.php" class="shadow-lg p-3 mb-2 bg-body rounded" name="myForm" id= "empReg" method="POST">
        <h3>Register - <?=$_SESSION['userId']; ?> - Employee</h3>
        <input type="hidden" name="userId" value="<?= $_SESSION['userId']; ?>">
        <input type="hidden" name="role" value="<?=  $_SESSION['role']; ?>">
        <div class="progress_container">
            <ul>
                <li><i class="fa" id="piID">&#xf507;</i></li>
                <!-- <li><i class="fa" id="ciID">&#xf19c;</i></li> -->
                <li><i class="fa" id="aiID">&#xf502;</i></li>
            </ul>


            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_id" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
            </div>
        
        </div>

        <!-- Step One - Account Info -->
        <div class="step_one" id="step_one_id">
        <div class="row mb-3 justify-content-center">
            <h4 class="account__text text-center">Account Information</h4>

            <div class="col-sm-6 mt-2">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control " id="email" placeholder=" " name="email">
                    <label for="email">Email Address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder=" " name="password">
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="confirm_pass" placeholder=" " name="confirm_pass">
                    <label for="confirm_pass">Confirm Password</label>
                </div>

            </div>
        </div>
    </div>

        <!-- STEP 2 - Personal info -->
        <div class="step_one" id="step_two_id">
            <div class="row mb-3">
                <h4>Personal Information</h4>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        
                        <input type="text" class="form-control" id="fname" placeholder=" " name="fname" value="<?= $_SESSION['fname']; ?>">
                        <label for="fname">First name</label>
                    </div>
                </div>
                    

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="middlename" id="midInitial" placeholder=" "
                        value="<?= $_SESSION['midname']; ?>">
                        <label for="midInitial">Middle name</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lastname" id="lname" placeholder=" "
                        value="<?= $_SESSION['lname'];?>">
                        <label for="floatingInput">Last name</label>
                    </div>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="citizen" id="citizen" placeholder=" ">
                        <label for="citizen" >Citizenship</label>
                    </div>  
                </div>
                    
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="civil" id="civilStatus" placeholder=" " required="required">
                        <label for="civilStatus">Civil Status</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder=" " >
                        <label for="phone">Contact number</label>
                    </div>
                </div>
            </div>


            <!-- RADIO BUTTON -->
            <div class="row mb-3">
                <div class="col-sm-4 s__ ">
                    <span>Sex: &nbsp;</span>
                    <input type="radio" class="btn-check" name="sex" id="male_id" value="male" autocomplete="off" >
                    <label class="btn btn-outline-success" for="male_id">Male</label>
                    
                    <input type="radio" class="btn-check" name="sex" id="female_id" autocomplete="off" value="female">
                    <label class="btn btn-outline-success" for="female_id">Female</label>
                </div>
            <!-- RADIO BUTTON -->
                

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder=" " >
                        <label for="birthdate">Birthdate</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="age" id="age" placeholder=" " >
                        <label for="age">Age</label>
                    </div>
                </div>
            </div>

            
            <div class="form-check mt-5">
                    <input class="form-check-input " type="checkbox" name="agreePolicy" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate" style="font-size: 1.2rem">
                        By checking this box, you agree to our <a href="">Terms </a>and that you have read our <a href="">Data Use Policy.</a>
                    </label>
                </div>
        </div>

        
           
        
    
    
</form>
        <div class="row float-end">
            <div class="col-auto" >
                <button type="button" class="btn btn-outline-danger btn_nxt_prv" id="previous_id" onclick="prev_tab()">Previous</button>
                <button type="submit" class="btn btn-outline-success btn_nxt_prv" name="registerAccount" id="next_id" onclick="next_tab(), check_if_firststep()">Next</button>
            </div>
        </div>
        </div>



        

    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        let prevBtn = document.getElementById('previous_id');
        let nextBtn = document.getElementById('next_id');

        let progress_bar = document.getElementById('progress_id');
        let container = document.getElementById('container__id');

        let personal_info_icon = document.getElementById('piID');
        let college_info_icon = document.getElementById('ciID');
        let account_info_icon = document.getElementById('aiID');
        
        
        

        let step_one = document.getElementById('step_one_id');
        let step_two = document.getElementById('step_two_id')
        


        let email = document.querySelector('#email');
        let pass = document.querySelector('#password');
        let confirm_pas = document.querySelector('#confirm_pass');


        let step_counter = 1;
        choose_step_1();
        check_if_firststep()
        
        
        function choose_step_1(){
            step_one.style.display = "block"
            step_two.style.display = "none"
            
        }

        function choose_step_2(){
            step_one.style.display = "none"
            step_two.style.display = "block"
        }

        function next_tab(){
            if (step_counter === 1){
                            choose_step_2();
                            step_counter = 2;
                            progress_bar.style.width = "100%"
                            nextBtn.textContent = "Submit"
                            nextBtn.disabled = true;
                            personal_info_icon.innerHTML = "&#xf058;";
                            personal_info_icon.style.color = "green";
            }
        }

        function prev_tab(){
            if (step_counter === 2){
                choose_step_1();
                step_counter = 1;
                check_if_firststep();
                progress_bar.style.width = "50%"
                personal_info_icon.innerHTML = "&#xf507;";
                personal_info_icon.style.color = "black";
                nextBtn.textContent = "Next"
                nextBtn.disabled = false;
            }
        }

        function check_if_firststep(){
            if (step_counter === 1){
                prevBtn.style.display = "none";
            }else{
                prevBtn.style.display = "inline";
            }
        }
        // Agree Policy to create the account
        $("input[name='agreePolicy']").click(function(){
            if($("input[name='agreePolicy']").is(":checked")){
                nextBtn.disabled = false;
            }else if ($("input[name='agreePolicy']").is(":not(:checked)")) {
                nextBtn.disabled = true;
            }
        });
        
        $('#next_id').click(function(event){
            if($("input[name='agreePolicy']").is(":checked")){
                if($('#email').val() == ''){
                    Swal.fire({
                        title: 'Please enter your email',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if ($('#password').val() == ''){
                    Swal.fire({
                        title: 'No password',
                        text: 'Please type your password',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if ($('#password').val() != $('#confirm_pass').val()){
                    Swal.fire({
                        title: 'Password not match',
                        text: 'Please re-type your password',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else{
                    $('#empReg').submit();
                }
            }
            event.preventDefault();
        })
        $(window).on("load", function(){
            $(".loader-wrapper").fadeOut('xslow');
        });

    </script>
    
</div>
</body>
</html>