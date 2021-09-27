<?php
  include_once '../connection/Config.php';
  session_start();
  $error = null;
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require '../phpmailer/src/Exception.php';
  require '../phpmailer/src/PHPMailer.php';
  require '../phpmailer/src/SMTP.php';

  // Email Verification
  if(isset($_POST['submit'])){
    $user_email = mysqli_real_escape_string($con, $_POST['email']);
  
    $sqlCheckEmail = "SELECT * FROM `tbl_accounts`  WHERE email = ?";
    $stmtCheckEmail = $con->prepare($sqlCheckEmail);
    $stmtCheckEmail->bind_param('s', $user_email);
    $stmtCheckEmail->execute();
    $resCheckEmail = $stmtCheckEmail->get_result();
    $rowCheckEmail = $resCheckEmail->fetch_assoc();

   
  
    if($resCheckEmail->num_rows > 0){
      $otp_expiration = date("H:i:s",strtotime('+3 minutes')); 
      $generated_otp = generateNumericOTP(6);
  
      $sqlOtp = "UPDATE `tbl_accounts` SET `otp_code`= ?,`otp_expiration`= ? WHERE  email = ?";
      $stmtOtp = $con->prepare($sqlOtp);
      $stmtOtp->bind_param('sss', $generated_otp , $otp_expiration, $user_email);
      $stmtOtp->execute();
      // echo"Hello";
      // phpmailer object
      // $mail = new email_otp_send();
      // $mail->send_email($user_email,$generated_otp);
      $mail = new PHPMailer(true);
      $mail->smtpClose();
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
      $mail->isSMTP();                                           
      $mail->Host       = 'smtp.gmail.com';                     
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'phptest1301@gmail.com';                     
      $mail->Password   = 'fprqtcaljwxcnvie';                               
      $mail->SMTPSecure = 'ssl';            
      $mail->Port       = 465;   

      $mail->setFrom('phptest1301@gmail.com', 'Pyro College');
      $mail->addAddress($user_email,  $rowCheckEmail['fullname']);                                        
      $mail->Subject = 'Reset Password OTP';
      $mail->Body    = $generated_otp;
  
      if($mail->send()){
        $_SESSION['email'] = $user_email;
        header('Location: ../html/reset_password.php');
      }else{
          echo 'Something went wrong';
      }
    }else{
      $_SESSION['status'] = "error";
      $_SESSION['msg'] = "Email not found";
      header('Location: ../html/forgotPassword.php');
    }
  }
  if (isset($_POST['verifiedOtp'])){
    $otp = $_POST['otp'];
    $email = $_POST['email'];

    $time_stamp = date("H:i:s");

    $sqlVerfiyOtp = "SELECT * FROM `tbl_accounts` WHERE  email = ? AND otp_code = ? ";
    $stmtVerifyOtp = $con->prepare($sqlVerfiyOtp);
    $stmtVerifyOtp->bind_param('ss', $email,  $otp);
    $stmtVerifyOtp->execute();
    $resVerifyOtp = $stmtVerifyOtp->get_result();
    $rowVerifyOtp = $resVerifyOtp->fetch_assoc();

    if($resVerifyOtp->num_rows > 0){
      if($rowVerifyOtp['otp_expiration'] < $time_stamp){
        $otp = "";
        $otp_expiration = "";
        $sqlOtp = "UPDATE `tbl_accounts` SET `otp_code`= ?,`otp_expiration`= ? WHERE  email = ?";
        $stmtOtp = $con->prepare($sqlOtp);
        $stmtOtp->bind_param('sss', $otp , $otp_expiration, $email);
        $stmtOtp->execute();
        $_SESSION['statusOtp'] = "info";
        $_SESSION['msgOtp'] = "Otp expired";
        header('Location: ../html/reset_password.php');
      }else{
        $_SESSION['statusOtp'] = "success";
      header('Location: ../html/reset_password.php');
      }
      
    }else{
      $_SESSION['statusOtp'] = "error";
      $_SESSION['msgOtp'] = "Otp Incorrect";
      header('Location: ../html/reset_password.php');
    }
  }

  if(isset($_POST['changePass'])){
    $email =$_POST['email'];
    $password =$_POST['password'];
    $confirmPass =$_POST['confirmPass'];
    $otp = "";
    $otp_expiration ="";
    if($password == $confirmPass){
      $sqlChangePass = "UPDATE `tbl_accounts` SET `password`= ?,`otp_code`= ?,`otp_expiration`= ? WHERE email = ?";
      $stmtChangePss = $con->prepare($sqlChangePass);
      $stmtChangePss->bind_param('ssss', $password,  $otp, $otp_expiration, $email);
      if($stmtChangePss->execute()){
        $_SESSION['statuspass'] = "success";
        $_SESSION['msgpass'] = "Password has been changed";
        header('Location: ../html/reset_password.php');
      }
    }else{
      $_SESSION['statuspass'] = "info";
      $_SESSION['msgpass'] = "Password Not Match";
      header('Location: ../html/reset_password.php');
    }
  }
// Generate OTP
function generateNumericOTP($n){
  $generator = "0123456789";
  $result = "";
  for ($i = 1; $i <= $n; $i++) {
    $result .= substr($generator, (rand() % (strlen($generator))), 1);
  }
  return $result;
}
?>