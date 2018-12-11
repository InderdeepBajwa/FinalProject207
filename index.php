  
  <?php
  ob_start();
  require('boilerplate/navbar.php');
  require('dbase/dbfunctions.php');


  $getPosts = runSafeQuery(
    "SELECT * FROM posts", []
  );

  reset($getPosts);

 ?>

  
  <div id="header"></div>
  
  <div class="homepageDiv">
    <h1>Welcome to VHL - Blog</h1>
    &nbsp;
    <? foreach($getPosts as $post) { ?>
      <div class="thumbnailInfo">
        <div class="thumbnail">
          <a href="<?php echo "boilerplate/utl/dynamicPage.php?id="?><?php $postData=$post['postID'];echo "$postData"?>"><img class="postThumbnail" src="<?php echo $post['postHeader'] ?>" alt=""></a>
        </div>
            <h2 class="thumbnailTitle"><a href="<?php echo "boilerplate/utl/dynamicPage.php?id="?><?php $postData=$post['postID'];echo "$postData"?>"><?php echo $post['postTitle'] ?></a></h2>
            <p>By <?php $userName = runSafeQuery(
              "SELECT authorName FROM authors WHERE authorID=?",
              [
                "i",
                $post['authorID']
                ]
              ); echo $userName[0]['authorName'] ?>
            <p style="font-style: italic;">Published on <?php echo $post['publishDate'] ?></p>
          </div>
            <p class="thumbnailExcerpt"><?php $excerpt = runSafeQuery(
              "SELECT LEFT(postContent, 180) AS excerpt FROM posts WHERE postID=?",
              [
                "i",
                $post['postID']
              ]
            ); $excerpt = reset($excerpt); echo $excerpt['excerpt'];?>...</p>
      <?php } ?>  
    
  </div>
  
</body>
</html>
