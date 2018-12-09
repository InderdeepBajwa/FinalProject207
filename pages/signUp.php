<?php
ob_start();
require('../boilerplate/head.php');
require('../boilerplate/navbar.php');

if (isset($_SESSION['LoggedUser'])) {
  header("Location: ../index.php");
}

$buffer=ob_get_contents();
ob_end_clean();

$title = "Sign Up";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

 ?>

<h1 class="formTitle">Register to become WOWSome</h1>
<form class="signUpForm" action="welcome.php" method="post">
  <input required type="text" name="authorName" placeholder="Full Name" value="">
  <input required type="email" name="authorEmail" placeholder="Email" onkeyup='emailCheck();' id="email">
  <input required type="email" name="confirmEmail" placeholder="Confirm Email" onkeyup='emailCheck();' id="confirm_email">
  <div id="emailCheck"></div>
  <input type="password" name="password" id="password" onkeyup='check();' placeholder="Password">
  <input type="password" name="confirm_password" id="confirm_password" onkeyup='check();' placeholder="Confirm Password">
  <div id="message"></div>
  <input type="submit" name="submit" placeholder="Sign Up" value="Sign Up">
  <input type="reset" name="reset" placeholder="Reset" value="Reset">
  <div class="centerDisplayText">Already have an account?</div>
  <input type="button" name="SignUp" onclick="document.location.href='signIn.php'" value="Sign In">

</form>
