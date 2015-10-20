=== Styleguide - Custom Fonts and Colours ===
Contributors: binarymoon
Tags: customizer, css, color, colors, colour, colours, fonts, google fonts, localize, localization
Requires at least: 4
Tested up to: 4.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Styleguide allows you to customize fonts and colours in WordPress themes through the Customizer - no need to touch any code!

== Description ==

Quickly and easily edit fonts and colours in your WordPress themes using the WordPress Customizer so that you can get live previews before saving the new settings.

Perfect for giving your website a unique look without having to hire a designer or make code changes yourself.

All default WordPress themes are fully supported and support for more themes will be added in the future. All other themes can customize fonts.

Styleguide uses a carefully chosen selection of the top 45 Google Fonts to give you a lot of options for personalising your site.

= Features =

* Choose from a varied selection of the top Google fonts in any theme
* Additional themes (listed below) support editing colours
* Filter fonts based on character set - great for non latin languages such as Russian
* Developer functionality for adding support to other themes, and for adding additional fonts.

= Supported Character Sets =

Styleguide supports fonts that have a variety of different character sets. This makes selecting a font for your language super easy. The supported character sets are:

* Cyrillic
* Devanagari
* Greek
* Hebrew
* Latin
* Vietnamese

By default Styleguide uses Latin. To limit the font choice to those supporting your character set you should go to *Settings &rarr; General &rarr; Character Set* and select your set there.

= Supported Themes =

* [Kent](https://wordpress.org/themes/kent)
* [Puzzle](https://creativemarket.com/BinaryMoon/108641-Puzzle-Responsive-WordPress-Theme?u=BinaryMoon)
* [Broadsheet](https://creativemarket.com/BinaryMoon/108643-Broadsheet-Newspaper-Theme?u=BinaryMoon)
* [Lens](https://creativemarket.com/BinaryMoon/108642-Lens-Responsive-Photography-Theme?u=BinaryMoon)
* [Monet](https://creativemarket.com/BinaryMoon/312560-Monet-WordPress-Portfolio-Theme?u=BinaryMoon)
* [Mimbo Pro](https://creativemarket.com/BinaryMoon/111465-Mimbo-Pro-WordPress-Theme?u=BinaryMoon)
* [Opti](https://creativemarket.com/BinaryMoon/9918-Opti-Responsive-WordPress-Theme?u=BinaryMoon)
* [Twenty Ten](https://wordpress.org/themes/twentyten)
* [Twenty Eleven](https://wordpress.org/themes/twentyeleven)
* [Twenty Twelve](https://wordpress.org/themes/twentytwelve)
* [Twenty Thirteen](https://wordpress.org/themes/twentythirteen)
* [Twenty Fourteen](https://wordpress.org/themes/twentyfourteen)
* [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen)
* [Twenty Sixteen](https://wordpress.org/themes/twentysixteen)

Developers can add support for their themes quite easily - see the 'Other Notes' tab for more info.

If you're in the market for a WordPress theme then you could check out my Premium GPL WordPress themes site here: http://prothemedesign.com/

== How To ==

After downloading and installing the plugin you can go to the Customizer (Appearance > Customizer) and edit fonts and colours in the 'Colors & Fonts' panel.

= Adding Theme Support =

Styleguide allows any theme to add support through the `add_theme_support` command. For examples check out the theme-styles directory.

I have added an example of a basic implementation below. This code would be placed in your themes functions.php

`function prefix_add_styleguide_support() {

  // for properties check out the included theme styles as seen here:
  // https://github.com/BinaryMoon/styleguide/tree/master/theme-styles
  $properties = array(
    ...
  );
  add_theme_support( 'styleguide', $properties );

}

add_filter( 'after_setup_theme', 'prefix_add_styleguide_support' );`

= Extra Fonts =

Styleguide currently offers developers a filter for adding additional fonts. You can use it as shown below

`function my_fonts( $font_list ) {
	return $font_list;
}
add_filter( 'styleguide_get_fonts', 'my_fonts' );`

== Screenshots ==

1. An example of Twenty Eleven having it's fonts changed
2. Twenty Thirteen with some alternate colours

== Changelog ==

= 1.4.1, 1.4.2 & 1.4.3 =
* fix bugs introduced with character sets

= 1.4 =
* Add support for next years default theme - Twenty Sixteen (requires WP4.4)! :)
* Add a link to the Kent theme - which is out now - https://wordpress.org/themes/kent
* Option to select character set from *Settings &rarr; General*
* Filters available fonts according to supported character sets
* Loads character sets as required

= 1.3.1 =
* Better fallbacks for non latin fonts

= 1.3 =
* Allow font weights to be selected for each font
* Improve font weights for more attractive letters
* Add support for some themes that have recently been submitted to wordpress.org repo
* Add support for more of my premium themes
* Fix a some minor bugs and add additional security
* Move screenshots to plugin assets directory to make download package a little smaller

= 1.2.1 =
* make sure the font preview styles load

= 1.2.0 =
* add new fonts
* add font preview control in customizer
* various small tweaks and bug fixes

= 1.1.0 =
* Note that this update may break some of the settings. This is a one time problem and I apologise for the frustration!
* fix how Styleguide enqueues fonts with more than one word in the name
* add some new fonts to play with

= 1.0 =
* first version live! :)