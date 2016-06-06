<?php
/**
 * This template is for displaying lists of posts
 * Template Name: List of Posts page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package news_sctv_theme
 */

get_header(); ?>

	<div id="primary" class="content-area site-page-content">
		<main id="main" class="site-main" role="main">
		<div class="container-fluid spacepad-15">
			
		
		<?php
			$args = array (
				'post_status'            => array( 'publish' ),
				'order'                  => 'DESC',
				'post_type' 			 => 'post',
				'posts_per_page' 		 => 12,
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
						get_template_part( 'template-parts/content', 'list' );
				}
			} else {
				// no posts found
				echo 'no posts found';
			}

			// Restore original Post Data
			wp_reset_postdata();

		?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
