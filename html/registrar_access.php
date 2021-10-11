<?php
  require_once '../connection/Config.php';
  session_start();
  if(!isset($_SESSION['employeeId']) && $_SESSION['role'] != 'Registrar'){
    header('Location: login.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/registrar_access.css?<?php echo time(); ?>" />
    <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Registrar</title>
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
        const loader = document.getElementById('loader-wrapperID')
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

    <!-- PopUp for Archive -->
    <div class="popUpArchive" style="visibility: hidden; opacity: 0; transition: all 150ms;"> 
      <div class="popUpArchiveinner">
        <i class="far fa-times-circle text-danger mb-3 closeBtnPopUp float-end"></i>
        <p class="text-primary d-block text-center mt-5" >Choose Archive Reason</p>
        
          <form action="">
            <div class="innerFormArchive">
              <input type="radio" class="btn-check" name="options-outlined" id="graduate" autocomplete="off">
              <label class="btn btn-outline-primary" for="graduate">Graduate</label>

              <input type="radio" class="btn-check" name="options-outlined" id="drop" autocomplete="off">
              <label class="btn btn-outline-primary" for="drop">Dropped</label>

              <input type="radio" class="btn-check" name="options-outlined" id="discontinued" autocomplete="off">
              <label class="btn btn-outline-primary" for="discontinued">Discontinued</label>
            </div>
              <button class="btn btn-primary d-block mx-auto mt-5 mb-2 px-5">Archive</button>
          </form>
        </div>
      </div>

    

    


    <div class="row">
      <div class="col-3 left-tab">
        <div class="upper-left-tab">
            <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
            <p class="reg__name" style="font-size: 1.2rem;"><?= $_SESSION['fullname'];?><i class="fas fa-caret-down mx-2" onclick="profile_link_show()"></i></p>
            <div class="profile_link" id="profile_link_id">
              <a href="">My Email</a>
              <a href="../html/forgotPassword.php">Change Password</a>
              <a href="../includes/logout.inc.php">Logout</a>
            </div>
          
            <p class="reg__name" id="roleId">Registrar | <?= $_SESSION['employeeId'];?></p>
            <p class="reg__name" id="reg-date-time"></p>
        </div>

            <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                <a class="nav-link main__" id="v-pills-manage-users-tab" data-toggle="pill" href="#v-pills-manage-users" role="tab" aria-controls="v-pills-manage-users" aria-selected="false">Manage Users</a>
                <a class="nav-link main__" id="v-pills-archives-tab" data-toggle="pill" href="#v-pills-archives" role="tab" aria-controls="v-pills-archives" aria-selected="false">Archives</a>
                <a class="nav-link main__" id="v-pills-fees-tab" data-toggle="pill" href="#v-pills-fees" role="tab" aria-controls="v-pills-fees" aria-selected="false">Fees Management</a>
                
                
            </div>
        </div>
        

        <div class="col-sm right-tab">


        <!-- Dashboard -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
              <p class="title_tab_universal" >Dashboard</p>

                <form action="" class="universal_search_form">
                  <input type="text" name="" id="" placeholder="Search">
                  <button type="button" class="btn btn-primary">Search</button>
                </form>

              <div class="col my-3 d-flex justify-content-evenly">
                <div class="col-sm-2 bg-success text-white student__group">
                  <div class="student__group_left">
                    <img src="../images/registrar_img/all_students.png" alt=""  class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center" id="totalStud" onclick="dashboard_table_appear()">
                    <span class="text-center d-block">Total Students</span>
                    <strong class="text-center d-block">626</strong>
                  </div>
                </div>

                <div class="col-sm-2 mx-1 bg-success text-white student__group" id="transferStud" onclick="dashboard_table_appear()">
                  <div class="student__group_left">
                    <img src="../images/registrar_img/transferee.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Transferee Students</span>
                    <strong class="text-center d-block">277</strong>
                  </div>
                </div>

                <div class="col-sm-2 mx-1 bg-success text-white student__group" id="oldStud" onclick="dashboard_table_appear()">
                  <div class="student__group_left">
                    <img src="../images/registrar_img/unregistered_student.png" alt=""  class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Old Students</span>
                    <strong class="text-center d-block">349</strong>
                  </div>
                </div>
              </div>



                <div class="col universal_bg_gray_table">
                  
                  <div class="row">
                  <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <?php ?>
                      <option selected>All</option>
                      <option value="1">Bachelor of Science in Information Technology</option>
                      <option value="2">Bachelor of Science in Computer Science </option>
                      <option value="3">Bachelor of Science in Education</option>
                    </select>
                    <label for="floatingSelect">Choose Program</label>
                  </div>
                </div>
                
              
              <div class="col">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <option selected>All</option>
                      <option value="1"></option>
                      <option value="2"></option>
                    </select>
                    <label for="floatingSelect">Choose Filter</label>
                  </div>
              </div>
              </div>

                    <div class="table__dashboard" style="overflow-x: auto;" id="table_dashboard_id">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Program</th>
                            <th scope="col">Major</th>
                            <th scope="col">Year Level</th>
                            <th scope="col">Status</th>
                            <th scope="col">Scholarship</th>
                            <th scope="col">LRN</th>
                            <th scope="col">Email</th>
                            
                          </tr>
                        </thead>
                        <tbody id="viewStudDash">
                          
                        </tbody>
                      </table>
                    </div>
              </div>
            </div>










            <!-- MANAGE USERS -->
            <div class="tab-pane fade" id="v-pills-manage-users" role="tabpanel" aria-labelledby="v-pills-manage-users-tab">
              <p class="title_tab_universal">Manage User's Records</p>
              
              <ul class="nav nav-tabs manage-users-tab__secondary" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
                </li>
                

                <!-- For Admin -->
                <li class="nav-item" id="employee_ForAdmin">
                  <a class="nav-link" id="employees-tab" data-toggle="tab" href="#employees" role="tab" aria-controls="employees" aria-selected="false">Employees</a>
                </li>
                <li class="nav-item" id="alluser_ForAdmin">
                  <a class="nav-link" id="all-users-tab" data-toggle="tab" href="#all-users" role="tab" aria-controls="all-users" aria-selected="false">All users</a>
                </li>

              </ul>

            



              <div class="tab-content" id="myTabContent">
<!----------------------------------------------- Students Tab ---------------------------------------------------------->
                <div class="tab-pane fade show active mt-2 manage__stud-emp-all-tab" id="student" role="tabpanel" aria-labelledby="student-tab">
                  <p class="role_information text-primary">Student's Information</p>
                        
                  <form action="../includes/manage_student.php" method="post" class="universalForm_two" id="studForm">

                      <div class="manage_users_universal_tab_lmr_parent">
                        
                        
                          <div class="manage_users_universal_left_tab">
                          <img src="../images/registrar_img/sample_student_pic.png" class="rounded float-start" alt="...">
                          <button type="button" class="btn btn-primary my-2">Change Image</button>
                          </div>


                          <div class="manage_users_universal_mid_tab px-1">
                            
                            <div class="row g-2 mb-1">
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="number" name="student_number" class="form-control" id="floatingInputGrid" placeholder=" " value="" disabled>
                                <label for="floatingInputGrid">Student ID</label>
                              </div>
                            </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_firstname" class="form-control" id="floatingInputGrid" placeholder=" " value="" disabled>
                                  <label for="floatingInputGrid">First name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_middlename" class="form-control" id="floatingInputGrid" placeholder=" " value="" disabled>
                                  <label for="floatingInputGrid">Middle name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="stud_lastname" class="form-control" id="floatingInputGrid" placeholder=" " value="" disabled>
                                  <label for="floatingInputGrid">Last name</label>
                                </div>
                              </div>
                            </div>

                            <div class="row g-2 mb-1">
                              <div class="col-md mb-1">
                                <div class="form-floating">
                                  <input type="text" name="stud_school_year" class="form-control" id="floatingInputGrid" placeholder=" " value="" disabled>
                                  <label for="floatingInputGrid">School year</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <select class="form-select" name="stud_semester" id="studSemester" aria-label="Floating label select example" disabled>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                            
                                    
                    
                                  </select>
                                  <label for="studSemester">Semester</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <select class="form-select" name="stud_year_level" id="studYearLevel" aria-label="Floating label select example" disabled>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4" Selected>4th Year</option>
                                    
                    
                                  </select>
                                  <label for="studYearLevel">Year Level</label>
                                </div>
                              </div>

                            </div>
                              <div class="row g-2 mb-1">
                                <div class="col-md">
                                  <div class="form-floating">

                                    <select class="form-select" name="stud_program" id="studProgram" aria-label="Floating label select example" disabled>
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
                                    <select class="form-select" name="stud_major" id="studMajor" aria-label="Floating label select example" disabled>
                                   


                                    </select>
                                    <label for="studMajor">Major</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_fee" class="form-control text-primary" style="font-weight: bold;" id="studFee" placeholder=" " value="" disabled >
                                    <label for="studFee">Fee</label>
                                  </div>
                                </div>


                              </div>
                              

                              
                              
                              <div class="row g-2 mb-1"> 
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_scholarship" id="floatingSelect" aria-label="Floating label select example" disabled>
                                        <option value="Half">Half</option>
                                        <option value="Full">Full</option>
                                      </select>
                                      <label for="floatingSelect">Scholarship</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_discount" id="floatingSelect" aria-label="Floating label select example" disabled>
                                        <option value="0">0%</option>
                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                        <option value="30">30%</option>
                                        <option value="40">40%</option>
                                        <option value="50">50%</option>
                                        <option value="60">60%</option>
                                        <option value="70">70%</option>
                                        <option value="80">80%</option>
                                        <option value="90">90%</option>
                                        <option value="100">100%</option>
                                      </select>
                                      <label for="floatingSelect">Discount</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <select class="form-select" name="stud_status" id="floatingSelect" aria-label="Floating label select example" disabled>
                                      <option value="" selected disabled></option>
                                        <option value="old">Old</option>
                                        <option value="transferee">Transferee</option>
                                        
                                        
                        
                                      </select>
                                      <label for="floatingSelect">Status</label>
                                    </div>
                                  </div>

                                  
                                  <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="stud_lrn" class="form-control" id="floatingInputGrid" placeholder=" " value="" disabled >
                                    <label for="floatingInputGrid">LRN</label>
                                  </div>
                                </div>

                                </div> 
                            </div>


                          <div class="manage_users_students_right_tab">
                            <p class="text-center">Submitted Requirements</p>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_form137" value="✓" id="form137" disabled >
                              <label class="form-check-label" for="form137">
                                Form 137
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_form138" value="✓" id="form138" disabled>
                              <label class="form-check-label" for="form138">
                                Form 138
                              </label>
                            </div>

                            
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_psa" value="✓" id="psa-bc" disabled>
                              <label class="form-check-label" for="psa-bc">
                                PSA Birth Certificate
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="req_good_moral" value="✓" id="good-moral" disabled>
                              <label class="form-check-label" for="good-moral">
                                Good Moral
                              </label>
                            </div>
                          </div>
                        </div>
                        
                      
                  
                      <div class="buttons_manage_universal">
                      <button type="button" name="" id="add" class="btn btn-info">Add</button>
                      <!-- <button type="submit" name="stud_update" class="btn btn-warning">Edit</button> -->
                      <button type="submit" name="stud_save" id="stud_save" class="btn btn-success" >Save</button>
                      <button type="submit" name="stud_delete" id ="stud_delete" class="btn btn-danger" disabled>Delete</button>
                      </div>
                    </form> 
                    

                      
                    

                      <hr>
                      <form action="" class="universal_search_form">
                        <input  type="text" name="searchStud" id="searchStud" placeholder="Search">
                        <button type="button" class="btn btn-primary" id="searchStud_btn">Search</button>
                      </form>
                      <div class="manage_student_tab_below mt-4">
                        <p class="role_information text-success">All Student's list and Filtering</p>


                        <div class="row g-2">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                              <option selected>All</option>
                              <option value="BSIT">Bachelor of Science in Information Technology</option>
                              <option value="BSHTM">Bachelor of Science in Computer Science</option>
                              <option value="BSME">Bachelor of Science in dDucation</option>
              
                            </select>
                            <label for="floatingSelect">Program</label>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                              <option value="BSIT_WMA" selected>All</option>
                              <option value="BSIT_WMA">Web and Mobile Application</option>
                              <option value="BSIT_TSM">Technical Service Managements</option>
                              <option value="BSIT_NA">Network and Administration</option>
              
                            </select>
                            <label for="floatingSelect">Major</label>
                          </div>
                        </div>
                      </div>

                      <div class="table__" style="overflow-x: auto;">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Payments Status</th>
                            <th scope="col">Form 137</th>
                            <th scope="col">Form 138</th>
                            <th scope="col">PSA Birth Certificate</th>
                            <th scope="col">Good Moral</th>
                            <th scope="col">History</th>
                            <th scope="col">Action</th>
                            
                          </tr>

                        </thead>
                        <tbody id="viewStud">
                              
                        </tbody>
                      </table>
                    </div>
                    </div>
                </div>
              




    <!-------------------------------------------- Employees Tab -------------------------------------->
                <div class="tab-pane fade mt-2 manage__stud-emp-all-tab" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                  <p class="role_information text-primary">Employee's Information</p>
                  <form action="../includes/manage_employee.php" method="post" class="universalForm_two">
                  <div class="manage_users_universal_tab_lmr_parent">

                      <div class="manage_users_universal_left_tab">
                      <img src="../images/registrar_img/sample_employee_pic.png" class="rounded float-start" alt="...">
                      <button type="button" class="btn btn-primary my-2">Change Image</button>
                      </div>

                      <div class="manage_users_universal_mid_tab px-1">
                        <div class="row g-2 mb-1">

                        

                           <div class="col-md">
                            <div class="form-floating">
                            <select class="form-select" name="emp_role" id="floatingSelect" aria-label="Floating label select example">
                            <option value="" selected></option>
                                <option value="Registrar">Registrar</option>
                                <option value="Cashier">Cashier</option>
                              </select>
                              <label for="floatingSelect">Role</label>
                            </div>
                          </div>

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" name="emp_id" id="floatingInputGrid" placeholder=" " value="">
                              <label for="floatingInputGrid">Employee ID</label>
                            </div>
                          </div>
                         
                      </div>




                      <div class="row g-2 mb-1">

                        <div class="col-md">
                          <div class="form-floating">
                            <input type="text" class="form-control" name="emp_firstname" id="floatingInputGrid" placeholder=" " value="">
                            <label for="floatingInputGrid">First name</label>
                          </div>
                        </div>

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_middlename" id="floatingInputGrid" placeholder=" " value="">
                              <label for="floatingInputGrid">Middle name</label>
                            </div>
                          </div>

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="emp_lastname" id="floatingInputGrid" placeholder=" " value="">
                              <label for="floatingInputGrid">Last name</label>
                            </div>
                          </div>

                          
                        </div>

                        <div class="row g-2 mb-1">
                          <div class="col-md-3">
                            <div class="form-floating">
                              <select class="form-select" name="emp_sex" id="floatingSelect" aria-label="Floating label select example">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                
                              </select>
                              <label for="floatingSelect">Sex</label>
                            </div>
                          </div>

                          <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" name="emp_address" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">Address</label>
                                </div>
                              </div>

                          
                        </div>

                        <div class="row g-2 mb-1">

        
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="email" class="form-control" name="emp_email" id="floatingInputGrid" placeholder=" " value="">
                                <label for="floatingInputGrid">Email</label>
                              </div>
                            </div>
        
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="number" class="form-control" name="emp_contact_number" id="floatingInputGrid" placeholder=" " value="">
                                <label for="floatingInputGrid">Contact number</label>
                              </div>
                            </div>
                          </div>

                          
                      </div>


                  </div> 
                  
                  <div class="buttons_manage_universal">
                  <!-- <button type="button" name="" class="btn btn-info">Add</button> -->
                  <button type="submit" name="emp_edit" class="btn btn-info">Add</button>
                  <button type="submit" name="emp_delete" class="btn btn-danger">Delete</button>
                  <button type="submit" name="emp_save" class="btn btn-success" >Save</button>
                  </div> 

                  </form>
                  <hr>
                  <div class="manage_student_tab_below mt-4">
                    <p class="role_information text-success">All Employee's list and Filtering</p>


                    <div class="row g-2">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>All</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                          
          
                        </select>
                        <label for="floatingSelect">Role</label>
                      </div>
                    </div>
                  </div>

                <div class="table__" style="overflow-x: auto;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Hire Date</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">900283</th>
                        <td>Juan</td>
                        <td>Dela Cruz</td>
                        <td>Registrar</td>
                        <td>4/10/2021</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>

                  </div>


                </div>
                
                <!-- All user's Tab -->
                <div class="tab-pane fade mt-2 manage__stud-emp-all-tab" id="all-users" role="tabpanel" aria-labelledby="all-users-tab">
                <p class="role_information text-primary">All user's Information</p>
                

                  

                  <div class="row g-2">

                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>None</option>
                          <option value="BSIT_WMA">First name</option>
                          <option value="Registrar">Last name</option>
                         
                          
          
                        </select>
                        <label for="floatingSelect">Sort By</label>
                      </div>
                    </div>


                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>All</option>
                          <option value="BSIT_WMA">Student</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                      </div>
                    </div>
                    

                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" "> 
                        <label for="floatingInputGrid">Reg date From</label>
                      </div>
                    </div>
                    
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                        <label for="floatingInputGrid">Reg date To</label>
                      </div>
                    </div>

                    <div class="row g-2 mb-2">
                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Apply</button>
                      </div>

                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Clear Filter</button>
                      </div>

                    <div class="col-md">  
                      <button type="button" class="btn btn-outline-primary font p-2 float-end">Export Records to Excel</button>
                    </div>
                  </div>

                  <hr>
                  <div class="table__" style="overflow-x: auto;">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID number</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">2018300366</th>
                            <td>Justine Dave</td>
                            <td>Student</td>
                            <td>delosreyes366@gmail.com</td>
                            <td><button class="btn btn-outline-primary archiveBtn">Archive</button></td>

                      

                            <script type="text/javascript">
                              const btnArchive = document.querySelector('.archiveBtn')
                              const popUpArchive = document.querySelector('.popUpArchive')
                              const closeBtn = document.querySelector('.closeBtnPopUp')

                              let popUpinner = document.querySelector('.popUpArchiveinner')
                              btnArchive.addEventListener("click", function(){
                                popUpArchive.style.visibility = "visible"
                                popUpArchive.style.opacity = "1"
                                popUpinner.classList.toggle('animate__animated')
                                popUpinner.classList.toggle('animate__bounceIn')
                              })

                              closeBtn.addEventListener("click", function(){
                                popUpArchive.style.visibility = "hidden"
                                popUpArchive.style.opacity = "0"
                                popUpinner.classList.toggle('animate__animated')
                                popUpinner.classList.toggle('animate__bounceIn')
                              })
                            </script>


                            
                          </tr>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>


                  
                </div>




              </div>
              </div>


            <!-- ARCHIVES -->
            <div class="tab-pane fade" id="v-pills-archives" role="tabpanel" aria-labelledby="v-pills-archives-tab">
              <p class="title_tab_universal">Archives</p>

              <form action="" class="universal_search_form">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

              
              <div class="universal_bg_gray_table mt-3">
              <p class="role_information text-primary mt-2">Choose Account to Filter</p>

                  <div class="row g-2">

                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="BSIT_WMA" selected>All</option>
                          <option value="Graduated" selected>Graduate</option>
                          <option value="Dropout">Dropout</option>
                          <option value="Transfer">Transfer</option>
                          <option value="Resign">Resign</option>
                          <option value="Resign">Terminate</option>
          
                        </select>
                        <label for="floatingSelect">Reason</label>
                      </div>
                    </div>


                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>All</option>
                          <option value="BSIT_WMA">Student</option>
                          <option value="Registrar">Registrar</option>
                          <option value="Cashier">Cashier</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                      </div>
                    </div>
                    

                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" "> 
                        <label for="floatingInputGrid">Date archived From</label>
                      </div>
                    </div>
                    
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                        <label for="floatingInputGrid">Date archived To</label>
                      </div>
                    </div>

                    <div class="row g-2 mb-2">
                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Apply</button>
                      </div>

                      <div class="col-md-2">  
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Clear Filter</button>
                      </div>

                    <div class="col-md">  
                      <button type="button" class="btn btn-outline-primary font p-2 float-end">Export Records to Excel</button>
                    </div>
                  </div>

                  <hr>
                  <div class="table__" style="overflow-x: auto;">
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID number</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Condition</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                         
                          <tr>
                            <th scope="row">2018300478</th>
                            <td>Michael</td>
                            <td>Isla</td>
                            <td>Student</td>
                            <td>isla478@gmail.com</td>
                            <td>Discontinued</td>
                          </tr>
                          <tr>
                            <th scope="row">2018300902</th>
                            <td>Denver</td>
                            <td>Pulido</td>
                            <td>Student</td>
                            <td>pulido902@gmail.com</td>
                            <td>Dropped</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">2018300612</th>
                            <td>Mery Anne</td>
                            <td>Villano</td>
                            <td>Student</td>
                            <td>villano612@gmail.com</td>
                            <td>Graduate</td>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                  
                

            </div>

            <div class="tab-pane fade" id="v-pills-fees" role="tabpanel" aria-labelledby="v-pills-fees-tab">
              <p class="title_tab_universal">Manage Fees</p>

              
              <form action="" class="universal_search_form">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

              <div class="feesManagement_miniDashboard my-2 p-4 d-flex justify-content-between">
                  <button class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add School Year</button>
                  <button class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add Bachelor's Program</button>
                  <button class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add Scholarship</button>
                  <button class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add Discount</button>
              </div>

              <div class="col universal_bg_gray_table">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Course ID</th>
                      <th scope="col">Program</th>
                      <th scope="col">Major</th>
                      <th scope="col">Year Level</th>
                      <th scope="col">Semester</th>
                      <th scope="col">Tuition Fee</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                </table>
              </div>
              

              </div>

          
          </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></>
  -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Function to appear table -->

  <script type="text/javascript">
    let table_ = document.getElementById('table_dashboard_id');
    function dashboard_table_appear(){
        table_.classList.toggle('active')
    }
  </script>
  <script>
    //total student
  $(document).ready(function() {
    $("#totalStud").click(function(e) {
    sortDisplay();
  });

    //old student
  $("#oldStud").click(function(e) {
    let stud_type = 'old'
    sortDisplay(stud_type);
  });

    //transferee student
  $("#transferStud").click(function(e) {
    let stud_type = 'transferee'
    sortDisplay(stud_type);
  });
  });
  </script>
  <script type="text/javascript">
        // LIVE CLOCK
        let clockElement = document.getElementById('reg-date-time');
    
        function clock() {
            clockElement.textContent = new Date().toLocaleTimeString();
            clockElement.textContent += " - " + new Date().toLocaleDateString();
        }
        setInterval(clock, 1000);   

        // Function To change Title
        const tab_count_manage_users = 1;

          const employee_tab = document.getElementById('employees-tab');
          const student_tab = document.getElementById('student-tab');
          const all_users_tab = document.getElementById('all-users-tab');


          function profile_link_show(){
            const profile_link = document.getElementById('profile_link_id');
          profile_link.classList.toggle('show');
          }
      </script>
      <script>
        $(document).ready(function () {
          display();
          $('#add').click(function (e) { 
            enablePartial();
              let program = $("#studProgram").val();
              onChangeProg(program);

          });
          $("#studProgram").change(function(){
            let program = $(this).val();
            onChangeProg(program);
          });
          $("#studMajor").change(function(){
            let major = $(this).val();
            let sem = $('#studSemester').val();
            let yearLevel = $('#studYearLevel').val();
            onChangeMajor(major,sem,yearLevel)
          });
        function onChangeMajor(major,sem,yearLevel){
          $.ajax({
              type: "POST",
              url: "../includes/comboBoxData.php",
              data: {
                "majorOnChange": 1,
                "major": major,
                "sem":sem,
                "yearLevel": yearLevel
              },
              success: function (response) {
                $("#studFee").val(response);
              }
            });
        }
        function onChangeProg(program){
          $.ajax({
                url: '../includes/comboBoxData.php',
                type: 'post',
                data: {
                  "programOnChange": 1,
                  "program": program
                },
                success:function(response){ 
                  let len = response.length;
                    $("#studMajor").empty();
                      for( let i = 0; i<len; i++){
                        let major = response[i]['major'];
                        $("#studMajor").append("<option value='"+major+"'>"+major+"</option>");
                      }
                      let major = $('#studMajor').val();
                      let sem = $('#studSemester').val();
                      let yearLevel = $('#studYearLevel').val();
                      onChangeMajor(major,sem,yearLevel)
                    
                }
            });
        }
          // Save and Update AJAX Request
          
          $('#stud_save').click(function (event) { 
            if($('#stud_save').text() == 'Update'){
              $.ajax({
                type: "POST",
                url: "../includes/manage_student.php",
                data: $('#studForm').serialize() + 
                '&update=update' + 
                '&empId=<?=$_SESSION['employeeId'];?>' + 
                '&empName=<?=$_SESSION['fullname'];?>',
                success: function (response) {
                  console.log(response);
                  Swal.fire({
                    icon: response.status,
                    text: response.message,
                    confirmButtonText: 'Ok'
                  })
                  if(response.status == 'success'){
                    $('#studForm').trigger('reset');
                  }
                  display();
                  disableAllFields();
                  $("#stud_save").text('Save');
                  $("#stud_delete").prop("disabled", true);
                  $("#add").removeAttr('disabled');
                },
                error: function (error) {
                    alert('error; ' + error);
                  }
              });
            }
            if($('#stud_save').text() == 'Save'){
              // Modify it and have condtion if some required fields are empty
              if ($("[name='student_number']").val() == 0){
                $("[name='student_number']").focus()
              }else if ($("[name='stud_firstname']").val() == ""){
                $("[name='stud_firstname']").focus()
              }else if ($("[name='stud_middlename']").val() == ""){
                $("[name='stud_middlename']").focus()
              }else if ($("[name='stud_lastname']").val() == ""){
                $("[name='stud_lastname']").focus()
              }else if ($("[name='stud_fee']").val() == ""){
                $("[name='stud_fee']").focus()
              }
              else{
                $.ajax({
                  url:'../includes/manage_student.php',
                  method: "POST",
                  data: 
                  $('#studForm').serialize() + 
                  '&stud_save=stud_save' + 
                  '&empId=<?=$_SESSION['employeeId'];?>' + '&empName=<?=$_SESSION['fullname'];?>',
                  success: function (response) {
                    console.log(response);
                    Swal.fire({
                      icon: response.status,
                      text: response.message,
                      confirmButtonText: 'Ok'
                    })
                    if(response.status == 'success'){
                      $('#studForm').trigger('reset');
                    }
                    display();
                    disablePartial();
                  },
                  error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                  },
                })
              
              }
            }
              event.preventDefault();
          });
          // Edit Ajax Request
          $(document).on('click', '#edit', function(){
            
            $("#add").prop("disabled", true);
            // e.preventDefault();
            let id = $(this).attr("data-id");
            // alert(id);
            $.ajax({
              type: "POST",
              url: "../includes/manage_student.php",
              data: {
                "edit": 1,
                "id": id
              },
              // dataType: "json",
              success: function (data) {
                // console.log(data);
                // Setting data fields
            
                $("[name='student_number']").val(data.stud_id);
                $("[name='stud_firstname']").val(data.firstname);
                $("[name='stud_lastname']").val(data.lastname);
                $("[name='stud_middlename']").val(data.middlename);
                $("[name='stud_year_level']").val(data.year_level);
                
                $("[name='stud_fee']").val(data.tuition_fee);
                $("[name='stud_discount']").val(data.discount);
                $("[name='stud_school_year']").val(data.csi_school_year);
                $("[name='stud_semester']").val(data.csi_semester);
                $("[name='stud_scholarship']").val(data.scholar_type);
                $("[name='stud_status']").val(data.stud_type);
                $("[name='stud_lrn']").val(data.stud_lrn);
                if(data.form_137 != ''){
                  $("[name='req_form137']").prop('checked', true);
                }
                if(data.form_138 != ''){
                  $("[name='req_form138']").prop('checked', true);
                }
                if(data.psa_birth_cert != ''){
                  $("[name='req_psa']").prop('checked', true);
                }
                if(data.good_moral != ''){
                  $("[name='req_good_moral']").prop('checked', true);
                }
                $("[name='stud_program']").val(data.program);
               let program = data.program
                //to be update  
                      $.ajax({
                      url: '../includes/comboBoxData.php',
                      type: 'post',
                      data: {
                        "programOnChange": 1,
                        "program": program
                      },
                      success:function(response){ 
                        let len = response.length;
                          $("#studMajor").empty();
                            for( let i = 0; i<len; i++){
                              let major = response[i]['major'];
                              $("#studMajor").append("<option value='"+major+"'>"+major+"</option>");
                            }
                            let major = $('#studMajor').val();
                            let sem = $('#studSemester').val();
                            let yearLevel = $('#studYearLevel').val();
                            onChangeMajor(major,sem,yearLevel)
                            $("[name='stud_major']").val(data.major);
                      }
                  });
                
                
                // Enabline fields
                enableAll();
                $("#stud_save").text('Update');
                $("#stud_delete").removeAttr('disabled');
              }
            });
            
          });
          
          // Search Ajax Request
          $("#searchStud_btn").click(function(){
            $.ajax({
              type:'POST',
              url:'../includes/searchStudData.php',
              data:{
                "search": 1,
                "query":$("#searchStud").val(),
              },
              success:function(data){
                $("#viewStud").html(data);
                
              }
            });
          });
          
          // Delete AJAX Request
          $('#stud_delete').click(function (e) { 
            e.preventDefault();
            let id = $("[name='student_number']").val();
            console.log(id);
            Swal.fire({
              title: 'Are you sure?',
              text: "Student Record will be delete",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: "POST",
                  url: "../includes/manage_student.php",
                  data: {
                    "delete": 1,
                    "id": id
                  },
                  success: function (response) {
                    Swal.fire({
                      icon: response.status,
                      text: response.message,
                      confirmButtonText: 'Ok'
                    })
                    if(response.status == 'success'){
                      $('#studForm').trigger('reset');
                    }
                    display();
                    disableAllFields();
                    $("#stud_delete").prop("disabled", true);
                    $("#stud_save").text('Save');
                    $("#add").removeAttr('disabled');
                  }
                });
              }
            })
          });
        });
        function display(){
            $.ajax({
              type: "GET",
              url: "../includes/viewStudData.php",
              dataType: "html",
              success: function (data) {
                $('#viewStud').html(data);
              }
            });
        }
        //-----------OLD/TRANSFER STUDENT------------
        function sortDisplay(stud_type){
            $.ajax({
              type: "POST",
              url: "../includes/viewStudDash.php",
              dataType: "html",
              data: {"stud_type" : stud_type},
              success: function (data) {
                $('#viewStudDash').html(data);
              }
              
            });
        }
        function enableAll(){
          $("[name='student_number']").removeAttr('disabled');
          $("[name='stud_firstname']").removeAttr('disabled');
          $("[name='stud_lastname']").removeAttr('disabled');
          $("[name='stud_school_year']").removeAttr('disabled');
          $("[name='stud_semester']").removeAttr('disabled');
          $("[name='stud_year_level']").removeAttr('disabled');
          $("[name='stud_program']").removeAttr('disabled');
          $("[name='stud_major']").removeAttr('disabled');
          $("[name='stud_fee']").removeAttr('disabled');
          $("[name='stud_scholarship']").removeAttr('disabled');
          $("[name='stud_discount']").removeAttr('disabled');
          $("[name='stud_status']").removeAttr('disabled');
          $("[name='stud_lrn']").removeAttr('disabled');
          $("[name='req_form137']").removeAttr('disabled');
          $("[name='req_form138']").removeAttr('disabled');
          $("[name='req_psa']").removeAttr('disabled');
          $("[name='req_good_moral']").removeAttr('disabled');
          $("[name='stud_middlename']").removeAttr('disabled');
        }
        function disableAllFields(){
          $("[name='student_number']").prop("disabled", true);
          $("[name='stud_firstname']").prop("disabled", true);
          $("[name='stud_lastname']").prop("disabled", true);
          $("[name='stud_school_year']").prop("disabled", true);
          $("[name='stud_semester']").prop("disabled", true);
          $("[name='stud_year_level']").prop("disabled", true);
          $("[name='stud_program']").prop("disabled", true);
          $("[name='stud_major']").prop("disabled", true);
          $("[name='stud_fee']").prop("disabled", true);
          $("[name='stud_scholarship']").prop("disabled", true);
          $("[name='stud_discount']").prop("disabled", true);
          $("[name='stud_status']").prop("disabled", true);
          $("[name='stud_lrn']").prop("disabled", true);
          $("[name='req_form137']").prop("disabled", true);
          $("[name='req_form138']").prop("disabled", true);
          $("[name='req_psa']").prop("disabled", true);
          $("[name='req_good_moral']").prop("disabled", true);
          $("[name='stud_middlename']").prop("disabled", true);
        }
        function disablePartial(){
          $("[name='student_number']").prop("disabled", true);
          $("[name='stud_middlename']").prop("disabled", true);
          $("[name='stud_lastname']").prop("disabled", true);
          $("[name='stud_semester']").prop("disabled", true);
          $("[name='stud_program']").prop("disabled", true);
          $("[name='stud_year_level']").prop("disabled", true);
          $("[name='stud_major']").prop("disabled", true);
          $("[name='stud_fee']").prop("disabled", true);
          $("[name='stud_scholarship']").prop("disabled", true);
          $("[name='stud_discount']").prop("disabled", true);
          $("[name='req_form137']").prop("disabled", true);
          $("[name='req_form138']").prop("disabled", true);
          $("[name='req_psa']").prop("disabled", true);
          $("[name='req_good_moral']").prop("disabled", true); 
          $("[name='stud_firstname']").prop("disabled", true);
        }
        function enablePartial(){
          $("[name='student_number']").removeAttr('disabled');
          $("[name='stud_middlename']").removeAttr('disabled');
          $("[name='stud_lastname']").removeAttr('disabled');
          $("[name='stud_semester']").removeAttr('disabled');
          $("[name='stud_year_level']").removeAttr('disabled');
          $("[name='stud_program']").removeAttr('disabled');
          $("[name='stud_major']").removeAttr('disabled');
          $("[name='stud_fee']").removeAttr('disabled');
          $("[name='stud_scholarship']").removeAttr('disabled');
          $("[name='stud_discount']").removeAttr('disabled');
          $("[name='req_form137']").removeAttr('disabled');
          $("[name='req_form138']").removeAttr('disabled');
          $("[name='req_psa']").removeAttr('disabled');
          $("[name='req_good_moral']").removeAttr('disabled');
          $("[name='stud_firstname']").removeAttr('disabled');
        }

        // Limited access for Registrar
            const roleId = document.getElementById('roleId').innerHTML
            const employeeTabForAdmin = document.getElementById('employee_ForAdmin');
            const allUserTabForAdmin = document.getElementById('alluser_ForAdmin');
            const feesManagementForAdmin = document.getElementById('v-pills-fees-tab');
            const studetntTabForAdmin = document.getElementById('student-tab')

            if (roleId.includes('Registrar')){
              employeeTabForAdmin.style.display = "none";
              allUserTabForAdmin.style.display = "none";
              feesManagementForAdmin.style.display = "none";
            }else{
              studetntTabForAdmin.style.display = "none"
              employeeTabForAdmin.classList.toggle('active')
              employeeTabForAdmin.classList.toggle('show')
             

            }

            
              allUserTabForAdmin.addEventListener('click', function(){
              employeeTabForAdmin.classList.toggle('active')
              employeeTabForAdmin.classList.toggle('show')
              })
            

            
      </script>


  </body>
</html>