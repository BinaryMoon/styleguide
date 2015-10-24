<?php
/**
 * Theme: Kent
 * Theme Url:
 *
 * @package: styleguide
 */

$css = <<<CSS
	body,
	.page-main-nav a span {
		font-family: {{font-body}};
		font-weight: {{font-body-weight}};
	}
	h1, h2, h3, h4, h5, h6 {
		font-family: {{font-headers}};
		font-weight: {{font-headers-weight}};
	}
	.page-main-nav a,
	.main a,
	a {
		color: {{color-key-bg-0}};
	}
	.main a:hover,
	a:hover {
		color: {{color-key-bg-2}};
	}
	.col-sidebar,
	#main article.sticky:after,
	.page-main-nav a:hover,
	blockquote {
		border-color: {{color-key-bg-0}};
	}
	#main article.sticky:after {
		border-bottom-color:transparent;
	}
	#main article .tags a:hover,
	#main article .categories a:hover,
	nav.menu,
	.page-main-nav a:hover,
	#main .pagination span,
	#main .archive-pagination span,
	#main .pagination span.current,
	#main .archive-pagination span.current {
		background-color: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	nav.menu ul li a:hover,
	nav.menu ul li a.menu-expand:hover,
	nav.menu ul li a.menu-expand {
		background-color: {{color-key-bg-2}};
		color: {{color-key-fg-2}};
	}
	#main article.sticky {
		background-color: {{color-key-bg+5}};
		color: {{color-key-fg+5}};
	}
	nav.menu a.menu-close {
		background-color: {{color-key-bg-3}};
		color: {{color-key-bg-0}};
	}
	nav.menu a.menu-close:hover {
		background-color: {{color-key-bg-5}};
		color: {{color-key-bg-0}};
	}
	nav.menu form.searchform,
	nav.menu ul li {
		border-color: {{color-key-bg-2}};
	}
	#main .writer {
		border-top-color: {{color-key-bg-0}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#4998cc',
			),
		),
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => 'Open+Sans',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => 'Roboto+Slab',
			),
		),
		'css' => $css,
		'dequeue' => array(
			'kent-font-serif',
			'kent-font-sans-serif',
		),
	)
);
