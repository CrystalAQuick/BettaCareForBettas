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
	<title>FAQ - All Questions</title>
	<link rel="stylesheet" type="text/css" href="styles/faq.css">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>	 
 
    <?php include('components\navTemp.php'); ?> 

    <div id="wrapper">
  
    <h1>Frequently Asked Questions - All</h1>
  
     	    <?php while($row = $statement -> fetch()): ?>
     	  <div id="indie">  	  
      <h3> <a href="faqContents.php?id=<?=$row['id']?>"> <?= $row['question'] ?></a></h3>
          
      </div>   
    <?php endwhile ?>
  
    </div>
    <h5><a href="faqMod.php">Moderator</a> </h5>
</body>
</html>