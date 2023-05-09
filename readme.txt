=== kaya ===

Contributors: anphira, automattic
Tags: custom-background, theme-options, custom-menu, threaded-comments, one-column, two-columns, left-sidebar, right-sidebar, custom-logo, featured-images, flexible-header, footer-widgets, full-width-template, blog

Requires at least: 5.5
Tested up to: 6.1.1
Requires PHP: 7.4
Stable tag: v1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A starter theme called Kaya designed for PSD to WordPress builds, built from underscores.

== Description ==

Kaya is a flexible theme to build fabulous & functional websites. With a focus on being lightweight and fast, Kaya allows you to quickly build & customize your site with a wide array of color, font, header, footer and width options. It’s ready to work with your page builder and has built-in support for Elementor. You can view the setup instructions by going to the Customizer and selecting “Need Setup Help?”.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Kaya includes support for Infinite Scroll in Jetpack.
Kaya includes support for Visual Composer.
Kaya includes support for Elementor Page Builder.

= Are there examples of theme being used? =

Examples of the theme being used are at https://www.anphira.com/kaya-wordpress-theme/

= Are there any recommended plugins? =

Recommended plugins are available at https://www.anphira.com/kaya-wordpress-theme/

== Customization Options ==

From the Customizer a number of customization options exist. Please see https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/ for the official setup guide including current options.

== Changelog ==

= 1.4 - May 09 2023 =
* Change: hero area for blog posts & blog archive are now two separate settings. Existing setting will now only apply to blog posts. Check the new box under 'General Options' > Blog Archives for archive to use heros.
* Change: links default to underlined for accessibility. You can override this in a child theme if desired.
* Fix: author bio on single posts
* Fix: page title on archives with hero
* Fix: updating hero settings on individual pages
* Fix: alignment of social media icons
* Add: Page Hero for WooCommerce pages
* Add: position-relative class for styling position

= 1.3.1 - Dec 11 2022 =
* Fix: page hero on blog archive pages

= 1.3 - Dec 1 2022 =
* add flexbox for the header & footer -- this may be a breaking update for some sites as header & footer layouts are no longer using fixed column widths, but now using flexbox. CSS classes for kaya-columns are kept.
* register top menu
* update for PHP 8
* improve accessibility (header & footer updates for screen reader h2, and widget headings to h3 - same CSS class used on widget headings as before)

= 1.2.2 - Apr 20 2022 =
* update search widget styling for blocks
* update related articles columns

= 1.2.1 - Apr 16 2022 =
* added author bio to blog posts

= 1.2 - Apr 16 2022 =
* changed font unit from em to rem

= 1.1.2 - Mar 09 2022 =
* fix: update issue with page hero

= 1.1.1 - Mar 07 2022 =
* removed instant page script causing errors
* correct sizing of social icons

= 1.1 - Feb 12 2022 =
* Tested with PHP 8
* added some settings to show font sytles in gutenberg

= 1.0.2 - Dec 02 2021 =
* corrected missing h1 on search.php

= 1.0.1 - Oct 09 2021 = 
* replaced .columns-* with .kaya-columns-* for compatibility with Gutenberg (ie: .columns-6 is now .kaya-columns-6)
* kaya_social_icons shortcode removed
* updated to pagination for the blog archives
* correction to text sizing for p elements

