<?php

include "db.php";

$post_id=($_GET['id']);




$sql = "SELECT * FROM comments WHERE post_id = {$post_id}";

$statement = $connection->prepare($sql);

$statement->execute();

$statement->setFetchMode(PDO::FETCH_ASSOC);

$comments = $statement->fetchAll();


?>

    <ul id = 'allComments' class='allComments'>
        <?php foreach($comments as $comment) { ?>
        <li><?php echo($comment['text']); ?> by <?php echo($comment['author']); ?></li>
       <form action = 'delete-comment.php' method='POST'> 
        <button class='btn btn-default'>Delete comment</button><hr>
        
        <input type='number' hidden name='post_id' value=<?php echo($post_id); ?> >
        <input type='number' hidden name='comment_id' value=<?php echo($comment['id']); ?> >
       </form>    
        <?php } ?>
    </ul>


    