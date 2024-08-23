<?php
	include_once( 'namespace.calculator.php' );

	function process_form() {
		$numbers = trim(str_ireplace(' ', '', $_POST['numbers'] ) );
		$numbers = explode( ',', $numbers );

		switch ( strtolower( $_POST['submit'] ) ) {
			case 'add':
				return calculator\add($numbers);
				break;
			case 'multiply':
				return calculator\multiply($numbers);
				break;
			case 'average':
				return calculator\average($numbers);
			default:
				return $_POST['numbers'];
				break;
		}

		return $_POST['numbers'];
	} 
	
	?>
	
	<!DOCTYPE html>
	<html>
		<head>
			<title>Calculator</title>
			<meta name="author" value="Joe Casabona" />
			<link rel="stylesheet" href="style.css" />
		</head>
		<body>
			<main>
				<?php 
					if ( isset( $_POST['submit'] ) ) {
						$result  = process_form();
					} 
				?>
				<form name="array-calc" method="POST">
					<div>
						<label for="numbers">Numbers (comma separated, no spaces):</label>
						<input type="text" name="numbers" placeholder="1,1,2,3,5,8,13" value="<?php if (isset($result)) echo $result; ?>" />
					</div>
					<div>
							<input type="submit" name="submit" value="Add" />
							<input type="submit" name="submit" value="Multiply" />
							<input type="submit" name="submit" value="Average" />
							<button name="clear" value="Clear" onpress="this.numbers.value='';">Clear All</button>
					</div>
				</form>	
			</main>
		</body>
	</html>