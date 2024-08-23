<?php
function print_info( $info ) {
	echo '<pre>';
	var_dump( $info );
	echo '</pre>';
}

function get_comic( $id = null ) {
	if ( is_null( $id ) ) {
		return json_decode( file_get_contents( 'http://xkcd.com/info.0.json' ) );
	}

	return json_decode( file_get_contents( 'http://xkcd.com/' . $id . '/info.0.json') );
}

$latest = get_comic();

$total = $latest->num;
$comic_id = rand(1, $total);

$comic = get_comic( $comic_id );

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
		<h1><?php echo $comic->title; ?></h1>
		<figure>
			<img src="<?php echo $comic->img; ?>" alt="<?php echo $comic->alt; ?>" title="<?php echo $comic->alt; ?>" />
		</figure>
	</main>
</body>
</html>