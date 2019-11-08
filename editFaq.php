<?php

    global $title;

     require 'database/authenticate.php';
     require('database/db_connect.php');

     // UPDATE quote if author, content and id are present in POST.
    if ($_POST && isset($_POST['submitUpdate']) && isset($_POST['question']) && isset($_POST['answer']) && isset($_POST['id'])) {
        // Sanitize user input 
        $question  = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        if(strlen($question) >= 1  && strlen($answer) >= 1){ 
            // creating the current date
            $date = date('Y-m-d H:i:s');
            // updating the table
            $query     = "UPDATE faq SET question = :question, answer = :answer
             WHERE id = :id";
            
            $statement = $db->prepare($query);
            $statement->bindValue(':question', $question);        
            $statement->bindValue(':answer', $answer);
    
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            
            // Execute the INSERT.
            $statement->execute();
            
            // Redirect after update.
            header("Location: faqMod.php");
            exit;
         }  else {

            if (strlen($answer) < 1) {
               ECHO  nl2br("Error - Please enter content. The content must be a minimum of one character in length.\r\n");                
            }
            if(strlen($question) < 1){
                ECHO nl2br("Error - Please enter a title. The title must be a minimum of one character in length.\r\n");               
            } 
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            // Build the parametrized SQL query using the filtered id.
            $query = "SELECT * FROM faq WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);

            // Execute the SELECT and fetch the single row returned.
            $statement->execute();
            $quote = $statement->fetch(); 

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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editing  - <?= $quote['question'] ?> </title>
     <link rel="stylesheet" type="text/css" href="styles/questions.css" />
     
     <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
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
        <input id="titleInput" name="title" value="<?= $quote['question'] ?>">
      <!--   <label  id="content">Content</label> -->
        <textarea id="contentInput" name="content" rows="20" cols="100"> <?= $quote['answer']  ?></textarea> 
        <input id="submit" type="submit" value="update" name="submitUpdate">
        <input onclick="test()" type="submit" name="submitDelete" value="delete" >       
    </form>
    <?php endif ?>      
    <h5><a href="editFaq.php">back</a></h5>
    </div>

</body>
</html>