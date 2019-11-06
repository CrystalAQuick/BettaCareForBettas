<?php

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // one, two
    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($title) >= 1  && strlen($content) >= 1){

 
                $insert = "INSERT INTO questions (title, content) VALUES (:title, :content)";

                $statement = $db->prepare($insert);
                
       
                $statement -> bindValue(':title', $title);
                $statement -> bindValue(':content', $content);

                $statement->execute();

                $update     = "UPDATE questions SET title = :title, content = :content WHERE title = :title";

                $post = $db->prepare($update);
                $post->bindValue(':title', $title);        
      
                $post->execute();
                header("Location: view.php");
                exit;                


        } else {

            if (strlen($content) < 1) {
               ECHO  nl2br("Error - Please enter content. The content must be a minimum of one character in length.\r\n");                
            }
            if(strlen($title) < 1){
                ECHO nl2br("Error - Please enter a title. The title must be a minimum of one character in length.\r\n");               
            }   

            header("Location: view.php")  ;        
        }

    }

?>