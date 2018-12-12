<?php

    require('../../dbase/dbfunctions.php');
    require("../head.php");

    if (!isset($_SESSION['LoggedUser'])) {
        header("Location: /");
    }

    runSafeQuery(
        "INSERT INTO comments (postID, authorID, commentText, commentDate) VALUES (?, ?, ?, ?)",
        [
            "iiss",
            $_GET["id"],
            $_SESSION["LoggedUser"]["authorID"],
            $_POST['commentText'],
            date("Y-m-d")
        ]
    );
    $thisPostID = $_GET['id'];
    header("Location: dynamicPage.php?id=$thisPostID");


?>