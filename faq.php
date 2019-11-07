<?php
		  require('database/db_connect.php');

	    $query = "SELECT * FROM faq ORDER BY id" ;

	    $statement = $db->prepare($query);

	    $statement->execute();

      $queryCat = "SELECT * FROM users";
      $statementCat = $db->prepare($query);

      $statementCat->execute();


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
  
    <h1>Frequently Asked Questions</h1>
  
     	    <?php while($row = $statement -> fetch()): ?>
     	  <div id="indie">  	  
      <h3> <a href="faqContents.php?id=<?=$row['id']?>"> <?= $row['question'] ?></a></h3>
          
      </div>   
    <?php endwhile ?>
  
    </div>
    <h5><a href="faqMod.php">Moderator</a> </h5>
</body>
</html>