<?php
    ob_start();
    require('../navbar.php');
    require('../../dbase/dbfunctions.php');


    if (!isset($_GET['id'])) {
        header("Location: ../../");
    }

    $post = runSafeQuery(
        "SELECT * FROM posts WHERE postID = ?",
        [
            "i",
            $_GET['id']
        ]
    );


    $buffer=ob_get_contents();
    ob_end_clean();
    
    $post = reset($post);


    $title = $post['postTitle'];
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;
?>

    <div class="postContentDisplay">
        <div id="header" style="background-image: url('<?php echo $post['postHeader'] ?>');"></div>
        <h2 class="postTitle"><?php echo $post['postTitle'] ?></a></h2>
        <p style="font-style: italic;">Published: <?php echo $post['publishDate'] ?></p>
        <p class="excerpt"><?php echo $post['postContent'] ?></p>
    </div>


