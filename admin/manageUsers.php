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

  function getPosts() {
    return runSafeQuery(
      "SELECT * FROM authors", []
    );
  }
  
  ?>
<div class="admin-leftbar">
  <ul>
    <?php $getPosts = getPosts(); reset($getPosts); ?>
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

<div class="admin-contentInfo">
    <? foreach($getPosts as $post) { ?>
      <hr>
        <h2><?php echo $post['authorName'] ?></h2>
        <button style="float:right;position: relative; top: -50px; background-color: #f2f2f2; border-color:#00ac89; padding: 4px;" onClick="document.location.href='<?php echo "../boilerplate/utl/adminDeleteUser.php?id=";?><?php $postData=$post['authorID'];echo "$postData"?>'">Delete User</button>
      <hr>
    <?php } ?>
</div>
