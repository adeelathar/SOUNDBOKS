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

      
        <?php wc_print_notices(); 
 //wc_print_notice('test', 'error');
        ?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'soundboks' ); ?></a>
            
            
            <nav class="navbar"  >
                <div class="container">
                    
                    <div class='row'>
                        <div class="col-sm-12 col-md-3 phone-hide">
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
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class='row'>
                                <div class="col-sm-12 col-md-4 clearfix">
                                    <ul class="menu nav navbar-nav pull-right countries">
                                        <li><a href='#'>US</a></li>
                                        <li class='active'><a href='#'>EUROPE</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-12 col-md-8 clearfix">
                                    <div id="navbar" class="navbar-collapse collapse">
                                        
                                                        <?php 
                                                        $cart_circle = "";
                                                        if(WC()->cart->get_cart_contents_count()>0)
                                                        {
                                                             $cart_circle = "<div class='circle'></div>";
                                                        }
                                                       
                                                        $cart_link = '<li class="cart_icon"><a href="'.wc_get_cart_url().'"><i class="glyphicon glyphicon-shopping-cart">'.$cart_circle.'</i></a></li>';
                                                        
                                                        
                                                        wp_nav_menu( array( 'menu_class'      => 'menu nav navbar-nav pull-right','theme_location' => 'primary', 'menu_id' => 'site-navigation', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s '.$cart_link.'</ul>' ) ); ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        
                        
                    </div>
                </div>
            </nav>
            
            <nav class="phone-show"><!--Navigation for phone goes here--></nav>
            

            <div id="content" class="site-content">
