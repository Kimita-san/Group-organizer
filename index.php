<?php
require_once 'config.php';
require_once 'header.php';

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id =$id");
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
}
else{
  header("Location: login.php");
}

if (isset($_POST['submit'])) {
  $id = $_SESSION["id"];
  $user = $username;
  $chat = mysqli_real_escape_string($dbcon,$_POST["chat"]);
  $date = date('Y-m-d H:i');

  $query ="INSERT INTO chat (user_id, username, chat, date) Values( '$id','$user','$chat','$date')";
  mysqli_query($conn, $query);

  header("Refresh:0; url=index.php");
} else {
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <style>
  .container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    opacity: 0.8;
  }

  .darker {
    border-color: #ccc;
    background-color: #ddd;
    opacity: 0.8;
  }

  .container::after {
    content: "";
    clear: both;
    display: table;
  }

  .container h2 {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }

  .container h2.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }

  .time-right {
    float: right;
    color: #aaa;
  }

  .time-left {
    float: left;
    color: #999;
  }
  </style>
  <body>
    <body style="background: url(images/anime_headphones.jpg); background-size:conver; background-repeat: no-repeat;">
<p>

<div class="w3-container w3-border w3-round-large w3-cyan " style="opacity: 0.8;margin: auto; height: 80px; width: 30%;">
<h1 style="text-align:center; color: white" >Welcome to Z.O.E Chat <?php echo $row["name"]; ?> </h1>
</div>
  </body>
  <div class="w3-card" style="margin:auto; width:50%; height:700px">

      <div class="w3-container">
        <h3>Chat Room</h3>
      </div>
    <div class="w3-container w3-border" id="messages_area" style="width:90%; height: 550px;margin:auto; overflow:auto">
      <?php
      $sql = "SELECT * FROM chat ORDER BY ChatID DESC";
      $result = mysqli_query($dbcon, $sql);

      if (mysqli_num_rows($result) < 1) {
          echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">wow,No Chat logs?..</div>';
      } else {
        while ($row = mysqli_fetch_assoc($result)) {

          $id = htmlentities($row['ChatID']);
          $user = htmlentities($row['user_id']);
          $username = htmlentities($row['username']);
          $chat = htmlentities($row['chat']);
          $time = htmlentities($row['date']);

            if ($user = $_SESSION["id"]){
              echo '<div class="container">';
              echo  "<h3><strong>$username</strong></h3>";
              echo "<p>$chat</p>";
              echo '<span class="time-right">'.$time.'</span>';
              echo '</div>';
            } else {
              echo '<div class="container darker">';
              echo  '<h3 class="w3-right-align"><strong>'. $username .'</strong></h2>';
              echo "<p>$chat</p>";
              echo '<span class="time-left">'.$time.'</span>';
              echo '</div>';
            }
          }
      }

?>
    </div>

    <div class= "w3-container" style="position: absolute; bottom: 40px; width:80%">
        <form autocomplete="off" method="POST">
          <input type ="text" id="chat" name="chat" placeholder="Insert text Here.." style="width:50%" required/>
                <button type="submit" name="submit" class="w3-btn w3-cyan w3-round-large">Send</button>
        </form>

        <button class="w3-button w3-pale-green" onClick="window.location.reload();">Refresh Chat</button>
    </div>
    </div>
</html>
<?php
}
