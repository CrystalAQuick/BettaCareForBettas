<?php
	    require('db_connect.php');

	    $query = "SELECT * FROM questions ORDER BY id DESC LIMIT 5" ;

	    $statement = $db->prepare($query);

	    $statement->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Recent</title>
<!--   <link rel="stylesheet" type="text/css" href="index.css"> -->
    <link rel="stylesheet" type="text/css" href="view.css">
</head>
<body>
	 <?php include('components/nav.php'); ?> 

    <div id="wrapper">
    <h1>  This is where you can view the questions</h1>

     	    <?php while($row = $statement -> fetch()): ?>
     	  <div id="indie">  	
      <?php $date = date_create( $row['date']) ?>
      <h3> <?= $row['title'] ?> </h3>
      <h5> <?= date_format($date,"F d, Y g:i a" ) ?>
      <a href="edit.php?id=<?=$row['id']?>">-edit</a></h5>
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