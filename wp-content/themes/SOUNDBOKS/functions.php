<?php
/**
 * SOUNDBOKS functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SOUNDBOKS
 */

if ( ! function_exists( 'soundboks_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soundboks_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SOUNDBOKS, use a find and replace
	 * to change 'soundboks' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'soundboks', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'soundboks' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'soundboks_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'soundboks_setup' );

add_theme_support( 'woocommerce' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soundboks_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soundboks_content_width', 640 );
}
add_action( 'after_setup_theme', 'soundboks_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soundboks_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'soundboks' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'soundboks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'soundboks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soundboks_scripts() {
wp_enqueue_style( 'style1', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
wp_enqueue_style( 'style2', get_template_directory_uri() . '/assets/frameworks/bootstrap/css/bootstrap.min.css' );
wp_enqueue_style( 'style3', get_stylesheet_uri() );
wp_enqueue_style( 'style4', get_template_directory_uri() . '/assets/css/custom.css' );
wp_enqueue_style( 'responsive', get_template_directory_uri() . '/layouts/responsive.css' );

wp_enqueue_script( 'soundboks-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/frameworks/bootstrap/js/bootstrap.min.js',array('jquery'),'', true);

wp_enqueue_script( 'soundboks-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soundboks_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';





function get_applied_coupons()  // this is the action data variable we set in ajax
{
    foreach(WC()->cart->get_coupons() as $applied_coupon):  if ( $post = get_post( $applied_coupon->id ) ) {
                        if ( !empty( $post->post_excerpt ) ) {
                                                        ?>
                            <div class="applied_coupon" id='coupon_<?php echo $coupon->id; ?>'>
                                <div class="row">
                                    
                                    <div class="col-xs-1">
                                    <i class="glyphicon glyphicon-ok-sign" style="color:#7ed321"></i>
                                    
                                    </div> 
                                    <div class="col-xs-11">
                                    <strong><?php echo  $applied_coupon->code; ?>: </strong><?php echo $post->post_excerpt ; ?>
                                    </div>
                                </div>
                                
                            </div>
                                                    <?php
                                                    }}
                                                        
                                                    endforeach;
                                                   
           wp_die();                                         
}
 
// in first parameter prefix function name with wp_ajax_ 
// this action is required in order to recieve data sent from ajax 
add_action('wp_ajax_get_applied_coupons', 'get_applied_coupons');
add_action('wp_ajax_nopriv_get_applied_coupons', 'get_applied_coupons');
 