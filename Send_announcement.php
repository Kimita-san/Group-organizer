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
