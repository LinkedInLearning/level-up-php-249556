<?php
	//Assume Ace is high card.
	$values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A' ];
	$suits = ['C', 'D', 'H', 'S']; // Club, Diamond, Heart, Spade

	$p1_value_index = rand(0, sizeof($values) - 1 );
	$p2_value_index = rand(0, sizeof($values) - 1 );
	$p1_suit_index = rand(0, sizeof($suits) - 1 );
	$p2_suit_index = rand(0, sizeof($suits) - 1 );

	$p1_card = $values[$p1_value_index] . $suits[$p1_suit_index];
	$p2_card = $values[$p2_value_index] . $suits[$p2_suit_index];

	$cards = "<p>Player One has $p1_card. Player Two has $p2_card. ";

	if( $p1_value_index > $p2_value_index ) { 
		$winner = "Player One wins!";
	} else if( $p2_value_index > $p1_value_index ) {
		$winner = "Player Two wins!"; 
	} else {
		$winner = "It's a draw!";
	}

	echo $cards . $winner . "</p>";
?>

<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Play again?</a></p>