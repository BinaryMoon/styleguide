<?php
/**
 * Theme: Twenty Ten
 * Theme Url: https://wordpress.org/themes/twentyten
 *
 * @package: styleguide
 */

$css = <<<CSS
	body, input, textarea, .page-title span, .pingback a.url {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	h3#comments-title, h3#reply-title, #access .menu, #access div.menu ul,
	#cancel-comment-reply-link, .form-allowed-tags, #site-info, #site-title,
	#wp-calendar, .comment-meta, .comment-body tr th, .comment-body thead th,
	.entry-content label, .entry-content tr th, .entry-content thead th,
	.entry-meta, .entry-title, .entry-utility, #respond label, .navigation,
	.page-title, .pingback p, .reply, .widget-title, .wp-caption-text {
		font-family: {{font-headers}};
		font-weight: {{font-headers-weight}};
	}
	a:link, a:visited, a:active {
		color: {{color-link-bg-0}};
	}
	a:hover {
		color: {{color-link-bg-1}};
	}
	.entry-meta a, .entry-utility a {
		color: #777;
	}
	#access {
		background: {{color-key-bg-0}};
	}
	#access a {
		color: {{color-key-fg-0}};
	}
	#access li:hover > a, #access ul ul :hover > a {
		background: {{color-key-bg-1}};
		color: {{color-key-fg-1}};
	}
	#access ul ul a {
		color: #fff;
	}
	.home .sticky,
	#entry-author-info {
		background-color: {{color-key-bg+5}};
		border-top-color: {{color-key-bg-0}};
	}
	#colophon {
		border-top-color: {{color-key-bg-0}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#000',
			),
			'link' => array(
				'label' => __( 'Link Color', 'styleguide' ),
				'default' => '#0066cc',
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
				'default' => 'Helvetica',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Georgia',
			),
		),
		'css' => $css,
	)
);