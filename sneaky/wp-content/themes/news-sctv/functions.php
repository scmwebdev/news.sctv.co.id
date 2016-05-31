<?php

/**
 * news sctv theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package news_sctv_theme
 */

if ( ! function_exists( 'news_sctv_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function news_sctv_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on news sctv theme, use a find and replace
	 * to change 'news-sctv' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'news-sctv', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'news-sctv' ),
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
	add_theme_support( 'custom-background', apply_filters( 'news_sctv_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'news_sctv_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_sctv_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'news_sctv_content_width', 640 );
}
add_action( 'after_setup_theme', 'news_sctv_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_sctv_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'news-sctv' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'news-sctv' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'news_sctv_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function news_sctv_scripts() {
	wp_enqueue_style( 'news-sctv-style', get_stylesheet_uri() );

	wp_enqueue_script( 'news-sctv-js', get_template_directory_uri() . '/news-sctv.js', array(), '', true );

	wp_enqueue_script( 'news-sctv-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'news-sctv-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'news_sctv_scripts' );

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

/* ==================================================================
 * Additional Image Sizes
 * ================================================================== */

add_image_size( 'mainBanner_lg', 1920, 600, true);
add_image_size( 'mainBanner_lg_2', 1000, 600, true);
add_image_size( 'mainBanner_md', 992, 400, true);
add_image_size( 'mainBanner_xs', 600, 600, true);
add_image_size( 'video_thumb', 400, 250, hard);
add_image_size( 'article_thumb', 250, false);
add_image_size( 'logo', 200, 200, hard);

/* ==================================================================
 * Display child pages list
 * ================================================================== */

function wpb_list_child_pages() { 

global $post; 
if ( is_page() && $post->post_parent )
  $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
  $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
if ( $childpages ) {
  $string = '<ul class="content-list list-parent __nodots __nopaddingleft __normarginleft">' . $childpages . '</ul>';
}
return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

/* ==================================================================
 * Add the_slug() function
 * ================================================================== */

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

/* ==================================================================
 * Custom Pagination
 * ================================================================== */

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo '<nav class="custom-pagination col-xs-12 text-center spacepad">';
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}

/* ==================================================================
 * Remove P tags - ACF
 * ================================================================== */

remove_filter ('acf_the_content', 'wpautop');

/* ==================================================================
 * Replace String for Vidio.com Embed
 * by default vidio.com set player only to 'false' so we have to change
 * that to 'true' automatically
 * ================================================================== */

function videoCustom($title = 'Berikut Cuplikan') {

	$getVideo = get_field('video');
	$video = str_replace('player_only=false', 'player_only=true', $getVideo);
	if ($video) {
		echo '<div class="article-video spacepad-20">';
		echo '<h3 class="subtitle">' . $title . '</h3>';
		echo $video;
		echo '</div>';
	}
	
}

function post_tag() {
	if (the_tags()) {
		echo '<div class="article-tags spacepad-20">';
		the_tags('<div class="entry-tags clearfix">', ' ', '</div>');
		echo '</div>';
	}
}

// display custom excerpt with
function custom_excerpt($charLimit) {

	$excerpt = get_the_excerpt();
	$content = get_the_content();
	$readmore = ' ...';

	if($content) {
		$new_excerpt = substr($excerpt, 0, $charLimit) . $readmore;
		return $new_excerpt;
	}
}

// dynamically change max post between mobile and desktop
function max_post($mobile, $desktop) {

	$max_post = 0;

	if(is_mobile()) {
		$max_post = $mobile;
	} else {
		$max_post = $desktop;
	}

	return $max_post;
}

// Create a function to display no image easily
function noimage() {

	// add env variable
	include('env.php');

	
	echo '<img class="img-responsive center-block" src="'. $env_config['site_url'] .'/wp-content/uploads/2016/05/noimage.png" alt="no image">';
}