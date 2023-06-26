<?php
  require "php/connection.php";

  session_start();

  $message = '<p> Sign in to your account </p>';

  if (
    isset($_COOKIE["name"]) || 
    (isset($_SESSION["logged"]) && $_SESSION["logged"] === TRUE)
  ) {
    header("Location: index.php");
    exit();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
      $name = strtolower(trim($_POST["name"]));
      $pass = trim($_POST["password"]);
      $remember = "No";
      if (isset($_POST["remember"])) $remember = $_POST["remember"];

      $sql = "
      SELECT * FROM login_data 
      WHERE BINARY name='$name' AND BINARY pass='$pass'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $_SESSION["logged"] = TRUE;
        if ($remember == "Yes") {
          setcookie("name", $name, strtotime("+3 months"), "/");
        } else {
          setcookie("name", $name, 0, "/");
        }
        header("Location: index.php");
        exit;
      } else {
        $message = "<p style='color: red'> Username or password is incorrect !! </p>";
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
  <title>Login Form</title>

  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="form-holder">
    <div class="title">
      <i class="fa-solid fa-right-to-bracket"></i>
      <h2>Welcome!</h2>
      <?=$message?>
    </div>
    <form action="" method="POST" id="login_form">
      <label for="name_input">Name</label>
      <div class="input-holder">
        <input type="text" name="name" id="name_input">
        <i class="fa-solid fa-user"></i>
      </div>
      <label for="pass_input">Password</label>
      <div class="input-holder">
        <input type="password" name="password" id="pass_input">
        <i class="toggle-password-visibilty"></i>
      </div>
      <div class="row">
        <div class="check">
          <input type="checkbox" name="remember" class="check" value="Yes"> remember me?
        </div>
        <div>
          <a href="forgot.php">Forgot password?</a>

        </div>
      </div>
      <div class="row">
        <a style="margin-left: auto" href="signup.php">Create a account?</a>
      </div>
      <button type="submit" name="submit" id="submit_btn">Login <i class="fa-solid fa-right-long"></i></button>
    </form>
  </div>
  <script src="js/main.js"></script>
</body>
</html>