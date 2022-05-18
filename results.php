<?php
require_once 'config.php';
require_once 'header.php';

?>
<body style="background: url(images/music.jpg); background-size:cover; background-repeat: no-repeat;">
  <div class="w3-container w3-cell-bottom">
    <img class="w3-bottom" src="images/girl_headphones.jpg" style="margin-left:550px; width:1500px;display:block; z-index: -1; opacity:0.9" />

  </div>
<header>
<nav class="w3-sidebar  w3-cyan" style="overflow:auto">
  <a href="admin.php" class="w3-bar-item w3-button">Make Announcement</a>
  <a href="send_announcement.php" class="w3-bar-item w3-button">Send announcement</a>
</header>

<div class=" w3-container w3-quarter w3-border w3-round-xlarge w3-light-gray" style ="margin-left:205px;width: 400px;overflow:auto" >
<div class="w3-twothird">

  <form action = "results.php" method= "GET" class"w3-container">

    <input type="text" name="q" placeholder="Search Announcement" class="w3-input w3-border"/>
<p>

</p>
  <input type="submit" class="w3-btn w3-light-blue w3-round" value="search" placeholder="Search"/>
</form>
</div>
</div>

<div class="w3-cmain" style="margin-left:1300px; height:600px; oferflow:auto">
<?php
if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, $_GET['q']);

    $sql = "SELECT * FROM adminpost WHERE title LIKE '%{$q}%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo "Nothing found.";
      } else {
        while($row = mysqli_fetch_assoc($result)){
          $ID = htmlentities($row['id']);
          $username = htmlentities($row['username']);
          $title = htmlentities($row['title']);
          $description = htmlentities($row['description']);
          $date = htmlentities($row['date']);
          echo'<div class="w3-container" style="overflow: auto">';
          echo '<form action = "edit.php" method="GET">';
          echo '<div class="w3-panel w3-round-xlarge w3-card-4">';
          echo'<header class ="w3-containter w3-cyan">';
          echo "<h1 style='text-align: center'>$title</h1>";
          echo'</header>';
          echo'<div class="w3-container w3-round w3-light-grey">';
          echo"<p>Description: $description</p>";
          echo "<p>date: $date </p>";
          echo '<div class="w3-btn w3-light-blue w3-round">';
          echo "<a href='mail.php?id=$ID'>Mail</a>";
          echo '</div>';
          echo '<div class="w3-btn w3-pale-green w3-round" style ="margin-left:5px">';
          echo "<a href='edit.php?id=$ID'>Edit</a>";
          echo '</div>';
          echo'<p>';
          echo '</div>';
          echo '</div>';
          echo'</form>';
          echo '</div>';
        }
      }
    }
    ?>
    </div>
    </html>
