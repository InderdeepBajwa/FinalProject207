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
      "SELECT * FROM posts", []
    );
  }

  $getPosts = getPosts();

  reset($getPosts);

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

<div class="admin-contentInfo">
    <? $getPosts = getPosts(); reset($getPosts);
      foreach($getPosts as $post) { ?>
      <hr>
        <h2><?php echo $post['postTitle'] ?></h2>
        <p>By <?php $userName = runSafeQuery(
          "SELECT authorName FROM authors WHERE authorID=?",
          [
            "i",
            $post['authorID']
          ]
          ); echo $userName[0]['authorName'] ?></p>
          <button style="float:right;position: relative; top: -50px; background-color: #f2f2f2; border-color:#00ac89; padding: 4px;" onClick="document.location.href='<?php echo "../boilerplate/utl/adminDeletePost.php?id=";?><?php $postData=$post['postID'];echo "$postData"?>'">Delete Post</button>
      <hr>
    <?php } ?>
</div>
