<?php
/**
 * Skokov functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Skokov
 */

if ( ! function_exists( 'skokov_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skokov_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Skokov, use a find and replace
	 * to change 'skokov' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'skokov', get_template_directory() . '/languages' );

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
	add_image_size('header-single-post', 1000, 500, array(left, top));
    add_image_size('mini', 100, 70, array(left, top));
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'skokov' ),
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
	add_theme_support( 'custom-background', apply_filters( 'skokov_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'skokov_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skokov_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skokov' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skokov' ),
		'before_widget' => '<div id="%1$s" class="element-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
        'name'          => esc_html__( 'footer1', 'skokov' ),
        'id'            => 'footer1',
        'before_widget' => '<div id="%1$s" class="footer-section %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'footer2', 'skokov' ),
        'id'            => 'footer2',
        'before_widget' => '<div id="%1$s" class="footer-section %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'footer3', 'skokov' ),
        'id'            => 'footer3',
        'before_widget' => '<div id="%1$s" class="footer-section %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Top-quote', 'skokov' ),
        'id'            => 'top-quote',
        'before_widget' => '<div id="%1$s"class="introduction %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'skokov_widgets_init' );
/**
 * Create widget
 */



/**
 * Enqueue scripts and styles.
 */
function skokov_scripts() {
	wp_enqueue_style( 'skokov-style', get_stylesheet_uri() );
	wp_enqueue_style( 'libs-css', get_template_directory_uri() . '/style/libs.css', array(), true );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style/main.css', array(), true );

    wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/95a5ddb753.js', true);
	wp_enqueue_script( 'skokov-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'skokov-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js', array(),  false );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array(),  false );
}
add_action( 'wp_enqueue_scripts', 'skokov_scripts' );

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

/**
 * My widgets
 */
require get_template_directory() . '/inc/quote-widget.php';
require get_template_directory() . '/inc/recent-post.php';
require get_template_directory() . '/inc/contact-widget.php';


/**
 * Adds theme settings page in the WordPress admin panel
 */
add_action('admin_menu', function(){
    add_theme_page('Tune', 'Tune', 'edit_theme_options', 'customize.php');
});

add_action('customize_register', function($customizer){
    $customizer->add_section(
        'copyright_text_section',
        array(
            'title' => 'Copyright text',
            'description' => 'You can add or change the text of the copyright, which is displayed at the bottom of the page'
        )
    );
    $customizer->add_setting(
        'copyright_textbox',
        array('default' => 'Copyright text')
    );
    $customizer->add_control(
        'copyright_textbox',
        array(
            'label' => 'Copyright text',
            'section' => 'copyright_text_section',
            'type' => 'text',
        )
    );
});

add_action('customize_register', function($customizer){
    $customizer->add_section(
        'background_page_title-section',
        array(
            'title' => 'Background image for the page title',
            'description' => 'Here you can change the background image for the page header',
            'priority' => 35,
        )
    );
    $customizer->add_setting('background-page-title');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-page-title',
            array(
                'label' => 'Download the background image for the page title',
                'section' => 'background_page_title-section',
                'settings' => 'background-page-title'
            )
        )
    );
});