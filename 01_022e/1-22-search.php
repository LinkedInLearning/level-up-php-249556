<?php
  function search_page( $term ) {
    $page = 'content.html'; 
    $content = file_get_contents( $page );
    $content = strtolower( strip_tags( $content ) );
    $needle = strpos( $content, $term );

    if( false !== $needle ) {
      return substr( $content, $needle-31, 62 ); // return the preceeding, and succeeding 30 characters
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