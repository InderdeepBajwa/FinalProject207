<?php

  require("../boilerplate/navbar.php");

  session_unset();
  session_destroy();
  unset($_SESSION['LoggedUser']);
  header("Location: /fp2");
 ?>
