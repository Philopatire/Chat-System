<?php
  require "php/connection.php";

  $name_text = "<label for='name_input'>Name</label>";
  $email_text = "<label for='email_input'>Email</label>";
  $message = "<p></p>";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
      $name = strtolower(trim($_POST["name"]));
      $email = strtolower(trim($_POST["email"]));
      $pass = trim($_POST["password"]);
      $error = FALSE;

      $exists_name = $conn->query("SELECT * FROM login_data WHERE BINARY name='$name'");
      if ($exists_name->num_rows > 0) {
        $name_text = "<label style='color: red' for='name_input'>The name already exists</label>";
        $error = TRUE;
      }

      $exists_email = $conn->query("SELECT * FROM login_data WHERE BINARY email='$email'");
      if ($exists_email->num_rows > 0) {
        $email_text = "<label style='color: red' for='email_input'>The email already exists</label>";
        $error = TRUE;
      }

      if (!$error) {
        $sql = "INSERT INTO login_data (name, email, pass) VALUES ('$name', '$email', '$pass')";
        $result = $conn->query($sql);
        if ($result) {
          $message = "<p style='color: green'>Account Created Successfuly!</p>";
        }
      } else {
        $message = "<p style='color: red'>Account doesn't created</p>";
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
  <title>Signup Form</title>

  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form-holder">
    <div class="title">
      <i class="fa-solid fa-circle-user"></i>
      <h2>Create Account!</h2>
      <?=$message?>
    </div>
    <form action="" method="POST" id="signup_form">
      <?=$name_text?>
      <div class="input-holder">
        <input type="text" name="name" id="name_input">
        <i class="fa-solid fa-user"></i>
      </div>
      <?=$email_text?>
      <div class="input-holder">
        <input type="text" name="email" id="email_input">
        <i class="fa-solid fa-envelope"></i>
      </div>
      <label for="pass_input">Password</label>
      <div class="input-holder">
        <input type="password" name="password" id="pass_input">
        <i class="fa-solid fa-eye toggle-password-visibilty"></i>
      </div>
      <div class="row">
        <a href="login.php">Login to your account?</a>
      </div>
      <button type="submit" name="submit">Create <i class="fa-solid fa-right-long"></i></button>
    </form>
  </div>
  <script src="js/main.js"></script>
</body>
</html>