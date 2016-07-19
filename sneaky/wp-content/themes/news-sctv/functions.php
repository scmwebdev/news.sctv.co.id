<?php

/**
 * news sctv theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package news_sctv_theme
 */

include 'inc/module/class.Banner.php';
include 'inc/module/class.Article.php';

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

add_image_size( 'mainBanner_lg', 1200, 600, true);
// add_image_size( 'mainBanner_md', 992, 400, true);
add_image_size( 'mainBanner_xs', 600, 600, true);
add_image_size( 'video_thumb', 400, 250, hard);
add_image_size( 'article_thumb', 250, 250, hard);
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
 * Retrieve current url
 * ================================================================== */

function current_page_url() {
  $pageURL = 'http';
  if( isset($_SERVER["HTTPS"]) ) {
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
  }
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
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

// Retrieve video 
function video_custom($title = '') {

	$getVideo = get_field('video');
	$video = str_replace('player_only=false', 'player_only=true', $getVideo);
	if ($video) {
		echo '<div class="article-video spacepad-20">';
		echo '<h3 class="subtitle">' . $title . '</h3>';
		echo $video;
		echo '</div>';
	}
	
}

// retrieve post tag
function post_tag() {
	if (the_tags()) {
		echo '<div class="article-tags spacepad-20">';
		the_tags('<div class="entry-tags clearfix">', ' ', '</div>');
		echo '</div>';
	}
}

function show_gallery() {
	$gallery = get_field('gallery');
	if($gallery) {

		echo '<hr>
		<h3 class="subtitle">Gallery</h3>
		<div class="article-gallery row">
			'. $gallery .'
		</div>
		<hr>';
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
	echo '<img class="img-responsive center-block no-image" src="'. $env_config['site_url'] .'/wp-content/uploads/2016/05/noimage.png" alt="no image">';
}

// Fetch category and outputs it
function fetch_category($classPrefix) {
	$categories = get_the_category();
	foreach ($categories as $cat ) {
		$category = strtolower($cat->name);
		//spacing at the end is required
		$output = $classPrefix . '-' . $category . ' ';
		echo $output;
	}
	
};

/* ==================================================================
 * Custom Most Popular Script
 * ================================================================== */

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/* ==================================================================
 * Frontpage Posts
 * ================================================================== */

function frontpage_posts($key, $keyValue, $template, $minPost, $maxPost, $order = 'DESC', $compare = '=') {

	// set the min and max of posts and store it in a var
	$post_per_page = max_post($minPost, $maxPost);

	// set the filters/requirement for the query
	$args = array (
		'post_status'            => array( 'publish' ),
		'order'                  => 'DESC',
		'post_type' 			 => 'post',
		'posts_per_page' 		 => $post_per_page,
		'meta_query' => array(
			array(
				'key'       => $key,
				'value'     => $keyValue,
				'compare'   => $compare,
				'order'		=> $order
			),
		),
	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part('template-parts/frontpage', $template);
		}
	} else {
		// no posts found
		echo 'no posts found';
	}

	// Restore original Post Data
	wp_reset_postdata();
}

/* ==================================================================
 * Frontpage Main Banner
 * this function fetch the latest article and display it as main banner
 * ================================================================== */

function get_mainbanner() {

	$args = array (
		'post_status'            => array( 'publish' ),
		'order'                  => 'DESC',
		'post_type' 			 => 'post',
		'posts_per_page' 		 => 4,
	);

	// The Query
	$mainBanner = new WP_Query( $args );

	// The Loop
	if ( $mainBanner->have_posts() ) {
		echo '<div class="segment col-xs-12 col-md-9 no-padding" id="mainbanner">';
		while ( $mainBanner->have_posts() ) {
			$mainBanner->the_post();
				get_template_part('template-parts/frontpage', 'mainbanner');
		}
		echo '</div>';
	} else {
		echo 'no posts found!';
	}

	// Restore original Post Data
	wp_reset_postdata();

	/**
	 * get latest post details w/o the main banner (using frontpage-latest template)
	 */

	// The Query
	$latest = new WP_Query( $args );

	// The Loop
	if ( $latest->have_posts() ) {

		$header  = '<div class="segment col-xs-12 col-md-3 template2 " id="latest">';
		$header .= '<h2 class="title clearfix trigger"><span class="float-left">Latest News</span><i class="float-right fa fa-chevron-up visible-xs trigger-icon " data-icon="rotate">&nbsp;</i></h2>';
		$header .= '<div class="video-list">';
		
		echo $header;

		while ( $latest->have_posts() ) {
			$latest->the_post();
				get_template_part('template-parts/frontpage', 'latest');
		}
		echo '</div>';
		echo '</div>';
	} else {
		echo 'no posts found!';
	}

	// Restore original Post Data
	wp_reset_postdata();

}


