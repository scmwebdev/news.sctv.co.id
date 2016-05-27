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
		<header class="entry-title col-xs-12">
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

					/** display post tags **/
					the_tags('<div class="entry-tags clearfix">', ' ', '</div>');

					$target = get_field('video');
					$new_target = str_replace('player_only=false', 'player_only=true', $target);
					echo $new_target;
				?>
				<?php  
					$gallery = get_field('gallery');
					if($gallery) { ?>

						<hr>
						<h3 class="subtitle">Gallery</h3>
						<div class="article-gallery row">
							<?php echo $gallery; ?>
						</div>
						<hr>
				<?php } ?>
			</div><!-- .entry-content -->
		</div>
		<div class="article-rightCol col-xs-12 col-sm-4">
			<?php related_posts(); ?>
		</div>
	</div>
</article><!-- #post-## -->
