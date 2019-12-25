<?php
  setcookie("currentUser","",time()-(8*86400));
  header('location: login.php');
 ?>
