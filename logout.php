<?php
  session_start();

  if (isset($_COOKIE["name"])) {
    setcookie("name", "", time() - 1);
  }

  if (isset($_SESSION["logged"])) {
    $_SESSION["logged"] = FALSE;
  }

  header("Location: index.php");
  exit();
?>