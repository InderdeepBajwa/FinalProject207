<?php
  ob_start();
  require('../boilerplate/navbar.php');
  require('../dbase/dbfunctions.php');

  if (!isset($_SESSION['LoggedUser']['isAdmin']) ==  "HasAccess" ) {
    header('Location: ../index.php');
  }

  $buffer=ob_get_contents();
  ob_end_clean();

  $title = "Admin Panel";
  $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

  $getPosts = runSafeQuery(
    "SELECT * FROM authors", []
  );

  reset($getPosts);

 ?>
<div class="admin-leftbar">
  <ul>
    <li><img style="max-width: 50%; margin: auto auto; border-radius: 90px;" src="https://www.w3schools.com/howto/img_avatar2.png" alt=""></li>
    <li>Hey, <?php echo $_SESSION['LoggedUser']['authorName'] ?>!</li>
    <li><a href="index.php">DashBoard</a></li>
    <li><a href="managePosts.php">Manage Posts</a></li>
    <li><a href="manageUsers.php">Manage Users</a></li>
  </ul>
</div>

<div class="admin-contentInfo">
    <? foreach($getPosts as $post) { ?>
      <hr>
        <h2><?php echo $post['authorName'] ?></h2>
        <button style="float:right;position: relative; top: -50px; background-color: aqua; border-color:aqua; padding: 4px;"><a href="<?php echo "../boilerplate/utl/adminDeleteUser.php?id="?><?php $postData=$post['postID'];echo "$postData"?>">Delete User</a></button>
      <hr>
    <?php } ?>
</div>