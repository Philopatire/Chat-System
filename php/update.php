<?php

  require "connection.php";

  // Get Chats
  $sql = "SELECT * FROM chats";
  $result = $conn->query($sql);
  $i = 0;
  $date_now = "";
  while ($i < $result->num_rows) {
    $row = $result->fetch_assoc(); 
    $user = $row["user"];
    $text = $row["text"];
    $date = $row["date"];
    $time = $row["time"];
    $type = $row["type"];
    $dir_class = $user == $_COOKIE["name"] ? 'message-from' : 'message-to';
    $sent_user = $user ==  $_COOKIE["name"] ? "You" : $user;
    $i++;

    if ($date != $date_now) {
      $date_now = $date;
      echo "<p class='date'>";
      if ($date == date("Y-m-d")) {
        echo "Today";
      } else if($date == date("Y-m-d", strtotime("-1 day"))) {
        echo "Yesterday";
      } else {
        echo $date;
      }
      echo "</p>";
    }

    echo "
      <div class='message $dir_class'>
        <div class='name'>
          <i class='fa-solid fa-circle-user'></i>
          <p class='content'>$sent_user</p>
        </div>
    ";
    if ($type == "text") {
      echo "
        <div class='text'>
          <p class='content'>$text</p>
          <p class='time'>". date("h:i:s A", strtotime($time)) ."</p>
        </div>
      </div>
      ";
    } else if ($type == "file") {
      echo "
        <div class='file'>
        <a href='uploads/$text' class='content'>$text</a>
        <p class='time'>". date("h:i:s A", strtotime($time)) ."</p>
        </div>
      </div>
      ";
    }
  }

  $conn->close();
?>