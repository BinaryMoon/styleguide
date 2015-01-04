Styleguide
==========

A WordPress plugin that lets you edit colours and fonts easily.

![Twenty Thirteen Screenshot](https://github.com/BinaryMoon/styleguide/raw/master/screenshots/screenshot-1.png)

# Supported Themes

In the long term I plan to support all the default themes, and my own themes. I would also consider adding support for other peoples themes as well (although you can easily add support to your own themes if you wish).

* [Twenty Ten](https://wordpress.org/themes/twentyten)
* [Twenty Eleven](https://wordpress.org/themes/twentyeleven)
* [Twenty Twelve](https://wordpress.org/themes/twentytwelve)
* [Twenty Thirteen](https://wordpress.org/themes/twentythirteen)
* [Twenty Fifteen](https://wordpress.org/themes/twentyfifteen)
* [Puzzle](https://creativemarket.com/BinaryMoon/108641-Puzzle-Responsive-WordPress-Theme?u=BinaryMoon)

Why do I add support for my themes? My themes are available on wordpress.com and <a href="https://creativemarket.com/BinaryMoon?u=BinaryMoon">Creative Market</a>. As such I don't want to have two copies of each theme since it makes maintenance a pain - so I am adding support directly into the plugin.

# Unsupported Themes

By default Styleguide will let you change fonts for headers and body text. This will work for a lot of themes, but not for all, so is a nicety and not a guarantee. Still, it should work in most situations and so gives you an easy way to change fonts without doing any technical work yourself.

For full compatability theme support needs to be added by the theme author - unless using one of the supported themes mentioned above.

# Adding theme support

Styleguide allows any theme to add support through the 'add_theme_support' command. For examples check out the [included theme-styles](https://github.com/BinaryMoon/styleguide/tree/master/theme-styles).