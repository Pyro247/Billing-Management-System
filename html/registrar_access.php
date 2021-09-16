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
      <img src="/images/logo.png" alt="">
          <div class="nav__bar_two_text">
              <span>Pyro Colleges Inc.</span>
              <p>Excellence at its finest.</p>
          </div>
      </div>
  </div>



    <div class="row">
        <div class="col-3 left-tab">

        <div class="upper-left-tab">
            <img src="../images/sample_registrar_pic.png" alt="">
            <p class="reg__name" style="font-size: 1.2rem;">Juan A. Dela Cruz</p>
            <p class="reg__name">Registrar | 900283</p>
            <p class="reg__name" id="reg-date-time"></p>
        </div>

            <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                <a class="nav-link main__" id="v-pills-manage--users-tab" data-toggle="pill" href="#v-pills-manage-users" role="tab" aria-controls="v-pills-profile" aria-selected="false">Manage Users</a>
                <a class="nav-link main__" id="v-pills-archives-tab" data-toggle="pill" href="#v-pills-archives" role="tab" aria-controls="v-pills-messages" aria-selected="false">Archives</a>
                <a class="nav-link main__" id="v-pills-logout-tab" data-toggle="pill" href="#v-pills-logout" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>
                <q class="mt-2">Version 1.0.0.0</q>
            </div>
        </div>
        

       
        <div class="col-sm right-tab">
           <!-- Dashboard -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active dashboard-tab" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                <p class="__reg-unreg">Unregistered Students</p>
                <form action="">
                  <input type="text" name="" id="" placeholder="Search">
                  <button type="button" class="btn btn-primary">Search</button>
                    
                </form>

                <div class="col my-3 all_student_info">
                <div class="col-sm-2 bg-success text-white student__group">
                  <div class="student__group_left">
                    <img src="/images/all_students.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Total Students</span>
                    <strong class="text-center d-block">1098</strong>
                  </div>
                </div>

                <div class="col-sm-2 mx-1 bg-success text-white student__group">
                  <div class="student__group_left">
                    <img src="/images/transferee.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Transferee Students</span>
                    <strong class="text-center d-block">277</strong>
                  </div>
                </div>


                <div class="col-sm-2 mx-1 bg-success text-white student__group">
                  <div class="student__group_left">
                    <img src="/images/registered_student.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Registered Students</span>
                    <strong class="text-center d-block">472</strong>
                  </div>
                </div>


                <div class="col-sm-2 mx-1 bg-success text-white student__group">
                  <div class="student__group_left">
                    <img src="/images/unregistered_student.png" alt="" class="rounded mx-auto d-block">
                  </div>
                  <div class="student__group_right align-center">
                    <span class="text-center d-block">Unregistered Students</span>
                    <strong class="text-center d-block">349</strong>
                  </div>
                </div>
              </div>

                    <div class="col unreg_students_div">
                      <p class="notice__">Note * Only students listed below can procced to the online registration. Also, students that has been registered is out of this list.<span> To add students, go to Manage Users tab.</span></p>
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option selected>All</option>
                          <option value="1">Bachelor of Information Technology</option>
                          <option value="2">Bachelor of Hospitality and Tourism</option>
                          <option value="3">Bachelor of Mechanical Engineering</option>
                        </select>
                        <label for="floatingSelect">Choose Course</label>
                      </div>

                        <div class="table__" style="overflow-x: auto;">
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">First name</th>
                                <th scope="col">Last name</th>
                                <th scope="col">Major</th>
                                <th scope="col">Year & Section</th>
                                <th scope="col">Email</th>
                                <th scope="col">LRN</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">2018300366</th>
                                <td>Justine Dave</td>
                                <td>DelosReyes</td>
                                <td>WMA</td>
                                <td>4A</td>
                                <td>delosreyes366@gmail.com</td>
                                <td>971490737154</td>
                                
                              </tr>
                              <tr>
                                <th scope="row">2018300478</th>
                                <td>Michael</td>
                                <td>Isla</td>
                                <td>WMA</td>
                                <td>4A</td>
                                <td>isla478@gmail.com</td>
                                <td>135248434268</td>
                              </tr>
                              <tr>
                                <th scope="row">2018300902</th>
                                <td>Denver</td>
                                <td>Pulido</td>
                                <td>WMA</td>
                                <td>4A</td>
                                <td>pulido902@gmail.com</td>
                                <td>635313927363</td>
                                
                              </tr>
                              <tr>
                                <th scope="row">2018300612</th>
                                <td>Mery Anne</td>
                                <td>Villano</td>
                                <td>WMA</td>
                                <td>4A</td>
                                <td>villano612@gmail.com</td>
                                <td>518220545235</td>
                                
                              </tr>
                            </tbody>
                          </table>
                        </div>
            </div>
            </div>



            <!-- MANAGE USERS -->
            <div class="tab-pane fade manage-users-tab show" id="v-pills-manage-users" role="tabpanel" aria-labelledby="v-pills-manage-users-tab">
              <p class="__manage-users-p" id="student_employee_all_id_text">Student's Records</p>
              <form action="">
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

                <!-- Students Tab -->
                <div class="tab-pane fade show active mt-2 stud__tab" id="student" role="tabpanel" aria-labelledby="student-tab">
                  <p class="role_information text-primary">Student's Information</p>
                        
                      <div class="manage_users_universal_tab_lmr_parent">

                          <div class="manage_users_universal_left_tab">
                          <img src="/images/sample_registrar_pic.png" class="rounded float-start" alt="...">
                          <button type="button" class="btn btn-primary my-2">Change Image</button>
                          </div>

                          <div class="manage_users_universal_mid_tab px-1">
                            <div class="row g-2 mb-1">
                            <div class="col-md">
                              <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputGrid" placeholder=" " value="2018300366" readonly disabled>
                                <label for="floatingInputGrid">Student Number</label>
                              </div>
                            </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Justine Dave">
                                  <label for="floatingInputGrid">First name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Molato">
                                  <label for="floatingInputGrid">Middle name</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Delos reyes">
                                  <label for="floatingInputGrid">Last name</label>
                                </div>
                              </div>
                            </div>

                            <div class="row g-2 mb-1">
                              <div class="col-md-2">
                                <div class="form-floating">
                                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                    
                                  </select>
                                  <label for="floatingSelect">Sex</label>
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-floating">
                                  <input type="date" class="form-control" id="floatingInputGrid" placeholder=" ">
                                  <label for="floatingInputGrid">Birthdate</label>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="form-floating">
                                  <input type="number" class="form-control" id="floatingInputGrid" placeholder=" " value="21">
                                  <label for="floatingInputGrid">Age</label>
                                </div>
                              </div>

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="109 Rang Ayan Paniqui, Tarlac">
                                  <label for="floatingInputGrid">Address</label>
                                </div>
                              </div>
                            </div>

                            <div class="row g-2 mb-1">

                              <div class="col-md">
                                <div class="form-floating">
                                  <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Born Again">
                                  <label for="floatingInputGrid">Religion</label>
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
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="Single">
                                    <label for="floatingInputGrid">Civil Status</label>
                                  </div>
                                </div>
            
                              </div>

                              <div class="row g-2 mb-1">

                                <div class="col-md-6">
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                      <option value="BSIT" selected>Information Technology</option>
                                      <option value="BSHTM" selected>Hotel Management and Tourism</option>
                                      <option value="BSME" selected>Mechanical Engineering</option>
                      
                                    </select>
                                    <label for="floatingSelect">College | Bachelor of Science in</label>
                                  </div>
                                </div>
              
                                <div class="col-md">
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                      <option value="BSIT" selected>WMA</option>
                                      <option value="BSHTM" selected>TSM</option>
                                      <option value="BSME" selected>NA</option>
                      
                                    </select>
                                    <label for="floatingSelect">Major</label>
                                  </div>
                                </div>

                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder=" " value="4A">
                                    <label for="floatingInputGrid">Year & Section</label>
                                  </div>
                                </div>
                              </div>

                              <div class="row g-2 mb-1">
                                <div class="col-md">
                                  <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInputGrid" placeholder=" " value="djustine247@gmail.com">
                                    <label for="floatingInputGrid">Email</label>
                                  </div>
                                </div>
    
                                  <div class="col-md">
                                    <div class="form-floating">
                                      <input type="tel" class="form-control" id="floatingInputGrid" placeholder=" " value="09096431629">
                                      <label for="floatingInputGrid">Contact number</label>
                                    </div>
                                  </div>
                                </div>
                          </div>

                          <div class="manage_users_students_right_tab">
                            <p class="text-center">Submitted Requirements</p>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                Form 137
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
                                Form 138
                              </label>
                            </div>

                            
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
                                PSA Birth Certificate
                              </label>
                            </div>

                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                              <label class="form-check-label" for="flexCheckChecked">
                                Good Moral
                              </label>
                            </div>

                            <button type="button" class="btn btn-primary font py-2 px-0">Add Requirements</button>

                          </div>

                      </div> 
                      
                      <div class="buttons_manage_universal">
                      <button type="button" class="btn btn-info">Add</button>
                      <button type="button" class="btn btn-warning">Edit</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                      <button type="button" class="btn btn-success" disabled>Save</button>
                      </div> 
                      <hr>
                      <div class="manage_student_tab_below mt-4">
                        <p class="role_information text-success">All Student's list and Filtering</p>


                        <div class="row g-2">
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                              <option selected>All</option>
                              <option value="BSIT">Information Technology</option>
                              <option value="BSHTM">Hotel Management and Tourism</option>
                              <option value="BSME">Mechanical Engineering</option>
              
                            </select>
                            <label for="floatingSelect">College | Bachelor of Science in</label>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                              <option value="BSIT_WMA" selected>All</option>
                              <option value="BSIT_WMA">WMA</option>
                              <option value="BSIT_TSM">TSM</option>
                              <option value="BSIT_NA">NA</option>
              
                            </select>
                            <label for="floatingSelect">Major</label>
                          </div>
                        </div>
                      </div>

                      <div class="table__" style="overflow-x: auto;">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Student Number</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
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
                            <td>✓</td>
                            <td>✓</td>
                            <td> </td>
                            <td>✓</td>
                            <td>Submitted Form 138 <br> 9/14/2021</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                </div>





                <!-- Employees Tab -->
                <div class="tab-pane fade mt-2 employee__tab" id="employees" role="tabpanel" aria-labelledby="employees-tab">
                  <p class="role_information text-primary">Employee's Information</p>
                        
                  <div class="manage_users_universal_tab_lmr_parent">

                      <div class="manage_users_universal_left_tab">
                      <img src="/images/example_employee.png" class="rounded float-start" alt="...">
                      <button type="button" class="btn btn-primary my-2">Change Image</button>
                      </div>

                      <div class="manage_users_universal_mid_tab px-1">
                        <div class="row g-2 mb-1">
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

                          <div class="col-md">
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

                          
                        </div>

                        <div class="row g-2 mb-1">

                          <div class="col-md">
                            <div class="form-floating">
                              <input type="number" class="form-control" id="floatingInputGrid" placeholder=" " value="900283">
                              <label for="floatingInputGrid">ID Number</label>
                            </div>
                          </div>
        
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
        
                          </div>

                          
                      </div>


                  </div> 
                  
                  <div class="buttons_manage_universal">
                  <button type="button" class="btn btn-info">Add</button>
                  <button type="button" class="btn btn-warning">Edit</button>
                  <button type="button" class="btn btn-danger">Delete</button>
                  <button type="button" class="btn btn-success">Save</button>
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
                        <th scope="col">ID Number</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Start date</th>
                        
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
                          <option value="Cashier">Role</option>
                          
          
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
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Search</button>
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
              <p class="__manage-users-p" id="student_employee_all_id_text">Archives</p>

              <form action="">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

              
              <div class="all_user__tab mt-3">
              <p class="role_information text-primary mt-2">Choose Account to Filter</p>

                  <div class="row g-2">

                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option value="BSIT_WMA" selected>None</option>
                          <option value="BSIT_WMA">First name</option>
                          <option value="Registrar">Last name</option>
                          <option value="Cashier">Role</option>
                          
          
                        </select>
                        <label for="floatingSelect">Status</label>
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
                        <button type="button" class="btn btn-outline-primary font p-2 s_c__">Search</button>
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


            <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
              <div class="table__" style="overflow-x: auto;">
                <p class="__manage-users-p" id="student_employee_all_id_text">CHANGES MADE</p>
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Changes Made</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">2018300366</th>
                        <td>Justine Dave</td>
                        <td>DelosReyes</td>
                        <td>BSIT</td>
                        <td>Changed Last name</td>
                        
                        
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
    </div>



 







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


      </script>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>