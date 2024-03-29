<?php
	    require('database/db_connect.php');

	    $query = "SELECT * FROM questions ORDER BY id" ;

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
    <h1>Questions: sorted by Likes - NOT DONE</h1>
     <?php include('components/sortNav.php'); ?>   
     	<?php while($row = $statement -> fetch()): ?>
     	  <div id="indie">  	
      <?php $date = date_create( $row['date']) ?>
      <h3> <?= $row['title'] ?> </h3>
      <h5> <?= date_format($date,"F d, Y g:i a" ) ?>
      <a href="edit.php?id=<?=$row['id']?>">-edit</a></h5>
      <?php if(strlen(htmlspecialchars_decode($row['content'])) > 200 ): ?>
        <?= substr(htmlspecialchars_decode($row['content']), 0, 200 ) . "... "; ?>
          <a href="fullPost.php?id=<?= $row['id'] ?>" id="full-blog-link"> Read Full Post</a> 
      <?php else: ?>        
        <h4> <?= htmlspecialchars_decode($row['content'])  ?></h4> 
      <?php endif;?>  
      </div>   
    <?php endwhile ?>
</body>
</html>