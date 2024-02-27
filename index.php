<?php
session_start();
include("connection.php");

if (isset($_POST['btn'])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = $conn->query("select * from user where email='$email' and password='$password'");
  $rowcount = $result->num_rows;
  if ($rowcount == 1) {
    $row = $result->fetch_object();
    $_SESSION['uid'] = $row->uid;
    header("location:to_do.php");
  } else {
    echo "<script>alert('invalid username or password');</script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <title>Login in</title>
</head>

<body>
  <div class="container-fluid">
    <form class="mx-auto" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"
          required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
      </div>
      <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LcQKn8pAAAAADf731PtP-V4uINAaK2izowckI0Q"></div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="btn" name="btn">Login</button>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm">
            <a href="registration.php">Don't Have Account?</a>
          </div>
          <div class="col-sm">
            <a href="forgotpass.php">Forgot Password?</a>
          </div>
        </div>
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
<script>
  $(document).on('click', '#btn', function () {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      alert("Please complete the reCAPTCHA...");
      return false;
    }
  });
</script>