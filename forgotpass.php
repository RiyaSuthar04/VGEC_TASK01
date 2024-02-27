<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/forgotpass.css">


  <title>Login in</title>
</head>

<body>
  <div class="container-fluid">
    <form class="mx-auto" method="post">
      <h4>Send OTP</h4>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
          placeholder=" please enter your email" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="btn">send</button>
      </div>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>

<?php

session_start(); 

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'setting.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;   // Enable verbose debug output
$mail->isSMTP();                         // Send using SMTP
$mail->Host = 'smtp.gmail.com';   // Set the SMTP server to send through
$mail->SMTPAuth = true;                // Enable SMTP authentication
$mail->Username = 'sutharriya77@gmail.com'; // SMTP username
$mail->Password = 'srqb oura cwnk pnsp';   // SMTP password
$mail->SMTPSecure = 'tls';               // Enable TLS encryption
$mail->Port = 587;                 // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

// Recipients
$mail->setFrom('sutharriya77@gmail.com', 'VGEC');
$mail->addReplyTo('sutharriya77@gmail.com', 'VGEC');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

include('connection.php');

if (isset($_POST['btn'])) {
  $email = $_POST["email"];
  $otp = rand(1000, 9999);
  $_SESSION['token'] = $otp;
  $_SESSION['mail'] = $email;

  $result = $conn->query("select email from user where email='$email'");
  $rowcount = $result->num_rows;

  if ($rowcount == 1) {
    $row = $result->fetch_object();

    // HTML body
    $mail->SMTPDebug = 0;
    $mail->isHTML(true);
    $mail->Subject = "Recover your password";
    $mail->Body = $mail->Body = "<b>Dear User</b>
        <h3>We received a request to reset your password.</h3>
        <p>Your OTP is: <strong>{$otp}</strong></p>
        
        <br><br>
        <p>With regards,</p>";


    // Add recipient
    $mail->addAddress($email, 'Recipient Name');

    // Send the email
    if ($mail->send()) {
      echo "<script>alert('OTP is sent to your mail, please check your mail');";
      echo "window.location.href = 'enterOTP.php';</script>";
    } else {
      echo "An error occurred. The message could not be sent: {$mail->ErrorInfo}";
    }
  } else {
    echo "<script>alert('Invalid username or password');</script>";
  }
}
?>