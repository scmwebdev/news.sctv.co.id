<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package news_sctv_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="col-xs-12">
			<div class="col-sm-8 no-spacepad-side">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php news_sctv_posted_on(); ?>
					<span class="item-viewed"> - <?php echo wpb_get_post_views(get_the_ID()); ?></span>
					
					<hr>
				</div><!-- .entry-meta -->
			<?php
			endif; ?>
			</div>
		</header>
		<div class="article-leftCol col-xs-12 col-sm-8">
			<div class="entry-header">
				<?php the_post_thumbnail('mainbanner_lg'); ?>
			</div><!-- .entry-header -->
			<div class="entry-content">
				<?php
					/** display post content **/
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'news-sctv' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

				?>
				<?php video_custom(); ?>
				<?php post_tag(); ?>
				<?php show_gallery(); ?>
			</div><!-- .entry-content -->
		</div>
		<div class="article-rightCol col-xs-12 col-sm-4">
			<div class="article-section clearfix" id="related-content">
				<h3 class="title">Related Article</h3>
				<?php related_posts(); ?>
			</div>
			<div class="article-section clearfix" id="most-popular">
				<h3 class="title">Most Popular</h3>
				<?php
						$max_post = max_post(4, 6);
						$args = array (
							'post_status'            => array( 'publish' ),
							// 'order'                  => 'ASC',
							'post_type' 			 => 'post',
							'posts_per_page' 		 => $max_post,
							'meta_query'             => array(
									array(
										'key'       => 'wpb_post_views_count',
										'value'     => '3',
										'compare'   => '>',
										'orderby' 	=> 'meta_value_num', 
										'order' 	=> 'ASC'
									),
								),
							);

						// The Query
						$query = new WP_Query( $args );

						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								
								get_template_part('template-parts/frontpage', 'popular');
							}
						} else {
							// no posts found
							echo 'no posts found';
						}

						// Restore original Post Data
						wp_reset_postdata();
					?>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
