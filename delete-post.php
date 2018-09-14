<?php include 'db.php'; 

$post_id=($_POST['post_id']);




$sql= "DELETE FROM posts WHERE id={$post_id}"; 

$statement = $connection->prepare($sql);

$statement->execute();

header("Location: index.php");



?>