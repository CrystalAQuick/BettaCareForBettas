<?php
    require('database/db_connect.php');

      $query = "SELECT * FROM gallery WHERE id = {$_GET['id']}" ;

      $statement = $db->prepare($query);

      $statement->execute();
      $quote = $statement->fetch(); 



?>
        

<!DOCTYPE html>
<html>
<head>
    <title>Gallery Edit</title>
    <link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
         <?php include('components/navTemp.php'); ?>


         <div id="wrapper">
             <form method="post">
        <input type="hidden" name="id" value="<?=  $quote['id'] ?>" >
       <!--  <label  id="title">Title</label> -->
        <input id="titleInput" name="question" value="<?= $quote['title'] ?>">
      <!--   <label  id="content">Content</label> -->
        
        <textarea id="contentInput" name="answer" rows="20" cols="100"> <?= $quote['about']  ?>
            


        </textarea>


            <?php if($quote['uniqueName'] != '' ): ?>
        <img src="uploads/<?= $quote['image'] ?> " alt="<?= $quote['uniqueName'] ?>" />
    <?php endif; ?>
        <script> CKEDITOR.replace('answer');</script> 
        <input id="submit" type="submit" value="update" name="submitUpdate">
        <input onclick="test()" type="submit" name="submitDelete" value="delete" >

                    
    </form>

    

    <h5><a href="gallery.php">back</a></h5>
    </div>
         </div>

         <?= $query ?>
</body>
</html>