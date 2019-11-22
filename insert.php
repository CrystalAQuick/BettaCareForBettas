<?php

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // one, two
    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($title) >= 1  && strlen($content) >= 1){
                  
                    // new
                $file = $_FILES['file'];
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array('jpg', 'jpeg', 'png');

                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0){
                        if($fileSize  < 500000){
                            $fileNameNew = uniqid(',', true) . "." . $fileActualExt ;
                            $fileDest = 'uploads/' . $fileNameNew;
                            move_uploaded_file($fileTmpName, $fileDest);
                            
                        } else{
                            echo "Your file is too large!";
                        }

                    }else{
                        echo "There was an error in the uploading process";
                    }



                } else {
                    echo "invalid image type";
                }




                ///
 
                $insert = "INSERT INTO questions (title, content, type) VALUES (:title, :content, :type)";

                $statement = $db->prepare($insert);
                
       
                $statement -> bindValue(':title', $title);
                $statement -> bindValue(':content', $content);
                $statement -> bindValue(':type', $type);

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