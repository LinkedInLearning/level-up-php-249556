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
  
?>

<pre><?php var_dump( count_words( 'transcript.txt' ) ); ?></pre>