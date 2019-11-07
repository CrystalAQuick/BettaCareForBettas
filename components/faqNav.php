<?php
      
      $queryCat = "SELECT * FROM categories ORDER BY id";
      $statementCat = $db->prepare($queryCat);

      $statementCat->execute();
?>

<nav>
    <ul>
        <li> 
          <?php while($row = $statementCat -> fetch()): ?>
             <a href="faqLike.php?type=<?=$row['type']?>">  <?= $row['type'] ?> </a>
               
          <?php endwhile ?>

        </li>  
    </ul>
</nav>