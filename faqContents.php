<?php
		require('database/db_connect.php');

	    $query = "SELECT * FROM faq WHERE id = {$_GET['id']}" ;

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
        <h4> <?= $row['question']  ?></h4>
        <h4> <?=  htmlspecialchars_decode($row['answer'])  ?></h4> 
        <h4><a href="faq.php">Back to FAQ</a></h4>


      </div>   
    <?php endwhile ?>
    </div>
 
</body>
</html>