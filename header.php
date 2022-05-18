<?php
require_once 'functions.php';
if (!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
}
else{
  header("Location: login.php");
}
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">
    <title>Z.O.E</title>

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<body>

<header class="w3-container w3-cyan" style ="text-align:center">
    <h1>Z.O.E Announcements</h1>
</header>
<style type ="text/css">
.hidden {
  display: none;
}
</style>

<div class="w3-bar w3-white w3-border" style = "margin: auto">
    <a href="index.php" class="w3-bar-item w3-button w3-pale-blue">Chat</a>
    <a href="Announcements.php" class="w3-bar-item w3-button w3-pale-green">Posts</a>
    <a href="new.php" class="w3-bar-item w3-button w3-light-blue">Add Post</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-sand">Logout</a>
    <?php if($username == 'kimita'): ?>
    <a href="Admin.php" class="w3-bar-item w3-button w3-pale-green">Admin</a>
  <?php endif; ?>
</div>
<?php
