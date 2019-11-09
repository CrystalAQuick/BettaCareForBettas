<?php
	        require('database/db_connect.php');
     // SQL is written as a String.
     $test = "SELECT * FROM test";

     // A PDO::Statement is prepared from the query.
     $statementTest = $db->prepare($test);

     // Execution on the DB server is delayed until we execute().
     $statementTest->execute(); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

	<?php      $statementTest->execute(); ?>
	<?php while($row = $statementTest ->fetch()): ?>
	    <h5><?= $row['content']  ?> </h5>
	   
	<?php endwhile ?>

    <img src="uploads/<?=  $_FILES['image']['name'] ?>"  >  
</body>
</html>