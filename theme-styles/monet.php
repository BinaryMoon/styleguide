<?php
/**
 * Theme: Monet
 * Theme Url: https://creativemarket.com/BinaryMoon/312560-Monet-WordPress-Portfolio-Theme?u=BinaryMoon
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
		color: {{color-link-bg-0}};
	}
	a:hover {
		color: {{color-link-bg-2}};
	}
	blockquote {
		border-color: {{color-key-bg-0}};
	}
	#minor-sidebar .sidebar-footer-toggle a:before {
		border-color:{{color-key-fg-0}};
		color: {{color-key-fg-0}};
	}
	#minor-sidebar,
	.masthead {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	#minor-sidebar .menu-social-links a:before,
	.masthead .menu a {
		color: {{color-key-fg-0}};
		border-color:{{color-key-fg-0}};
	}
	.masthead .menu ul a.menu-back:before,
	.masthead .menu ul a.menu-expand:before {
		border-left-color: {{color-key-fg-0}};
	}
	.main .pagination span.current {
		background-color: {{color-theme-background-bg-2}};
		color: {{color-theme-background-fg-2}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#ffffff',
			),
			'link' => array(
				'label' => __( 'Link Color', 'styleguide' ),
				'default' => '#7f7f7f',
			),
		),
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => 'Amiri',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Open+Sans',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'monet-fonts',
		),
	)
);
