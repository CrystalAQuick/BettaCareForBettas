<?php

    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($type) >= 1 ){

 
                $insertType = "INSERT INTO categories (type) VALUES (:type)";

                $statementType = $db->prepare($insertType);
                
     
                $statementType -> bindValue(':type', $type);
                $statementType->execute();

                $updateType     = "UPDATE faq SET question = :question, answer = :answer WHERE question = :question";

                $postType = $db->prepare($updateType);
                $postType->bindValue(':question', $type);        
      
                $postType->execute();
                header("Location: faqMod.php");
                exit;                


        } else {

            if (strlen($type) < 1) {
               ECHO  nl2br("Error - must be a minimum of one character in length.\r\n");                
            }
            
            header("Location: faqMod.php")  ;        
        }

    }



?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert FAQ Question</title>
    <link rel="stylesheet" type="text/css" href="styles/questions.css">
</head>
<body>
         <?php include('components/nav.php'); ?> 
    <div id="wrapper">
    <h1>Insert FAQ Question</h1>
        <form method="post" action="insertCat.php">
            <!-- <label for="title">Title</label> -->
            <input id="type" name="type" placeholder="New Catergory (required)">

                      
 

            <input type="submit">
            <h5>back to mod section</h5>
        </form>  
    </div>
</body>
</html>