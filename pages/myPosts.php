<?php
    ob_start();
    require('../boilerplate/navbar.php');
    require('../dbase/dbfunctions.php');

    if (!isset($_SESSION['LoggedUser'])) {
    header("Location: ../index.php");
    }

    $buffer=ob_get_contents();
    ob_end_clean();

    $title = "My Posts";
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

    $posts = runSafeQuery(
        "SELECT * FROM posts WHERE authorID=?",
        [
            "i",
            $_SESSION["LoggedUser"]["authorID"]
        ]
    );
?>
    <h1 class="postDisplay">Hey, <?php echo ($_SESSION["LoggedUser"]["authorName"]); ?>!</h1>
    <h2 class="postDisplay">Here are your posts:</h2>&nbsp;
    <?php foreach($posts as $post) { ?>
    <div class="postDisplay">
        <h2 class="postTitle"><a style="text-decoration:none; color: #a5a5a5;" href="<?php echo "../boilerplate/utl/dynamicPage.php?id="?><?php $postData=$post['postID'];echo "$postData"?>"><?php echo $post['postTitle'] ?></a></h2>
        <p style="font-style: italic;"><?php echo $post['publishDate'] ?></p>
        <p class="excerpt"><?php echo $post['postContent'] ?></p>
    </div>
    <?php } ?>


