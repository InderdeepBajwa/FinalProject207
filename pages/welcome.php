<?php
  require('../dbase/dbfunctions.php');

  if(session_id() == '') { // start session if none found
    session_start();
  }

  if (!$_SESSION) {
    $hashedPassword  = md5($_POST['password']);

    if ($_POST['submit'] == "Sign Up") {
      if ($_POST['password'] != $_POST['confirm_password']) {
        header('Location: signUp.php');
        exit();
      }

      runSafeQuery(
        "INSERT INTO authors (authorName, authorPassword, authorEmail) VALUES (?, ?, ?)",
        [
          "sss",
          $_POST['authorName'],
          $hashedPassword,
          $_POST['authorEmail']
        ]
      );

      $user = runSafeQuery(
        "SELECT * FROM authors WHERE authorEmail=?",
        [
          "s", $_POST['authorEmail']
        ]
      );

      $user = reset($user);

      if ($user['authorPassword'] == md5($_POST['password'])) {
        $_SESSION['LoggedUser'] = $user;
    }
  }
    else if ($_POST['submit'] == "Sign In") {
      $user = runSafeQuery(
        "SELECT * from authors WHERE authorEmail=?;",
        [
          "s",
          $_POST['authorEmail']
        ]
      );

      $user = reset($user);

      if ($user['authorPassword'] == md5($_POST['password'])) {
        $_SESSION['LoggedUser'] = $user;
        // If has image
      }
      else {
        echo "Login Failed!";
        header('Location: signIn.php');
      }
    }
    else {
      header('Location: signIn.php');
    }
  }
  if (isset($_SESSION['LoggedUser'])){
    if($_SESSION['LoggedUser']['authorImg'] == 'NULL') {
      
    }
    else {
      header('Location: ../index.php');
    }
  }
  else {
    header('Location: ../index.php'); // TODO Add user blog page
  }
  
  ob_start();
  require('../boilerplate/head.php');
  require('../boilerplate/navbar.php');
  
  $buffer=ob_get_contents();
  ob_end_clean();

  
  $title = "Welcome - VHL";
  $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

 ?>



 <h1 class="formTitle">Upload A Profile Picture</h1>
 <form class="signUpForm" action="/fp2/boilerplate/utl/uploadProfilePic.php" method="post">
   <input required type="text" name="authorImg" placeholder="URL" id="email">
   <input type="submit" name="submit" placeholder="Sign Up" value="Submit">
 </form>