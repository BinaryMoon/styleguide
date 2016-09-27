<?php
/**
 * Theme: Broadsheet
 * Theme Url: https://creativemarket.com/BinaryMoon/108643-Broadsheet-Newspaper-Theme?u=BinaryMoon
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
	form.searchform button.searchsubmit,
	a {
		color: {{color-key-bg-0}};
	}
	.menu-social-links a:hover:before,
	.social_links a:hover:before,
	form.searchform button.searchsubmit:hover,
	a:hover {
		color: {{color-key-bg-2}};
	}
	blockquote {
		border-color: {{color-key-bg-0}};
	}
	.main article a.post-lead-category,
	.main .archive-pagination span.current,
	.primary-content nav a.selected,
	.primary-content .primary-wrapper .item .image-meta {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	.primary-content .primary-wrapper .item .image-meta:hover,
	.main article a.post-lead-category:hover {
		background-color: {{color-key-bg-2}};
		color: {{color-key-fg-2}};
	}
	.primary-content .primary-wrapper .item .postmetadata {
		color: {{color-key-fg-0}};
	}
	.primary-content nav a {
		background-color: {{color-key-bg+4}};
	}
	.primary-content .primary-wrapper .item .image-meta a {
		color: {{color-key-fg-2}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#2980b9',
			),
		),
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => 'Noto+Serif',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Noto+Serif',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'broadsheet-style-neuton',
		),
	)
);
