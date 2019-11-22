<?php
   
    session_start();
  

    $reply = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
    // one, two
    require 'database/authenticate.php';
    require('database/db_connect.php');

        // if a title is not at least 1 and the content is not at least one it will fail.

        if ($_POST["captcha"] == $_SESSION["captcha"]) {
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
        } else {
                $temp = $_POST['postId'];
               // echo $temp;
                $postContent = $_POST['content'];
                
                //echo $postContent;
                $_SESSION['words'] = $postContent;
                echo 'test session ' . $_SESSION['words'];
                header("Location: reply.php?id=$temp")  ; 
               //header("Location: reply.php?=17")  ;     





        }


?>