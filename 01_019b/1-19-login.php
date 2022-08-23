<?php 
	include_once( 'generate-file.php' ); 
	
	function login($username, $password) {
		// Challenge: define this function

	}
	
	if ( isset( $_POST['submit'] ) ) {
		// Process login form here
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<!--Don't forget the welcome message!-->
			<form name="login" method="POST">
				<div>
					<label for="username">Username:</label>
					<input type="text" name="username" />
				</div>
				<div>
					<label for="password">Password:</label>
					<input type="password" name="password" />
				</div>
				<div>
						<input type="submit" name="submit" value="Submit" />
				</div>
			</form>	
		</main>
	</body>
</html>