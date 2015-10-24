<?php
/**
 * Theme: Twenty Twelve
 * Theme Url: https://wordpress.org/themes/twentytwelve
 *
 * @package: styleguide
 */

$css = <<<CSS
	body, body.custom-font-enabled {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-headers}};
		font-weight: {{font-headers-weight}};
	}
	a {
		color: {{color-link-bg-0}};
	}
	a:hover {
		color: {{color-link-bg-1}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'link' => array(
				'label' => __( 'Link Color', 'styleguide' ),
				'default' => '#21759b',
			),
		),
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
		'dequeue' => array(
			'twentytwelve-fonts',
		),
	)
);
