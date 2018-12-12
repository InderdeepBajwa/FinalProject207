<?php 

    ob_start();
    require('../../dbase/dbfunctions.php');

    if (!isset($_SESSION['LoggedUser'])) {
    header("Location: ../index.php");
    }

    if (!isset($_GET['id'])) {
        header("Location: ../../");
    }

    $post = runSafeQuery(
        "DELETE FROM authors WHERE authorID = ?",
        [
            "i",
            $_GET['id']
        ]
    );

    header("Location: /fp2/admin/manageUsers.php")
?>