<?php

  require('../dbase/dbfunctions.php');

  if(session_id() == '') { // start session if none found
    session_start();
}

  if (!$_SESSION['LoggedUser']) {
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
          "s", $_POST['authorName']
        ]
      );

      if ($user['authorPassword'] == md5($_POST['password'])) {
        $_SESSION['LoggedUser'] = $user;
    }
  }
    else if ($_POST['submit'] == "Sign In") {
      $user = runSafeQuery(
        "SELECT * from authors WHERE authorEmail='admin@admin.admin';",
        []
      );

      $user = reset($user);

      if ($user['authorPassword'] == md5($_POST['password'])) {
        $_SESSION['LoggedUser'] = $user;
        // If has image
      }
      else {
        echo "Login Failed!";
      }
    }
    else {
      header('Location: signIn.php');
      exit();
    }
  }
  // TODO User does not has image
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
