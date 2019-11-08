<?php

      require('database/db_connect.php');
      // this is selecting the post whoses text is larger than 200 in length and displaying the entire text.
      $query = "SELECT * FROM questions WHERE id = {$_GET['id']}" ;

      $statement = $db->prepare($query);

      $statement->execute();

      $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                        array('title' => array('min_range' => 1,
                                                'max_range' =>140))) ;
    
      // this allows the title bar to have the correct heading shown
      $query2 = "SELECT * FROM questions WHERE id = {$_GET['id']}" ;

      $statement2 = $db->prepare($query);

      $statement2->execute();

      $title2 = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                        array('title' => array('min_range' => 1,
                                                'max_range' =>140))) ;

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php while($row2 = $statement2 -> fetch()): ?>
      <title> <?= $row2['title'] ?> </title>    
    <?php endwhile ?>

    <link rel="stylesheet" type="text/css" href="styles/view.css" />
</head>
<body>
  <?php include('components/navTemp.php'); ?>   
  <div id="wrapper">
          <?php while($row = $statement -> fetch()): ?>
        <div id="indie"> 
                 <h2>Full Post</h2>    
      <?php $date = date_create( $row['date']) ?>
      <h3><?= $row['title'] ?> </h3>
     
      <h5>Created on  <?= date_format($date,"F d, Y g:i a" ) ?>
      <a href="edit.php?id=<?=$row['id']?>">-edit</a></h5>
      <?php if( !is_null($row['dateUpdated'])): ?>
      <?php $date = date_create( $row['dateUpdated']) ?>
            <h5>*Updated* at <?= date_format($date,"F d, Y g:i a" ) ?>
      <?php endif;?> 

     
        <h4> <?= $row['content']  ?></h4> 

      </div>   
    <?php endwhile ?>
      <h1><a href="viewAll.php">Return to all questions.</a></h1>
    </div>   




  </div>

</body>
</html> 