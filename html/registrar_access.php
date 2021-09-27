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



    <div class="row">
      
        <div class="col-3 left-tab">

        <div class="upper-left-tab">
            <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
            <p class="reg__name" style="font-size: 1.2rem;">Juan A. Dela Cruz <i class="fas fa-caret-down" onclick="profile_link_show()   "></i></p>
            <div class="profile_link" id="profile_link_id">
              <a href="">My Email</a>
              <a href="">Change Password</a>
              <a href="">Logout</a>
            </div>
            <p class="reg__name">Registrar | 900283</p>
            <p class="reg__name" id="reg-date-time"></p>
        </div>

            <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                <a class="nav-link main__" id="v-pills-manage--users-tab" data-toggle="pill" href="#v-pills-manage-users" role="tab" aria-controls="v-pills-manage-users" aria-selected="false">Manage Users</a>
                <a class="nav-link main__" id="v-pills-archives-tab" data-toggle="pill" href="#v-pills-archives" role="tab" aria-controls="v-pills-archives" aria-selected="false">Archives</a>
                <q class="mt-2">Version 1.0.0.0</q>
            </div>
        </div>
        

       
        <div class="col-sm right-tab">
           <!-- Dashboard -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active dashboard-tab" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab"><br>
                <p class="title_tab_universal">Dashboard</p>
                <form action="" class="universalForm_one">
                  <input type="text" name="" id="" placeholder="Search">
                  <button type="button" class="btn btn-primary">Search</button>
                    
                </form>

                
                <div class="col my-3 all_student_info">
                <div class="col-sm-2 bg-success text-white student__group">
                  <div class="student__group_left">
                    <img src="../images/registrar_img/all_students.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center" onclick="dashboard_table_appear()">
                    <span class="text-center d-block">Total Students</span>
                    <strong class="text-center d-block">626</strong>
                  </div>
                </div>

                <div class="col-sm-2 mx-1 bg-success text-white student__group" onclick="dashboard_table_appear()">
                  <div class="student__group_left">
                    <img src="../images/registrar_img/transferee.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Transferee Students</span>
                    <strong class="text-center d-block">277</strong>
                  </div>
                </div>


                


                <div class="col-sm-2 mx-1 bg-success text-white student__group" onclick="dashboard_table_appear()">
                  <div class="student__group_left">
                    <img src="../images/registrar_img/unregistered_student.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Old Students</span>
                    <strong class="text-center d-block">349</strong>
                  </div>
                </div>
              </div>

                    <div class="col unreg_students_div">
                      <p class="notice__">Note * Only students listed below can procced to the online registration. Also, students that has been registered is out of this list.<span> To add students, go to Manage Users tab.</span></p>
                      
                      <div class="row">
                      <div class="col">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
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
                          <option value="1">Unregister Students</option>
                          <option value="2">Scholar Students</option>
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
                            <tbody>
                              <tr>
                                <th scope="row">2018301302</th>
                                <td>Denver</td>
                                <td>Pulido</td>
                                <td>BSCS</td>
                                <td>Web and Mobile Application</td>
                                <td>4th</td>
                                <td>Transferee</td>
                                <td>Full</td>
                                <td>1011121314</td>
                                <td>pulido@gmail.com</td>
                               
                              </tr>
                              <tr>
                              <th scope="row">2018301303</th>
                                <td>Mery Anne</td>
                                <td>Villano</td>
                                <td>BSIT</td>
                                <td>Web and Mobile Application</td>
                                <td>4th</td>
                                <td>Old Student</td>
                                <td>Full</td>
                                <td>1011121315</td>
                                <td>mery@gmail.com</td>
                              </tr>
                              <tr>
                                <th scope="row">2018301304</th>
                                <td>Justine</td>
                                <td>Delos Reyes</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                              </tr>
                              <tr>
                                <th scope="row">2018301305</th>
                                <td>Michael</td>
                                <td>Isla</td>
                                <td>BSED</td>
                                <td>English</td>
                                <td>4th</td>
                                <td>Transferee</td>
                                <td>Partial</td>
                                <td>1011121317</td>
                                <td>isla@gmail.com</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
            </div>
            </div>



            <!-- MANAGE USERS -->
            <div class="tab-pane fade manage-users-tab show" id="v-pills-manage-users" role="tabpanel" aria-labelledby="v-pills-manage-users-tab">
              <p class="title_tab_universal" id="student_employee_all_id_text">Student's Records</p>
              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>


                
              <ul class="nav nav-tabs manage-users-tab__secondary" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="true">Student</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="employees-tab" data-toggle="tab" href="#employees" role="tab" aria-controls="employees" aria-selected="false">Employees</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="all-users-tab" data-toggle="tab" href="#all-users" role="tab" aria-controls="all-users" aria-selected="false">All users</a>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent">

              
