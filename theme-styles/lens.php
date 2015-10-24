<?php
/**
 * Theme: Lens
 * Theme Url: https://creativemarket.com/BinaryMoon/108642-Lens-Responsive-Photography-Theme?u=BinaryMoon
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
	article.post-archive.sticky:before,
	a {
		color: {{color-key-bg-0}};
	}
	a:hover {
		color: {{color-key-bg-2}};
	}
	blockquote {
		border-color: {{color-key-bg-0}};
	}
	.masthead .menu li ul li {
		border-color: {{color-key-bg-2}};
	}
	.masthead .menu li ul:before {
		border-bottom-color: {{color-key-bg-0}};
	}
	.masthead .menu li ul,
	.main .archive-pagination span.current {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	.widget,
	.wp-caption {
		background-color: {{color-theme-background-bg+5}};
		color: {{color-theme-background-fg+4}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#81261d',
			),
		),
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => 'Roboto+Slab',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Roboto+Slab',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'lens-roboto-slab',
		),
	)
);
