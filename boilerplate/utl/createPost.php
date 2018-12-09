<?php

    require('../../dbase/dbfunctions.php');
    require("../head.php");

    if (!isset($_SESSION['LoggedUser'])) {
        header("Location: /");
    }

    runSafeQuery(
        "INSERT INTO posts (authorID, postTitle, postHeader, postContent, publishDate) VALUES (?, ?, ?, ?, ?)",
        [
            "issss",
            $_SESSION["LoggedUser"]["authorID"],
            $_POST["postTitle"],
            $_POST['postHeader'],
            $_POST["postContent"],
            date("Y-m-d")
        ]
    );

    header("Location: ../../pages/myPosts.php")


?>