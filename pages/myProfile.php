<?php
    ob_start();
    require('../boilerplate/navbar.php');
    require('../dbase/dbfunctions.php');

    if (!isset($_SESSION['LoggedUser'])) {
    header("Location: ../index.php");
    }

    $buffer=ob_get_contents();
    ob_end_clean();

    $title = "My Profile";
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

    $users = runSafeQuery(
        "SELECT * FROM authors WHERE authorID=?",
        [
            "i",
            $_SESSION["LoggedUser"]["authorID"]
        ]
    );
    reset($users);
?>
    <div style="text-align: center; margin: auto auto;">
        <h1>Welcome, <?php echo ($_SESSION["LoggedUser"]["authorName"]); ?>!</h1>
        <img class="profilePic" src="<?php echo $users[0]['authorImg'] ?>" alt="">    
    </div>

<h1 class="formTitle">Change My Image</h1>
 <form class="signUpForm" style="padding-bottom:3em;" action="/fp2/boilerplate/utl/uploadProfilePic.php" method="post">
   <input required type="text" name="authorImg" placeholder="URL" id="email">
   <input type="submit" name="submit" placeholder="Sign Up" value="Submit">
 </form>

