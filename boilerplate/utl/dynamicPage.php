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

    function getCommenter($Cid) {
        return runSafeQuery(
            "SELECT * FROM authors WHERE authorID= ?",
        [
            "i",
            $Cid
        ]
        );
    }

    function getComments() {
        return runSafeQuery(
            "SELECT * FROM comments WHERE postID= ?",
        [
            "i",
            $_GET['id']
        ]
        );
    }

    $comments = getComments();

    $comments = reset($comments);

    $buffer=ob_get_contents();
    ob_end_clean();
    
    $post = reset($post);


    $title = $post['postTitle'];
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;
?>

    <div class="postContentDisplay">
        <div id="header" style="background-image: url('<?php echo $post['postHeader'] ?>');"></div>
        <h2 class="postTitle"><?php echo $post['postTitle'] ?></h2>
        <p style="font-style: italic;">Published: <?php echo $post['publishDate'] ?></p>
        <p class="excerpt"><?php echo $post['postContent'] ?></p>
        <br><br>


        <h4>Add a comment</h4>
        <?php if(isset($_SESSION['LoggedOn'])) { $comments = getComments();?>
            <form class="commentBox" action="../utl/createComment.php?id=3" method="post">
                <textarea required name="commentText" cols="30" rows="10"></textarea>
                <input type="submit" name="<?php echo $post['postID'] ?>" placeholder="Sign Up" value="Post">
            </form>
        <?php } else { ?>
            <div class="commentBox">
                <input type="submit" name="submit" onClick="location.href='/fp2/pages/signIn.php'" value="Sign In to add comments">
            </div>
        <?php } ?>

        <!-- Display comments -->
        <?php $comments = getComments();
            foreach($comments as $comment) {
                $commenter = getCommenter($comment['authorID']); $commenter = reset($commenter); ?>
            <div class="commentDisplay">
                <div class="thumbnailInfo">
                    <div class="thumbnail">
                        <img src="<?php echo $commenter['authorImg'] ?>" alt="">
                    </div>
                    <h2 class="thumbnailTitle"></h2>
                    <p>By asdjasdlkj
                    <p style="font-style: italic;"></p>
                </div>
                <div class="postExcerptThumb">
                    <p><?php echo $comment['commentText'] ?></p>
                    <p style="text-decoration:none; color: #42D7FF;" href="">Posted on <?php echo $comment['commentDate'] ?></p>
                </div>
            </div>
            <?php } ?>
        </div> 


