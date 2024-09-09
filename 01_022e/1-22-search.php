<?php
  function search_page( $term ) {
    $page = 'content.html'; 
		$content = file_get_contents( $page ); 
		$content = strtolower( strip_tags( $content ) ); 
		$needle = strpos( $content, strtolower( $term ) );

		if( false !== $needle ) {
			return substr( $content, $needle-50, strlen($term)+100 );
		}

		return "Nothing found.";
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page Search</title>
        <meta name="author" value="Joe Casabona" />
    </head>
    <body>
        <?php
          if( isset( $_GET['search'] ) ) {
           echo search_page( $_GET['search'] );
          }
        ?>
        <form name="page-search" method="GET">
          <div>
            <input type="text" name="search" />
            <input type="submit" name="submit" value="Search" />
          </div>
        </form>
    </body>
</html>