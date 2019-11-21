<?php
	    require('database/db_connect.php');

	    $query = "SELECT * FROM questions ORDER BY id DESC LIMIT 5" ;

	    $statement = $db->prepare($query);

	    $statement->execute();

//      $queryReply = "SELECT * FROM questions JOIN reply ON reply.postId = questions.id " ;

      //$queryReply = "SELECT * FROM questions JOIN reply ON reply.postId = questions.id " ;
     // $count  = 0;
     // $postId = 0;
      //$id = ;

      $queryReply = "SELECT * FROM reply" ;
       //$queryReply = "SELECT * FROM reply " ;


      $statementReply = $db->prepare($queryReply);
     // $statementReply -> bindValue(':id', $id);
      $statementReply->execute();
    //  $rel = $statementReply->fetchAll();
     //  $rel = $statementReply->fetch();
      
    //  print_r($test[$count]['postId']);
      // print_r($rel['postId']);



?>

<!DOCTYPE html>
<html>
<head>
	<title>View Recent</title>
    <link rel="stylesheet" type="text/css" href="styles/view.css">
</head>
<body>
  <?php include('components/navTemp.php'); ?> 

  <div id="wrapper">
  <h1>Recent Questions</h1>
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
        <a href="fullPost.php?id=<?= $row['id'] ?>"> Read Full Post</a> 
        <?php else: ?>        
        <h4> <?=htmlspecialchars_decode($row['content'])  ?></h4> 
        <?php endif;?>
        <h5><a href="reply.php?id=<?= $row['id'] ?>">Comment</a></h5>




      <?php if($row['id']):  ?>
           
            <h4> Id == <?= $questionId = $row['id']?> </h4> 
            <?php $work =  $statementReply->fetch() ?>
            <?php $postId == $work['postId'] ?> 
        
            <h4> <?= $work['content'] ?> </h4>   

     <!--        <?php if($questionId == $p): ?>          
                 <h4> <?= $work['content'] ?> hi</h4>  
            <?php  endif; ?>   
 -->
                  
                       
      <?php endif; ?>

     </div>  
    <?php endwhile ?>
 
      
  </div>
</body>
</html> 