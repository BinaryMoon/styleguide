<?php
/**
 * Theme:
 * Theme Url:
 *
 * @package: styleguide
 */

$css = <<<CSS
	body {
		font-family: {{font-body}};
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-headers}};
	}
	a {
		color: {{color-key-bg-0}};
	}
	a:hover {
		color: {{color-key-bg-2}};
	}
	blockquote {
		border-color: {{color-key-bg-0}};
	}
	{
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	{
		background-color: {{color-key-bg-2}};
		color: {{color-key-fg-2}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#efb837',
			),
			'link' => array(
				'label' => __( 'Link Color', 'styleguide' ),
				'default' => '#bc360a',
			),
		),
		'color-combos' => array(
			'key-link' => array(
				'foreground' => 'link',
				'background' => 'key',
			),
		),
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => 'Arial',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Source+Sans+Pro',
			),
		),
		'css' => $css,
		'dequeue' => array(),
	)
);
