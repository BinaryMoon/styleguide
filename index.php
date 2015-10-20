<?php
/*
	Plugin Name: Styleguide - Custom Fonts and Colours
	Plugin URI: http://wordpress.org/plugins/styleguide/
	Description: Easily customise the theme fonts and colours that you use on your website.
	Version: 1.4.3
	Author: BinaryMoon
	Author URI: http://prothemedesign.com/
	License: GPLv2 or later
	Text Domain: styleguide
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Wishlist
 *
 * style templates
 * allow fonts that aren't in the font list (to support themes with default fonts)
 * add italic option for fonts
 * add intelligent defaults for properties
 * check if the color control already exists and if not create it
 * behave better when there's already defined colours (eg with Twenty Fifteen)
 * remove rules containing handlebars (ie with no property set)
 */


include_once( 'includes/fonts.php' );

include_once( 'includes/class.styleguide.php' );

include_once( 'includes/helpers.php' );