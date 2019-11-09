<?php

	    require('database/db_connect.php');

	    $query = "SELECT * FROM questions ORDER BY id" ;

	    $statement = $db->prepare($query);

	    $statement->execute();

      $searchPP = filter_input(INPUT_POST, 'searchPP', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      if ($_POST) {
        
        if(strlen($searchPP)){
                // echo $_SESSION['search'];      
                $_SESSION['searchPP'] = $searchPP;
              //  echo $_SESSION['searchPP'];
                
                          //    echo $_SESSION['searchPP'];
                $query = "SELECT * FROM questions WHERE title LIKE '%{$_SESSION['searchPP']}%' OR content LIKE '%{$_SESSION['searchPP']}%'"  ;
                $statement = $db->prepare($query);
                $statement->execute();

               // header("Location: searchQuestions.php");
          
                // exit
        } 
      }
?>

<!DOCTYPE html>
<html>
<head>
	<title>View All Questions</title>
	<link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
	 <?php include('components/navTemp.php'); ?> 
    <div id="wrapper">
    <h1>All Questions</h1>
        <div class="onRight">
    <form method="post" name="test">
      <input type="text" placeholder="Search specific questions" name="searchPP" >
    </form>
  </div>
     <?php include('components/sortNav.php'); ?>   
          <?php while($row = $statement -> fetch()): ?>
        <div id="indie">    
      <?php $date = date_create( $row['date']) ?>
      <h3><?= $row['title'] ?> </h3>    
      <h5>Created on  <?= date_format($date,"F d, Y g:i a" ) ?>
      <a href="edit.php?id=<?=$row['id']?>">-edit</a></h5>
      <?php if( !is_null($row['dateUpdated'])): ?>
      <?php $date = date_create( $row['dateUpdated']) ?>
            <h5>*Updated* at <?= date_format($date,"F d, Y g:i a" ) ?>
      <?php endif;?> 

      <?php if(strlen( htmlspecialchars_decode($row['content'])) > 200 ): ?>
        <?= substr(htmlspecialchars_decode($row['content']), 0, 200 ) . "... "; ?>
          <a href="fullPost.php?id=<?= $row['id'] ?>" id="full-blog-link"> Read Full Post</a> 
      <?php else: ?>        
        <h4> <?= htmlspecialchars_decode($row['content'])  ?></h4> 
      <?php endif;?>  
      </div>   
    <?php endwhile ?>

    </div>
</body>
</html> 
</html>


