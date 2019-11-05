<?php
	define('ADMIN_LOGIN','user');
	define('ADMIN_PASSWORD','pass');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/error.css">
</head>
<body>
<div id= special>
			<?php 
	if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
		|| ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN)
		|| ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) {
		header('HTTP/1.1 401 Unauthorized');
		header('WWW-Authenticate: Basic realm="Our Blog"');
		exit("Access Denied: Username and password required.");
	}   
?>	
</div>

	


</body>
</html>
