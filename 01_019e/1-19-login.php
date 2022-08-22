<?php 
	include_once( 'generate-file.php' ); 
	
	function login($username, $password) {
		$logins = file_get_contents('logins.txt');
		$logins = explode( "\n", $logins );

		foreach ($logins as $login) {
			$login = explode( ',', $login );
			if( $username == $login[0] && password_verify( $password, $login[1] ) ) {
				setcookie( 'loggedin', true );
				$_COOKIE['loggedin'] = true;
				setcookie( 'username', $username );
				$_COOKIE['username'] = $username;
				return true;
			}
		}

		setcookie( 'loggedin', false, time()-3600 );
		$_COOKIE['loggedin'] = false;
		setcookie( 'username', '', time()-3600 );
		echo '<h4>Username and/or Password Incorrect</h4>';
		return false;

	}
	
	if ( isset( $_POST['submit'] ) ) {
		$logged_in = login( strtolower( trim($_POST['username'])), trim($_POST['password']));
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<main>
			<?php
				if ( $_COOKIE['loggedin'] ) {
					echo '<h2>Welcome, ' . $_COOKIE['username'] . '</h2>';
				}
			?>
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