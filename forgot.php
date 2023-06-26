<?php

  require "php/connection.php";

  $email_text = "<label for='email_input'>Email</label>";
  $message = "<p></p>";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
      $email = strtolower(trim($_POST["email"]));
      $pass = trim($_POST["password"]);
      $error = FALSE;

      $exists_email = $conn->query("SELECT * FROM login_data WHERE BINARY email='$email'");
      if ($exists_email->num_rows == 0) {
        $email_text = "<label style='color: red' for='email_input'>Email not found in database</label>";
        $error = TRUE;
      }

      if (!$error) {
        $sql = "UPDATE login_data SET pass='$pass' WHERE BINARY email='$email'";
        $result = $conn->query($sql);
        if ($result) {
          $message = "<p style='color: green'>The password has been changed!</p>";
        }
      } else {
        $message = "<p style='color: red'>There are a problem !</p>";
      }
    }
  }

  $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Form</title>

  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form-holder">
    <div class="title">
      <i class="fa-solid fa-lock"></i>
      <h2>Forgot Your Password!</h2>
      <?=$message?>
    </div>
    <form action="" method="POST" id="forgot_form">
      <?=$email_text?>
      <div class="input-holder">
        <input type="text" name="email" id="email_input">
        <i class="fa-solid fa-envelope"></i>
      </div>
      <label for="pass_input">New Password</label>
      <div class="input-holder">
        <input type="password" name="password" id="pass_input">
        <i class="fa-solid fa-eye toggle-password-visibilty pass-1"></i>
      </div>
      <label for="pass_reinput">Re-enter Password</label>
      <div class="input-holder">
        <input type="password" id="pass_reinput">
        <i class="fa-solid fa-eye toggle-password-visibilty pass-2"></i>
      </div>
      <div class="row">
        <a href="login.php">Login to your account?</a>
      </div>
      <button type="submit" name="submit">Forgot <i class="fa-solid fa-right-long"></i></button>
    </form>
  </div>
  <script src="js/main.js"></script>
</body>
</html>