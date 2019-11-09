<?php

//scrap this
	//session_start();
      require('database/db_connect.php');
      // $queryWild = "SELECT * FROM bettavarieties WHERE Color LIKE '%blue%'"  ;
      // $queryWild = "SELECT * FROM bettavarieties WHERE Color LIKE '%{$_SESSION['search']}%'"  ;

 
//    echo $_SESSION['searchPP'];
      $queryWildTitle = "SELECT * FROM questions WHERE title LIKE '%{$_SESSION['searchPP']}%' OR content LIKE '%{$_SESSION['searchPP']}%'"  ;
      $statementWildTitle = $db->prepare($queryWildTitle);
      $statementWildTitle->execute();

  //  session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
<h1>Search All Questions specific</h1>

<div id="indie">

    	<?php if($queryWildTitle): ?>
		<h2>Forms</h2>
		   <?php while($row = $statementWildTitle -> fetch()): ?>		   
 			<?php if($row['title'] != ''): ?>
		   		<li><a href="viewAll.php"><?= $row['title'] ?></a></li>	     		
 		    <?php endif; ?>
 	
		   <?php endwhile ?>    	    
    <?php endif; ?> 
</div>
<h4><a href="https://lmgtfy.com/?q=<?= $dummy ?>">Not What youre looking for? Try seacrching this</a> </h4>
<h2><a href="viewAll.php">back to all questions</a> </h2>
   <!--  <?= $_SESSION['search']?> -->
</body>
</html>

