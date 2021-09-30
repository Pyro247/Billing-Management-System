    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <!-- Fontawsome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    

        <!-- CSS Local -->
        <link rel="stylesheet" href="../css/student_access.css">

        <title>Student</title>
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
            <p class="reg__name"> BSIT | 2018300366</p>
            <p class="reg__name" id="reg-date-time"></p>
        </div>

        <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
            <a class="nav-link main__" id="v-pills-payment-application-tab" data-toggle="pill" href="#v-pills-payment-application" role="tab" aria-controls="v-pills-payment-application" aria-selected="false">Payment Application</a>
            
            <q class="mt-2">Version 1.0.0.0</q>
        </div>
        </div>
        


    <div class="col-md right-tab">
            <!-- Dashboard -->
            <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab"><br>
                <p class="title_tab_universal">Approve Payments</p>

                    <form action="" class="universalForm_one">
                    <input type="text" name="" id="" placeholder="Search">
                    <button type="button" class="btn btn-primary">Search</button>
                    </form>
            </div>


            <!-- PAYMENT application -->
            <div class="tab-pane fade" id="v-pills-payment-application" role="tabpanel" aria-labelledby="v-pills-payment-application">
                <p class="title_tab_universal text-primary">Payment Application</p>

                    <div class="payApp_miniDashboard mb-3">
                        <div class="col d-flex mb-2">
                            <span class="miniDashboardh3 mx-3 w-50 ">Email <span class="text-primary" style="font-weight: bold;">jd.delosreyes0366@student.tsu.edu.ph</span></span>
                            <span class="miniDashboardh3 w-50 text-end ">Tuition Fee <span class="text-success" style="font-weight: bold; ">₱20,000.00</span></span>
                        </div>
                        <div class="col d-flex">
                            <span class="miniDashboardh3 mx-3 w-50">Remaining Balance: <span class="text-success" style="font-weight: bold;">₱20,000.00</span></span>
                            <span class="miniDashboardh3 text-end w-50">Last Amount paid: <span class="text-success" style="font-weight: bold;">₱0.00</span></span>
                        
                        </div>
                    </div>
                    

                    <div class="payApp_createPayment mt-2">
                        <p class="title_tab_universal text-primary">Create Payment Application Form</p>
                            <form action="" class="payApp_createPaymentForm mb-3 p-2">
                                <div class="payAppFormWrapper">
                                <div class="leftForm">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Student ID</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Student ID">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">First name</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Firstname">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"  style="min-width: 110px;" id="basic-addon1">Last name</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Last name">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Email</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>

                                    <span>Amount:</span>
                                    <div class="input-group mb-3">
                                        
                                        <div class="input-group-prepend">
                                            
                                            <span class="input-group-text d-inline-block">₱</span>
                                        </div>
                                        <input type="text" class="form-control">
                                        <span class="input-group-text text-success"><i class="fas fa-credit-card">&nbsp;</i>Online</span>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Date</span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="">
                                    </div>
                                    

                                </div>

                                    <div class="rightForm">
                                        <div class="rightFormInner">
                                        <div class="rightForm_text text-secondary">
                                            <i class="fas fa-file-invoice text-primary" style="font-size: 4rem;"></i>
                                            <p>Attach Payment Sales Invoice from your chosen local payment gateway.</p>
                                        </div>
                                    </div>
                                    <input type="file" name="" id="">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success d-block mx-auto">Submit</button>
                            </form> 
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
        </div>

        
                
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
    </html>