<!----------------------------- Students Tab ---------------------------->
                <div class="tab-pane fade show active mt-2 stud__tab" id="student" role="tabpanel" aria-labelledby="student-tab">
                  <p class="role_information text-primary">Student's Information</p>
                        
                  <form action="managestudent.php" method="post" class="universalForm_two" >
                      <div class="manage_users_universal_tab_lmr_parent">
                        
                        
                          <div class="manage_users_universal_left_tab">
                          <img src="../images/registrar_img/sample_student_pic.png" class="rounded float-start" alt="...">
                          <button type="button" class="btn btn-primary my-2">Change Image</button>
                          </div>


                          <div class="manage_users_universal_mid_tab px-1">
                            
                            <div class="row g-2 mb-1">
                            <div class="col-md">

                          

                              <div class="form-floating">
                                <input type="number" name="student_number" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                <label for="floatingInputGrid">Student Number</label>
                              </div>
                            </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="firstname" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">First name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="middlename" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">Middle name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="lastname" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">Last name</label>
                                </div>
                              </div>
                            </div>

                            <div class="row g-2 mb-1">
                              <div class="col-md-2">
                                <div class="form-floating">
                                  <select class="form-select" name="sex" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                    
                                  </select>
                                  <label for="floatingSelect">Sex</label>
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="date" name="birthdate" class="form-control" id="floatingInputGrid" placeholder=" ">
                                  <label for="floatingInputGrid">Birthdate</label>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-floating">
                                  <input type="number" name="age" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">Age</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="address" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">Address</label>
                                </div>
                              </div>
                            </div>

                            <div class="row g-2 mb-1">

<<<<<<< HEAD
                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" name="religion" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                  <label for="floatingInputGrid">Religion</label>
                                </div>
                              </div>
=======
                              
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f
            
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="citizenship" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                    <label for="floatingInputGrid">Citizenship</label>
                                  </div>
                                </div>
            
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="civil_status" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                    <label for="floatingInputGrid">Civil Status</label>
                                  </div>
                                </div>
            
                              </div>

                              <div class="row g-2 mb-1">

                                <div class="col-md-6">
                                  <div class="form-floating">
<<<<<<< HEAD
                                    <select class="form-select" name="college" id="floatingSelect" aria-label="Floating label select example">
                                      <option value="BSIT" >Information Technology</option>
                                      <option value="BSHTM">Hotel Management and Tourism</option>
                                      <option value="BSME">Mechanical Engineering</option>
=======
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                      <option value="BSIT" selected>Bachelor of Science in Information Technology</option>
                                      <option value="BSHTM">Bachelor of Science in Computer Science </option>
                                      <option value="BSME">Bachelor of Science in Education</option>
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f
                      
                                    </select>
                                    <label for="floatingSelect">Program</label>
                                  </div>
                                </div>
              
                                <div class="col-md">
                                  <div class="form-floating">
                                    <select class="form-select" name="major" id="floatingSelect" aria-label="Floating label select example">
                                      <option value="BSIT" >WMA</option>
                                      <option value="BSHTM">TSM</option>
                                      <option value="BSME">NA</option>
                      
                                    </select>
                                    <label for="floatingSelect">Major</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" name="year_section" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                    <label for="floatingInputGrid">Year & Section</label>
                                  </div>
                                </div>
                              </div>

                              <div class="row g-2 mb-1">
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                    <label for="floatingInputGrid">Email</label>
                                  </div>
                                </div>
    
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <input type="tel" name="contact_number" class="form-control" id="floatingInputGrid" placeholder=" " value="">
                                      <label for="floatingInputGrid">Contact number</label>
                                    </div>
                                  </div>
                                </div>
                          </div>

                          <div class="manage_users_students_right_tab">
                            <p class="text-center">Submitted Requirements</p>
                            <div class="form-check">
