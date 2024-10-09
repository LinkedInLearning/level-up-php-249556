pl<?php 
function process_form() {
	$email_text = "Hey! Someone filled out the form at $_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] \r\n\n";
	foreach( $_POST as $label => $value ) {
		if ( 'submit' !== $label ) {
			${$label} = $value;
			$email_text .= ucfirst( $label ) . ': ' . $value . "\r\n";
		}
	}

	$to = 'example@email.com';
	$subject = 'Form Sub from ' . $name;

	$headers = 'From: ' . $email . "\r\n" .
		'Reply-To: ' . $email . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail( $to, $subject, $email_text, $headers);
} 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Email Form</title>
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
					<input type="text" name="name" placeholder="What's Your Name?" />
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
