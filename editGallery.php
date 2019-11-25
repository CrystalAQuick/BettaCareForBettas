<?php
    require('database/db_connect.php');

      $query = "SELECT * FROM gallery WHERE id = {$_GET['id']}" ;

      $statement = $db->prepare($query);

      $statement->execute();
      $quote = $statement->fetch(); 


     if(isset($_POST['submitDelete']) && isset($_POST['id']) ){

        $delete = "DELETE FROM gallery WHERE id = {$_GET['id']} LIMIT 1";
      
        if($db ->query($delete) == true){ 

            header("Location: gallery.php");    
        } else {
            // echo "not deleted";
        }
        $deleteStatement = $db->prepare($delete);

    }


        if(isset($_POST['checkbox']) ){

           //$delete = "DELETE FROM gallery WHERE id = {$_GET['id']} LIMIT 1";
             $delete = "UPDATE gallery SET uniqueName = '', image = '' WHERE id = {$_GET['id']}" ;
          
            if($db ->query($delete) == true){ 

                header("Location: gallery.php");    
            } else {
                // echo "not deleted";
            }
            $deleteStatement = $db->prepare($delete);

             unlink('./uploads/'. $quote['image']);
            header("Location: gallery.php");


        } else {
        echo "not deleted";
        }
    

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
        <input id="titleInput" name="title" value="<?= $quote['title'] ?>">
      <!--   <label  id="content">Content</label> -->
        
        <textarea id="contentInput" name="about" rows="20" cols="100"> <?= $quote['about']  ?>
            
        </textarea>

            <?php if($quote['uniqueName'] != '' ): ?>
                <img src="uploads/<?= $quote['image'] ?> " alt="<?= $quote['uniqueName'] ?>" /><input type="checkbox" name="checkbox" value="1">
    <?php endif; ?>
        <script> CKEDITOR.replace('answer');</script>

<?php if($quote['uniqueName'] != '' ): ?>
<input id="submit" type="submit" value="delete Image" name="submitUpdate">
<?php endif; ?>

        <input onclick="test()" type="submit" name="submitDelete" value="Delete Post" >

                    
    </form>

    

    <h5><a href="gallery.php">back</a></h5>
    </div>
         </div>

         <?= $query ?>
</body>
</html>