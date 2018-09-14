<?php include 'db.php'; 


$postId = $_POST['post_id']; //uzimamo id posta koji je komentarisan

$nameComment = $_POST['username']; //username onoga ko komentarise

$comment = $_POST['comment']; //komentar tog usera 

//uz pomoc sql statement insertujemo u tabelu novi komentar
$sql = "INSERT INTO comments (author, text, post_id) VALUES ('$nameComment', '$comment', '$postId')";

$statement = $connection->prepare($sql); //konekcija

$statement->execute(); //izvrsavamo upit

header("Location: post.php?id= " .$postId); ​ //redirekcija na stranicu single-post.php do posta koji je komentarisan

?>