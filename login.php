<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
 if(isset($_POST["submit"])){
   $usernameemail = $_POST["usernameemail"];
   $password = $_POST["password"];
   $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
   $row = mysqli_fetch_assoc($result);
   if (mysqli_num_rows($result) > 0){
     if ($password == $row['password']){
       $_SESSION["login"] = true;
       $_SESSION["id"] = $row["id"];
       header("Location: index.php");
   }
   else{
     echo
     "<script> alert('Wrong Password'); </script>";
   }
 }
 else{
   echo
   "<script> alert('user Not Registered'); </script>";
 }
}
 ?>
<!DOCTYPE html>
<html>
<body style="background: url(images/sky.jpg); background-size:cover; background-repeat: no-repeat;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">
    <title>Z.O.E</title>

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<body>

<header class="w3-container w3-cyan" style ="text-align:center">
    <h1>Z.O.E Group Organizer Login</h1>
</header>
<style type ="text/css">
.hidden {
  display: none;
}
</style>

  <head>
    <meta charset="utf-8">
    <div style="height:250px">

    </div>
    <title>Login</title>
  </head>
  <div class="w3-card-4 w3-white w3-round-xlarge" style="margin:auto; width:500px">
  <body>
    <div class="w3-container w3-cyan w3-round-xlarge">
    <h2>Login</h2>
  </div>
  <p>
    <form class="w3-container" action="" method="post" autocomplete="off">
      <label class="w3-text-cyan" for="Usernameemail"> <b>Username or Email: </b></label>
      <input class="w3-input" type="text" name="usernameemail" id="usernameemail" required value=""> <br>
      <label class="w3-text-cyan" for="password"><b>Password: </b></label>
      <input class="w3-input" type="password" name="password" id="password" required value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php" style="margin-left:10px">Registration</a>
  </body>
</div>
</body>
</body>
</html>
