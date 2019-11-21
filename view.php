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
<div id="indie">
      <?php foreach($posts as $post): ?>
      <p><?= $post['title'] ?> <?= htmlspecialchars_decode($post['content']) ?> </p> 
      <?php  $repliesSelect = $db->prepare("SELECT * FROM reply WHERE postId = :postId"); $repliesSelect->bindValue(':postId', $post['id']); $repliesSelect->execute(); $replies = $repliesSelect->fetchAll(); ?>
      <ul>
        <?php foreach($replies as $reply): ?>
          <li><?= $reply['content'] ?></li>
        <?php endforeach ?>
      </ul>
    <?php endforeach ?>  
</div>


  </div>
</body>
</html> 