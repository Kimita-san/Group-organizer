<?php
require_once 'config.php';
require_once 'header.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id =$id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body style="background: url(images/musicboy.jpg); background-size:cover; background-repeat: no-repeat;">

    <p>

<div class ="w3-container w3-cyan w3-round-large" style = "margin:auto; width: 50%">
<h1 style="text-align:center; font-family: copperplate" >Announcements</h1>
</div>
<p>

<?php

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
} else {
  $page = 1;
}
$rowsperpage = 1;
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT COUNT(*) FROM adminpost";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$totalpages = ceil($numrows / $rowsperpage);


if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
?>

<div class=" w3-container w3-border w3-round-xlarge w3-light-grey" style = "margin: auto; height: 300px; width: 80%; overflow: auto; opacity:0.9" >
<?php
$sql = "SELECT * FROM adminpost ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No announcements yet!</div>';
} else {
  while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $username = htmlentities($row['username']);
    $title = htmlentities($row['title']);
    $des = htmlentities(strip_tags($row['description']));
    $slug = htmlentities($row['slug']);
    $date = htmlentities($row['date']);

    echo '<div class="w3-panel w3-padding w3-white w3-round-large w3-card-4" style="height:280px;overflow:auto; opacity:1.5">';
    echo '<body style="background: url(images/greensketch.jpg); background-size:cover; background-repeat: no-repeat;">';
    echo '<div class="w3-container w3-pale-green" style="text-align:center">';
    echo "<h2>$title</h2>";
    echo '</div>';
    echo'<p>';
    echo "<div class='w3-text-black w3-white' style ='height:100px'> $des </div></p>";

    echo "<div class='w3-text-grey'> $date,$username </div>";
    echo'</body>';
    echo '</div>';
  }
  ?>
</div>
  <?php
  echo "<p><div class='w3-bar w3-center'>";

if ($page > 1) {
    echo "<a class='w3-white' href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn w3-white'><</a>";
}

$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='w3-teal w3-button'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='w3-button w3-white w3-border'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button w3-white'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn w3-white'>&raquo;</a>";
}

echo "</div></p>";
  }
?>
<div class ="w3-container w3-cyan w3-round-large" style = "margin:auto; width: 50%">
<h1 style="text-align:center;" >Group Ideas</h1>
</div>
<p>

<div class=" w3-container w3-border w3-round-xlarge w3-light-grey" style = "margin: auto; height: 300px; width: 80%; overflow: auto; opacity:0.9" >
  <?php
  $sql = "SELECT * FROM announcements ORDER BY id DESC";
  $result = mysqli_query($dbcon, $sql);

  if (mysqli_num_rows($result) < 1) {
      echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No post yet!</div>';
  } else {
    while ($row = mysqli_fetch_assoc($result)) {

      $id = htmlentities($row['id']);
      $username = htmlentities($row['user_id']);
      $title = htmlentities($row['title']);
      $des = htmlentities($row['description']);
      $slug = htmlentities($row['slug']);
      $time = htmlentities($row['date']);

      $permalink = "p/".$id ."/".$slug;

      echo '<div class="w3-panel w3-pale-green w3-card-4">';
      echo "<h3><div class='w3-text-Teal'> $title</div></h3><p>";

      echo "<div class='w3-text-black'> $des </div></p>";

      echo "<div class='w3-text-grey'> $time,$username </div>";
      echo '</div>';
  }
  }
   ?>
 </div>
</body>
</html>
