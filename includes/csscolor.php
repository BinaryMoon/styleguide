<?php
/**
 * Class for creating readable colour schemes
 *
 * @package Styleguide
 */

/*
  csscolor.php
  Copyright 2004 Patrick Fitzgerald
  http://www.barelyfitz.com/projects/csscolor/

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */


define( 'CSS_COLOR_ERROR', 100 );

class CSS_Color {

	// $this->bg = array of CSS color values
	// $this->bg[0] is the bg color
	// $this->bg['+1'..'+5'] are lighter colors
	// $this->bg['-1'..'-5'] are darker colors
	var $bg = array( );
	// $this->fg = array of foreground colors.
	// Each color corresponds to a background color.
	var $fg = array( );
	// store complementary colours based upon initial values
	var $bgc = '';
	var $fgc = '';
	// brightDiff is the minimum brightness difference
	// between the background and the foreground.
	// Note: you should not change this directly,
	// instead use setBrightDiff() and getBrightDiff()
	var $minBrightDiff = 125;
	// colorDiff is the minimum color difference
	// between the background and the foreground.
	// Note: you should not change this directly,
	// instead use setColorDiff() and getColorDiff()
	var $minColorDiff = 100;

	/**
	 *
	 * @param <type> $bgHex
	 * @param <type> $fgHex
	 */
	function CSS_Color( $bgHex, $fgHex = '' ) {

		// make colours valid (ANY colour!)
		$bgHex = $this->formatColor( $bgHex );
		$fgHex = $this->formatColor( $fgHex );

		// This is the constructor method for the class,
		// which is called when a new object is created.
		// Initialize this PEAR object so I can
		// use the PEAR error return mechanism
		// Initialize the palette
		$this->setPalette( $bgHex, $fgHex );
		$this->bgc = $this->complementary( $bgHex );
		$this->fgc = $this->complementary( $fgHex );

	}

	/**
	 *
	 * @param <type> $bgHex
	 * @param <type> $fgHex
	 * @return <type>
	 */
	function setPalette( $bgHex, $fgHex = '' ) {

		// Initialize the color palettes
		// If a foreground color was not specified,
		// just use the background color.
		if ( !$fgHex ) {
			$fgHex = $bgHex;
		}

		// make colours valid (ANY colour!)
		$bgHex = $this->formatColor( $bgHex );
		$fgHex = $this->formatColor( $fgHex );

		// Clear the existing palette
		$this->bg = array( );
		$this->fg = array( );

		// Make sure we got a valid hex value
		if ( !$this->isHex( $bgHex ) ) {
			$this->displayError( 'background color "' . $bgHex . '" is not a hex color value', __FUNCTION__, __LINE__ );
			return false;
		}

		// Set the bg color
		$this->bg[0] = $bgHex;

		$this->bg['+1'] = $this->lighten( $bgHex, .85 );
		$this->bg['+2'] = $this->lighten( $bgHex, .75 );
		$this->bg['+3'] = $this->lighten( $bgHex, .5 );
		$this->bg['+4'] = $this->lighten( $bgHex, .25 );
		$this->bg['+5'] = $this->lighten( $bgHex, .1 );

		$this->bg['-1'] = $this->darken( $bgHex, .85 );
		$this->bg['-2'] = $this->darken( $bgHex, .75 );
		$this->bg['-3'] = $this->darken( $bgHex, .5 );
		$this->bg['-4'] = $this->darken( $bgHex, .25 );
		$this->bg['-5'] = $this->darken( $bgHex, .1 );

		// Make sure we got a valid hex value
		if ( !$this->isHex( $fgHex ) ) {
			$this->displayError( 'background color "' . $bgHex . '" is not a hex color value', __FUNCTION__, __LINE__ );
			return false;
		}

		// Set up the foreground colors
		$this->fg[0] = $this->calcFG( $this->bg[0], $fgHex );
		$this->fg['+1'] = $this->calcFG( $this->bg['+1'], $fgHex );
		$this->fg['+2'] = $this->calcFG( $this->bg['+2'], $fgHex );
		$this->fg['+3'] = $this->calcFG( $this->bg['+3'], $fgHex );
		$this->fg['+4'] = $this->calcFG( $this->bg['+4'], $fgHex );
		$this->fg['+5'] = $this->calcFG( $this->bg['+5'], $fgHex );
		$this->fg['-1'] = $this->calcFG( $this->bg['-1'], $fgHex );
		$this->fg['-2'] = $this->calcFG( $this->bg['-2'], $fgHex );
		$this->fg['-3'] = $this->calcFG( $this->bg['-3'], $fgHex );
		$this->fg['-4'] = $this->calcFG( $this->bg['-4'], $fgHex );
		$this->fg['-5'] = $this->calcFG( $this->bg['-5'], $fgHex );
	}

