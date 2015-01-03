<?php
/**
 * Theme: Puzzle
 * Theme Url: https://creativemarket.com/BinaryMoon/108641-Puzzle-Responsive-WordPress-Theme?u=BinaryMoon
 */

$css = <<<CSS
	body {
		font-family: {{font-body}};
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-headers}};
	}
	.main article.post-archive.sticky:before,
	.testimonials-wrapper .testimonial .entry {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	.main article.post-archive section {
		background-color: {{color-key-bg-0}};
	}
	.main article.post-archive section .entry .post-meta-data {
		color: {{color-key-fg+2}};
	}
	.main article.post-archive section h2 a,
	.main article.post-archive section span.entry-title:before {
		color: {{color-key-fg-0}};
	}
	body, h1, h2, h3, h4, h5, h6 {
		color: {{color-theme-background-fg-0}};
	}
	.widget h3.widgettitle, body a {
		color: {{color-theme-background-fg-2}};
	}
	.masthead nav.menu a {
		color: {{color-theme-background-fg-1}};
	}
	body a:hover {
		color: {{color-theme-background-fg-3}};
	}
	.widget.widget_rss li .rss-date' => array (
		color: {{color-theme-background-fg+2}};
	}
	.masthead nav.menu,
	.singular.themes-sidebar1-active .sidebar .widget {
		border-color: {{color-theme-background-bg-1}};
	}
	.masthead .menu li.page_item_has_children > a:after,
	.masthead .menu li.menu-item-has-children > a:after {
		border-top-color: {{color-theme-background-fg-1}};
	}
	table tr:nth-child(odd),
	.wp-caption, .main .postnav, .content-comments, a.post-edit-link, a.post-edit-link:hover {
		background-color: {{color-theme-background-bg-1}};
	}
	.main .postnav .prev a:before,
	.main .postnav .next a:after {
		color: {{color-theme-background-fg-1}};
	}
	#wp-calendar th,
	#wp-calendar {
		border-color: {{color-theme-background-bg-3}};
	}
	table tr:nth-child(even), #wp-calendar th, #wp-calendar caption {
		background-color: {{color-theme-background-bg-2}};
	}
	.wp-caption .wp-caption-text, .main article .taxonomy {
		color: {{color-theme-background-fg-1}};
	}
	.infinite-scroll #infinite-handle span,
	.testimonials-wrapper header a.button {
		'border-color: {{color-theme-background-bg-3}};
		'color: {{tcolor-heme-background-bg-3}};
	}
	.infinite-scroll #infinite-handle span:hover,
	.testimonials-wrapper header a.button:hover {
		border-color: {{color-theme-background-bg-4}};
		color: {{color-theme-background-bg-4}};
	}
	.main article p.post-meta-data,
	.main article p.post-meta-data a,
	#respond p.logged-in-as,
	#respond p.logged-in-as a {
		color: {{color-theme-background-fg-2}};
	}
CSS;

add_theme_support( 'styleguide', array(
	'colors' => array(
		'key' => array(
			'label' => __( 'Key Color', 'styleguide' ),
			'default' => '#2ecc71',
		),
		'link' => array(
			'label' => __( 'Link Color', 'styleguide' ),
			'default' => '#2ecc71',
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
) );