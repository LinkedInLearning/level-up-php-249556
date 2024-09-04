<?php
  function adjacent_words( $file ) {
    $content = file_get_contents( $file );
    $content = strtolower( preg_replace("#[[:punct:]]#", "", $content) ); //Normalize, Remove Punctuation
    $stop_words = [ 'a', 'an', 'and', 'is', 'the', 'uh', 'umm' ];
    $content = preg_replace('/\b('.implode('|',$stop_words).')\b/','',$content); //Remove stop words

		//remove blank entries, and then get an array with continuous indecies.
    $words = array_values( array_filter( explode(" ", $content) ) );

		for ($i = 0; $i < sizeof( $words ); $i++) {
				$key = $words[$i];
				if ( 0 == $i ) {
					$adjacent[$key][] = $words[$i+1];
				} else if ( sizeof($words) - 1 == $i ) {
					$adjacent[$key][] = $words[$i-1];
				} else {
					$adjacent[$key][] = $words[$i-1];
					$adjacent[$key][] = $words[$i+1];
				}
		}

		return $adjacent;
    
  }

$words = adjacent_words( 'transcript.txt' );

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adjacent Words</title>
        <meta name="author" value="Joe Casabona" />
				<style>
					table {
						margin: 25px auto;
						max-width: 800px;
						border: 1;
						font-size: 1.5em;
					}
					table, th, td {
						border: 1px solid black;
						border-collapse: collapse;
					}

					th, td {
						width: 50%;
						padding: 7px;
					}
				</style>
    </head>
    <body>
        <table>
					<thead>
						<th>Word</th>
						<th>Adjacent Words</th>
					</thead>
					<tbody>
						<?php
							$format = '<tr><td>%1$s</td><td>%2$s</td></tr>';
							foreach( $words as $word => $adjacents ) {
								printf( $format, 
									$word, 
									implode(", ", $adjacents )
								);
							}
						?>
					</tbody>
				</table>
    </body>
</html>


