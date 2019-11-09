<?php
      session_start();
      require('database/db_connect.php');
      // $queryWild = "SELECT * FROM bettavarieties WHERE Color LIKE '%blue%'"  ;
      // $queryWild = "SELECT * FROM bettavarieties WHERE Color LIKE '%{$_SESSION['search']}%'"  ;
      

      $queryWild = "SELECT * FROM bettavarieties WHERE Color LIKE '%{$_SESSION['search']}%' OR  Pattern LIKE '%{$_SESSION['search']}%' OR finType LIKE '%{$_SESSION['search']}%' OR info LIKE  '%{$_SESSION['search']}%'"  ;
      $statementWild = $db->prepare($queryWild);
      $statementWild->execute();


      $queryWildQuestion = "SELECT * FROM faq WHERE question LIKE '%{$_SESSION['search']}%' OR  answer LIKE '%{$_SESSION['search']}%'"  ;
      $statementWildQuestion = $db->prepare($queryWildQuestion);
      $statementWildQuestion->execute();

      $queryWildTitle = "SELECT * FROM questions WHERE title LIKE '%{$_SESSION['search']}%' OR content LIKE '%{$_SESSION['search']}%'"  ;
      $statementWildTitle = $db->prepare($queryWildTitle);
      $statementWildTitle->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
<h1>Search</h1>

<div id="indie">

	<?php if($queryWild): ?>
		<h2>Betta Varieties</h2>
		<ul>
		
		   <?php while($row = $statementWild -> fetch()): ?>
			   
 			<?php if($row['color'] != ''): ?>
		   		<li><a href="sortByColor.php"><?= $row['color'] ?></a></li>
 		    <?php endif; ?>
 		     			<?php if($row['pattern'] != ''): ?>
		   		<li><a href="sortByPattern.php"><?= $row['pattern'] ?></a></li>
 		    <?php endif; ?>
 		     			<?php if($row['finType'] != ''): ?>
		   		<li><a href="sortByFinType.php"><?= $row['finType'] ?></a></li>
 		    <?php endif; ?> 
		   <?php endwhile ?>   			
		</ul>
 	    
    <?php endif; ?> 
	
	<?php if($queryWildQuestion): ?>
		<h2>FAQ</h2>
		   <?php while($row = $statementWildQuestion -> fetch()): ?>		   
 			<?php if($row['question'] != ''): ?>
		   		<li><a href="faqLike.php"><?= $row['question'] ?></a></li>	     		
 		    <?php endif; ?>
 	   		
		   <?php endwhile ?>    
		      			    
    <?php endif; ?> 


    	<?php if($queryWildTitle): ?>
		<h2>Forms</h2>
		   <?php while($row = $statementWildTitle -> fetch()): ?>		   
 			<?php if($row['title'] != ''): ?>
		   		<li><a href="viewAll.php"><?= $row['title'] ?></a></li>	     		
 		    <?php endif; ?>
 	
		   <?php endwhile ?>    	    
    <?php endif; ?> 
</div>
<h4><a href="">Not What youre looking for? Try seacrching this</a> </h4>
<h2><a href="index.php">back to home</a> </h2>
   <!--  <?= $_SESSION['search']?> -->
</body>
</html>

