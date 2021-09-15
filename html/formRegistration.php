<?php
    include_once '../init.php';
    include_once '../connection/Config.php';
    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
        $config = new Config();
        $con = $config->connection();
        //Student Registration Table 
        $sql = "SELECT * FROM tbl_student_registration WHERE stud_id = ?";
        $stmt= $con->prepare($sql);
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $result->num_rows;
  
        if($count === 1){
          $fname = $row['stud_firstname'];
          $lname = $row['stud_lastname'];
          $midIni = $row['stud_midInitial'];
        } else {
          return false;
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha512-AFwxAkWdvxRd9qhYYp1qbeRZj6/iTNmJ2GFwcxsMOzwwTaRwz2a/2TX225Ebcj3whXte1WGQb38cXE5j7ZQw3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../Css_files/registration.css?<?php echo time(); ?>" />
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
            /div>
        </div>
        <div class="navright">

        </div>
    </div>
</nav>

<div class="container active" id="container__id">
    <form action="" class="shadow-lg p-3 mb-2 bg-body rounded" name="myForm" method="get">
        <h3>Register - <?= $_COOKIE['user_id'];?> - Student</h3>
        
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


        <!-- STEP ONEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE -->
        <div class="step_one" id="step_one_id">
            <div class="row mb-3">
                <h4>Personal Information</h4>
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" " name="fname" value="<?= $fname;?>">
                        <label for="floatingInput">First name</label>
                    </div>
                </div>
                    

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" "
                        value="<?= $midIni;?>">
                        <label for="floatingInput">Middle name</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" "
                        value="<?= $lname;?>">
                        <label for="floatingInput">Last name</label>
                    </div>
                </div>
            </div>



            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" " required>
                        <label for="floatingInput">Citizenship</label>
                    </div>  
                </div>
                    
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" ">
                        <label for="floatingInput">Civil Status</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" ">
                        <label for="floatingInput">Contact number</label>
                    </div>
                </div>
            </div>


            <!-- RADIO BUTTON -->
            <div class="row mb-3">
                <div class="col-sm-4 s__ ">
                    <span>Sex: &nbsp;</span>
                    <input type="radio" class="btn-check" name="options-outlined" id="male_id" autocomplete="off" >
                    <label class="btn btn-outline-success" for="male_id">Male</label>
                    
                    <input type="radio" class="btn-check" name="options-outlined" id="female_id" autocomplete="off">
                    <label class="btn btn-outline-success" for="female_id">Female</label>
                </div>
            <!-- RADIO BUTTON -->
                

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInput" placeholder=" ">
                        <label for="floatingInput">Birthdate</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" " readonly>
                        <label for="floatingInput">Age</label>
                    </div>
                </div>
            </div>
        </div>









    <!-- STEP TWOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
    <div class="step_two" id="step_two_id">
        <h4>Previous School Information</h4>
        <div class="row mb-3">
            <div class="col-sm-4 mb-3 s__ ">
                <span>College Type: &nbsp;</span>
                <input type="radio" class="btn-check" name="options-outlined" id="private_id" autocomplete="off">
                <label class="btn btn-outline-success" for="private_id">Private</label>
                
                <input type="radio" class="btn-check" name="options-outlined" id="public_id" autocomplete="off">
                <label class="btn btn-outline-success" for="public_id">Public</label>
            </div>
                
            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" " required>
                        <label for="floatingInput">College name</label>
                    </div>  
                </div>
                    

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" ">
                        <label for="floatingInput">College Address</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder=" ">
                        <label for="floatingInput">Zip Code</label>
                    </div>
                </div>
            </div>

            <!-- 2NDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD -->
            <div class="row mb-3">
                <div class="col-sm-4">
                        <select class="form-select form-control" id="floatingInput">
                            <option hidden >School Year</option>
                            <option value="" disabled>School Year</option>
                            <option value="1">2016 - 2017</option>
                            <option value="2">2017 - 2018</option>
                            <option value="3">2018 - 2019</option>
                            <option value="3">2019 - 2020</option>
                            <option value="3">2020 - 2021</option>
                        </select>
                </div>

                <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example">
                        <option hidden>Semester</option>
                        <option value="" disabled>Semester</option>
                        <option value="1">Midterms</option>
                        <option value="2">Finals</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example">
                        <option hidden>Scholarship</option>
                        <option value="" disabled>Scholarship</option>
                        <option value="1">Not Available</option>
                        <option value="1">Partial</option>
                        <option value="2">Full</option>
                        
                    </select>
                </div>
            </div>


            <!-- 3RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRD -->
            <div class="row mb-3">
                <div class="col-sm-4">
                        <select class="form-select form-control" id="floatingInput">
                            <option hidden >Course</option>
                            <option value="" disabled>Course</option>
                            <option value="1">BSIT </option>
                            <option value="2">BSED</option>
                            <option value="3">BSA</option>
                        </select>
                </div>

                <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example">
                        <option hidden>Major</option>
                        <option value="" disabled>Major</option>
                        <option value="1">Web and Mobile Application</option>
                        <option value="2">Computer Science</option>
                    </select>
                </div>

                
                <div class="col-sm-4">
                    <select class="form-select" aria-label="Default select example">
                        <option hidden>Year</option>
                        <option value="" disabled>Year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="2">3rd</option>
                        <option value="2">4th</option>
                        <option value="2">5th</option>
                    </select>
                </div>
            </div>
            </div>

            

           <!-- 4THHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH -->
           <h4>Current School Information</h4>
           <div class="row mb-3">
            <div class="col-sm-4">
                    <select class="form-select form-control" id="floatingInput">
                        <option hidden >School Year</option>
                        <option value="" disabled>School Year</option>
                        <option value="1">2016 - 2017</option>
                        <option value="2">2017 - 2018</option>
                        <option value="3">2018 - 2019</option>
                        <option value="3">2019 - 2020</option>
                        <option value="3">2020 - 2021</option>
                    </select>
            </div>

            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option hidden>Semester</option>
                    <option value="" disabled>Semester</option>
                    <option value="1">Midterms</option>
                    <option value="2">Finals</option>
                </select>
            </div>

            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option hidden>Scholarship</option>
                    <option value="" disabled>Scholarship</option>
                    <option value="1">Not Available</option>
                    <option value="1">Partial</option>
                    <option value="2">Full</option>
                    
                </select>
            </div>
        </div>


        <!-- 5THHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH -->
        
        <div class="row mb-3">
            <div class="col-sm-4">
                    <select class="form-select form-control" id="floatingInput">
                        <option hidden >Course</option>
                        <option value="" disabled>Course</option>
                        <option value="1">BSIT </option>
                        <option value="2">BSED</option>
                        <option value="3">BSA</option>
                    </select>
            </div>

            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option hidden>Major</option>
                    <option value="" disabled>Major</option>
                    <option value="1">Web and Mobile Application</option>
                    <option value="2">Computer Science</option>
                </select>
            </div>

            
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option hidden>Year</option>
                    <option value="" disabled>Year</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="2">3rd</option>
                    <option value="2">4th</option>
                    <option value="2">5th</option>
                </select>
            </div>
        </div>
        </div>



        
        <!-- STEP THREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE -->
    <div class="step_one" id="step_three_id">
        <div class="row mb-3 justify-content-center">
            <h4 class="account__text">Account Information</h4>

            <div class="col-sm-4 mt-2">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder=" " name="fname">
                    <label for="floatingInput">Email Address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder=" " name="fname">
                    <label for="floatingInput">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder=" " name="fname">
                    <label for="floatingInput">Confirm Password</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      By checking this box, you agree to our Terms and that you have read our <a href="">Data Use Policy.</a>
                        
                    </label>
                  </div>
    
            </div>

           
        </div>
    </div>
    
</form>
<div class="row">
            <div class="col-sm-1 offset-10 mb-5" >
                <button type="button" class="btn btn-outline-danger btn_nxt_prv   " id="previous_id" onclick="prev_tab()">Previous</button>
            </div>
            <div class="col-sm-1 ">
                <button type="submit" class="btn btn-outline-success btn_nxt_prv" name="registerAccount" id="next_id" onclick="next_tab(), check_if_firststep()">Next</button>
            </div>
        
            
        </div>

   

        


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


        let submit = document.querySelector('#step_three_id')


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
            if (step_counter === 1){
                    choose_step_2();
                    step_counter = 2;
                    progress_bar.style.width = "66%"
                    personal_info_icon.innerHTML = "&#xf058;";
                    personal_info_icon.style.color = "green";
                    
            }else if (step_counter === 2){
                    choose_step_3();
                    step_counter = 3;
                    nextBtn.textContent = "Submit"
                    progress_bar.style.width = "100%"
                    college_info_icon.innerHTML = "&#xf058;";
                    college_info_icon.style.color = "green";
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
                progress_bar.style.width = "66%"
                college_info_icon.innerHTML = "&#xf19c;";
                college_info_icon.style.color = "black";
            }
        }

        function check_if_firststep(){
            if (step_counter === 1){
                prevBtn.style.display = "none"
            }else{
                prevBtn.style.display = "block"
            }
        }


        $(window).on("load", function(){
            $(".loader-wrapper").fadeOut('xslow');
        });

    </script>
</div>
</body>
</html>