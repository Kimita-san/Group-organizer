<?php
require_once 'config.php';
require_once 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if (!empty($_GET["id"])){
  $id = $_GET["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
    }
    else{
      header("Location: results.php");
    }
  $sql = "SELECT * FROM adminpost WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 0) {
      echo "Error announcement Not Found";
    }

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $title = $row['title'];
    $username = $row['username'];
    $description = $row['description'];
    $date = $row['date'];

  if (isset($_POST['submit'])) {
    $sql = "SELECT * FROM tb_user ORDER BY id ASC";
    $result = mysqli_query($dbcon, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No Announcents</div>';
    } else {
      while ($row = mysqli_fetch_assoc($result)) {

        $id = htmlentities($row['id']);
        $name = htmlentities($row['name']);
        $username = htmlentities($row['username']);
        $email = htmlentities($row['email']);
        $password = htmlentities($row['password']);
          $mail = new phpmailer();
          $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
            )
           );
          $mail ->IsSMTP();
          $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
          $mail->SMTPAuth = true; // authentication enabled
          $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 465; // or 587
          $mail->IsHTML(true);
          $mail->Username = "officialz.o.e.productions@gmail.com";
          $mail->Password = "Bandtogether";
          $mail->SetFrom('officialz.o.e.productions@gmail.com');
          $mail->Subject = $title;
          $mail->Body = $description;
          $mail->AddAddress($email);
          $mail->send();


          }

          }
          printf("Posted successfully. <meta http-equiv='refresh' content='3'>");

} else {
  ?>
  <body>
    <body style="background: url(images/music.jpg); background-size:cover; background-repeat: no-repeat;">
      <div class="w3-container w3-cell-bottom">
        <img class="w3-bottom" src="images/girl_headphones.jpg" style="margin-left:550px; width:1500px;display:block; z-index: -1; opacity:0.9" />

      </div>
<header>
  <nav class="w3-sidebar  w3-cyan" style="overflow:auto">
    <a href="admin.php" class="w3-bar-item w3-button">Make Announcement</a>
    <a href="send_announcement.php" class="w3-bar-item w3-button">Send announcement</a>
</header>
  <div class="w3-container w3-padding 32">
       <div class="w3-card-4 w3-white" style=" width: 800px; margin-left: 500px">
           <div class="w3-container w3-teal">
               <h2>Mail Announcment </h2>
           </div>

           <form class="w3-container" method="POST">

               <p>
                   <label><h2>Announcemnt Title: </h2></label>
                   <div class"w3-container w3-border" row="30" cols="50"  name="description" required>
                     <p>
                       <?php echo $title; ?>
                     </p>
               </p>

               <p>
                   <label><h2>Description: </h2></label>
                   <div class"w3-container w3-border" row="30" cols="50"  name="description" required>
                   <p>
                     <?php echo $description; ?>
                   </p>
                 </div>
               </p>
               <p>
                   <input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Mail">
               </p>
           </form>

       </div>
   </div
   <?php
 }
