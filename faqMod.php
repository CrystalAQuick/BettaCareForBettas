<?php
		  require('database/db_connect.php');
      require 'database/authenticate.php';

	    $query = "SELECT * FROM faq ORDER BY id" ;

	    $statement = $db->prepare($query);

	    $statement->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	<link rel="stylesheet" type="text/css" href="styles/faq.css">
</head>
<body>	 
	 <?php include('components\navTemp.php'); ?> 

    <div id="wrapper">

    <h1>Frequently Asked Questions</h1>
   
     	    <?php while($row = $statement -> fetch()): ?>
     	  <div id="indie">  	  
      <h3> <a href="faqContents.php?id=<?=$row['id']?>"> <?= $row['question'] ?></a>   </h3>
           <a href="editFaq.php?id=<?=$row['id']?>">-edit</a>      
      </div>  

    <?php endwhile ?>
          <h5><a href="insertMod.php">Insert</a></h5>
          <h5><a href="insertCat.php">New Category</a></h5>

    </div>
    <h5><a href="insertMod.php">Moderator</a> </h5>
</body>
</html>