=== kaya ===

Contributors: anphira
Tags: custom-background, theme-options, custom-menu, threaded-comments, one-column, two-columns, left-sidebar, right-sidebar, custom-logo, featured-images, flexible-header, footer-widgets, full-width-template, blog, accessibility-ready

Requires at least: 5.5
Tested up to: 6.5
Requires PHP: 8.0
Stable tag: v2.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A starter theme called Kaya designed for PSD to WordPress builds, built from underscores.

== Description ==

Kaya is a flexible theme to build fabulous & functional websites. With a focus on being lightweight and fast, Kaya allows you to quickly build & customize your site with a wide array of color, font, header, footer and width options. It’s ready to work with your page builder and has built-in support for Elementor. Kaya is specifically designed for flexibility and accessibility, and receives periodic accessibilty testing from ThisAbled. You can view the setup instructions by going to the Customizer and selecting “Need Setup Help?”.

Special thanks to ThisAbled.ca for assistance with accessibility testing. Getting real testing from testers who not only live with challenges but are certified in accessibility is incredibly valuable for themes.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away or install a child theme if you'd like to customize.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Kaya includes support for Max Mega Menu, Fluent Forms, Elementor Page Builder, Gutenberg, GenerateBlocks, and WP Bakery.

= Are there examples of theme being used? =

Examples of the theme being used are at https://easya11yguide.com/kaya-wordpress-theme/

= Are there any recommended plugins? =

Recommended plugins are available at https://easya11yguide.com/kaya-wordpress-theme/

== Customization Options ==

From the Customizer a number of customization options exist. Please see https://easya11yguide.com/kaya-wordpress-theme/kaya-setup-guide/ for the official setup guide including current options.

== Changelog ==

= 2.4 - Apr 29 2025 = 
* Update: replace kaya_logo_display() with a do_action to allow it to be overriden in child theme.
* Update: Twitter bird icon to X icon.
* Update: WooCommerce button border colors to match backgrounds.
* Update: Include announcement bar when hiding header on individual pages.
* Add: Border color for input fields.
* Update: Elementor compatibility for styling headings.
* Add: Option to remove visual text from social sharing buttons (will still have screen reader text for accessibility).
* Update: CSS classes for position-absolute, bottom-0, text-wrap-balance, hide-mobile, hide-desktop.
* Update: Set "flex-wrap: wrap" for flexbox class (this may impact your website).

= 2.3 - Jan 19 2025 =
* Update: font sizing for elementor page builder.
* Update: cover block support within grid.
* Update: make all theme functions overridable in the child theme.

= 2.2 - Oct 13 2024 =
* Update: accessibility options for change contrast updates.
* Update: aria role for content area.
* Add: checkbox to hide the post meta information (published by name & date).
* Update: correct the reading time to hide unless explicitly choosen to be shown.
* Fix: moved footer column check above the showing of columns so no top footer is shown if footer columns are not supposed to be displayed.
* Update: add google tag manager code to the top of <body> if the option is used in the customizer.

= 2.1 - Oct 05 2024 =
* Update: accessibility options for elementor plugin.
* Update: accessibility enhance inputs for max mega menu.

= 2.0 - Sep 10 2024 =
* Update: moved a lot of the code in footer.php and header.php into separate files. These were the most common files overriden in child themes and the most often modified, which meant a lot of work for child theme authors keeping everything current. The code has been separated with the goal of significantly reducing how often child themes need to be updated.
* Add: header-head.php to hold just the <head> section of the site. This is the most commonly customized in a child theme and removing it to a separate file makes customization easier and reduces the amount of future code updates needed for child themes only customizing this part.
* Add: header-accessibility.php for all of the accessibility options.
* Add: header-top.php for all the top bar info.
* Add: header-columns.php for all of the columns & main menu.
* Add: footer-top.php for all of the footer columns options.
* Add: footer-site-info.php  for all of the lower footer options.
* Update: Blog excerpts with "read more" now function uniformly. For both auto generated excerpts and manually entered excerpts, they both have "read more" on or off based on theme settings. The default behavior of WordPress is to include them for auto and exclude them for manual, but this creates problems for content authors as they don't always want to write an excerpt and then there are some posts with a read more and some without. So now it's standardized in the theme.
* Update: move code for updating logo on login screen from kaya-functions.php to functions.php so its compatible with current WP.

= 1.11 - Aug 25 2024 =
* Add: Font awesome free 6 added to the theme. Font awesome 5 has been removed.

