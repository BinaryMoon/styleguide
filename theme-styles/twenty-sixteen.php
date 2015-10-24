<?php
/**
 * Theme: Twenty Sixteen
 * Theme Url:
 *
 * @package: styleguide
 */

$css = <<<CSS
	body, button, input, select, textarea {
		font-family: {{font-body}};
	}
	.page-links,
	.post-navigation .post-title,
	.post-navigation,
	.comment-reply-link,
	.comment-metadata, .pingback .edit-link,
	.pagination,
	.page-title,
	.tagcloud a,
	.comment-form label,
	.comments-title, .comment-reply-title,
	.main-navigation,
	.widget .widget-title,
	button, button[disabled]:hover, button[disabled]:focus, input[type="button"], input[type="button"][disabled]:hover, input[type="button"][disabled]:focus, input[type="reset"], input[type="reset"][disabled]:hover, input[type="reset"][disabled]:focus, input[type="submit"], input[type="submit"][disabled]:hover, input[type="submit"][disabled]:focus,
	.site-title,
	.entry-footer,
	.sticky-post,
	.entry-title,
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-title}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'fonts' => array(
			'title' => array(
				'label' => __( 'Title Font', 'styleguide' ),
				'default' => 'Merriweather Sans',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Montserrat',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'twentysixteen-fonts',
		),
	)
);
