<?php
/**
 * Theme: Adaline
 * Theme Url: https://themetry.com/shop/adaline/
 *
 * @package: styleguide
 */

$css = <<<CSS
	body,
	.widget-title,
	#cancel-comment-reply-link {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.site-title,
	.site-description,
	.site-info-text,
	.tags-title,
	.post-navigation .nav-links a,
	.comment-author .fn,
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.logo-letter,
	.slide-menu,
	#wp-calendar caption,
	.posts-navigation,
	#infinite-handle {
		font-family: {{font-headers}};
		font-weight: {{font-headers-weight}};
	}
	a {
		color: {{color-link-bg-0}};
	}
	a:hover {
		color: {{color-link-bg-2}};
	}
	.site-header,
	.single .entry-title:before,
	.comment-reply-title  {
		background-color: {{color-key-bg-0}};
	}
	.site-header > .logo-letter {
		color: {{color-key-bg-0}};
	}
	.posts-navigation a,
	.site-main #infinite-handle span button,
	.site-main #infinite-handle span button:hover,
	.site-main #infinite-handle span button:focus,
	.posts-navigation a:before,
	#infinite-handle button:before,
	.main-navigation a,
	.byline a,
	.cat-links a,
	.entry-content a,
	.featured-primary .entry-excerpt a,
	.post-navigation .nav-links a,
	.comment-navigation a,
	.comment-content a,
	.comment-form a,
	.widget a,
	.site-info-text a,
	.featured-row {
		border-color: {{color-key-bg-0}};
	}
CSS;
add_theme_support( 'styleguide', array(
	'colors' => array(
		'key' => array(
			'label' => __( 'Key Color', 'styleguide' ),
			'default' => '#ffff00',
		),
		'link' => array(
			'label' => __( 'Link Color', 'styleguide' ),
			'default' => '#000000',
		),
	),
	'fonts' => array(
		'headers' => array(
			'label' => __( 'Primary Font', 'styleguide' ),
			'default' => 'Playfair+Display',
		),
		'body' => array(
			'label' => __( 'Secondary Font', 'styleguide' ),
			'default' => 'Roboto',
			'default-weight' => '100.300',
		),
	),
	'css' => $css,
	'dequeue' => array(
		'adaline-fonts',
	),
) );
