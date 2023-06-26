<?php

  $conn = new mysqli("localhost", "root", "", "chat_system");

  if ($conn->connect_error) {
    die("There are a problem in connection: " . $conn->connect_error);
  }

?>