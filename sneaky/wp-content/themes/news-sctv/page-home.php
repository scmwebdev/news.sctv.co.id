<?php get_header(); ?>

<div id="site-page-content">
	<div class="segment" id="mainbanner">
		<?php 

			$get_banner = get_field('banner');
			$banner = wp_get_attachment_image( $get_banner , 'mainbanner_lg');
			if ($banner) { 
				echo $banner;
			}
		 ?>
	</div>

	<div class="segment" id="latest">
		<div class="container">
			<div class="segment-title">
				<h2 class="title">Berita Paling Baru</h2>
			</div>
			
			<div class="video-list row">
			<?php
				$args = array (
					'post_status'            => array( 'publish' ),
					'order'                  => 'DESC',
					'post_type' 			 => 'post',
					'posts_per_page' 		 => 6,
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('template-parts/frontpage', 'latest');
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
</div>

<?php get_footer(); ?>