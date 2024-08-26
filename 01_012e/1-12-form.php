<?php 
function process_form() { 
	$file_content = '';
	$file_content .= date("Y-m-d H:i:s") . "\r\n"; //Add current date and time. 

	foreach( $_POST as $label => $value ) {
		$label = str_replace('_', ' ', $label );
		if ( 'submit' !== $label ) {
			if ( 'content consumed' !== $label ) {
				$file_content .= ucfirst( $label ) . ': ' . $value . "\r\n";
			} else {
				$file_content .= ucfirst( $label ) . ': ' . implode(', ', $value) . "\r\n";
			}
		}
	}

	$file_content .= "--------------- \r\n\r\n";
	if ( false !== file_put_contents('form-info.txt', $file_content, FILE_APPEND | LOCK_EX) ) {
		echo "<h4>Your entry has been recorded!</h4>";
	} else {
		echo "<h4>Hmmm. There was an error saving your entry.</h4>";
	}
} 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Save Form to a File</title>
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
					<label for="type_of_message">Type of Message:</label>
					<select name="type_of_message" id="type_of_message">
						<option value="Question">Question</option>
						<option value="Comment">Comment</option>
						<option value="Concern">Concern</option>
						<option value="Something Else">Something Else</option>
					</select>
				</div>
				<div>
					<label for="message">Your Message:</label>
					<textarea name="message"></textarea>
				</div>
				<div>
					<label for="heard_about">How did you hear about us?</label><br>
					<input type="radio" id="podcast" name="heard_about" value="podcast">
					<label for="podcast">Podcast</label><br>
					<input type="radio" id="newsletter" name="heard_about" value="newsletter">
					<label for="newsletter">Newsletter</label><br>
					<input type="radio" id="youtube" name="heard_about" value="youtube">
					<label for="youtube">YouTube</label><br>
					<input type="radio" id="social_media" name="heard_about" value="social_media">
					<label for="social_media">Social Media</label><br>
					<input type="radio" id="something_else" name="heard_about" value="something_else">
					<label for="something_else">Something Else</label><br>
				</div>
				<div>
					<label for="content_consumed">What type of content have you consumed?</label><br>
					<input type="checkbox" id="podcast" name="content_consumed[]" value="podcast">
					<label for="podcast">Podcast</label><br>
					<input type="checkbox" id="newsletter" name="content_consumed[]" value="newsletter">
					<label for="newsletter">Newsletter</label><br>
					<input type="checkbox" id="youtube" name="content_consumed[]" value="youtube">
					<label for="youtube">YouTube</label><br>
					<input type="checkbox" id="social_media" name="content_consumed[]" value="social_media">
					<label for="social_media">Social Media</label><br>
					<input type="checkbox" id="something_else" name="content_consumed[]" value="something_else">
					<label for="something_else">Something Else</label><br>
				</div>

				<div>
					<input type="checkbox" value="true" name="join_mailing_list"><label for="join_mailing_list">Join the Mailing List?</label>
				</div>
				<div><input type="submit" name="submit" value="Send Message" /></div>
			</form>	
		</main>
	</body>
</html>