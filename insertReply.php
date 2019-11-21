<?php

    $reply = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
    // one, two
    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($reply) >= 1){

 
                $insert = "INSERT INTO reply (content, postId) VALUES (:content, :postId)";

                $statement = $db->prepare($insert);
                
                $statement -> bindValue(':content', $reply);
                $statement -> bindValue(':postId', $_POST['postId']);

                $statement->execute();

                $update     = "UPDATE reply SET content = :content 
                WHERE title = :title";

                $post = $db->prepare($update);
                $post->bindValue(':reply', $reply);        
      
                $post->execute();
                header("Location: view.php");
                exit;                


        } else {

            if (strlen($view) < 1) {
               ECHO  nl2br("Error - Please enter content. The content must be a minimum of one character in length.\r\n");                
            }

            header("Location: view.php")  ;        
        }

    }

?>