	/**
	 *
	 * @param <type> $hex
	 * @return <type>
	 */
	function formatColor( $hex ) {

		$hex = strtolower( $hex );
		$hex = str_replace( '#', '', $hex );
		$hex = preg_replace( '/[g-z]/', 'f', $hex );
		$hex = substr( $hex, 0, 6 );

		if ( strlen( $hex ) <= 3 ) {
			$hex = str_pad( $hex, 3, 0, STR_PAD_RIGHT );
		} else {
			$hex = str_pad( $hex, 6, 0, STR_PAD_RIGHT );
		}

		return $hex;
	}

	/**
	 *
	 * @param <type> $hex
	 * @param <type> $percent
	 * @return <type>
	 */
	function lighten( $hex, $percent ) {
		return $this->mix( $hex, $percent, 255 );
	}

	/**
	 *
	 * @param <type> $hex
	 * @param <type> $percent
	 * @return <type>
	 */
	function darken( $hex, $percent ) {
		return $this->mix( $hex, $percent, 0 );
	}

	/**
	 *
	 * @param <type> $hex
	 * @param <type> $percent
	 * @param <type> $mask
	 * @return <type>
	 */
	function mix( $hex, $percent, $mask ) {

		// Make sure inputs are valid
		if ( !is_numeric( $percent ) || $percent < 0 || $percent > 1 ) {
			$this->displayError( 'percent=' . $percent . ' is not valid', __FUNCTION__, __LINE__ );
			return false;
		}

		if ( !is_int( $mask ) || $mask < 0 || $mask > 255 ) {
			$this->displayError( 'mask=' . $mask . ' is not valid', __FUNCTION__, __LINE__ );
			return false;
		}

		$rgb = $this->hex2RGB( $hex );
		if ( !is_array( $rgb ) ) {
			// hex2RGB will raise an error
			return false;
		}

		for ( $i = 0; $i < 3; $i++ ) {
			$rgb[$i] = round( $rgb[$i] * $percent ) + round( $mask * (1 - $percent) );

			// In case rounding up causes us to go to 256
			if ( $rgb[$i] > 255 ) {
				$rgb[$i] = 255;
			}
		}

		return $this->RGB2Hex( $rgb );
	}

	/**
	 *
	 * @param <type> $hex
	 * @return <type>
	 */
	function hex2RGB( $hex ) {

		// Given a hex color (rrggbb or rgb),
		// returns an array (r, g, b) with decimal values
		// If $hex is not the correct format,
		// returns false.
		//
		// example:
		// $d = hex2RGB('#abc');
		// if (!$d) { error }
		// Regexp for a valid hex digit
		$d = '[a-fA-F0-9]';

		// Make sure $hex is valid
		if ( preg_match( "/^($d$d)($d$d)($d$d)\$/", $hex, $rgb ) ) {

			return array(
				hexdec( $rgb[1] ),
				hexdec( $rgb[2] ),
				hexdec( $rgb[3] )
			);
		}

		if ( preg_match( "/^($d)($d)($d)$/", $hex, $rgb ) ) {

			return array(
				hexdec( $rgb[1] . $rgb[1] ),
				hexdec( $rgb[2] . $rgb[2] ),
				hexdec( $rgb[3] . $rgb[3] )
			);
		}

		$this->displayError( 'cannot convert hex "' . $hex . '" to RGB', __FUNCTION__, __LINE__ );

		return false;
	}

