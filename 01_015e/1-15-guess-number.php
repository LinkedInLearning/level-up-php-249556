<?php 

function generate_number() {
	if ( ! isset( $_COOKIE['guess_this'] ) || is_null( $_COOKIE['guess_this'] ) ) {
		setcookie( 'guess_this', rand(0,50) );
	}
} 

function check_guess() {
	if ( $_COOKIE['guess_this'] == $_POST['guess'] ) {
		setcookie( 'guess_this', null, time()-3600 );
		return 'correct';
	} else if ( $_COOKIE['guess_this'] > $_POST['guess'] ) {
		return 'higher';
	}

	return 'lower';
}

function test_game() {
	echo '<pre>Test Data <br/>';
	echo '<b>Number to Guess: ' . $_COOKIE['guess_this'] . '</b> <br/>';
	echo '<b>Guessed Number: ' . $_POST['guess'] . '</b>';
	echo '</pre>';
}

if ( isset( $_POST['guess'] ) && isset( $_COOKIE['guess_this'] ) ) {
	$guessed = check_guess();
}

generate_number(); //This call will generate the number and store it in a cookie! 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Guess a Number! </title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<?php 
				switch ($guessed) {
					case 'correct':
						echo '<h3>You Guessed right! Congrats!</h3>';
						echo '<p>Feel free to <a href="'. $_FILES['self'] . '">play again</a>.</p>';
						break;
					case 'higher':
						echo '<p>Higher</p>';
						break;
					case 'lower':
						echo '<p>Lower</p>';
						break;
				}

				if ( 'correct' !== $guessed ) :
			?>
			<form name="guess" method="POST">
					<input type="number" name="guess" min="0" max="50" placeholder="Enter your guess" />
					<input type="submit" name="submit" value="Make Your Guess!" />
			</form>	
			<?php endif; ?>
		</main>
	</body>
</html>