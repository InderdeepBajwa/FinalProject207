<?php 

    ob_start();
    require('../navbar.php');
    require('../../dbase/dbfunctions.php');

    if (!isset($_SESSION['LoggedUser'])) {
    header("Location: ../index.php");
    }

    if (!isset($_GET['id'])) {
        header("Location: ../../");
    }

    $post = runSafeQuery(
        "DELETE FROM posts WHERE postID = ?",
        [
            "i",
            $_GET['id']
        ]
    );

    header("Location: /fp2/admin/managePosts.php")
?>