<?php
$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);

function encrypt_string( $str ) {
	global $key;
	$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
	$cipher_text = base64_encode( $nonce . sodium_crypto_secretbox( $str, $nonce, $key ) );
	return $cipher_text;
}

function decrypt_string( $hash ) {
	global $key;
	$decoded = base64_decode( $hash );
	$nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
	$cipher_text = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
	return sodium_crypto_secretbox_open( $cipher_text, $nonce, $key );
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