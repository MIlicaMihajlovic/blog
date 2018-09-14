<?php include 'db.php'?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
     <?php  
       
        $sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5";

        $statement = $connection->prepare($sql);

        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $posts = $statement->fetchAll();
    ?>    

    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest post</h4> 
            <?php foreach($posts as $post) { ?>
                <p><a href="single-post.php?id=<?php echo($post['id']) ?>"><?php echo($post['title']); ?></a></p>
            <?php } ?>
    </div>
</aside><!-- /.blog-sidebar -->

      