<?php

    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    require 'database/authenticate.php';
    require('database/db_connect.php');
    if ($_POST) {
        // if a title is not at least 1 and the content is not at least one it will fail.
        if(strlen($type) >= 1 ){
               

               $typeD = $_POST['typeD'];

                $updateType     = "UPDATE categories SET type = :type WHERE id = :id" ;
                
                $postType = $db->prepare($updateType);
                $postType->bindValue(':type', $type);         
        
                $postType->bindValue(':id', $typeD, PDO::PARAM_INT);
               
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
         <?php include('components/navTemp.php'); ?> 
    <div id="wrapper">
    <h1>Update Category</h1>
        <form method="post" action="updateCat.php">
            <!-- <label for="title">Title</label> -->
            <input id="type" name="type" placeholder="New Catergory (required)">
     
            <input type="submit">
            <h5><a href="editFaq.php">back</a></h5>
            
            <select id="type" name="typeD" >
        
                    <?php while($row = $statementInsertD -> fetch()): ?>
                      <option value="<?php echo $row['id'] ?>" >    
                           <?= $row['type']?>
                

                    </option>
                      
                <?php endwhile ?>
           
            </select>   
    
        </form> 



    </div>
</body>
</html>

