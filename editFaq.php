<?php

    global $title;

     require 'database/authenticate.php';
     require('database/db_connect.php');

    
    if ($_POST && isset($_POST['submitUpdate']) && isset($_POST['question']) && isset($_POST['answer']) && isset($_POST['id'])) {
        // Sanitize user input 
        $question  = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(strlen($question) >= 1  && strlen($answer) >= 1){ 
            // creating the current date
            $date = date('Y-m-d H:i:s');
            // updating the table
            $queryEdit     = "UPDATE faq SET question = :question, answer = :answer, type = :type WHERE id = :id";
            
            $statementEdit = $db->prepare($queryEdit);
            $statementEdit->bindValue(':question', $question);        
            $statementEdit->bindValue(':answer', $answer);
               $statementEdit -> bindValue(':type', $type);
            $statementEdit->bindValue(':id', $id, PDO::PARAM_INT);
            
            // Execute the INSERT.
            $statementEdit->execute();
            
            // Redirect after update.
            header("Location: faqMod.php");
            exit;
         }  
    } else if (isset($_GET['id'])) { // Retrieve quote to be edited, if id GET parameter is in URL.
        // Sanitize the id. Like above but this time from INPUT_GET.
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parametrized SQL query using the filtered id.
        $query = "SELECT * FROM faq WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the SELECT and fetch the single row returned.
        $statement->execute();
        $quote = $statement->fetch();

        if($id == false){
            header("Location: faqMod.php");
        }

        //nav to 
        if(!$id || $statement ->rowCount() != 1){
            header("Location: faqMod.php");
            
        }

    } else {    
        $id = false; 
         header("Location: faqMod.php");

    } 

        $queryInsert = "SELECT * FROM categories" ;

        $statementInsert = $db->prepare($queryInsert);

        $statementInsert->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editing  - <?= $quote['question'] ?> </title>
     <link rel="stylesheet" type="text/css" href="styles/questions.css" />
     
     <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
     <script src="//cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
</head>
<body>
    <script>
  function test(){
    var t= confirm("Are you sure?");
  }     
</script>
    <?php include('components/navTemp.php'); ?>  
    <?php include('deleteFaq.php'); ?>
    <div id="wrapper">
    <?php if($id): ?>
    <form method="post">
        <input type="hidden" name="id" value="<?=  $quote['id'] ?>" >
       <!--  <label  id="title">Title</label> -->
        <input id="titleInput" name="question" value="<?= $quote['question'] ?>">
      <!--   <label  id="content">Content</label> -->
        
        <textarea id="contentInput" name="answer" rows="20" cols="100"> <?= $quote['answer']  ?></textarea>
        <script> CKEDITOR.replace('answer');</script> 
        <input id="submit" type="submit" value="update" name="submitUpdate">
        <input onclick="test()" type="submit" name="submitDelete" value="delete" >

                    <select id="type" name="type">
                
                  <?php while($row = $statementInsert -> fetch()): ?>
                    <option>    
                            <?= $row['type']?>
                    </option>
                <?php endwhile ?>
            </select>       
    </form>

    <?php endif ?>      

    <h5><a href="editFaq.php">back</a></h5>
    </div>


</body>
</html>