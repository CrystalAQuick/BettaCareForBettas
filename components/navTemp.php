<?php
      session_start();
      $var = "test";
      // $_SESSION['search'] = $_GET['name'];
      $_SESSION['search'] = $var;

      //require('database/db_connect.php');
      $queryCat = "SELECT * FROM categories ORDER BY id";
      $statementCat = $db->prepare($queryCat);

      $statementCat->execute();


      // $queryCat = "SELECT * FROM categories ORDER BY id";
      // $statementCat = $db->prepare($queryCat);

      // $statementCat->execute();


      $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      if ($_POST) {
        
        if(strlen($search)){
                // echo $_SESSION['search'];      
                $_SESSION['search'] = $search;
                echo $_SESSION['search'];
                header("Location: search.php");
                // exit;                


        } 

    }
   

?>

<div class="navbar">
  <a href="">XX</a>
  <a href="index.php">Home</a>
  <div class="subnav">
    <button class="subnavbtn">FAQ</button>
    <div class="subnav-content">
       <a href="faq.php">All Questions</a>
          <?php while($row = $statementCat -> fetch()): ?>
             <a href="faqLike.php?type=<?=$row['type']?>">  <?= $row['type'] ?> </a>             
          <?php endwhile ?>  
    </div>
  </div>
  <a href="betta.php">Betta Types</a>
  <div class="subnav">
    <button class="subnavbtn">Forms</button>
    <div class="subnav-content">
      <a href="#">Login/Register</a>
      <a href="question.php">Ask a question</a>
      <a href="view.php">View Recent</a>
       <a href="viewAll.php">View All Questions</a>
      </div>
  </div>
    <div class="search-container">
    <form method="post">
      <input type="text" placeholder="Search Entire Site" name="search" >
    </form>
  </div>
</div>




