<?php
       require('database/db_connect.php');

        $queryInsert = "SELECT * FROM categories" ;

        $statementInsert = $db->prepare($queryInsert);

        $statementInsert->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ask a Question</title>
    <link rel="stylesheet" type="text/css" href="styles/questions.css">
     <script src="//cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
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
             <script> CKEDITOR.replace('content');</script>
                        <select id="type" name="type">
                
                  <?php while($row = $statementInsert -> fetch()): ?>
                    <option>    
                            <?= $row['type']?>
                    </option>
                <?php endwhile ?>
            </select>

            <input type="submit">

        </form>  
    </div>
</body>
</html>


