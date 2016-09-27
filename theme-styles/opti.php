<?php
/**
 * Theme: Opti
 * Theme Url:
 *
 * @package: styleguide
 */

$css = <<<CSS
	html, body, input, input.text, textarea,
	nav, .postmetadata, .wp-caption {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	h1, h2, h3, h4, h5, .headlines a, nav, .postmetadata, .wp-caption,
	header h1,
	header h3 a,
	h2#description {
		font-family: {{font-headers}};
		font-weight: {{font-headers-weight}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => '',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => '',
			),
		),
		'css' => $css,
	)
);
