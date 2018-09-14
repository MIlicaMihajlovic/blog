<?php include "db.php"; ?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
</head> 
<!-- head iz html nam nije potreban moze i drugacije i bolje-->

<body>


<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php

            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $statement = $connection->prepare($sql);

            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $posts = $statement->fetchAll(); //jer imamo niz postova i zbog toga koristimo fetchAll

            

            ?>

            <div class="blog-post">
                <?php foreach($posts as $post) { ?>

                    <h2 class="blog-post-title"><a href="single-post.php?id=<?php echo($post['id']) ?>"><?php echo($post['title']); ?></a></h2>
                    <p class="blog-post-meta"><?php echo($post['created_at']); ?> by <a><?php echo($post['author']); ?></a></p>
                    <p><?php echo($post['body']); ?></p>

                <?php } ?>
            </div>

            <?php //include "sidebar.php"; ako include pojavljuje se dva puta na index stranici ?>

        </div>
    </div>
</main>

</body>
</html>
        

 








  