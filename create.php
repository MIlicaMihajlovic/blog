<?php 

include 'db.php';


$namePost = $_POST['title'];

$post = $_POST['post'];

$name = $_POST['author'];


$sql = "INSERT INTO posts (title, body, author) VALUES ('$namePost', '$post', '$name')";

$statement = $connection->prepare($sql); //konekcija

$statement->execute();

header("Location: index.php");

?>