<<<<<<< HEAD
                              <input class="form-check-input" type="checkbox" name="form137" value="✓" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
=======
                              <input class="form-check-input" type="checkbox" value="" id="form137">
                              <label class="form-check-label" for="form137">
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f
                                Form 137
                              </label>
                            </div>

                            <div class="form-check">
<<<<<<< HEAD
                              <input class="form-check-input" type="checkbox" name="form138" value="✓" id="flexCheckChecked" >
                              <label class="form-check-label" for="flexCheckChecked">
=======
                              <input class="form-check-input" type="checkbox" value="" id="form138" checked>
                              <label class="form-check-label" for="form138">
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f
                                Form 138
                              </label>
                            </div>

                            
                            <div class="form-check">
<<<<<<< HEAD
                              <input class="form-check-input" type="checkbox" name="psa" value="✓" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
=======
                              <input class="form-check-input" type="checkbox" value="" id="psa-bc">
                              <label class="form-check-label" for="psa-bc">
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f
                                PSA Birth Certificate
                              </label>
                            </div>

                            <div class="form-check">
<<<<<<< HEAD
                              <input class="form-check-input" type="checkbox" name="good_moral" value="✓" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
=======
                              <input class="form-check-input" type="checkbox" value="" id="good-moral">
                              <label class="form-check-label" for="good-moral">
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f
                                Good Moral
                              </label>
                            </div>

<<<<<<< HEAD
                            <button type="submit" class="btn btn-primary font py-2 px-0">Add Requirements</button>
