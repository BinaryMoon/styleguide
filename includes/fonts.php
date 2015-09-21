<?php

/**
 * get the available fonts
 *
 * @return type
 */
function styleguide_fonts() {

	$fonts = array(
		'Alegreya' => array(
			'name' => 'Alegreya',
			'family' => '"Alegreya", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Alegreya Sans' => array(
			'name' => 'Alegreya Sans',
			'family' => '"Alegreya Sans", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'vietnamese' ),
		),
		'Alef' => array(
			'name' => 'Alef',
			'family' => 'Alex, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'hebrew', ),
		),
		'Abril Fatface' => array(
			'name' => 'Abril Fatface',
			'family' => '"Abril Fatface", serif',
			'weight' => '',
			'sets' => array( 'latin', ),
		),
		'Amatic SC' => array(
			'name' => 'Amatic SC',
			'family' => '"Amatic SC", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Arimo' => array(
			'name' => 'Arimo',
			'family' => 'Arimo, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'hebrew', 'vietnamese', 'cyrillic' ),
		),
		'Arvo' => array(
			'name' => 'Arvo',
			'family' => 'Arvo, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Bitter' => array(
			'name' => 'Bitter',
			'family' => 'Bitter, serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Droid Sans' => array(
			'name' => 'Droid Sans',
			'family' => '"Droid Sans", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Droid Serif' => array(
			'name' => 'Droid Serif',
			'family' => '"Droid Serif", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Georgia' => array(
			'name' => 'Georgia',
			'family' => 'Georgia, "Bitstream Charter", serif',
			'google' => false,
			'sets' => array( 'latin', ),
		),
		'Gentium Book Basic' => array(
			'name' => 'Gentium Book Basic',
			'family' => '"Gentium Book Basic", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Helvetica' => array(
			'name' => 'Helvetica',
			'family' => '"Helvetica Neue", Helvetica, sans-serif',
			'google' => false,
			'sets' => array( 'latin', ),
		),
		'Hind' => array(
			'name' => 'Hind',
			'family' => 'Hind, sans-serif',
			'sets' => array( 'latin', 'devanagari' ),
		),
		'Indie Flower' => array(
			'name' => 'Indie Flower',
			'family' => '"Indie Flower", sans-serif',
			'weight' => '',
			'sets' => array( 'latin', ),
		),
		'Josefin Slab' => array(
			'name' => 'Josefin Slab',
			'family' => '"Josefin Slab", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Lato' => array(
			'name' => 'Lato',
			'family' => 'Lato, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Libre Baskerville' => array(
			'name' => 'Libre Baskerville',
			'family' => '"Libre Baskerville", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Lora' => array(
			'name' => 'Lora',
			'family' => 'Lora, serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'cyrillic', ),
		),
		'Lobster' => array(
			'name' => 'Lobster',
			'family' => 'Lobster, serif',
			'weight' => '',
			'sets' => array( 'latin', 'cyrillic', 'vietnamese', ),
		),
		'Merriweather' => array(
			'name' => 'Merriweather',
			'family' => 'Merriweather, serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Merriweather Sans' => array(
			'name' => 'Merriweather Sans',
			'family' => '"Merriweather Sans", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Montserrat' => array(
			'name' => 'Montserrat',
			'family' => 'Montserrat, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Noto Sans' => array(
			'name' => 'Noto Sans',
			'family' => '"Noto Sans", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', 'devanagari' ),
		),
		'Noto Serif' => array(
			'name' => 'Noto Serif',
			'family' => '"Noto Serif", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', ),
		),
		'Open Sans' => array(
			'name' => 'Open Sans',
			'family' => '"Open Sans", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', ),
		),
		'Open Sans Condensed' => array(
			'name' => 'Open Sans Condensed',
			'family' => '"Open Sans Condensed", sans-serif',
			'weight' => '300,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', ),
		),
		'Oswald' => array(
			'name' => 'Oswald',
			'family' => 'Oswald, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Oxygen' => array(
			'name' => 'Oxygen',
			'family' => 'Oxygen, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Pacifico' => array(
			'name' => 'Pacifico',
			'family' => 'Pacifico, sans-serif',
			'weight' => '',
			'sets' => array( 'latin', ),
		),
		'Playfair Display' => array(
			'name' => 'Playfair Display',
			'family' => '"Playfair Display", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'cyrillic', ),
		),
		'Poiret One' => array(
			'name' => 'Poiret One',
			'family' => '"Poiret One", sans-serif',
			'weight' => '',
			'sets' => array( 'latin', 'cyrillic', ),
		),
		'PT Sans' => array(
			'name' => 'PT Sans',
			'family' => '"PT Sans", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'cyrillic', ),
		),
		'PT Serif' => array(
			'name' => 'PT Serif',
			'family' => '"PT Serif", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'cyrillic', ),
		),
		'Raleway' => array(
			'name' => 'Raleway',
			'family' => 'Raleway, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Roboto' => array(
			'name' => 'Roboto',
			'family' => 'Roboto, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', ),
		),
		'Roboto Condensed' => array(
			'name' => 'Roboto Condensed',
			'family' => '"Roboto Condensed", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', ),
		),
		'Roboto Slab' => array(
			'name' => 'Roboto Slab',
			'family' => '"Roboto Slab", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', ),
		),
		'Slabo 27px' => array(
			'name' => 'Slabo 27px',
			'family' => '"Slabo 27px", serif',
			'weight' => '',
			'sets' => array( 'latin', ),
		),
		'Source Sans Pro' => array(
			'name' => 'Source Sans Pro',
			'family' => '"Source Sans Pro", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'vietnamese' ),
		),
		'Tinos' => array(
			'name' => 'Tinos',
			'family' => '"Tinos", serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'vietnamese', 'cyrillic', 'hebrew', ),
		),
		'Titillium Web' => array(
			'name' => 'Titillium Web',
			'family' => '"Titillium Web", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Ubuntu' => array(
			'name' => 'Ubuntu',
			'family' => 'Ubuntu, sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', 'greek', 'cyrillic', ),
		),
		'Vollkorn' => array(
			'name' => 'Vollkorn',
			'family' => 'Vollkorn, serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
		'Yanone Kaffeesatz' => array(
			'name' => 'Yanone Kaffeesatz',
			'family' => '"Yanone Kaffeesatz", sans-serif',
			'weight' => '400,700',
			'sets' => array( 'latin', ),
		),
	);

	return apply_filters( 'styleguide_get_fonts', $fonts );

}