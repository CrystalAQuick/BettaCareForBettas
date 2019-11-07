<?php
	    require('database/db_connect.php');

	    $query = "SELECT * FROM questions ORDER BY dateUpdated DESC" ;

	    $statement = $db->prepare($query);

	    $statement->execute();


?>

<!DOCTYPE html>
<html>
<head>
	<title>View All Questions</title>
	<link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
	 <?php include('components/navTemp.php'); ?> 
    <div id="wrapper">
    <h1>Questions: sorted by Date</h1>
     <?php include('components/sortNav.php'); ?>   
          <?php while($row = $statement -> fetch()): ?>
        <div id="indie">    
      <?php $date = date_create( $row['date']) ?>
      <h3><?= $row['title'] ?> </h3>
     
      <h5>Created on  <?= date_format($date,"F d, Y g:i a" ) ?>
      <a href="edit.php?id=<?=$row['id']?>">-edit</a></h5>
      <?php if( !is_null($row['dateUpdated'])): ?>
      <?php $date = date_create( $row['dateUpdated']) ?>
            <h5>*Updated* at <?= date_format($date,"F d, Y g:i a" ) ?>
      <?php endif;?> 

      <?php if(strlen($row['content']) > 200 ): ?>
        <?= substr($row['content'], 0, 200 ) . "... "; ?>
          <a href="post.php?id=<?= $row['id'] ?>" id="full-blog-link"> Read Full Post</a> 
      <?php else: ?>        
        <h4> <?= $row['content']  ?></h4> 
      <?php endif;?>  
      </div>   
    <?php endwhile ?>

    </div>
</body>
</html> 
</body>
</html>