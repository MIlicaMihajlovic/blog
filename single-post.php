<?php 
include 'db.php';

include 'header.php';

        $post_id=($_GET['id']);
        var_dump($post_id);
        die();


    

        $sql = "SELECT * FROM posts WHERE id = " .$post_id; 
        $statement = $connection->prepare($sql);

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $singlePost = $statement->fetch();
     




   ?>     

        <div class='blog-post'>
            
                <h2 class= ''><a href='single-post.php?id='<?php echo($singlePost['id']) ?>><?php echo($singlePost['title']) ?></a></h1>
                <p class= ''><?php echo ($singlePost['created_at']) ?> by <a> <?php echo ($singlePost['author']) ?> </a><p>
                <p><?php echo ($singlePost['body'])?></p>

            
        </div>

<?php
    





include 'sidebar.php';
include 'footer';

?>



