<?php
ob_start();
require('../boilerplate/navbar.php');

if (isset($_SESSION['LoggedUser'])) {
  header("Location: ../index.php");
}

$buffer=ob_get_contents();
ob_end_clean();

$title = "Sign In";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

 ?>

 <h1 class="formTitle">Log On to become Awesome!</h1>
 <form class="signUpForm" action="welcome.php" method="post">
   <input required type="email" name="authorEmail" placeholder="Email" id="email">
   <input type="password" name="password" id="password" placeholder="Password">
   <input type="submit" name="submit" placeholder="Sign Up" value="Sign In">
   <input type="reset" name="SignIn" onclick="document.location.href='signUp.php'" value="Sign Up">
 </form>
