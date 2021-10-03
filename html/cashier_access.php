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
          <p class="reg__name">Cashier | C-2021003</p>
          <p class="reg__name" id="reg-date-time"></p>
        </div>

        <div class="nav flex-column nav-pills pl-2 mt-5 align-middle" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active main__" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
            <a class="nav-link main__" id="v-pills-payment-transactions-tab" data-toggle="pill" href="#v-pills-payment-transactions" role="tab" aria-controls="v-pills-payment-transactions" aria-selected="false">Payment Transactions</a>
            <a class="nav-link main__" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
            <a class="nav-link main__" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">History</a>
            
            <q class="mt-2">Version 1.0.0.0</q>
      </div>
      </div>
      


    <div class="col-md right-tab">
          
          <div class="tab-content" id="v-pills-tabContent">
            <!-- Dashboard -->
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
              <p class="title_tab_universal">Approve Payments</p>

              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

            <!-- Table -->
            <div class="col universal_bg_gray_table p-3">
            <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;">Fund Transfers (Online)</span>

            <div class="col-md-6 my-1">
              <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="" selected>None</option>
                  <option value="" selected>Student ID</option>
                  <option value="">Transaction ID</option>
                  <option value="">Date of Payment</option>
                  <option value="">Year Level</option>
                  
  
                </select>
                <label for="floatingSelect">Sort By:</label>
              </div>
            </div>



            
            <div class="table__" style="overflow-x: auto;">
              <table class="table">
                  <thead class="text-center">
                    <tr>
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Student ID</th>
                      <th scope="col">First name</th>
                      <th scope="col">Last name</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Remaining Balance</th>
                      <th scope="col">Date</th>
                      <th scope="col">Email</th>
                      <th scope="col">Sales Invoice</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-center">
                      <th scope="row">FT-001</th>
                      <td>2018300366</td>
                      <td>Justine Dave</td>
                      <td>Delos reyes</td>
                      <td>9000</td>
                      <td>2500</td>
                      <td>08/21/2021</td>
                      <td>ex@gmail.com</td>
                      <td><button class="btn btn-primary">View</button></td>
                      <td><button class="btn btn-success my-1 paymentTransaction_actionBtn">Approve</button><button class="btn btn-danger paymentTransaction_actionBtn">Deny</button></td>
                      
                      
                    </tr>

                    <tr class="text-center">
                      <th scope="row">FT-002</th>
                      <td>2018300726</td>
                      <td>John</td>
                      <td>Doe</td>
                      <td>7500</td>
                      <td>9000</td>
                      <td>08/26/2021</td>
                      <td>jd@gmail.com</td>
                      <td><button class="btn btn-primary">View</button></td>
                      <td><button class="btn btn-success my-1 paymentTransaction_actionBtn">Approve</button><button class="btn btn-danger paymentTransaction_actionBtn">Deny</button></td>
                      
                      
                    </tr>
                  </tbody>
                </table>
          </div>
        
        </div>
      </div>
              


            <!-- PAYMENT TRANSACTIONS -->
            <div class="tab-pane fade" id="v-pills-payment-transactions" role="tabpanel" aria-labelledby="v-pills-payment-transactions">
              <p class="title_tab_universal">Student's Fees</p>

              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>

              <div class="col universal_bg_gray_table payments_tab" style="overflow-x: hidden;">

                <div class="payments_tab_left mx-2 my-auto">
                  <img src="../images/registrar_img/sample_student_pic.png" alt="" class="mb-2 d-block mx-auto my-auto" style="width: 180px; height: 180px;">
                  <span class="d-block text-primary text-center" style="font-size: 1.2rem; font-weight: bold;">Justine Dave Delos reyes</span>
                  <span class="d-block text-primary text-center" style="font-size: 1.3rem;">2018300366</span>
                  <button type="button" class="btn btn-primary d-block mx-auto my-2">View Payment History</button> 
                </div>
                <div class="payments_tab_right">
                  <form action="">
                    <div class="col">
                      <label class="sr-only" for="inlineFormInputGroup">Course ID</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text beforeInput">Course ID</div>
                            </div>
                          <input type="text" class="form-control w-auto" id="inlineFormInputGroup" placeholder="Course ID">
                        </div>
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Tuition Fee</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Balance</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                      </div>  
                    </div>
                    <div class="col">
                      <div class="input-group mb-2">
                        <span class="input-group-text beforeInput">Amount</span>
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control w-auto" placeholder="0.00">
                        <span class="input-group-text text-success" style="font-weight: bold;"><i class="fas fa-coins"></i>&nbsp; Cash</span>
                      </div>  
                    </div>
                  <div class="col-12 mt-3 mb-2">
                    <button type="button" class="btn btn-success payVoid">Pay</button>
                    <button type="button" class="btn btn-danger payVoid">Void</button>  
                    <button type="button" class="btn btn-primary payVoid">Calculator</button>  
                    
                  </div>
                </form>
              </div>
            </div>


            <!-- Table -->
            <div class="col universal_bg_gray_table p-3">
              <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;">All Student's Transaction</span>
              <hr style="margin-top: 5px; height: 2px;" class="text-primary">

              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  <option value="BSIT_WMA" selected>All</option>
                    <option value="Graduated" selected>BSIT</option>
                    <option value="Dropout">BSIT</option>
                    <option value="Transfer">BSIT</option>
                    <option value="Resign">BSIT</option>
                    <option value="Resign">BSIT</option>
    
                  </select>
                  <label for="floatingSelect">Program</label>
                </div>
              </div>

              <div class="row">
              <div class="table__" style="overflow-x: auto;">
                <table class="table">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">ID number</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Total Amount Due</th>
                        <th scope="col">Total Amount Paid</th>
                        <th scope="col">Balance Remaining</th>
                        <th scope="col">Last Amount Paid</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <th scope="row">2018300366</th>
                        <td>Justine Dave</td>
                        <td>DelosReyes</td>
                        <td>16000</td>
                        <td>9000</td>
                        <td>7000</td>
                        <td>3500</td>
                        <td>Cash</td>
                        <td>Approved</td>
                        
                      </tr>
                     
                    </tbody>
                  </table>


            </div>
          </div>

          </div>
        </div>
            



            <!-- REPORTS -->
            <div class="tab-pane fade reports-tab" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
              <p class="title_tab_universal">Generated Reports</p>

              <div class="col universal_bg_gray_table p-3">
                <span class="text-primary" style="font-size: 1.3rem; font-weight: 500;">View Transactions:</span>
                
                <button class="btn btn-outline-primary float-end mx-1">Annually</button>
                  <button class="btn btn-outline-primary float-end mx-1">Monthly</button>
                  <button class="btn btn-outline-primary float-end mx-1">Daily</button>
                </div>
                
                
              <div class="col universal_bg_gray_table p-3">
                <form action="" class="d-flex justify-content-between">
                <div class="col-md-3">
                  <div class="form-floating">
                    <select class="form-select col-2" id="floatingSelect" aria-label="Floating label select example">
                    <option value="" selected>All</option>
                      <option value="" selected>Cash</option>
                      <option value="">Fund Transfer</option>
                    </select>
                    <label for="floatingSelect">Payment Method</label>

                  </div>
                  <div class="col-md mt-1">
                    <button class="btn btn-primary ">Apply</button>
                    <button class="btn btn-primary ">Clear</button>
                  </div>
                </div>
                
              </form>
              </div>
            </div>





            <!-- HISTORY -->
            <div class="tab-pane fade history-tab" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
              <p class="title_tab_universal">Transaction History</p>

              <form action="" class="universalForm_one">
                <input type="text" name="" id="" placeholder="Search">
                <button type="button" class="btn btn-primary">Search</button>
              </form>


                
              <div class="col universal_bg_gray_table p-3">
                <p class="text-primary text-center" style="font-size: 1.3rem; font-weight: 500;">Filter:</p>

                <form action="" class="my-1">

                <div class="row">
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select col-2" id="floatingSelectMethod" aria-label="Floating label select example">
                        <option value="" selected>All</option>
                          <option value="">Cash</option>
                          <option value="">Fund Transfer</option>
                        </select>
                        <label for="floatingSelectMethod">Payment Method</label>
                      </div>
                  </div>
                  <div class="col-md">
                    <div class="form-floating">
                      <select class="form-select col-2" id="floatingSelectStatus" aria-label="Floating label select example">
                        <option value="" selected>All</option>
                          <option value="">Approved</option>
                          <option value="">Denied</option>
                          <option value="">Pending</option>
                        </select>
                        <label for="floatingSelectStatus">Payment Status</label>
                    </div>
                  </div>

                  <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" name="lastname" id="lname" placeholder=" ">
                        <label for="floatingInput">Select Date:</label>
                    </div>
                </div>




                </div>

              <div class="row">
                <div class="col-md-3">
                  <div class="col-md mt-1">
                    <button class="btn btn-primary ">Apply</button>
                    <button class="btn btn-primary ">Clear</button>
                  </div>
                </div>
              </div>
              </form>
              </div>

              <div class="col universal_bg_gray_table p-3">
                <div class="table__" style="overflow-x: auto;">
                  <table class="table table-success table-striped">
                      <thead class="text-center">
                        <tr>
                          <th scope="col">Transaction ID</th>
                          <th scope="col">Student ID</th>
                          <th scope="col">First name</th>
                          <th scope="col">Last name</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Payment Status</th>
                          <th scope="col">Payment Method</th>
                          <th scope="col">Date</th>
                      
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <th scope="row">FT-001</th>
                          <td>2018300366</td>
                          <td>Justine Dave</td>
                          <td>Delos reyes</td>
                          <td>9000</td>
                          <td>Approved</td>
                          <td>Cash</td>
                          <td>08/21/2021</td>
                          
                        
                          
                        </tr>
    
                        <tr class="text-center">
                          <th scope="row">FT-002</th>
                          <td>2018300726</td>
                          <td>John</td>
                          <td>Doe</td>
                          <td>7500</td>
                          <td>Approved</td>
                          <td>Fund Transfer</td>
                          <td>08/26/2021</td>
                          
                          
                        </tr>
                      </tbody>
                    </table>
              </div>

              </div>

            </div>

          
          


        </div>
      </div>
      </div>

    <script type="text/javascript">
            function profile_link_show(){
            let profile_link = document.getElementById('profile_link_id');
            profile_link.classList.toggle('show');
            }
            let clockElement = document.getElementById('reg-date-time');
    
        function clock() {
            clockElement.textContent = new Date().toLocaleTimeString();
            clockElement.textContent += " - " + new Date().toLocaleDateString();
        }
        setInterval(clock, 1000);   

          </script>

          
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

</body>
</html>