<?php
/**
 * Theme: Chronicle
 * Theme Url:
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
	#respond p.logged-in-as a,
	form.searchform button.searchsubmit,
	.widget h3.widgettitle:before,
	.main article .postmetadata a,
	a {
		color: {{color-key-bg-0}};
	}
	#respond p.logged-in-as a:hover,
	.main article .postmetadata a:hover,
	a:hover {
		color: {{color-key-bg-2}};
	}
	.primary-content nav,
	nav.menu-primary {
		background: {{color-key-bg-0}};
	}
	.primary-content nav a.selected {
		background: {{color-key-fg-0}};
	}
	.primary-content nav a {
		background: {{color-key-bg-2}};
	}
	nav.menu-primary .social_links a:before {
		opacity: 0.6;
	}
	nav.menu-primary .social_links a:before,
	nav.menu-primary .menu a,
	nav.menu-primary .menu a:hover {
		color: {{color-key-fg-0}};
	}
	nav.menu-primary .social_links a:hover:before {
		color: {{color-key-fg-0}};
		opacity: 1;
	}
	nav.menu-primary .menu ul li a:before {
		color: {{color-key-bg-2}};
	}
	nav.menu-primary .menu li.page_item_has_children > a:after,
	nav.menu-primary .menu li.menu-item-has-children > a:after {
		border-top-color: {{color-key-fg-0}};
	}
	#respond p.form-submit #submit,
	.main .contributor a.contributor-posts-link,
	.testimonials-wrapper header a.button,
	.infinite-scroll #infinite-handle span {
		background: {{color-key-bg-0}};
		color: {{color-key-fg-0}};
	}
	#respond p.form-submit #submit:hover,
	.main .contributor a.contributor-posts-link:hover,
	.testimonials-wrapper header a.button:hover,
	.infinite-scroll #infinite-handle span:hover {
		background: {{color-key-bg-2}};
		color: {{color-key-fg-2}};
	}

	.error404 #main-content,
	.testimonials-wrapper,
	body.home .testimonials-wrapper,
	.main article.post-archive,
	footer#footer.container,
	.sidebar-main .widget,
	.sidebar-small .widget,
	.main article.post-archive.has-post-thumbnail.layout-horizontal-left a.thumbnail,
	.main article.post-archive.has-post-thumbnail.layout-horizontal-right a.thumbnail,
	#respond,
	.masthead,
	.singular .main-content article,
	.singular .main-content nav.postnav,
	.singular .main-content .content-comments {
		background: {{color-panel-text-bg-0}};
		color: {{color-panel-text-fg-0}};
	}
	h1, h2, h3, h4, h5, h6,
	.main h1.title a,
	.main h2.title a,
	.main h2.posttitle a {
		color: {{color-panel-text-fg-0}};
	}
	.main h1.title a:hover,
	.main h2.title a:hover,
	.main h2.posttitle a:hover {
		color: {{color-key-bg-0}};
	}
	.main .category_description,
	blockquote,
	.main article.post-archive a.thumbnail,
	.writer {
		background: {{color-panel-text-bg-2}};
		color: {{color-panel-text-fg-2}};
	}
	blockquote p,
	.writer h3 {
		color: {{color-panel-text-fg-2}};
	}
	hr,
	blockquote {
		border-color: {{color-key-bg-0}};
	}
	footer#footer .footer-wrap .sep,
	.widget.widget_rss li .rss-date,
	.main article .taxonomy,
	.postmetadata {
		color: {{color-panel-text-fg-0}};
		opacity: 0.6;
	}
	ol.commentlist li.comment,
	ol.commentlist li.trackback,
	ol.commentlist li.pingback,
	footer#footer.container .footer-wrap,
	.sidebar-main .widget h3.widgettitle,
	.sidebar-small .widget h3.widgettitle {
		border-color: {{color-panel-bg-2}};
	}
	ol.commentlist li.comment .edit-link a,
	ol.commentlist li.trackback .edit-link a,
	ol.commentlist li.pingback .edit-link a,
	a.post-edit-link,
	.main article a.post-lead-category {
		background: {{color-panel-bg-2}};
		color: {{color-panel-fg-2}};
	}
	ol.commentlist li.comment .edit-link a:hover,
	ol.commentlist li.trackback .edit-link a:hover,
	ol.commentlist li.pingback .edit-link a:hover,
	a.post-edit-link:hover,
	.main article a.post-lead-category:hover {
		background: {{color-panel-bg-3}};
		color: {{color-panel-fg-3}};
	}
	.social_links a:before,
	.social_links a:hover:before {
		color: {{color-panel-fg-0}};
	}
	nav.menu-primary .menu li.current-menu-item > a {
		color: {{color-key-fg-2}};
		background: {{color-key-bg-2}};
	}
CSS;

add_theme_support(
	'styleguide',
	array(
		'colors' => array(
			'key' => array(
				'label' => __( 'Key Color', 'styleguide' ),
				'default' => '#C0392B',
			),
			'text' => array(
				'label' => __( 'Text Color', 'styleguide' ),
				'default' => '#000000',
			),
			'panel' => array(
				'label' => __( 'Panel Color', 'styleguide' ),
				'default' => '#ffffff',
			),
		),
		'color-combos' => array(
			'panel-link' => array(
				'foreground' => 'key',
				'background' => 'panel',
			),
			'panel-text' => array(
				'foreground' => 'text',
				'background' => 'panel',
			),
		),
		'fonts' => array(
			'headers' => array(
				'label' => __( 'Header Font', 'styleguide' ),
				'default' => '',
			),
			'body' => array(
				'label' => __( 'Body Font', 'styleguide' ),
				'default' => '',
			),
		),
		'css' => $css,
	)
);
