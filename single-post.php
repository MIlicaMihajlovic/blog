<?php 
include 'db.php';
?>

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


<?php include 'header.php'; ?>

    

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
    
    <?php

         $post_id=($_GET['id']); //dovukli id i postavli u varijablu
        //var_dump($post_id);
        //die();


        $sql = "SELECT * FROM posts WHERE id =" .$post_id; 
        $statement = $connection->prepare($sql);

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $singlePost = $statement->fetch();
     
   ?>     

        <div class='blog-post'>
            
                <h2 class= 'blog-post-title'><?php echo($singlePost['title']); ?></h2>
                <p class= 'blog-post-meta'><?php echo ($singlePost['created_at']); ?> by <a href='#'> <?php echo ($singlePost['author']); ?> </a><p>
                <p><?php echo ($singlePost['body']);?></p>
               <form action='delete-post.php' method='POST'> 
                <button class='btn btn-primary'>Delete post</button>
                <input type='hidden' name='post_id' value=<?php echo($post_id); ?> >
               </form> 

        </div>

        <div class='form-comment'>
                <!-- action pokrecemo str, onsubmit nam vraca js funkciju  -->
            <form action = 'create-comment.php' name = 'myform' onsubmit='return allFieldsRequried()' method = 'POST'> 
                <input type = 'text' name = 'username'  placeholder = 'Name'><br>
                <textarea name = 'comment'  placeholder = 'Comment' rows = '5' cols = '30'></textarea><br>
                <!-- dodeljujemo novom komentaru vrednost post id u odnosu na post kojem pripada, a pomocu hidden sakrivamo sa nase stranice  -->
                <input type='hidden'  name='post_id' value=<?php echo($post_id); ?> > 
                <input type = 'submit'>    
            </form>
        </div> 

        <script>

            function allFieldsRequried(){
                
                var username = document.forms['myform']['username'].value; //uzimamo vrednost username u okviru forme
                
                var comment = document.forms['myform']['comment'].value; //vrednost polja komentar

                if (username == '' || comment == ''){ //ako je neko polje prazno
                    alert('All fields are required!'); //vrati alert box
                    return true;
                } else {
                    return false; //u suprotnom vrati komentar
                }


            }

        </script>   

        <div class='btnclass'>
                <!-- onclick pozivamo funkciju iz js -->
            <button onclick ='hideComments()' id='btnid' class='btn btn-default' >Hide comments</button>
        </div>

        <script>

        function hideComments(){  
            
            var myButton = document.getElementById('btnid'); //uzimamo button

            var comments = document.getElementById('allComments'); //dovlacimo komentare
            
            
            if (comments.style.display == 'block' ){
                comments.style.display = 'none';
                myButton.innerHTML = 'Show comments';
                
                
           } else {
               comments.style.display = 'block';
               myButton.inerHTML = 'Hide comments';
           }
          }  
       
        </script>        
        
        
        <?php
        
        include 'comments.php';
        
        ?>
            
        

        
   
            <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
       
       
        </div><!-- /.blog-main -->

        <?php include "sidebar.php"; ?>
        
    </div><!-- /.row -->
</main><!-- /.container -->
 <?php 
    include "footer.php";
?> 
</body>
</html>



