<?php 

	     session_start();
	     require('database/db_connect.php');
	    // $queryLogin = "SELECT * FROM users ORDER BY id" ;

	    // $statementLogin = $db->prepare($queryLogin);

	    // $statementLogin->execute();
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$passwordRepeat = $_POST['passwordRepeat'];


	
	
			if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
				// header("Location: register.php?error=emptyfields&username=".$username . "&email=".$email );
				// exit();
			}
			else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)   ){
				// header("Location: register.php?error=invalidEmailAndUsername" );
				// exit();
						
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				//header("Location: register.php?error=invalidEmail&username=".$username );
				echo 'Invalid Email type. Try again.';
				//exit();
			}
			else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) ){
			//	header("Location: register.php?error=invalidEmail&email=".$email );
				//exit();
			}
			else if($password !== $passwordRepeat){
				//header("Location: register.php?error=passwordDoNOTmatch&username=".$username . "&email=".$email);
				echo 'Passwords do not match. please try again.';
				//exit();
			}
			else{

					$hashPass = password_hash($password, PASSWORD_DEFAULT);
				    $queryTe = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)" ;

				    $statementTe = $db->prepare($queryTe);


	                $statementTe -> bindValue(':username', $username);
	                $statementTe -> bindValue(':email', $email);
	                $statementTe -> bindValue(':password', $hashPass);
				    $statementTe->execute();
				    		// echo $username
				    $email = $_POST['username'];
				    $_SESSION['email'] = $email;
					header("Location: indexHello.php");
					exit();

			}
		

		}

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
	<form method="post" action="register.php">
		<input type="text" name="username" placeholder="username">
		<input type="text" name="email" placeholder="email">
		<input type="password" name="password" placeholder="password">
		<input type="password" name="passwordRepeat" placeholder="passwordRepeat">
		<button type="submit" name="submit">sign-up</button>
	</form>
</div>

	<h1><a href="index.php"> back</h1>
</body>
</html>