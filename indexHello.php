<?php
   require('database/db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>index.html</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
	 
<!-- 	 <?php include('components\navTemp.php'); ?> -->

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
      <a href="login.php">Login/Register</a>
      <a href="question.php">Ask a question</a>
      <a href="view.php">View Recent</a>
       <a href="viewAll.php">View All Questions</a>
      </div>
  </div>
 <!--  <a href="login.php">Login/Register</a> -->
    <div class="search-container">
    <form method="post">
      <input type="text" placeholder="Search Entire Site" name="search" >
    </form>
  </div>
    <?php if($_SESSION['email'] != ''): ?>
          <a href="logOut.php">Logout</a>
    <?php endif; ?> 
</div>
	  
	 <div id="wrapper">
	 	<h1>Hello, <?= $_SESSION['email'] ?></h1>
	 	<h1>Betta Fish Care: First Time Owners Guide</h1>
	 	<h3>Overview</h3>
	 	<h4>Are you a new betta owner? Are you a fish enthusiast? Or are you just trying to find a resource in order to become more educated on the correct care of the responsibilty of owning a betta?</h4>
	 	<h4>Youre in the right place! BettaCare4Betta is a not-for-profit orgainization that is dedicated to the education of proper care and living conditions for betta fish. </h4>
	 	<h4>BettaCare4Bettas encourages community invlovement! Register in order to participate on the forms or if you are just looking around, click any of the tabs and find anwsers to your questions!</h4> 	
	 </div>

<h1><a href="insertImage.php">testPost</h1>
	
</body>
</html>