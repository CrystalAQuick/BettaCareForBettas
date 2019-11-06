<?php
    

       $queryCat = "SELECT * FROM faq f JOIN categories c ON c.type=f.type";


      $statementCat = $db->prepare($query);

      $statementCat->execute();
?>

<nav>
    <ul>
        <h5> 
          <?php while($row = $statementCat -> fetch()): ?>
             <!-- <a href="faqLike.php?type=<?=$row['type']?>"> </a> -->
               <?= $row['type'] ?>
          <?php endwhile ?>

        </h5>  
    </ul>
</nav>