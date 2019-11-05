<?php
	    require('database/db_connect.php');

	    $query = "SELECT * FROM questions ORDER BY id DESC LIMIT 5" ;

	    $statement = $db->prepare($query);

	    $statement->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Recent</title>
    <link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
	 <?php include('components/nav.php'); ?> 

    <div id="wrapper">
    <h1>Recent Questions</h1>
        <h2><a href="viewAll.php">View All Questions </a></h2>

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
          <a href="fullPost.php?id=<?= $row['id'] ?>"> Read Full Post</a> 
      <?php else: ?>        
        <h4> <?= $row['content']  ?></h4> 
      <?php endif;?>  
      </div>   
    <?php endwhile ?>

    </div>
</body>
</html> 