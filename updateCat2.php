<?php

    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($type) >= 1 ){
               
  
                // $updateType     = "UPDATE categories SET type = :typeD "; // works but updates everything
                // $updateType     = "UPDATE categories SET type = :typeD WHERE id = :id";
                // $updateType     = "UPDATE categories SET type = :typeD WHERE id = {$_GET['id']}" ;
                $updateType     = "UPDATE categories SET type = :typeD WHERE id = {$_GET['typeD']}  " ;

                $postType = $db->prepare($updateType);
                $postType->bindValue(':typeD', $type);        
                // $postType->bindValue("{$_POST['typeD']} ", "{$_GET['typeD']}");  

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

        $queryInsertD = "SELECT * FROM categories" ;

        $statementInsertD = $db->prepare($queryInsertD);

        $statementInsertD->execute();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert New Category</title>
    <link rel="stylesheet" type="text/css" href="styles/questions.css">
</head>
<body>
         <?php include('components/nav.php'); ?> 
    <div id="wrapper">
    <h1>Update Category</h1>
        <form method="post" action="updateCat.php">
            <!-- <label for="title">Title</label> -->
            <input id="type" name="type" placeholder="New Catergory (required)">
     
            <input type="submit">
            <h5><a href="editFaq.php">back</a></h5>
        </form> 

    </div>
</body>
</html>

<!-- 
            <select id="type" name="typeD">
                
                  <?php while($row = $statementInsertD -> fetch()): ?>

                      <option>    
                            
                            <?= $row['type']?>
                    </option>
                <?php endwhile ?>
            </select>  -->