	/**
	 *
	 * @param <type> $rgb
	 * @return string
	 */
	function RGB2Hex( $rgb ) {

		// Given an array(rval,gval,bval) consisting of
		// decimal color values (0-255), returns a hex string
		// suitable for use with CSS.
		// Returns false if the input is not in the correct format.
		// Example:
		// $h = RGB2Hex(array(255,0,255));
		// if (!$h) { error };
		// Make sure the input is valid
		if ( !$this->isRGB( $rgb ) ) {
			$this->displayError( 'RGB value is not valid', __FUNCTION__, __LINE__ );
			return false;
		}

		$hex = '';

		for ( $i = 0; $i < 3; $i++ ) {

			// Convert the decimal digit to hex
			$hexDigit = dechex( $rgb[$i] );

			// Add a leading zero if necessary
			if ( strlen( $hexDigit ) == 1 ) {
				$hexDigit = '0' . $hexDigit;
			}

			// Append to the hex string
			$hex .= $hexDigit;
		}

		// Return the complete hex string
		return $hex;
	}

	/**
	 *
	 * @param <type> $hex
	 * @return <type>
	 */
	function isHex( $hex ) {
		// Returns true if $hex is a valid CSS hex color.
		// The "#" character at the start is optional.
		// Regexp for a valid hex digit
		$d = '[a-fA-F0-9]';

		// Make sure $hex is valid
		if ( preg_match( "/^#?$d$d$d$d$d$d\$/", $hex ) ||
				preg_match( "/^#?$d$d$d\$/", $hex ) ) {
			return true;
		}
		return false;
	}

	/**
	 *
	 * @param <type> $rgb
	 * @return <type>
	 */
	function isRGB( $rgb ) {

		// Returns true if $rgb is an array with three valid
		// decimal color digits.

		if ( !is_array( $rgb ) || count( $rgb ) != 3 ) {
			return false;
		}

		for ( $i = 0; $i < 3; $i++ ) {

			// Get the decimal digit
			$dec = intval( $rgb[$i] );

			// Make sure the decimal digit is between 0 and 255
			if ( !is_int( $dec ) || $dec < 0 || $dec > 255 ) {
				return false;
			}
		}

		return true;
	}


	/**
	 * get a complementary colour from a given hex value
	 */
	function complementary( $hex ) {

		$rgb = $this->hex2RGB( $hex );

		$rgb[0] = 255 - $rgb[0];
		$rgb[1] = 255 - $rgb[1];
		$rgb[2] = 255 - $rgb[2];

		return $this->RGB2Hex( $rgb );

	}


	/**
	 *
	 * @param <type> $bgHex
	 * @param <type> $fgHex
	 * @return <type>
	 */
	function calcFG( $bgHex, $fgHex ) {

		// Given a background color $bgHex and a foreground color $fgHex,
		// modifies the foreground color so it will have enough contrast
		// to be seen against the background color.
		//
		// The following parameters are used:
		// $this->minBrightDiff
		// $this->minColorDiff
		// Loop through brighter and darker versions
		// of the foreground color.
		// The numbers here represent the amount of
		// foreground color to mix with black and white.
		foreach ( array( 1, 0.75, 0.5, 0.25, 0 ) as $percent ) {

			$darker = $this->darken( $fgHex, $percent );
			$lighter = $this->lighten( $fgHex, $percent );

			$darkerBrightDiff = $this->brightnessDiff( $bgHex, $darker );
			$lighterBrightDiff = $this->brightnessDiff( $bgHex, $lighter );

			if ( $lighterBrightDiff > $darkerBrightDiff ) {
				$newFG = $lighter;
				$newFGBrightDiff = $lighterBrightDiff;
			} else {
				$newFG = $darker;
				$newFGBrightDiff = $darkerBrightDiff;
			}
			$newFGColorDiff = $this->colorDiff( $bgHex, $newFG );

			if ( $newFGBrightDiff >= $this->minBrightDiff && $newFGColorDiff >= $this->minColorDiff ) {
				break;
			}
		}

		return $newFG;
	}

