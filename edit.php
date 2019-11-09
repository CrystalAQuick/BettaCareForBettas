<?php

    global $title;

     require 'database/authenticate.php';
	 require('database/db_connect.php');

    if ($_POST && isset($_POST['submitUpdate']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id'])) {
        // Sanitize user input 
        $title  = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        if(strlen($title) >= 1  && strlen($content) >= 1){ 
            // creating the current date
            $date = date('Y-m-d H:i:s');
            // updating the table
            $query     = "UPDATE questions SET title = :title, content = :content, 
            dateUpdated = :dateUpdated WHERE id = :id";
            
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);        
            $statement->bindValue(':content', $content);
            $statement->bindValue(':dateUpdated', $date);     
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            
            // Execute the INSERT.
            $statement->execute();
            
            // Redirect after update.
            header("Location: view.php");
            exit;
         }  else {

            if (strlen($content) < 1) {
               ECHO  nl2br("Error - Please enter content. The content must be a minimum of one character in length.\r\n");                
            }
            if(strlen($title) < 1){
                ECHO nl2br("Error - Please enter a title. The title must be a minimum of one character in length.\r\n");               
            } 
            $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

            // Build the parametrized SQL query using the filtered id.
            $query = "SELECT * FROM questions WHERE id = :id";
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
        $query = "SELECT * FROM questions WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the SELECT and fetch the single row returned.
        $statement->execute();
        $quote = $statement->fetch();

        if($id == false){
            header("Location: index.php");
        }

        //nav to 
        if(!$id || $statement ->rowCount() != 1){
            header("Location: index.php");
            
        }

    } else {    
        $id = false; // False if we are not UPDATING or SELECTING.
        //header("Location: index.php");
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editing  - <?= $quote['title'] ?> </title>
	 <link rel="stylesheet" type="text/css" href="styles/questions.css" />
      <script src="//cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
</head>
<body>
    <script>
  function test(){
    var t= confirm("Are you sure?");
  }     
</script>
	<?php include('components/navTemp.php'); ?>  
    <?php include('delete.php'); ?>
    <div id="wrapper">
	<?php if($id): ?>
    <form method="post">
    	<input type="hidden" name="id" value="<?=  $quote['id'] ?>" >
       <!--  <label  id="title">Title</label> -->
        <input id="titleInput" name="title" value="<?= $quote['title'] ?>">
      <!--   <label  id="content">Content</label> -->
        <textarea id="contentInput" name="content" rows="20" cols="100"> <?= $quote['content']  ?></textarea> 
                     <script> CKEDITOR.replace('content');</script>
        <input id="submit" type="submit" value="update" name="submitUpdate">
        <input onclick="test()" type="submit" name="submitDelete" value="delete" >       
    </form>
	<?php endif ?>    	
    </div>

</body>
</html>