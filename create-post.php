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

<?php
include 'header.php';
?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">




<form action = 'create.php' name = 'mypost' onsubmit = 'return fieldsRequried()' method='POST'>
    <input type = 'text' name = 'author'  placeholder = 'Name'><br>
    <input type = 'text' name = 'title'  placeholder = 'Title'><br>
    <textarea name = 'post'  placeholder = 'Post' rows = '5' cols = '30'></textarea><br>
 
    <input type = 'submit'> 
</form>

<script>

function fieldsRequried(){
    
    var name = document.forms['mypost']['author'].value;
    
    var postName = document.forms['mypost']['title'].value; 

    var post = document.forms['mypost']['post'].value;

    if (name == '' || postName == '' || post == ''){ 
        alert('All fields are required!'); 
        return false;
    } else {
        return true; 
    }


}

</script>

        </div><!-- /.blog-main -->

    </div><!-- /.row -->
</main><!-- /.container -->

<?php
include 'footer';

?>

</body>
</html>