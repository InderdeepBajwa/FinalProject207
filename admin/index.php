<?php
  ob_start();
  require('../boilerplate/head.php');
  require('../boilerplate/navbar.php');
  require('../dbase/dbfunctions.php');

  if (!isset($_SESSION['LoggedUser']['isAdmin']) ==  "HasAccess" ) {
    header('Location: ../index.php');
  }

  $buffer=ob_get_contents();
  ob_end_clean();

  $title = "Admin Panel";
  $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

 ?>
<div class="admin-leftbar">
  <ul>
    <li><img class="profilePic" src="<?php 
      if (!$_SESSION['LoggedUser']['authorImg']) {
        echo "https://www.w3schools.com/howto/img_avatar2.png";
      }
      else {
        echo $_SESSION['LoggedUser']['authorImg'];
      }
    ?>" alt=""></li>
    <li>Hey, <?php echo $_SESSION['LoggedUser']['authorName'] ?>!</li>
    <li><a href="index.php">DashBoard</a></li>
    <li><a href="managePosts.php">Manage Posts</a></li>
    <li><a href="manageUsers.php">Manage Users</a></li>
  </ul>
</div>

