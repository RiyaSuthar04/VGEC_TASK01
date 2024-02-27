<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/resetpass.css">
    
    
    <title>Login in</title>
  </head>
  <body>
    <div class="container-fluid">
        <form class="mx-auto" method="post">
          <h4>Reset Password</h4>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" name="password"  required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword"  required>
              </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btn">send</button>
              </div>
          </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php
 session_start();
 include("connection.php"); 
 
 if(isset($_POST['btn']))
 {
     $pass=$_POST["password"];
     $cpass=$_POST["cpassword"];

       if($pass==$cpass)
       {
        $email = $_SESSION['mail'];
        $updateQuery = "UPDATE user SET password='$pass' WHERE email='$email'";

        if ($conn->query($updateQuery)) {
          // Password updated successfully
          echo "<script>alert('Password updated successfully');</script>";
          header("location:index.php");
      } else {
          // Error updating password
          echo "<script>alert('Error updating password');</script>";
      }
         }
         else
       {
           echo"<script>alert('password does not match...');</script>";
       }
}
 ?>