=======
>>>>>>> 78b79516ef9ad2b87834579fbed6ff28de33d25f

                          </div>

                          </div>
                  
                      <div class="buttons_manage_universal">
                      <button type="submit" name="add" class="btn btn-info">Add</button>
                      <button type="submit" name="update" class="btn btn-warning">Edit</button>
                      <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                      <button type="submit" class="btn btn-success" disabled>Save</button>
                      </div>
                    
                      </form> 
                    

                      <hr>
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
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">2018300366</th>
                            <td>Justine Dave</td>
                            <td>Delos reyes</td>
                            <td></td>
                            <td>✓</td>
                            <td> </td>
                            <td></td>
                            <td>Submitted Form 138 <br> 9/14/2021</td>
                          </tr>

                          <tr>
                            <th scope="row">2018300902</th>
                            <td>John David</td>
                            <td>Cruz</td>
                            <td></td>
                            <td></td>
                            <td> </td>
                            <td>✓</td>
                            <td>Submitted Good moral <br> 3/21/2021</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                </div>





                <!-- Employees Tab -->
                <div class="tab-pane fade mt-2 employee__tab" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                  <p class="role_information text-primary">Employee's Information</p>
                  <form action="" class="universalForm_two">
                  <div class="manage_users_universal_tab_lmr_parent">

                      <div class="manage_users_universal_left_tab">
                      <img src="../images/registrar_img/sample_employee_pic.png" class="rounded float-start" alt="...">
                      <button type="button" class="btn btn-primary my-2">Change Image</button>
                      </div>

                      <div class="manage_users_universal_mid_tab px-1">
                        <div class="row g-2 mb-1">

                        

                           <div class="col-md-3">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Cashier">
                              <label for="floatingInputGrid">Role</label>
                            </div>
                          </div>
                         
                      </div>




                      <div class="row g-2 mb-1">

                     
                      <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" id="floatingInputGrid" placeholder=" " value="900283">
                              <label for="floatingInputGrid">Employee ID</label>
                            </div>
                          </div>
                        <div class="col-md">
                          <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Juan">
                            <label for="floatingInputGrid">First name</label>
                          </div>
                        </div>

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Abuelos">
                              <label for="floatingInputGrid">Middle name</label>
                            </div>
                          </div>

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Dela Cruz">
                              <label for="floatingInputGrid">Last name</label>
                            </div>
                          </div>

                          
                        </div>

                        <div class="row g-2 mb-1">
                          <div class="col-md">
                            <div class="form-floating">
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                
                              </select>
                              <label for="floatingSelect">Sex</label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-floating">
                              <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                              <label for="floatingInputGrid">Birthdate</label>
                            </div>
                          </div>

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" id="floatingInputGrid" placeholder=" " value="21">
                              <label for="floatingInputGrid">Age</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="109 Rang Ayan Paniqui, Tarlac">
                                  <label for="floatingInputGrid">Address</label>
                                </div>
                              </div>

                          
                        </div>

                        <div class="row g-2 mb-1">

        
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder=" " value="Juandc@gmail.com">
                                <label for="floatingInputGrid">Email</label>
                              </div>
                            </div>
        
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputGrid" placeholder=" " value="09098890122">
                                <label for="floatingInputGrid">Contact number</label>
                              </div>
                            </div>

                            <div class="col-md">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Filipino">
                                <label for="floatingInputGrid">Citizenship</label>
                              </div>
                            </div>
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder=" " value="Single">
                                <label for="floatingInputGrid">Civil Status</label>
                              </div>
                            </div>
        
                          </div>

                          
                      </div>


                  </div> 
                </form>
                  
                  <div class="buttons_manage_universal">
                  <button type="button" class="btn btn-info">Add</button>
                  <button type="button" class="btn btn-warning">Edit</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                  <button type="button" class="btn btn-success" disabled>Save</button>
                  </div> 
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
                <div class="tab-pane fade mt-2 all_user__tab" id="all-users" role="tabpanel" aria-labelledby="all-users-tab">
                  <p class="role_information text-primary">Choose Account to Filter</p>

                  

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
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">2018300366</th>
                            <td>Justine Dave</td>
                            <td>DelosReyes</td>
                            <td>Student</td>
                            <td>delosreyes366@gmail.com</td>
                            <td>Enrolled</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">2018300478</th>
                            <td>Michael</td>
                            <td>Isla</td>
                            <td>Student</td>
                            <td>isla478@gmail.com</td>
                            <td>Not Enrolled</td>
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
            </div>
            



            <!-- ARCHIVES -->
            <div class="tab-pane fade archive-tab" id="v-pills-archives" role="tabpanel" aria-labelledby="v-pills-archives-tab">
              <p class="title_tab_universal" id="student_employee_all_id_text">Archives</p>

              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

              
              <div class="all_user__tab mt-3">
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
                            <th scope="col">Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">2018300366</th>
                            <td>Justine Dave</td>
                            <td>DelosReyes</td>
                            <td>Student</td>
                            <td>delosreyes366@gmail.com</td>
                            <td>Enrolled</td>
                            
                          </tr>
                          <tr>
                            <th scope="row">2018300478</th>
                            <td>Michael</td>
                            <td>Isla</td>
                            <td>Student</td>
                            <td>isla478@gmail.com</td>
                            <td>Not Enrolled</td>
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

          
          </div>
        </div>
    </div>



 


  <!-- Function to appear table -->
  <script type="text/javascript">
    let table_ = document.getElementById('table_dashboard_id');
    function dashboard_table_appear(){
        table_.classList.toggle('active')
    }
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
        let tab_count_manage_users = 1;
        let student_employee_all_id_text = document.getElementById('student_employee_all_id_text');

        function change_tab(){
          if(tab_count_manage_users === 1){
            student_employee_all_id_text.textContent = "Student Records"
          }else if(tab_count_manage_users === 2){
            student_employee_all_id_text.textContent = "Employee Records"
          }else{
            student_employee_all_id_text.textContent = "All User Records"
          }
        }
          let employee_tab = document.getElementById('employees-tab');
          let student_tab = document.getElementById('student-tab');
          let all_users_tab = document.getElementById('all-users-tab');

          student_tab.addEventListener("click", function(){
            tab_count_manage_users = 1;
            change_tab();
          });

          employee_tab.addEventListener("click", function(){
            tab_count_manage_users = 2;
            change_tab();
          });

          all_users_tab.addEventListener("click", function(){
            tab_count_manage_users = 3;
            change_tab();
          });

          function profile_link_show(){
            let profile_link = document.getElementById('profile_link_id');
          profile_link.classList.toggle('show');
          }
          

      </script>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>