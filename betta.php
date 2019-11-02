<?php 
     require('db_connect.php');
    
     // SQL is written as a String.
     $query = "SELECT * FROM bettavarieties";

     // A PDO::Statement is prepared from the query.
     $statement = $db->prepare($query);

     // Execution on the DB server is delayed until we execute().
     $statement->execute(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Betta Varities</title>
	<link rel="stylesheet" type="text/css" href="betta.css">
</head>
<body>
		 <?php include('components/nav.php'); ?> 
<div id="entireForm">
	
</div>		 
<h1> This is for the betta varities</h1>
<div id="bettaTable">
	<h1>Fin Types</h1>
<?php while($row = $statement ->fetch()): ?>
    <h5><?= $row['finType']  ?></h5>
    <?php if($row['pattern'] == '' && $row['color'] == '' && $row['finType'] != ''): ?>
    	    <h5><?= $row['info']  ?></h5>
    <?php endif; ?> 
<?php endwhile ?>
<h1>Patterns</h1>
<?php      $statement->execute(); ?>
<?php while($row = $statement ->fetch()): ?>
    <h5><?= $row['pattern']  ?></h5>
    <?php if($row['pattern'] != '' && $row['color'] == '' && $row['finType'] == ''): ?>
    	    <h5><?= $row['info']  ?></h5>
    <?php endif; ?>    
<?php endwhile ?>
<h1>Colors</h1>
<?php      $statement->execute(); ?>
<?php while($row = $statement ->fetch()): ?>
    <h5><?= $row['color']  ?></h5>
    <?php if($row['pattern'] == '' && $row['color'] != '' && $row['finType'] == ''): ?>
    	    <h5><?= $row['info']  ?></h5>
    <?php endif; ?>    
<?php endwhile ?>




</div>





</body>
</html>



