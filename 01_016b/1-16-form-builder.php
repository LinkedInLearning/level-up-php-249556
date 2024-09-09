<?php 

function required( $field ) {
	if( isset( $field['required'] ) && true == $field['required'] ) {
		return 'required';
	}

	return '';
}

function value( $filed ) {
	if( isset( $field['value'] ) ) {
		return 'value="'. $field['value'] . '"';
	}

	return '';
}

function build_form( $form ) {
	$markup = '<form name="'. $form['name'] . '" method="' . $form['method'] . '"';
	if( isset( $form['action'] ) ) {
		$markup .= 'action="' . $form['action'] . '"';
	}
	$markup .= '>';

	$format_basic = '<input type="%1$s" name="%2$s: %3$s %4$s %5$s />'; 

	foreach( $form['fields'] as $id => $field ) {
		$markup .= '<div id="'. $id . '">'. "\r\n\t";

		if( 'submit' != $field['type'] ) {
			$markup .= '<label for="' . $id . '">' . $field['label'] . '</label>' . "\r\n";
		}

		$placeholder = ( isset( $field['placeholder'] ) ) ? 'placeholder="' . $field['placeholder'] . '" ' : '';

		switch( $field['type'] ) {
			case 'select':
				$markup .= '<select name="' . $id . '">' . "\r\n\t\t"; 
				foreach( $field['options'] as $option ) {
					$markup .= '<option value="' . $option . '">' . $option . '</option>' . "\r\n\t\t";
				}
				$markup .= '</select>';
				break;
			case 'textbox': 
				$markup .= '<textarea name="' . $id . '"></textarea>';
				break;
			case 'radio':
				foreach( $field['options'] as $option ) {
					$markup .= '<input type="'. $field['type'] .'" id="' . $id . '" value="' . $option .'"><label for="' . $option . '">' . $option . '</label>';
				}
				break;
			case 'checkbox':
				if( isset( $field['options'] ) ) {
					foreach( $field['options'] as $option ) {
						$markup .= '<input type="'. $field['type'] .'" id="' . $id . '[]" value="' . $option .'"><label for="' . $option . '">' . $option . '</label>';
					}
				} else {
					$markup .= '<input type="'. $field['type'] .'" id="' . $id . '" value="' . $field['value'] .'">';
				}
				break;
			default: 
				$markup .= sprintf( $format_basic, 
					$field['type'], 
					$id,
					$placeholder, 
					value( $field ), 
					required( $field )
			);
		}
		$markup .= "</div>\r\n";
	}
	$markup .= '</form>';

	return $markup;
}

require_once( 'define-form.php' );

echo build_form( $form ); 