= 1.10 - Aug 24 2024 =
* Add: accessibility toolbar at top of website with text size changer.
* Add: terms of service URL to default footer.
* Add: HTML sitemap URL to default footer.
* Update: change CSS class on #masthead .container to use "flexbox-non-responsive" instead of "flexbox" which makes header always use flexbox instead of flexbox only on desktop.
* Add: CSS font size for elementor default button (Elementor removed "sizes" from buttons and changed a bit of their CSS).
* Add: function to compute reading time (estimated at 250 words per minute).
* Add: display reading time with post meta information (option in blog options to display this automatically with post meta).
* Update: single blog post hero area to contain meta information if the single blog hero is turned on.
* Update: Change line-height setting in customizer from em units to "number". Em was resulting in some undesired values when multiple font sizes were chained.
* Update: Switch the option from displaying last updated date on blogs instead of published date to displaying last updated date in addition to published date.
* Update: add role="main" to the #content div for Elementor templates (corrects lack of landmark on Elementor templates).
* Add: generateblocks padding of 15px on responsive sizes when used with full-width pages.
* Update: Focus state for links & buttons to dashed border with !important to override various button styles and create consistency.
* Add: additional content sanitization.
* Add: support for alignwide and alignfull.


= 1.9.1 - May 9 2024 =
* Update: related articles on single post.
* Update: Elementor links on hover now remove underline.

= 1.9 - Apr 24 2024 =
* Update: make "hide the page footer" option NOT hide the whole footer. For legal reasons, hiding privacy & copyright of the lower footer is no longer possible without custom coding it in a child theme. 
* Update: theme stylesheet loaded into block editor.
* Add: black-text CSS class to make text black.
* Update: woocommerce/archive-product.php to version 8.6.0.

= 1.8.1 - Mar 23 2024 =
* Add: function to set perfmatters to use large thumbnails.
* Add: CSS gap:30px property for default block editor columns module.

= 1.8 - Mar 15 2024 =
* Add: is-layout-flex set to display:flex for use of default wp columns.
* Add: Cookie Policy URL option under General settings in customerizer.
* Update: picture & anchor link to display: inline-block to allow better focus states and control of sizing.
* Update: fluent forms to inherit styling of buttons from theme.
* Update: focus border is dotted white to handle white button on blue background.
* Update: text-underline-offset set to 4px to prevent decending characters from breaking up the link underline.

= 1.7 - Dec 19 2023 =
* Fix: email for social icons color fix.
* Fix: email for social icons address fix.
* Add: Border radius for elements. 
* Add: Button border color.
* Add: Button border width.
* Add: top bar coloring.

= 1.6.3 - Dec 13 2023 =
* Update: add "Share on" screen reader text to sharing buttons.

= 1.6.2 - Nov 13 2023 =
* Fix: update postID for get_queried_object_id() in 404 template.

= 1.6.1 - Oct 27 2023 =
* Fix: extra space in the GA4 tag was preventing tracking. Corrected now.
* Update: default text color to #181818 instead of #000000.
* Fix: Font family was being rendered incorrectly when a custom font family was set. Corrected.
* Fix: remove duplicate heading1 on WooCommerce page when hero active.

= 1.6 - Oct 24 2023 =
* Removed: "Add code before </head>" from General page of Customizer.
* Removed: "Add code just after </body>" from General page of Customizer.
* Removed: "Add code just before </body>" from General page of Customizer.
* Add: Letting spacing for heading and paragraph text.

= 1.5.3 - Oct 08 2023 =
* Update: correct in stock WooCommerce text to use WooCommerce color.

= 1.5.2 - Oct 07 2023 =
* Update: lower footer text to add <p> tags.
* Update: style buttons for woocommerce on my account and cart pages.
* Update: styling for fluent forms to over some of the inaccessible defaults.

= 1.5.1 - Sep 27 2023 =
* Fix: update focus style throughout to double. Inside is "outline" which is white. Outside is blue which is "border".
* Fix: remove target="_blank" from theme.
* Remove: Google optimize shut down, code has been removed.
* Remove: link to post & author page from the post meta information. Removes redundant links.
* Update: GA4 analytics code.


= 1.5 - Sep 20 2023 =
* Fix: remove hero from woocommerce pages when hero is not turned on.
* Add: full-width-video CSS class for making a video full-width instead of stuck at 500px width.
* Removed: Notes from "Need Setup Help?" section of customizer.
* Removed: Contact Form 7 Redirect URL - we have not recommended CF7 for years now and are removing support for this feature. 
* Update: Customizer has been reordered to alphabetical order to make options easier to find.
* Update: Changed Universal Analytics to GA4.
* Update: update border colors to #777 by default for accessibility.
* Update: replaced "twitter" with "X".
* Update: change flexbox gap to 30px.

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
