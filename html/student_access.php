    <?php
        session_start();
        if(!isset($_SESSION['stud_id']) && $_SESSION['role'] != 'Student'){
            header('Location: login.php');
        }else{
            include_once '../connection/Config.php';
            $sqlStud ="SELECT det.*,fees.*
                        FROM tbl_student_school_details AS det
                        INNER JOIN tbl_student_fees AS fees 
                        WHERE det.stud_id = ?";
            $stmtStud = $con->prepare($sqlStud);
            $stmtStud->bind_param('s', $_SESSION['stud_id']);
            $stmtStud->execute();
            $resStud = $stmtStud->get_result(); 
            $rowStud = $resStud->fetch_assoc();
        }
    ?>
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

         <!-- Sweet Alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    


    <div class="row parentContainerClass">
        <div class="col-3 left-tab">
        <div class="upper-left-tab">
            <img src="..\images\registrar_img\sample_registrar_pic.png" alt="">
            <p class="reg__name" style="font-size: 1.2rem;"><?= $_SESSION['fullname'];?><i class="fas fa-caret-down" onclick="profile_link_show()   "></i></p>
            <div class="profile_link" id="profile_link_id">
                <a href="">My Email</a>
                <a href="../html/forgotPassword.php">Change Password</a>
                <a href="../includes/logout.inc.php">Logout</a>
            </div>
            <p class="reg__name"> <?=$rowStud['csi_program'];?> | <?= $_SESSION['fullname'];?></p>
            <p class="reg__name"><?=$rowStud['csi_major'];?></p>
            <p class="reg__name" id="reg-date-time"></p>
        </div>

        <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><img src="../images/icons/dashboard.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Dashboard</a>
            <a class="nav-link main__" id="v-pills-payment-application-tab" data-toggle="pill" href="#v-pills-payment-application" role="tab" aria-controls="v-pills-payment-application" aria-selected="false"><img src="../images/icons/stud_payment_form.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Payment Application</a>
            <a class="nav-link main__" id="v-pills-transaction-history-tab" data-toggle="pill" href="#v-pills-transaction-history" role="tab" aria-controls="v-pills-transaction-history" aria-selected="false"><img src="../images/icons/transaction_history.png" width="30px" height="30px" class="d-block mx-auto mb-1">&nbsp;Transaction History</a>
        </div>
        </div>
        


    <div class="col-md right-tab">
            <!-- Dashboard -->
            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
                    <p class="title_tab_universal mb-3">Dashboard</p>

                    <div class="miniDashboard mb-5">
                        <div class="col d-flex mb-2">
                            <span class="miniDashboardh3 mx-3 w-50 ">Email: <span class="text-primary" style="font-weight: bold;"><?= $_SESSION['email'];?></span></span>
                            <span class="miniDashboardh3 w-50 text-end ">Tuition Fee: <span class="text-success" style="font-weight: bold; "><?=$rowStud['tuition_fee'];?></span></span>
                           
                        </div>
                        <div class="col d-flex mb-2">
                            <span class="miniDashboardh3 mx-3 w-50">Remaining Balance: <span class="text-success" style="font-weight: bold;"><?=$rowStud['balance'];?></span></span>
                            <span class="miniDashboardh3 text-end w-50">Last Amount paid: <span class="text-success" style="font-weight: bold;"><?=$rowStud['total_amount_paid'];?></span></span>

                        </div>
                        <div class="col d-flex">
                            <span class="miniDashboardh3 mx-3 w-50">Scholarship: <span class="text-success" style="font-weight: bold; "><?=$rowStud['scholar_type'];?></span></span>
                            <span class="miniDashboardh3 w-50 text-end ">Last Date Payment: <span class="text-success" style="font-weight: bold; ">2/21/2021</span></span>
                        </div>
                    </div>

                    <div class="universalLightGrayBg">
                        <span class="text-primary d-block mb-2" style="font-size: 1.5rem; font-weight: bold;">Transaction History</span>
                            <table class="table">
                                <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Cashier</th>
                                    
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <th scope="row">FT-001</th>
                                    <td>₱2000</td>
                                    <td>Online - Gcash</td>
                                    <td>02/11/2021</td>
                                    <td class="text-success text-uppercase fw-bold">Approved</td>
                                    <td>Juan A. DelaCruz</td>
                                </tr>

                                <tr class="text-center">
                                    <th scope="row">FT-006</th>
                                    <td>₱3250</td>
                                    <td>Cash</td>
                                    <td>02/21/2021</td>
                                    <td class="text-success text-uppercase fw-bold">Approved</td>
                                    <td>Juan A. DelaCruz</td>
                                
                                </tr>
                                </tbody>
                            </table>

                        
                    </div>

                    
                    
                    </div>

         

            <!-- PAYMENT application -->
            <div class="tab-pane fade" id="v-pills-payment-application" role="tabpanel" aria-labelledby="v-pills-payment-application">
                <p class="title_tab_universal">Payment Application</p>

                    <span class="d-block text-primary" style="font-size: 1.4rem;">Paying Bills? - It's easy and simple! - <strong>Click the Platforms to see instructions</strong></span>
                    <div class="miniDashboard mb-4">
                        <span class="d-block text-primary text-center" style="font-size: 1.7rem;">You can use:</span>
                        <div class="miniDashboardInner d-flex justify-content-around">
                            <div class="paymentPlatform" onclick="paymentGcash()">
                            <img src="../images/student_pics/gcash.png" alt="">
                            <span>Gcash</span>
                            
                            </div>

                            <div class="paymentPlatform" onclick="paymentPayMaya()">
                            <img src="../images/student_pics/paymaya.png" alt="">
                            <span>PayMaya</span>
                            </div>

                            <div class="paymentPlatform" onclick="paymentRemittance()">
                            <img src="../images/student_pics/remittance.png" alt="">
                            <span>Remittance</span>
                            </div>

                            <div class="paymentPlatform" onclick="paymentBankTransfer()">
                            <img src="../images/student_pics/bankTransfer.png" alt="">
                            <span>Bank Transfer</span>
                            </div>

                            <!-- Sweet Alert For clicking the Payment Gateway -->
                            <script type="text/javascript">
                            let oList = document.getElementById('olID');
                            let popUpImageID = document.getElementById('popUpImageID')
                            let parent_container = document.getElementById('parent_ID')
                                function paymentGcash(){
                                    Swal.fire({
                                    title: '<span style="color: #2832c2">GCASH Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Open your Gcash App <br><br>' +
                                        '2. Send payment to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a Screenshot of the Gcash transaction <br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit<br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/gcash.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }

                                function paymentPayMaya(){
                                    Swal.fire({
                                    title: '<span style="color: #151e3d">PAYMAYA Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Open your PayMaya App <br><br>' +
                                        '2. Send payment to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a Screenshot of the PayMaya transaction <br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit <br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/paymaya.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }

                                function paymentRemittance(){
                                    Swal.fire({
                                    title: '<span style="color: #28a745">MONEY REMITTANCE Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Go to your nearest Money Remittance Center (Palawan Express, Cebuana Lhuillier, M Lhuillier or Western Union) <br><br>' +
                                        '2. Send payment to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a snapshot of the remittance receipt<br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit <br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/remittance.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }


                                function paymentBankTransfer(){
                                    Swal.fire({
                                    title: '<span style="color: #56A8CBFF">BANK TRANSFER Payment</span>',
                                    html: 
                                        '<strong style="font-size: 1.2rem;">' +
                                        '1. Choose your preferred Banking Platform<br><br>' +
                                        '2. Transfer Funds to: Juan A. Dela Cruz, Paniqui, Tarlac (0908) 5522 020 <br><br>' +
                                        '3. Take a Screenshot of the Bank Transaction<br><br>' +
                                        '4. Go to Payment Application and Fill out the necessary inputs and click Submit <br> <br>' +
                                        '5. <span class="text-success"> Done! Just wait for the cashier for approval.</span>' +
                                        '</strong>',
                                    imageUrl: "../images/student_pics/bankTransfer.png",
                                    imageWidth: "150px",
                                    imageHeight: "150px",
                                    confirmButtonText: 'OK'
                                })
                                }
                            </script>
                        </div>
                    </div> 
                    

                    <div class="payApp_createPayment mt-2">
                        
                            <form action="" class="universalLightGrayBg mb-3 p-2">
                            <p class="title_tab_universal text-primary m-0">Create Payment Application Form</p>
                                <div class="payAppFormWrapper">
                            
                                <div class="leftForm">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Student ID</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Student ID" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Full name</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Firstname" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Email</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email" readonly>
                                    </div>

                                    <span>Amount:</span>
                                    <div class="input-group mb-3">
                                        
                                        <div class="input-group-prepend">
                                            
                                            <span class="input-group-text d-inline-block">₱</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="0.00">
                                        
                                        <span class="input-group-text text-success"><i class="fas fa-credit-card"></i>&nbsp;<strong>Online</strong></span>
                                        
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="min-width: 110px;" id="basic-addon1">Date</span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="">
                                    </div>
                                    
                                <div class="col-md">
                                    <div class="form-floating">
                                    <input type="text" class="form-control" id="paymentGateway_Id" value="Gcash" placeholder="" style="border:2px solid #56A8CBFF"> 
                                    <label for="floatingInputGrid">Payment Gateway: (e.g. Gcash, Paymaya) <span style="font-weight: bold; color: crimson;">*</span></label>
                                    </div>
                                </div>

                                </div>
                                    <div class="rightForm">
                                        <div class="rightFormInner">
                                        <div class="rightForm_text text-secondary">
                                            <i class="fas fa-file-invoice text-primary" style="font-size: 4rem;"></i>
                                            <p>Attach Sales Invoice from your chosen local payment gateway.</p>
                                        </div>
                                    </div>
                                    <input type="file" name="" id="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success d-block mx-auto mt-5 mb-3">Submit</button>
                            </form> 
                    </div>
            </div>

            



            <!-- Transaction History -->
            <div class="tab-pane fade" id="v-pills-transaction-history" role="tabpanel" aria-labelledby="v-pills-transaction-history-tab">
                <p class="title_tab_universal">Transaction History</p>
                
                <div class="miniDashboard mb-5">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select col-2" id="floatingSelect" name="currSchoolY">
                                    <option hidden>Academic Year</option>
                                    <option value="2016-2017">2016 - 2017</option>
                                    <option value="2017-2018">2017 - 2018</option>
                                    <option value="2018-2019">2018 - 2019</option>
                                    <option value="2019-2020">2019 - 2020</option>
                                    <option value="2020-2021">2020 - 2021</option>
                                </select>
                                    <label for="floatingSelect">Select Academic Year</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select col-2" id="floatingSelect" name="currSchoolY">
                                    <option hidden>All</option>
                                    <option value="2016-2017">Approved</option>
                                    <option value="2017-2018">Denied</option>
                                    <option value="2018-2019">Pending</option>
                                </select>
                                    <label for="floatingSelect">Filter by Payment Status:</label>
                            </div>
                        </div>
                    </div>

                <div class="universalLightGrayBg rounded-2">
                    <table class="table">
                        <thead class="thead-light text-center">
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cashier</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <th scope="row">FT-001</th>
                            <td>₱2000</td>
                            <td>Online - Gcash</td>
                            <td>02/11/2021</td>
                            <td class="text-success text-uppercase fw-bold">Approved</td>
                            <td>Juan A. DelaCruz</td>
                        </tr>

                        <tr class="text-center">
                            <th scope="row">FT-006</th>
                            <td>₱3250</td>
                            <td>Cash</td>
                            <td>02/21/2021</td>
                            <td class="text-success text-uppercase fw-bold">Approved</td>
                            <td>Juan A. DelaCruz</td>
                        
                        </tr>
                        </tbody>
                    </table>
                   
                    </div>
                <button class="btn btn-outline-primary">Export to Excel</button>
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
    
        <script type="text/javascript">
            function profile_link_show(){
                let profile_link = document.getElementById('profile_link_id');
                profile_link.classList.toggle('show');
            }
        </script>
    </body>
    </html>