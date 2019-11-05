<?php
		    require('database/db_connect.php');

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
	 <?php include('components\nav.php'); ?> 
    <div id="wrapper">
    <h1>Frequently Asked Questions</h1>

     	    <?php while($row = $statement -> fetch()): ?>
     	  <div id="indie">  	
     
      <h3> <?= $row['question'] ?> </h3>
             <h4> <?= $row['answer']  ?></h4> 
      </div>   
    <?php endwhile ?>
  
    </div>
 
</body>
</html>