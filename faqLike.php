<?php
		  require('database/db_connect.php');

      $queryLike = "SELECT * FROM faq WHERE type = :type" ; 

      $statementLike = $db->prepare($queryLike);
      $something = "{$_GET['type']}";
      $statementLike->bindValue(':type', $something);

	    $statementLike->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	<link rel="stylesheet" type="text/css" href="styles/faq.css">
</head>
<body>	 
	 <?php include('components\nav.php'); ?> 
   <?php include('components\faqNav.php'); ?> 
    <div id="wrapper">
     <h1>Frequently Asked Questions like : <?= $something  ?> </h1>
     	    <?php while($row = $statementLike -> fetch()): ?>
     	  <div id="indie">  	  
      <h3> <a href="faqContents.php?id=<?=$row['id']?>"> <?= $row['question'] ?></a></h3>
      </div>     
    <?php endwhile ?>
      <h4><a href="faq.php">Back to FAQ</a></h4>
    </div>
</body>
</html>