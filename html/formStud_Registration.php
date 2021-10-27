<?php
    include_once '../connection/Config.php';
    session_start();
     // Check Student ID
    if(!isset( $_SESSION['userId'])){
        header('Location: idValidation.php');
    }else{
        $sqlStudInfo = "SELECT S.firstname,S.lastname,S.middlename,det.csi_semester,det.csi_year_level,det.csi_program,det.csi_major
        FROM `tbl_student_info` as S
        INNER JOIN tbl_student_school_details as det ON S.stud_id = det.stud_id
        WHERE S.stud_id = ?";
        $stmtStudInfo = $con->prepare($sqlStudInfo);
        $stmtStudInfo->bind_param('s', $_SESSION['userId']);
        $stmtStudInfo->execute();
        $resStudInfo = $stmtStudInfo->get_result();
        $rowStudInfo = $resStudInfo->fetch_assoc();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Registration</title>

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
<div class="parent_container__">
<div class="container active" id="container__id">

    <form action="" class="shadow-lg p-3 mb-2 bg-body rounded" id="studForm" >
    <img src="../images/logo.png" alt="" style="filter: invert(43%) sepia(73%) saturate(6840%) hue-rotate(212deg) brightness(99%) contrast(104%);">
        <h3 class="text-center my-2 text-success">Register | <?= $_SESSION['userId']; ?> | Student</h3>
      <!-- Dont Remove this input hiddens  -->
        <input type="hidden" name="userId" value="<?= $_SESSION['userId'];?>">
        <input type="hidden" name="role" value="<?= $_SESSION['role'];?>">
        <div class="progress_container">
            <ul>
                <li><i class="fa" id="piID">&#xf507;</i></li>
                <li><i class="fa" id="ciID">&#xf19c;</i></li>
                <li><i class="fa" id="aiID">&#xf502;</i></li>
            </ul>
       

            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress_id" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
            </div>
        
        </div>

        <!-- Step One - Account info -->
        <div class="steps_reg" id="step_one_id">
        
        <div class="row mb-3 justify-content-center">
            <h4 class="account__text text-center">Account Information</h4>

            <div class="col-md-9 mt-2">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control check-email" id="email" placeholder=" " name="email">
                    <label for="email">Email Address</label>
                    <p class="text-danger" id="msg"></p>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control pass-input" id="password" placeholder=" " name="password">
                    <label for="password">Password</label>
                    <div class="password-validate px-2">
                        <p class="m-0">Password must contain:</p>
                        <span class="pass-req one" id="pass-validation-one-id" style="color: crimson"><i class="fa" id="logovOne">&#xf057;</i>&nbsp;8 or more characters</span>
                        <span class="pass-req two" id="pass-validation-two-id" style="color: crimson"><i class="fa" id="logovTwo">&#xf057;</i>&nbsp;UPPER and lower case (e.g. Aa)</span>
                        <span class="pass-req three" id="pass-validation-three-id" style="color: crimson"><i class="fa" id="logovThree">&#xf057;</i>&nbsp;a number (e.g. 1234)</span>
                        <span class="pass-req four" id="pass-validation-four-id" style="color: crimson"><i class="fa" id="logovFour">&#xf057;</i>&nbsp;a symbol (e.g. !@#$)</span>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="confirm_pass" placeholder=" " name="confirm_pass">
                    <label for="confirm_pass">Confirm Password</label>
                </div>

    
            </div>

           
        </div>
    </div>



        <!-- Step 2 - Personal info -->
        <div class="steps_reg" id="step_two_id">
            <div class="row mb-3">
                <h4>Personal Information</h4>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        
                        <input type="text" class="form-control" id="fname" placeholder=" " name="fname" value="<?= $rowStudInfo['firstname'] ?>">
                        <label for="fname">First name</label>
                    </div>
                </div>
                    

                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="middlename" id="midInitial" placeholder=" "
                        value="<?= $rowStudInfo['middlename'] ?>">
                        <label for="midInitial">Middle name</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lastname" id="lname" placeholder=" "
                        value="<?= $rowStudInfo['lastname']?>">
                        <label for="floatingInput">Last name</label>
                    </div>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="contact" id="contact" placeholder=" " required >
                        <label for="contact">Contact Number</label>
                    </div>  
                </div>
                    
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" id="address" placeholder=" " required >
                        <label for="address">Address</label>
                    </div>
                </div>

                <div class="col-md-4 s__ ">
                    <span>Sex: &nbsp;</span>
                    <input type="radio" class="btn-check" name="sex" id="male_id" value="male" autocomplete="off" >
                    <label class="btn btn-outline-success" for="male_id">Male</label>
                    <input type="radio" class="btn-check" name="sex" id="female_id" autocomplete="off" value="female">
                    <label class="btn btn-outline-success" for="female_id">Female</label>
                </div>
            </div>
        </div>









       <!-- Step three - College info -->
    <div class="steps_reg" id="step_three_id">
   
            <h4 class="text-center">I am:</h4>

            <div class="col-md mb-3 d-flex justify-content-center">
                <input type="radio" class="btn-check"  name="stud_status" id="old_stud" value="old" autocomplete="off" >
                <label class="btn btn-outline-success btn_old_transferee mx-2" for="old_stud">Old Student</label>
            
                <input type="radio" class="btn-check" name="stud_status" id="transferee_stud" autocomplete="off" value="transferee">
                <label class="btn btn-outline-success btn_old_transferee mx-2" for="transferee_stud">Transferee Student</label>
            </div>
        
            
            <div class="row mb-3">
                <h4>Current College Information:</h4>

                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select col-2" id="academicYear" name="currSchoolYr" required>
                            <option hidden>School Year</option>
                            <?php 
                                $sqlYear = "SELECT DISTINCT academic_year FROM tbl_academic_year";
                                $stmtYear = $con->prepare($sqlYear);
                                $stmtYear->execute();
                                $resYear = $stmtYear->get_result();
                                while($rowYear = $resYear->fetch_assoc()){
                                ?>
                                <option value="<?= $rowYear['academic_year'];?>"><?= $rowYear['academic_year'];?></option>
                            <?php }; ?>
                        </select>
                            <label for="academicYear">School Year</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select col-2" id="currentSem" name="currSem" required>
                            <option hidden>Semester</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                        </select>
                            <label for="currentSem">Semester</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select col-2" id="currentYearLevel" name="currYear" required>
                            <option hidden>Year Level</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                        </select>
                            <label for="currentYearLevel">Year Level</label>
                    </div>
                </div>

            </div>
            

            
            
            
            <div class="row mb-3">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select form-control" name="currCourse" id="studProgram" required>
                            
                            <?php 
                                $sqlProg = "SELECT DISTINCT course_program FROM `tbl_course_list`";
                                $stmtProg = $con->prepare($sqlProg);
                                $stmtProg->execute();
                                $resProg = $stmtProg->get_result();
                                while($rowProg = $resProg->fetch_assoc()){
                                ?>
                                    <option value="<?= $rowProg['course_program'];?>"><?= $rowProg['course_program'];?></option>
                            <?php }; ?>
                        </select>
                            <label for="studProgram">Program</label>
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" name="currMajor" id="currentMajor" aria-label="Default select example" required>
                            
                        </select>
                            <label for="currentMajor">Specialization</label>
                    </div>
                </div>

            <div class="col-md">
                    <div class="form-floating" >
                        <input type="text" class="form-control"  name="LRN" id="lrn" placeholder=" " autocomplete="off" required>
                        <label for="lrn">LRN</label>
                    </div>
                </div>
                
            
            </div>
                <div class="form-check mt-3">
                    <input class="form-check-input " type="checkbox" name="agreePolicy" id="agreePolicy">
                    <label class="form-check-label" for="agreePolicy" style="font-size: 1.2rem">
                        By checking this box, you agree to our <a href="">Terms </a>and that you have read our <a href="">Data Use Policy.</a>
                    </label>
                </div>
        
        </div>
        
        
        
</form>
<div class="row float-end mb-5">
            <div class="col-auto" >
                <button type="button" class="btn btn-outline-danger btn_nxt_prv" id="previous_id" onclick="prev_tab()">Previous</button>
                <button type="button" class="btn btn-outline-success btn_nxt_prv" name="registerAccount" id="next_id" onclick="next_tab(), check_if_firststep()">Next</button>
            </div>
    </div>
   

        </div>
        </div>
        

        

    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/registration.js"></script>
        <script>
            $(document).ready(function () {
                let program = $('#studProgram').val();
                let selectedMajor = '<?= $rowStudInfo['csi_major']?>'
                $('#currentSem').val('<?= $rowStudInfo['csi_semester']?>');
                $('#currentYearLevel').val('<?= $rowStudInfo['csi_year_level']?>');
                $('#studProgram').val('<?= $rowStudInfo['csi_program']?>');
                onChangeProgram(program,selectedMajor);
                 // Trigger OnChange Item of Dropdown Program
                $("#studProgram").change(function(){
                    let program = $(this).val();
                    onChangeProgram(program,null);
                });
                $('#studForm').submit(function (event) { 
                    if($('#next_id').text() == 'Submit' && $('#agreePolicy').is(":checked")){
                        if(!$("input[name='stud_status']").is(':checked')){
                            Swal.fire({
                                title: 'No selected',
                                text: 'Please select if your old or transferee student',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            })
                        }else if($('#academicYear').val() == 'School Year'){
                            Swal.fire({
                                title: 'Empty Academic Year',
                                text: 'Please enter your academic year',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            })
                        }else  if($('#lrn').val() == ''){
                            Swal.fire({
                                title: 'Empty LRN',
                                text: 'Please enter your LRN',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            })
                        }else{
                            $.ajax({
                                type: "POST",
                                url: "../includes/registration.inc.php",
                                data: $('#studForm').serialize(),
                                dataType: "JSON",
                                success: function (response) {
                                    // console.log(response)
                                    Swal.fire({
                                        icon: response.status,
                                        text: response.message,
                                        confirmButtonText: 'Ok'
                                    }).then(function() {
                                        window.location.href = '../html/login.php';
                                    
                                    });
                                }
                            });
                        }
                    event.preventDefault();
                    }
                });
                // onChange function selection in Program to put appropriate dropdown Options Major
                function onChangeProgram(program,selectedValue){
                    $.ajax({
                    url: '../includes/comboBoxData.php',
                    type: 'post',
                    data: {
                        "programOnChange": 1,
                        "program": program
                    },
                    success:function(response){ 
                        let len = response.length;
                        $("#currentMajor").empty();
                        // Looping the Items of Major By Program
                        for( let i = 0; i<len; i++){
                        let major = response[i]['major'];
                        $("#currentMajor").append("<option value='"+major+"'>"+major+"</option>");
                        }
                          // Set item slected of Dropdown Major 
                        if(selectedValue != null){
                        $('#currentMajor').val(selectedValue);
                        }
                    }
                    });
                }
            });
        </script>
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
        let step_three = document.getElementById('step_three_id')


        
       

        let step_counter = 1;
        choose_step_1();
        check_if_firststep()
        
        
        function choose_step_1(){
            step_one.style.display = "block"
            step_two.style.display = "none"
            step_three.style.display = "none"
        }
        function choose_step_2(){
            step_one.style.display = "none"
            step_two.style.display = "block"
            step_three.style.display = "none" 
        }

        function choose_step_3(){
            step_one.style.display = "none"
            step_two.style.display = "none"
            step_three.style.display = "block"
        }

        function next_tab(){
            let email =$('#email').val()
            if (step_counter === 1){
                if(email == ''){
                    Swal.fire({
                        title: 'Please enter your email',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if( IsEmail(email) == false){
                    Swal.fire({
                        title: 'Email is invalid',
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
                }else if 
                    ((password_requirement.value.length < 8) || 
                    !(password_requirement.value.match(/[a-z]/)) ||
                    !(password_requirement.value.match(/[A-Z]/)) || 
                    !(password_requirement.value.match(/[0-9]/)) ||
                    !(password_requirement.value.match (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/))){
                    password_requirement.focus();
                    Swal.fire({
                        title: 'Password does not meet the conditions.',
                        text: 'All conditions must be satisfied',
                        icon: 'error',
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
                    choose_step_2();
                    step_counter = 2;
                    progress_bar.style.width = "66%"
                    personal_info_icon.innerHTML = "&#xf058;";
                    personal_info_icon.style.color = "green";
                }
            }else if (step_counter === 2){
                if($('#fname').val() == ''){
                    Swal.fire({
                        title: 'Empty Firstname',
                        text: 'Please enter your firstname',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if($('#midInitial').val() == ''){
                    Swal.fire({
                        title: 'Empty middlename',
                        text: 'Please enter your middlename',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if($('#lname').val() == ''){
                    Swal.fire({
                        title: 'Empty lastname',
                        text: 'Please enter your lastname',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if($('#contact').val() == 0){
                    Swal.fire({
                        title: 'Empty contact',
                        text: 'Please enter your contact number',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if($('#address').val() == ''){
                    Swal.fire({
                        title: 'Empty address',
                        text: 'Please enter your address',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else if(!$("input[name='sex']").is(':checked')){
                    Swal.fire({
                        title: 'Sex no selected',
                        text: 'Please select your sex',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    })
                }else{
                    choose_step_3();
                    step_counter = 3;
                    nextBtn.textContent = "Submit"
                    nextBtn.disabled = true;
                    progress_bar.style.width = "100%"
                    college_info_icon.innerHTML = "&#xf058;";
                    college_info_icon.style.color = "green";
                }
            }
        }

        function IsEmail(email) {
            const regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
            return false;
            }else{
            return true;
            }
        } 

        function prev_tab(){
            if (step_counter === 2){
                choose_step_1();
                step_counter = 1;
                check_if_firststep();
                progress_bar.style.width = "33%"
                personal_info_icon.innerHTML = "&#xf507;";
                personal_info_icon.style.color = "black";
            }else if(step_counter === 3){
                choose_step_2();
                step_counter = 2;
                check_if_firststep();
                nextBtn.textContent = "Next"
                nextBtn.disabled = false;
                $("input[name='agreePolicy']").prop("checked", false);
                progress_bar.style.width = "66%"
                college_info_icon.innerHTML = "&#xf19c;";
                college_info_icon.style.color = "black";
            }
        }

        function check_if_firststep(){
            if (step_counter === 1){
                prevBtn.style.display = "none"
            }else{
                prevBtn.style.display = "inline"
            }
        }
    </script>


</div>
</body>
</html>