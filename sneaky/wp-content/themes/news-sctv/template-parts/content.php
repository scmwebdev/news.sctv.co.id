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
	<header class="entry-header">
			<?php 
				$getVideo = get_field('video');
				$video = str_replace('player_only=false', 'player_only=true', $getVideo);
				if($video) {
					echo $video;
				} else {
					the_post_thumbnail('mainbanner_lg');	
				}
				
		 	?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container">
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

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'news-sctv' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

		?>
			<div class="article-gallery">
				<?php 
					$getGallery = get_field('gallery');
					echo $getGallery;
				 ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
