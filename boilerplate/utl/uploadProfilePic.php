<?php

    require('../../dbase/dbfunctions.php');
    require("../head.php");

    if (!isset($_SESSION['LoggedUser'])) {
        header("Location: /fp2/");
    }

    runSafeQuery(
        "UPDATE authors SET authorImg=? WHERE authorID=?",
        [
            "si",
            $_POST['authorImg'],
            $_SESSION['LoggedUser']['authorID']
        ]
    );

    header("Location: ../../pages/myProfile.php");


?>