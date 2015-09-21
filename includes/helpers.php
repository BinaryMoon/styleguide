<?php


/**
 * sanitize a hexadecimal colour
 *
 * @param type $color
 * @return string
 */
function styleguide_sanitize_hex_color( $color ) {

	if ( '' === $color ) {
		return '';
	}

	$color = str_replace( '#', '', $color );

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return '#' . $color;
	}

	return null;

}


/**
 * make sure the value returned is in the fonts array
 *
 * @param type $id
 * @return type
 */
function styleguide_sanitize_fonts( $id ) {

	$_fonts = styleguide_fonts();

	if ( isset( $_fonts[ $id ] ) ) {
		return $id;
	}

	return '';

}


/**
 * Sanitize select dropdown
 *
 * @param type $id
 * @return type
 */
function styleguide_sanitize_select( $id ) {

	return esc_html( $id );

}


/**
 * Sanitize font character sets
 *
 * @param string $set
 * @return string
 */
function styleguide_sanitize_character_set( $set ) {

	$sets = styleguide_get_character_sets();

	if ( ! array_key_exists( $set, $sets ) ) {
		$set = '';
	}

	return $set;

}


/**
 * list the available font character sets
 *
 * @return array
 */
function styleguide_get_character_sets() {

	$sets = array(
		'latin' => array(
			'name' => 'Latin',
			'sets' => 'latin,latin-ext',
		),
		'cyrillic' => array(
			'name' => 'Cyrillic',
			'sets' => 'cyrillic,cyrillic-ext',
		),
		'greek' => array(
			'name' => 'Greek',
			'sets' => 'greek,greek-ext',
		),
		'vietnamese' => array(
			'name' => 'Vietnamese',
			'sets' => 'vietnamese',
		),
		'hebrew' => array(
			'name' => 'Hebrew',
			'sets' => 'hebrew',
		),
		'devanagari' => array(
			'name' => 'Devangari',
			'sets' => 'devanagari',
		),
	);

	return $sets;

}