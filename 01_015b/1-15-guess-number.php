<?php 

function generate_number() {
	//Fill this out
} 

function check_guess() {
	// Fill this out
}

function test_game() {
	echo '<pre>Test Data <br/>';
	echo '<b>Number to Guess: ' . $_COOKIE['guess_this'] . '</b> <br/>';
	echo '<b>Guessed Number: ' . $_POST['guess'] . '</b>';
	echo '</pre>';
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
			<!---Place the guess feedback / messages here-->
			<form name="guess" method="POST">
					<input type="number" name="guess" min="0" max="50" placeholder="Enter your guess" />
					<input type="submit" name="submit" value="Make Your Guess!" />
			</form>	
		</main>
	</body>
</html>