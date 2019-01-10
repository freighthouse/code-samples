<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
	"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php print $head; ?>
	<title><?php print $head_title; ?></title>
    <?php header("Access-Control-Allow-Origin: *"); ?>
	<?php print $styles; ?>
	<?php print $scripts; ?>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TBZQ6MF');</script>
    <!-- End Google Tag Manager -->

	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/6635656/6298392/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="/sites/all/themes/custom/rif2018/build/fonts/Branding-Semibold.css" />
	
	<link rel="apple-touch-icon" sizes="57x57" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/sites/all/themes/custom/rif2018/build/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/sites/all/themes/custom/rif2018/build/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/sites/all/themes/custom/rif2018/build/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/sites/all/themes/custom/rif2018/build/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/sites/all/themes/custom/rif2018/build/favicon/favicon-16x16.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- Google Web-master Tools -->
	<meta name="google-site-verification" content="BEtURhA2V3UIT-z7v3h80xd8qrseYam_-0ZnxOIiRG4" />
	<meta name="google-site-verification" content="mVUalI6sjbImMCo_jdoANre7pUP8gtn9o_hbo7hFAtg" />

</head>
<body class="<?php print $classes; ?> student-head student-hide" <?php print $attributes;?> style="padding-top: 0px;">

<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBZQ6MF"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="skip-link">
	<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
</div>
<?php print $page_top; ?>
<?php print $page; ?>
<?php print $page_bottom; ?>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59b69392419c04f5"></script>

</body>

</html>
