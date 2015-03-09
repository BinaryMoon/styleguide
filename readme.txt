=== Styleguide ===
Contributors: binarymoon
Tags: customizer, css, color, colors, colour, colours, fonts
Requires at least: 3.9
Tested up to: 4.1.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Customize fonts and colours in WordPress themes without touching any code.

== Description ==

Quickly and easily edit fonts and colours in your WordPress themes.

All default WordPress themes are fully supported and support for more themes will be added in the future. Other themes will be able to customize fonts.

= Supported Themes =

* [Twenty Ten](https://wordpress.org/themes/twentyten)
* [Twenty Eleven](https://wordpress.org/themes/twentyeleven)
* [Twenty Twelve](https://wordpress.org/themes/twentytwelve)
* [Twenty Thirteen](https://wordpress.org/themes/twentythirteen)
* [Twenty Fourteen](https://wordpress.org/themes/twentyfourteen)
* [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen)
* [Puzzle](https://creativemarket.com/BinaryMoon/108641-Puzzle-Responsive-WordPress-Theme?u=BinaryMoon)

Developers can add support for their themes quite easily. I'll add some documentation in the future.

== How To ==

After downloading and installing the plugin you can go to the Customizer (Appearance > Customizer) and edit fonts and colours in the 'fonts and colors' panel.

= Extending Styleguide =

Styleguide currently offers developers a filter for adding additional fonts. You can use it as shown below

`function themeprefix_fonts( $font_list ) {
	return $font_list;
}
add_filter( 'styleguide_get_fonts', 'themeprefix_fonts' );`

== Screenshots ==

1. An example of Twenty Thirteen being customized

== Changelog ==

= 1.1.1 =
* Added a check for the theme-style template within the theme first before checking the plugin and fallback.
* Renamed the tab from "Colors & Fonts" to "Theme Name Colors & Fonts" for clarity.

= 1.1.0 =
* Note that this update may break some of the settings. This is a one time problem and I apologise for the frustration!
* fix how Styleguide enqueues fonts with more than one word in the name
* add some new fonts to play with

= 1.0 =
* first version live! :)

== Upgrade Notice ==