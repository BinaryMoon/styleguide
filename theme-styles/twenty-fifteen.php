<?php
/**
 * Theme: Twenty Fifteen
 * Theme Url:
 *
 * @package: styleguide
 */

$css = <<<CSS
	body, button, input, select, textarea,
	.post-navigation .post-title,
	.widget_calendar caption,
	.page-title,
	.comments-title, .comment-reply-title {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	blockquote cite,
	blockquote small,
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.post-password-form label,
	.main-navigation .menu-item-description,
	.post-navigation .meta-nav,
	.pagination,
	.image-navigation,
	.comment-navigation,
	.site .skip-link,
	.site-title,
	.site-description,
	.widget-title,
	.widget_rss .rss-date,
	.widget_rss cite,
	.author-heading,
	.entry-footer,
	.page-links,
	.entry-caption,
	.comment-metadata,
	.pingback .edit-link,
	.comment-list .reply a,
	.comment-form label,
	.comment-notes,
	.comment-awaiting-moderation,
	.logged-in-as,
	.form-allowed-tags,
	.no-comments,
	.wp-caption-text,
	.gallery-caption {
		font-family: {{font-title}};
		font-weight: {{font-title-weight}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'fonts' => array(
			'title' => array(
				'label' => __( 'Title Font', 'styleguide' ),
				'default' => 'Noto+Sans',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Noto+Serif',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'twentyfifteen-fonts',
		),
	)
);
