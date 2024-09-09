<?php
function print_info( $info ) {
	echo '<pre>';
	var_dump( $info );
	echo '</pre>';
}

function build_date( $comic ) {
	$month = DateTime::createFromFormat('!m', $comic->month)->format('F');
	return $month . " " . $comic->day . ", " . $comic->year;
}

function get_comic( $id = null ) {
	if ( is_null( $id ) ) {
		return json_decode( file_get_contents( 'https://xkcd.com/info.0.json' ) );
	}

	return json_decode( file_get_contents( 'https://xkcd.com/' . $id . '/info.0.json' ) );
}

$latest = get_comic(); 
$total = $latest->num;

$comic_id = rand(1, $total); 
$comic = get_comic( $comic_id ) ;

?>

<!DOCTYPE html>
<html>
<head>
	<title>REST API for xkcd</title>
	<meta name="author" value="Joe Casabona" />
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<main>
		<h1><?php echo $comic->title; ?>(#<?php echo $comic->num; ?>)</h1>
		<h2>Published on <?php echo build_date( $comic ); ?></h2>
		<figure>
				<img src="<?php echo $comic->img; ?>" alt="<?php echo $comic->alt; ?>" title="<?php echo $comic->title; ?>" />
		</figure>
		<section class="transcript">
			<h3>Transcript / Written Description</h3>
			<?php 
				if( ! empty( $comic->transcript ) ) {
					echo nl2br( $comic->transcript );
				} else {
					echo '<p>'. $comic->alt . '</p>';
				}
			?>
		</section>
	</main>
</body>
</html>