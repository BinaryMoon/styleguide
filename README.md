Styleguide
==========

A WordPress plugin that lets you edit colours and fonts in your theme.

![Twenty Thirteen Screenshot](https://github.com/BinaryMoon/styleguide/raw/master/screenshots/screenshot-1.png)

# Supported Themes

* [Twenty Ten](https://wordpress.org/themes/twentyten)
* [Twenty Eleven](https://wordpress.org/themes/twentyeleven)
* [Twenty Twelve](https://wordpress.org/themes/twentytwelve)
* [Twenty Thirteen](https://wordpress.org/themes/twentythirteen)
* [Twenty Fourteen](https://wordpress.org/themes/twentyfourteen)
* [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen)
* [Puzzle](https://creativemarket.com/BinaryMoon/108641-Puzzle-Responsive-WordPress-Theme?u=BinaryMoon)
* [Adaline](https://themetry.com/shop/adaline/)

# Unsupported Themes

By default Styleguide will let you change fonts for headers and body text in almost any theme. If you're using one of the supported themes mentioned above then it will add font and color editing allowing you to style the themes as you wish.

For full compatability theme support needs to be added by the theme author.

# Adding theme support

Styleguide allows any theme to add support through the `add_theme_support` command. For examples check out the [included theme-styles](https://github.com/BinaryMoon/styleguide/tree/master/theme-styles).

I have added an example of a basic implementation below. This code would be placed in your themes functions.php

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
