<?php

session_start();
include("connection.php");

if (isset($_SESSION['token'])) {
  $otp = $_SESSION['token'];

  if (isset($_POST['btn'])) {
    $getotp = $_POST["otp"];

    if ($getotp == $otp) {
      header("location:resetpass.php");
    } else {
      echo "<script>alert('please enter valid OTP');</script>";
    }
  }

} else {
  echo "<script>alert('something went wrong.. please try again');</script>";
}

?>


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
      <div class="form-group">
        <label for="exampleInputEmail1">Enter OTP</label>
        <input type="password" class="form-control" name="otp" id="exampleInputEmail1" aria-describedby="emailHelp"
          required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" name="btn">Login</button>
      </div>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

</body>

</html>

