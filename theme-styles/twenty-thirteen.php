<?php
/**
 * Theme: Twenty Thirteen
 * Theme Url: https://wordpress.org/themes/twentythirteen
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
	.wp-caption .wp-caption-text,
	.entry-caption,
	.gallery-caption,
	.site {
		background-color: {{color-background-bg-0}};
		color: {{color-background-fg-0}};
	}
	.site a,
	.site a:hover {
		color: {{color-background-link-fg-0}};
	}
	.navbar {
		background: {{color-key-bg+4}};
		color: {{color-key-fg+4}};
	}
	ul.nav-menu ul a:hover,
	.nav-menu ul ul a:hover,
	ul.nav-menu ul a:focus,
	.nav-menu ul ul a:focus {
		background: {{color-key-bg-3}};
	}
	.nav-menu .sub-menu,
	.nav-menu .children {
		border-color: {{color-background-bg-0}};
	}
	.format-aside {
		background-color: {{color-background-bg+1}};
		color: {{color-background-fg+1}};
	}
	.format-aside a {
		color: {{color-background-link-fg+1}};
	}
	.format-quote {
		background-color: {{color-background-bg-2}};
		color: {{color-background-fg-2}};
	}
	.format-quote a {
		color: {{color-background-link-fg-2}};
	}
	.format-audio {
		background-color: {{color-key-bg-2}};
		color: {{color-key-fg-2}};
	}
	.format-audio a {
		color: {{color-key-link-fg-2}};
	}
	.format-video {
		background-color: {{color-key-bg+2}};
		color: {{color-key-fg+2}};
	}
	.format-video a {
		color: {{color-key-link-fg+2}};
	}
	.format-chat {
		background-color: {{color-key-bg+4}};
		color: {{color-key-fg+4}};
	}
	.format-chat a {
		color: {{color-key-link-fg+4}};
	}
	.format-gallery {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	.format-gallery a {
		color: {{color-key-link-fg-0}};
	}
	.format-gallery .entry-meta a, .format-gallery .entry-content a,
	.format-quote .entry-content a, .format-quote .entry-meta a, .format-quote .linked {
		color: {{color-key-link-fg-0}};
	}
	.site-footer {
		background-color: {{color-background-bg-0}};
		color: {{color-background-fg-0}};
	}
	.site-footer a {
		color: {{color-background-link-fg-0}};
	}
	button, input[type="submit"], input[type="button"], input[type="reset"] {
		background: {{color-key-bg-2}};
		color: {{color-key-fg-2}};
		border-color: {{color-key-bg-3}};
	}
	button:hover, input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover {
		background: {{color-key-bg-3}};
		color: {{color-key-fg-3}};
		border-color: {{color-key-bg-4}};
	}
	button:active, input[type="submit"]:active, input[type="button"]:active, input[type="reset"]:active {
		background: {{color-key-bg-4}};
		color: {{color-key-fg-4}};
		border-color: {{color-key-bg-5}};
	}
	button, input, textarea {
		border-color: {{color-background-bg-2}};
	}
	.format-status .entry-content .page-links a,
	.format-gallery .entry-content .page-links a,
	.format-chat .entry-content .page-links a,
	.format-quote .entry-content .page-links a,
	.page-links a {
		background-color:{{color-background-bg-2}};
		color:{{color-background-fg-2}};
		border-color:{{color-background-bg-3}};
	}
	.format-gallery .entry-content .page-links a:hover,
	.format-audio .entry-content .page-links a:hover,
	.format-status .entry-content .page-links a:hover,
	.format-video .entry-content .page-links a:hover,
	.format-chat .entry-content .page-links a:hover,
	.format-quote .entry-content .page-links a:hover,
	.page-links a:hover {
		background-color:{{color-background-bg-3}};
		color:{{color-background-fg-3}};
		border-color:{{color-background-bg-4}};
	}
	.comment-respond {
		background-color:{{color-background-bg+4}};
		color:{{color-background-fg+4}};
	}
	.comment-respond a {
		color:{{color-background-link-fg+4}};
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
			'background' => array(
				'label' => __( 'Background Color', 'styleguide' ),
				'default' => '#fff',
			),
			'link' => array(
				'label' => __( 'Link Color', 'styleguide' ),
				'default' => '#bc360a',
			),
		),
		'color-combos' => array(
			'background-link' => array(
				'foreground' => 'link',
				'background' => 'background',
			),
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
		'dequeue' => array(
			'twentythirteen-fonts',
		),
	)
);
