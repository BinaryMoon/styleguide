Styleguide
==========

A WordPress plugin that lets you quickly and easily edit fonts and colours in your WordPress themes using the WordPress Customizer so that you can get live previews before saving the new settings.

Perfect for giving your website a unique look without having to hire a designer or make code changes yourself.

All default WordPress themes are fully supported and support for more themes will be added in the future. All other themes can customize fonts.

Styleguide uses a carefully chosen selection of the top 45 Google Fonts to give you a lot of options for personalising your site.

# Features

* Choose from a varied selection of the top Google fonts in any theme
* Additional themes (listed below) support editing colours
* Filter fonts based on character set - great for non latin languages such as Russian
* Developer functionality for adding support to other themes, and for adding additional fonts.

# Supported Character Sets

Styleguide supports fonts that have a variety of different character sets. This makes selecting a font for your language super easy. The supported character sets are:

* Cyrillic
* Devanagari
* Greek
* Hebrew
* Latin
* Vietnamese

By default Styleguide uses Latin. To limit the font choice to those supporting your character set you should go to *Settings &rarr; General &rarr; Character Set* and select your set there.

# Supported Themes

* [Kent](https://wordpress.org/themes/kent)
* [Puzzle](https://creativemarket.com/BinaryMoon/108641-Puzzle-Responsive-WordPress-Theme?u=BinaryMoon)
* [Broadsheet](https://creativemarket.com/BinaryMoon/108643-Broadsheet-Newspaper-Theme?u=BinaryMoon)
* [Lens](https://creativemarket.com/BinaryMoon/108642-Lens-Responsive-Photography-Theme?u=BinaryMoon)
* [Monet](https://creativemarket.com/BinaryMoon/312560-Monet-WordPress-Portfolio-Theme?u=BinaryMoon)
* [Mimbo Pro](https://creativemarket.com/BinaryMoon/111465-Mimbo-Pro-WordPress-Theme?u=BinaryMoon)
* [Opti](https://creativemarket.com/BinaryMoon/9918-Opti-Responsive-WordPress-Theme?u=BinaryMoon)
* [Adaline](https://themetry.com/shop/adaline/)
* [Twenty Ten](https://wordpress.org/themes/twentyten)
* [Twenty Eleven](https://wordpress.org/themes/twentyeleven)
* [Twenty Twelve](https://wordpress.org/themes/twentytwelve)
* [Twenty Thirteen](https://wordpress.org/themes/twentythirteen)
* [Twenty Fourteen](https://wordpress.org/themes/twentyfourteen)
* [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen)
* [Twenty Sixteen](https://wordpress.org/themes/twentysixteen)

# Adding theme support

Styleguide allows any theme to add support through the `add_theme_support` command. For examples check out the [included theme-styles](https://github.com/BinaryMoon/styleguide/tree/master/theme-styles).

I have added an example of a basic implementation below. This code would be placed in your themes functions.php

There's more specific help on the WordPress.org [Styleguide plugin 'Other notes'](https://wordpress.org/plugins/styleguide/other_notes/).

```php
function prefix_add_styleguide_support() {

  // for properties check out the included theme styles as seen here:
  // https://github.com/BinaryMoon/styleguide/tree/master/theme-styles
  $properties = array(
    ...
  );
  add_theme_support( 'styleguide', $properties );

}

add_filter( 'after_setup_theme', 'prefix_add_styleguide_support' );
```

# WordPress Themes

If you're in the market for a WordPress theme then you could check out my Premium GPL WordPress themes site: [Pro Theme Design](https://prothemedesign.com/)