<?php
ob_start();
require('../boilerplate/head.php');
require('../boilerplate/navbar.php');

if (!isset($_SESSION['LoggedUser'])) {
  header("Location: ../index.php");
}

$buffer=ob_get_contents();
ob_end_clean();

$title = "New Post";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

 ?>

<h1 class="formTitle">Create a new post!</h1>
 <form class="signUpForm" action="../boilerplate/utl/createPost.php" id="createPost" method="post" enctype="multipart/form-data">
   <input required type="text" name="postTitle" placeholder="Post Title">
   <label for="imgDropoff">Adding header image makes Musa happy!</label>
   <input name="postHeader" type="text" >
   <textarea required name="postContent" cols="30" rows="10"></textarea>
   <input type="submit" name="submit" placeholder="Sign Up" value="Post">
 </form>