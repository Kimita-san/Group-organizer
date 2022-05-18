<?php
require 'config.php';
$SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
 ?>
