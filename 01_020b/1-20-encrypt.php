<?php

function encrypt_string( $str ) {
	// Challenge: define this function
}

function decrypt_string( $hash ) {
	// Challenge: define this function
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Encrypt / Decrypt</title>
	<meta name="author" value="Joe Casabona" />
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<main>
		<?php 
		if ( isset( $_POST['string'] ) ) {
			$encrpyted_string = encrypt_string( $_POST['string'] );
			$decrypted_string = decrypt_string( $encrpyted_string );
			
			if ( $decrypted_string === $_POST['string'] ) {
				echo "<h3>You successfully encrypted and decrypted $decrypted_string</h3>";
			}
		}
		?>
		<form name="secret" method="POST">
			<div>
				<label for="name">String to Encrypt:</label>
				<input type="text" name="string" placeholder="Keep it Secret, Keep it Safe" />
			</div>
			<div><input type="submit" name="submit" value="Encrypt" /></div>
		</form>	
	</main>
</body>
</html>