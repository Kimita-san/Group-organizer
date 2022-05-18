<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<body style="background: url(images/cloud.jpg); background-size:cover; background-repeat: no-repeat;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">
    <title>Z.O.E</title>

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<body>

<header class="w3-container w3-cyan" style ="text-align:center">
    <h1>Z.O.E Group Organizer Registration</h1>
</header>
<style type ="text/css">
.hidden {
  display: none;
}
</style>

  <head>
    <meta charset="utf-8">
    <div style="height:100px">

    </div>
    <title>Register</title>
  </head>
  <div class="w3-card-4 w3-white w3-round-xlarge" style="margin:auto; width:500px">
  <body>
    <div class="w3-container w3-cyan w3-round-xlarge">
    <h2 style="text-align:center">Register</h2>
  </div>
  <p>
    <form class="w3-container" action="" method="post" autocomplete="off">
      <label class="w3-text-cyan" for="name"><b>Name : </b></label>
      <input class="w3-input" type="text" name="name" id = "name" required value=""> <br>
      <label class="w3-text-cyan" for="username"><b>Username : </b></label>
      <input class="w3-input" type="text" name="username" id = "username" required value=""> <br>
      <label class="w3-text-cyan" for="email"><b>Email : </b></label>
      <input class="w3-input" type="email" name="email" id = "email" required value=""> <br>
      <label class="w3-text-cyan" for="password"><b>Password : </b></label>
      <input class="w3-input" type="password" name="password" id = "password" required value=""> <br>
      <label class="w3-text-cyan" for="confirmpassword"><b>Confirm Password : </b></label>
      <input class="w3-input" type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php" style="margin-left:15px">Login</a>
  </body>
</html>
