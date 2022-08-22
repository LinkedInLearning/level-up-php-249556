<?php 
function process_form() {
	foreach( $_POST as $label => $value ) {
		if ( 'submit' !== $label ) {
			echo '<p><b>' . ucfirst( $label ) . '</b>: ' . $value . '</p>';
		}
	}
} 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Process Form with Cookies</title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<?php 
				if ( isset( $_POST['submit'] ) ) {
					process_form();
				}
			?>
			<form name="contact" method="POST">
				<div>
					<label for="name">Name:</label>
					<input type="text" name="name" placeholder="What's Your Name?""/>
				</div>
				<div>
					<label for="email">Email:</label>
					<input type="email" name="email" placeholder="What's Your Email?" />
				</div>
				<div>
					<label for="message">Your Message:</label>
					<textarea name="message"></textarea>
				</div>
				<div><input type="submit" name="submit" value="Send Message" /></div>
			</form>	
		</main>
	</body>
</html>