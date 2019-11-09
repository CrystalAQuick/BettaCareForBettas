<?php

    $question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($question) >= 1  && strlen($answer) >= 1){

 
                $insert = "INSERT INTO faq (question, answer, type) VALUES (:question, :answer, :type)";

                $statement = $db->prepare($insert);
                
       
                $statement -> bindValue(':question', $question);
                $statement -> bindValue(':answer', $answer);
                $statement -> bindValue(':type', $type);
                $statement->execute();

                $update     = "UPDATE faq SET question = :question, answer = :answer WHERE question = :question";

                $post = $db->prepare($update);
                $post->bindValue(':question', $question);        
      
                $post->execute();
                header("Location: faqMod.php");
                exit;                


        } else {

            if (strlen($question) < 1) {
               ECHO  nl2br("Error - must be a minimum of one character in length.\r\n");                
            }
            if(strlen($answer) < 1){
                ECHO nl2br("Error - must be a minimum of one character in length.\r\n");               
            }   
            if(strlen($type) < 1){
                ECHO nl2br("Error - must be a valid type\r\n");               
            }  

            header("Location: faqMod.php")  ;        
        }

    }

        $queryInsert = "SELECT * FROM categories" ;

        $statementInsert = $db->prepare($queryInsert);

        $statementInsert->execute();


?>
<!-- //https://cdn.ckeditor.com/ -->
<!DOCTYPE html>
<html>
<head>
    <title>Insert FAQ Question</title>
    <link rel="stylesheet" type="text/css" href="styles/questions.css">
    <script src="//cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
</head>
<body>
         <?php include('components/nav.php'); ?> 
    <div id="wrapper">
    <h1>Insert FAQ Question</h1>
        <form method="post" action="insertMod.php">
            <!-- <label for="title">Title</label> -->
            <input id="question" name="question" placeholder="Title (required)">
         <!--    <label for="content">Content</label> -->
            <textarea id="answer" name="answer" rows="15" style="resize: none;" placeholder="Text (required)"></textarea>
            <script>
                CKEDITOR.config.autoParagraph = false;
                // CKDEITOR.config.htmlEncodeOutput = true;
                // CKEDITOR.config.breakBeforeOpen = false;
                // CKEDITOR.config.breakAfterOpen = false;
                // CKEDITOR.config.baseHref - false;
                CKEDITOR.replace('answer');
            </script>           
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