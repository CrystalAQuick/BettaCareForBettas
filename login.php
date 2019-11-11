<?php 

	session_start();

	require('database/db_connect.php');

	if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		// if(!isset($email) || !isset($password)){
		// 	//header("Location: index.php?error=INVALID-INFO-ENTERED!!");
		// 	//exit();
		// }
		// else {
			$queryLOG = "SELECT * FROM users WHERE email = :email";

		    $statementLOG = $db->prepare($queryLOG);

            $statementLOG -> bindValue(':email', $email);
            // $statementLOG -> bindValue(':password', $password);
		    $statementLOG->execute();

		    //echo $queryLOG;

		// }

		  if($row = $statementLOG->fetch()){
		  	// echo $row['username'];
		   //  echo $row['password'];
		  	$passwordCheck = password_verify($password, $row['password']);
		  	if($passwordCheck != false){
		  		// echo 'hello world';
		  		
		        $_SESSION['email'] = $row['username'];
		         echo 'hello, ' . $_SESSION['email'];
		  	}
		  	else{
		  		echo 'password is not correct';

		  } 
		  	}




	}
	// else{
	// 	header("Location: error.php");
	// 	exit;
	// }

    
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>welcome to the login page</h1>
<div>
	<h2>Login</h2>
	<form method="post" action="login.php">
		<input type="text" name="email" placeholder="email">
		<input type="text" name="password" placeholder="password">

		<button type="submit" name="submit">login</button>
	</form>
</div>
<h1><a href="register.php">Sign up!</h1>
	<h1><a href="index.php"> back</h1>
</body>
</html>