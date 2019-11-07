<?php
    require('database/db_connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ask a Question</title>
    <link rel="stylesheet" type="text/css" href="styles/faqTemp.css">

</head>
<body>
         <?php include('components/navTemp.php'); ?> 
    <div id="wrapper">
    <h1>Ask a Question!</h1>
        <form method="post" action="insert.php">
            <!-- <label for="title">Title</label> -->
            <input id="title" name="title" placeholder="Title">
         <!--    <label for="content">Content</label> -->
            <textarea id="content" name="content" rows="15" style="resize: none;" placeholder="Text (required) Image (optional)"></textarea>
            <input type="submit">
        </form>  
    </div>
</body>
</html>


