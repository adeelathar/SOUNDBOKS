<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SOUNDBOKS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'soundboks' ); ?></a>
        

            <nav class="navbar navbar-default "  >
            <div class="container">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                    <img src="<?php echo get_template_directory_uri().'/assets/images/logo.png';  ?>" />
                </a>
              </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <?php wp_nav_menu( array( 'menu_class'      => 'menu nav navbar-nav pull-right','theme_location' => 'primary', 'menu_id' => 'site-navigation' ) ); ?>
          
                </div>
            </div>
          </nav>
            
		



	<div id="content" class="site-content">
