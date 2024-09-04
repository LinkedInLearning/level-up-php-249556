<?php
  function count_words( $file ) {
    $content = file_get_contents( $file );
    $content = strtolower( preg_replace("#[[:punct:]]#", "", $content) ); //Normalize, Remove Punctuation
    $stop_words = [ 'a', 'an', 'and', 'is', 'the', 'uh', 'umm' ];
    $content = preg_replace('/\b('.implode('|',$stop_words).')\b/','',$content); //Remove stop words
    $words = explode(" ", $content);
    $counter = array();
    
    foreach( $words as $word ) {
      if ( ! empty( $word ) ) {
        if( array_key_exists( $word, $counter ) ) {
          $counter[$word]++;
        } else {
          $counter[$word] = 1;
        }
      }
    }

    arsort( $counter );
    return $counter;
    
  }

$words = count_words( 'transcript.txt' );

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
						<th>Count</th>
					</thead>
					<tbody>
						<?php
							$format = '<tr><td>%1$s</td><td>%2$s</td></tr>';
							foreach( $words as $word => $count ) {
								printf( $format, 
									$word, 
									$count
								);
							}
						?>
					</tbody>
				</table>
    </body>
</html>


