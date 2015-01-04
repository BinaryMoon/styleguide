<?php
/**
 * Theme: Twenty Eleven
 * Theme Url: https://wordpress.org/themes/twentyeleven
 */

$css = <<<CSS
	body {
		font-family: {{font-body}};
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-headers}};
	}
CSS;

add_theme_support( 'styleguide', array(
	'fonts' => array(
		'headers' => array(
			'label' => __( 'Header Font', 'styleguide' ),
			'default' => 'Helvetica',
		),
		'body' => array(
			'label' => __( 'Body Font', 'styleguide' ),
			'default' => 'Helvetica',
		),
	),
	'css' => $css,
) );