	/**
	 *
	 * @return <type>
	 */
	function getMinBrightDiff() {
		return $this->minBrightDiff;
	}

	/**
	 *
	 * @param <type> $b
	 * @param <type> $resetPalette
	 */
	function setMinBrightDiff( $b, $resetPalette = true ) {
		$this->minBrightDiff = $b;
		if ( $resetPalette ) {
			$this->setPalette( $this->bg[0], $this->fg[0] );
		}
	}

	/**
	 *
	 * @return <type>
	 */
	function getMinColorDiff() {
		return $this->minColorDiff;
	}

	/**
	 *
	 * @param <type> $d
	 * @param <type> $resetPalette
	 */
	function setMinColorDiff( $d, $resetPalette = true ) {
		$this->minColorDiff = $d;
		if ( $resetPalette ) {
			$this->setPalette( $this->bg[0], $this->fg[0] );
		}
	}

	/**
	 *
	 * @param <type> $hex
	 * @return <type>
	 */
	function brightness( $hex ) {
		// Returns the brightness value for a color,
		// a number between zero and 178.
		// To allow for maximum readability, the difference between
		// the background brightness and the foreground brightness
		// should be greater than 125.

		$rgb = $this->hex2RGB( $hex );
		if ( !is_array( $rgb ) ) {
			// hex2RGB will raise an error
			return false;
		}

		return( (($rgb[0] * 299) + ($rgb[1] * 587) + ($rgb[2] * 114)) / 1000 );
	}

	/**
	 *
	 * @param <type> $hex1
	 * @param <type> $hex2
	 * @return <type>
	 */
	function brightnessDiff( $hex1, $hex2 ) {
		// Returns the brightness value for a color,
		// a number between zero and 178.
		// To allow for maximum readability, the difference between
		// the background brightness and the foreground brightness
		// should be greater than 125.

		$b1 = $this->brightness( $hex1 );
		$b2 = $this->brightness( $hex2 );
		if ( is_bool( $b1 ) || is_bool( $b2 ) ) {
			return false;
		}
		return abs( $b1 - $b2 );
	}

	/**
	 *
	 * @param <type> $hex1
	 * @param <type> $hex2
	 * @return <type>
	 */
	function colorDiff( $hex1, $hex2 ) {
		// Returns the contrast between two colors,
		// an integer between 0 and 675.
		// To allow for maximum readability, the difference between
		// the background and the foreground color should be > 500.

		$rgb1 = $this->hex2RGB( $hex1 );
		$rgb2 = $this->hex2RGB( $hex2 );

		if ( !is_array( $rgb1 ) || !is_array( $rgb2 ) ) {
			// hex2RGB will raise an error
			return -1;
		}

		$r1 = $rgb1[0];
		$g1 = $rgb1[1];
		$b1 = $rgb1[2];

		$r2 = $rgb2[0];
		$g2 = $rgb2[1];
		$b2 = $rgb2[2];

		return (abs( $r1 - $r2 ) + abs( $g1 - $g2 ) + abs( $b1 - $b2 ));
	}

	/**
	 *
	 */
	function displaySwatches() {

		echo '<div style="background:#000; padding:1px; height:25px; width:275px;">';

		for ( $i = -5; $i <= 5; $i++ ) {
			$j = (string) $i;
			if ( $j > 0 ) {
				$j = '+' . $j;
			}
			echo '<div style="background:#' . $this->bg[$j] . '; float:left; line-height:25px; text-align:center; width:25px;">';
			echo '<strong style="color:#' . $this->fg[$j] . '; font-size:11px; font-weight:bold;">' . $j . '</strong>';
			echo '</div>';
		}

		echo '</div>';
	}

	/**
	 *
	 * @param <type> $errorMessage
	 * @param <type> $functionName
	 * @param <type> $line
	 */
	function displayError( $errorMessage, $functionName, $line ) {

		echo '<pre><strong>' . $functionName . ' [' . $line . ']</strong><br />' . $errorMessage . '</pre>';
	}

}