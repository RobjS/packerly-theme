<?php
/**
 * packerly-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package packerly-theme
 */

if ( ! function_exists( 'packerly_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function packerly_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on packerly-theme, use a find and replace
	 * to change 'packerly-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'packerly-theme', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'packerly-theme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'packerly_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'packerly_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function packerly_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'packerly_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'packerly_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function packerly_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'packerly-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'packerly_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function packerly_theme_scripts() {
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	
	//wp_enqueue_style ('bootstrap-theme', get_stylesheet_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap') );
	
	wp_enqueue_style( 'bootstrap-slider', get_stylesheet_directory_uri() . '/css/bootstrap-slider.min.css', array('bootstrap'), '20160311' );
	
	wp_enqueue_style( 'packerly-theme-style', get_stylesheet_uri(), array(), '20160311' );
	
	wp_enqueue_style ( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Pacifico|Lato|' );

	wp_enqueue_script( 'jquery1', get_template_directory_uri() . '/js/jquery-1.12.1.js' );
	
	wp_enqueue_script( 'packerly-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'packerly-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery1'), '20160311', false );
	
	wp_enqueue_script( 'bootstrap-slider-script', get_template_directory_uri() . '/js/bootstrap-slider.min.js', array('bootstrap-script'), '20160311', false );
	
	wp_enqueue_script( 'packerly', get_template_directory_uri() . '/js/packerly.js', array('bootstrap-script'), '20160311', false );
}
add_action( 'wp_enqueue_scripts', 'packerly_theme_scripts' );

/**
* Add active class to currently selected menu item
*/
function packerly_theme_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'packerly_theme_nav_class' , 10 , 2);

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
