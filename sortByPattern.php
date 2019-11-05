<?php 
     //require 'authenticate.php';
     require('database/db_connect.php');

     // SQL is written as a String.
     $query = "SELECT * FROM bettavarieties ORDER BY Pattern";

     // A PDO::Statement is prepared from the query.
     $statement = $db->prepare($query);

     // Execution on the DB server is delayed until we execute().
     $statement->execute(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Betta Varities</title>
	<link rel="stylesheet" type="text/css" href="styles/betta.css">
</head>
<body>
		 <?php include('components/nav.php'); ?> 
<div id="entireForm">
	
</div>		 
<h1>Betta Varities</h1>
<?php include('components/sortNavBetta.php'); ?>
<div id="bettaTable">
<h1>Patterns</h1>
<?php      $statement->execute(); ?>
<?php while($row = $statement ->fetch()): ?>
    <h5><?= $row['pattern']  ?></h5>
    <?php if($row['pattern'] != '' && $row['color'] == '' && $row['finType'] == ''): ?>
    	    <h5><?= $row['info']  ?></h5>
    <?php endif; ?>    
<?php endwhile ?>
</div>
</body>
</html>



