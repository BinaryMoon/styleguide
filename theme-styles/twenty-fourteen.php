<?php
/**
 * Theme: Twenty Fourteen
 * Theme Url: https://wordpress.org/themes/twentyfourteen
 *
 * @package: styleguide
 */

$css = <<<CSS
	body {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-headers}};
		font-weight: {{font-headers-weight}};
	}
	a {
		color: {{color-key-fg-0}};
	}
	.entry-title a:hover,
	.entry-meta a:hover,
	.featured-content a:hover,
	a:hover {
		color: {{color-key-bg+1}};
	}
	.search-toggle {
		background-color: {{color-key-bg-0}};
	}
	.search-toggle:before {
		color: {{color-key-fg-0}};
	}
	.search-toggle:hover {
		background-color: {{color-key-bg+1}};
	}
	.search-toggle:before:hover {
		color: {{color-key-fg+1}};
	}
	button, .button, input[type="button"], input[type="reset"], input[type="submit"],
	.primary-navigation li:hover > a, .primary-navigation li.focus > a,
	.primary-navigation ul ul,
	.secondary-navigation li:hover > a, .secondary-navigation li.focus > a,
	.secondary-navigation ul ul {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	.entry-meta .tag-links a:hover,
	button:hover, .button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,
	.primary-navigation ul ul a:hover, .primary-navigation ul ul li.focus > a,
	.secondary-navigation ul ul a:hover, .secondary-navigation ul ul li.focus > a {
		background-color: {{color-key-bg+1}};
		color: {{color-key-fg+1}};
	}
	.entry-meta .tag-links a:hover:before {
		border-right-color: {{color-key-bg+1}};
	}
	.page-links a:hover {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
		border-color: {{color-key-bg-0}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => 'Lato',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Lato',
			),
		),
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#24890d',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'twentyfourteen-lato',
		),
	)
);
