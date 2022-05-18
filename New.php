<?php
require_once 'config.php';
require_once 'header.php';

if (!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
}
else{
  header("Location: login.php");
}

if (isset($_POST['submit'])) {
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];


    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST ['description']);
    $slug = slug($title);
    $date = date('Y-m-d H:i');


    $sql = "INSERT INTO announcements ( user_id, title, description, slug, date) VALUES('$username', '$title', '$description', '$slug', '$date')";
    mysqli_query($dbcon, $sql) or die("failed to post" . mysqli_connect_error());

    $permalink = "p/".mysqli_insert_id($dbcon) ."/".$slug;



    printf("Posted successfully. <meta http-equiv='refresh' content='3'>");


} else {
  ?>
  <body style="background: url(images/music.jpg); background-size:cover; background-repeat: no-repeat;">
    <div class="w3-container w3-cell-bottom">
      <img class="w3-bottom" src="images/girl_headphones.jpg" style="margin-left:550px; width:1500px;display:block; z-index: -1; opacity:0.9" />

    </div>
  <p>

  <p>
  <p>

  <div class="w3-container" style = "margin: auto; height: 400px; width: 80%; overflow: auto">
       <div class="w3-card-4 w3-white" style="opacity:0.9">
           <div class="w3-container w3-cyan" style = "text-align: center">
               <h2>Idea Post </h2>
           </div>

           <form class="w3-container" method="POST">

               <p>
                   <label>Title</label>
                   <input type="text" class="w3-input w3-border" name="title" required>
               </p>

               <p>
                   <label>Description</label>
                   <textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
               </p>
               <p>
                   <input type="submit" class="w3-btn w3-cyan w3-round" name="submit" value="Post">
               </p>
           </form>

       </div>
   </div
   <?php
 }
