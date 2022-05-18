<?php
require_once 'config.php';
require_once 'header.php';

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

      if (isset($_POST['upd'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $sql2= "UPDATE adminpost SET title = '$title', username = '$username', description = '$description' WHERE id = $id";
        if (mysqli_query($conn, $sql2)) {
        echo '<meta http-equiv="refresh" content="0">';
    } else {
         echo "failed to edit." . mysqli_connect_error();
       }
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
              <div class="w3-container w3-cyan">
                  <h2>Make Announcent </h2>
              </div>

              <form class="w3-container" method="POST">

                  <p>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                      <label>Announcemnt Title</label>
                      <input type="text" class="w3-input w3-border" name="title" value="<?php echo $title; ?>">
                  </p>

                  <p>
                      <label>Description</label>
                      <textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" style="resize: none; height: 200px" ><?php echo $description; ?></textarea>
                  </p>
                  <p>
                      <input type="submit" class="w3-btn w3-cyan w3-round" name="submit" value="Post">
                  </p>
                  <p>

                    <div class="w3-text-red">
                <a href="delete.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this announcement?'); ">Delete Announcement</a></div>
                  </p>
              </form>

          </div>
      </div
      <?php
    }
