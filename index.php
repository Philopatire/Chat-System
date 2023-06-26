<?php 

  require "php/connection.php";

  session_start(); 

  date_default_timezone_set("Asia/Riyadh");

  function send($user, $text, $type) {
    global $conn;

    $date = date("Y-m-d");
    $time = date("H:i:s");
    $sql = "INSERT INTO chats (user, text, date, time, type) 
            VALUES ('$user', '$text', '$date', '$time', '$type')";
    $result = $conn->query($sql);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
      $user = $_COOKIE["name"];
      if ($_FILES["file_upload"]["name"] != "") {
        // Send File
        $file = $_FILES["file_upload"];
        $file_name = basename($file["name"]);
        if (file_exists("uploads/$file_name")) {
          echo "File name already exists";
        } else {
          move_uploaded_file($file["tmp_name"], "uploads/$file_name");
          send($user, $file_name, "file");
        }
      } else {
        // Send Message
        $message = $_POST["message"];
        send($user, $message, "text");
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Familly Chat</title>

  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php if (
    isset($_COOKIE["name"]) || 
    (isset($_SESSION["logged"]) && $_SESSION["logged"] === TRUE)):?>
  <div class="chat-holder">
    <div class="title">
      <i class="fa-solid fa-circle-user"></i>
      <h3><?=$_COOKIE["name"]?></h3>
      <button class="log-out" onclick="logout()"><i class="fa-solid fa-door-open"></i></button>
    </div>
    <div class="messages">
    </div>
    <form action="" id="chat_form" method="POST" enctype="multipart/form-data">
      <label>
        <i class="fa-solid fa-folder-plus"></i>
        <input type="file" name="file_upload" id="file_input">
      </label>
      <input type="text" name="message" placeholder="Enter Text" id="chat_input">
      <button type="submit" name="submit" class="submit">
        <i class="fa-solid fa-paper-plane"></i>
      </button>
    </form>
  </div>
  <?php 
    else: 
      header("Location: login.php");
      exit();
    endif;
  ?>
  <script>
    function logout() {
      location.replace("logout.php")
    }

    let chatMessagesHolder = document.querySelector(".chat-holder .messages")
    let prevScrollHeightChat = chatMessagesHolder.scrollHeight
    function scrollToDown() {
      if (chatMessagesHolder.scrollHeight != prevScrollHeightChat) {
        prevScrollHeightChat = chatMessagesHolder.scrollHeight
        chatMessagesHolder.scrollTop = prevScrollHeightChat
      }
    }

    let fileInput = document.getElementById("file_input")
    let chatInput = document.getElementById("chat_input")

    fileInput.addEventListener("input", () => {
      chatInput.value = fileInput.value.match(/(?<=fakepath\\).*/g)[0]
      chatInput.setAttribute("disabled", "true")
    })

    let messagesHolder = document.querySelector(".messages");
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
      if (xhr.readyState == 4 && xhr.status == "200") {
        messagesHolder.innerHTML = xhr.responseText;
        scrollToDown();
      }
    }

    function updateChat() {
      xhr.open("POST", "php/update.php")
      xhr.send();
    }

    updateChat() // Update Chat Entries

    // Update Chat Entries every 2s
    setInterval(() => {
      updateChat()
    }, 2000);

  </script>
  <script src="js/main.js"></script>
</body>

</html>
<?php $conn->close() ?>