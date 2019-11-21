<?php
      require('database/db_connect.php');

      $postsSelect = $db->prepare("SELECT * FROM questions");
      $postsSelect->execute();
      $posts = $postsSelect->fetchAll();

      foreach($posts as $post){
        
      }



?>

<!DOCTYPE html>
<html>
<head>
  <title>View Recent</title>
    <link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
  <?php include('components/navTemp.php'); ?> 

  <div id="wrapper">
      <h1>Recent Questions</h1>
   
            <?php foreach($posts as $post): ?>
<div id="indie">
            <h4><?= $post['title'] ?></h4> 
            <h4><?= htmlspecialchars_decode($post['content']) ?></h4>
            <?php $date = date_create( $post['date']) ?>
            <h5>Created on  <?= date_format($date,"F d, Y g:i a" ) ?> <a href="edit.php?id=<?=$post['id']?>">-edit</a></h5>
            <h5><a href="reply.php?id=<?= $post['id'] ?>">Comment</a></h5>
              <?php  $repliesSelect = $db->prepare("SELECT * FROM reply WHERE postId = :postId"); $repliesSelect->bindValue(':postId', $post['id']); $repliesSelect->execute(); $replies = $repliesSelect->fetchAll(); ?>
         
              <?php foreach($replies as $reply): ?>
                <h2>COMMENT--- <?= $reply['content'] ?></h2>
               
              <?php endforeach ?>
            
</div>

            
          <?php endforeach ?>  
    

  </div>
</body>
</html> 