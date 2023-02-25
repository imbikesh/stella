<?php
/**
 * stella functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stella
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function stella_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on stella, use a find and replace
		* to change 'stella' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'stella', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'stella' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'stella_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'stella_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stella_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stella_content_width', 640 );
}
add_action( 'after_setup_theme', 'stella_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stella_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'stella' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'stella' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'stella_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stella_scripts() {

	$themeDir = get_template_directory_uri();
	$temDir = get_template_directory();

	//theme style
	wp_enqueue_style( 'stella-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'stella-style', 'rtl', 'replace' );

	//bootstrap
	wp_register_style( 'stella-bootstrap', $themeDir. '/css/bootstrap.css', [], false, 'all' );
	wp_enqueue_style( 'stella-bootstrap' );

	//custom style
	wp_register_style( 'stella-custom-style', $themeDir. '/css/style.css', [], filemtime( $temDir. '/css/style.css'), 'all' );
	wp_enqueue_style( 'stella-custom-style' );

	//Responsive
	wp_register_style( 'stella-responsive', $themeDir. '/css/responsive.css', [], filemtime( $temDir. '/css/responsive.css'), 'all' );
	wp_enqueue_style( 'stella-responsive' );

	//Resister propper
	wp_register_script( 'stella-propper', $themeDir. '/js/popper.min.js', ['jquery'], false, true );
	//Enqueue propper
	wp_enqueue_script( 'stella-propper' );

	// Register jQuery UI
	wp_register_script( 'stella-jui', $themeDir. '/js/jquery-ui.js', ['jquery'], false, true );
	// Enqueue jQuery UI
	wp_enqueue_script( 'stella-jui' );

	// Register Bootstrap
	wp_register_script( 'stella-bootjs', $themeDir. '/js/bootstrap.min.js', [], false, true );
	// Enqueue Bootstrap
	wp_enqueue_script( 'stella-bootjs' );

	// Register Fancybox
	wp_register_script( 'stella-fancybox', $themeDir. '/js/jquery.fancybox.js', [], false, true );
	// Enqueue Fancybox
	wp_enqueue_script( 'stella-fancybox' );

	// Register isotope
	wp_register_script( 'stella-isotope', $themeDir. '/js/isotope.js', [], false, true );
	// Enqueue isotope
	wp_enqueue_script( 'stella-isotope' );

	// Register OWL
	wp_register_script( 'stella-owl', $themeDir. '/js/owl.js', [], false, true );
	// Enqueue OWL
	wp_enqueue_script( 'stella-owl' );

	// Register wow
	wp_register_script( 'stella-wow', $themeDir. '/js/wow.js', [], false, true );
	// Enqueue wow
	wp_enqueue_script( 'stella-wow' );

	// Register Appear
	wp_register_script( 'stella-appear', $themeDir. '/js/appear.js', [], false, true );
	// Enqueue Appear
	wp_enqueue_script( 'stella-appear' );

	// Register Scrollbar
	wp_register_script( 'stella-scrollbar', $themeDir. '/js/scrollbar.js', [], false, true );
	// Enqueue Scrollbar
	wp_enqueue_script( 'stella-scrollbar' );

	// Register script
	wp_register_script( 'stella-script', $themeDir. '/js/script.js', [], filemtime($temDir. '/js/script.js'), true );
	// Enqueue script
	wp_enqueue_script( 'stella-script' );

	wp_enqueue_script( 'stella-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stella_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