= 1.0 - Oct 02 2021 =
* major update for accessibility
* add option for setting accessibility statement
* update for all font sizing - moving from px to em - this will break your old font sizes and you will have to update and resave in customizer (ie: if you have 36 for h1, you'd need to calculate 36/16 for a result of 2.25 and replace 36 with 2.25) Once you update any of the heading sizes you had set, you'll be fine.
* update to focus state
* update list of fonts to include more accessible fonts
* deleted: Arial Black, Impact, Comic Sans, Abril Fatface, Lobster, Montserrat, Muli, Oswald, Roboto Condensed
* added: ABeeZee, Cabin, Eco, Merriweather Sans, Noto Sans, Nunito, Poppins, Quicksand, Roboto Slab, Sen, Work Sans
* removed redundant ARIA roles
* updated headings for sidebar and footer from h4 to h2
* minor CSS updates for WooCommerce
* added announcement bar to top of site

= 0.11.2 - Aug 07 2021 =
* add: color settings for WooCommerce

= 0.11.1 - Apr 23 2021 =
* add: checked to disable google fonts from being loaded
* add: instant page preloading script
* add: clickjacking prevention

= 0.11.0 - Dec 24 2020 = 
* add: move blog options to separate panel
* add: checkbox to turn off page heading1 for all pages
* fix: blog sidebar settings for main blog & archive pages
* fix: proper name on Page with Sidebar page template

= 0.10.3 - Oct 25 2020 =
* add privacy policy link to footer by default
* add behance social media link
* update Vimeo social link to use vimeo-v font awesome icon

= 0.10.2 - Sep 19 2020 =
* update to add tags & categories to the single post template
* fix issue with comments displaying on pages
* Remove JQuery migrate code for WP 5.5

= 0.10.1 - Jul 15 2020 =
* minor CSS update

= 0.10.0 - May 30 2020 =
* added setting for archive sidebars - now archive sidebars and single post sidebars have separate settings
* updated sidebar defaults to default to NO sidebar
* added feature to show related posts on single blogs
* added social sharing for blogs (javascript free for fast loading)

= 0.9 - May 07 2020 =
* updates for WooCommerce
* update font awesome version - remove font awesome version 4
* add option for setting 'posted on' date or 'updated on' date for blog posts

= 0.8.3 - Mar 23 2020 =
* add elementor support

= 0.8.2 - Mar 27 2019 =
* add flex box CSS code

= 0.8.1 - Mar 24 2019 =
* update size on "large-text" from 1.2em to 1.15em
* add option for setting line-height on headings and p
* update menu styling to be more compatible with menu plugins
* add two new widget areas (extra areas -- see theme setup guide)
* update Google Plus to Google Map URL (as Google plus has been shut down)

= 0.8 - Mar 16 2019 =
* minor CSS update for list styling
* move dash icons from header to footer (speed improvement)
* remove URL field from the comment form (comment spam reduction)
* change the "posted on" to display "updated on" when the update date is more recent than the publish date (SEO improvement)
* update login logo to that of main logo
* update login URL to that of website
* remove schema (SEO) options from theme -- this is plugin territory and you should use a plugin for this

= 0.7.11 - Feb 24 2019 =
* update blog page (index.php) to allow page sidebar settings to override globally settings
* update header to show proper hero area on single blog posts
* update 404 page for hero area
* hide welcome message
* default to not show comments (to match default checkboxes)

= 0.7.10 - Jan 16 2019 =
* minor CSS updates for font awesome icons

= 0.7.9 - Dec 12 2018 =
* update location of code insertion in footer to just before </body>

= 0.7.8 - Sep 07 2018 =
* minor CSS updates

= 0.7.7 - Sep 07 2018 =
* fix display of hero on custom page hero

= 0.7.6 - Sep 07 2018 =
* minor CSS updates

= 0.7.5 - Aug 05 2018 =
* CSS update for buttons for WooCommerce

= 0.7.4 - Jun 15 2018 =
* fix page title on category archive

= 0.7.3 - Jun 15 2018 =
* fix page title

= 0.7.2 - Jun 15 2018 =
* fix page title

= 0.7.1 - Apr 24 2018 =
* add code to not load Woo content on non-woo pages

= 0.7 - Apr 16 2018 =
* add useful CSS classes
* add support for Woo light boxes

= 0.6.9 - Feb 07 2018 =
* updates for hero area

= 0.6.9 - Jan 28 2018 =
* updates to match WordPress PHP coding standards better

= 0.6.8 - Jan 23 2018 =
* update hero area

= 0.6.7 - Jan 23 2018 =
* update for blog page correctly rendering the hero area

= 0.6.6 - Jan 22 2018 =
* update for minor CSS

= 0.6.5 - Jan 22 2018 =
* update for minor CSS

= 0.6.4 - Dec 25 2017 =
* update to make info notice actually dismissible

= 0.6.3 - Dec 07 2017 =
* update for minor CSS

= 0.6.2 - Dec 07 2017 =
* update for minor CSS

= 0.6.1 - Nov 18 2017 =
* update for minor CSS

= 0.6 - Nov 15 2017 =
* add WooCommerce support
* add Google Tag manager option
* update for function to filter out VC shortcodes on Relevanssi plugin
* update for minor CSS

= 0.5.4 - Oct 31 2017 =
* minor update to CSS styles
* update to search page

= 0.5.3 - Sept 13 2017 =
* add hide footer and hide header to page settings

= 0.5.2 - Sept 06 2017 =
* update for Content for Right side of Lower Footer in customizer to allow full HTML
* updates for hero area

= 0.5.1 - Aug 24 2017 = 
* minor update for background color on nav menu

= 0.5 - Aug 24 2017 =
* modify social to open in new window
* add hero banner for inside pages
* add everywhere top and bottom sidebars to allow content to be added to every sidebar above and below the template specific sidebars
* fix: single sidebar displays correctly on single posts

= 0.4 - Aug 10 2017 =
* add background color, background image/pattern
* fix issue with checkboxes on customizer
* add font color for footer links
* add font weight settings

= 0.3.3 - Jul 27 2017 =
* add height & width to logo
* add top header widget areas
* fix left sidebar display issue

= 0.3.2 - Jun 11 2017 =
* Add [kaya_social_icons] shortcode

= 0.3.1 - Jun 11 2017 =
* Update functions.php for loading of child theme css automatically
* Fix 404 page to use standard HTML markup in textarea content box

= 0.3 - Jun 03 2017 =
* Update widget styling on standard widgets
* Add Google Optimize option to Google Analytics code
* Improve PageSpeed
* Add menu color options
* Set defaults for customizer options
* 404 page updates

= 0.2 - May 07 2017 =
* Help info for customizer
* Blog style improvements

= 0.2-alpha - May 06 2017 =
* Initial release

== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
