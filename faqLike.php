<?php
		  require('database/db_connect.php');

	    //$queryLike = "SELECT * FROM faq f JOIN categories c ON c.type=f.type WHERE c.type=f.type AND WHERE type={$_GET['type']}" ;

      //$queryLike = "SELECT * FROM faq WHERE type = {$_GET['type']}" ; 
      $queryLike = "SELECT * FROM faq WHERE type = :type" ; 
     // $queryLike = "SELECT {$_GET['type']} FROM faq" ; 
	    
      //$queryLike = "SELECT * FROM faq ORDER BY id" ;
      $statementLike = $db->prepare($queryLike);
      $something = "{$_GET['type']}";
      $statementLike->bindValue(':type', $something);
      // foreach ($query as $item => $_POST['type']) {
      //   echo $item;
      // }

	    $statementLike->execute();

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

    <h1>Frequently Asked Questions - like</h1>
   
     	    <?php while($row = $statementLike -> fetch()): ?>
     	  <div id="indie">  	  
      <h3> <a href="faqContents.php?id=<?=$row['id']?>"> <?= $row['question'] ?></a></h3>
           HELLO

      </div>   
    <?php endwhile ?>
   <?=  $queryLike  ?>

    </div>
</body>
</html>