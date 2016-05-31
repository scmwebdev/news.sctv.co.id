<?php get_header(); ?>

<div class="frontpage" id="site-page-content">
	<header id="site-page-header">

		<div class="segment col-xs-12 col-md-9 no-padding" id="mainbanner">
			<?php 

				$get_banner = get_field('banner');
				$banner = wp_get_attachment_image( $get_banner , 'mainbanner_lg');
				if ($banner) { 
					echo $banner;
				} else {
					echo '';
				}
			 ?>
		</div>

		<div class="segment col-xs-12 col-md-3 template2" id="latest">
			<h2 class="title">Latest News</h2>
			
			<div class="video-list">
			<?php

				$max_post = max_post();
				$args = array (
					'post_status'            => array( 'publish' ),
					'order'                  => 'DESC',
					'post_type' 			 => 'post',
					'posts_per_page' 		 => $max_post,
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();

						if (is_mobile()) {
							get_template_part('template-parts/content', 'post');
						} else {
							get_template_part('template-parts/frontpage', 'latest');
						}
						
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
	</header><!-- /header -->
	<content class="clearfix">
		<div class="container">
			<div class="segment col-sm-9">
				<div class="segment-wrap row clearfix" id="top-stories">
					<div class="spacemar-20">
						<h2 class="title">Top Stories</h2>
					</div>
						
				<?php
					$max_post = max_post();
					$args = array (
						'post_status'            => array( 'publish' ),
						'order'                  => 'DESC',
						'post_type' 			 => 'post',
						'posts_per_page' 		 => $max_post,
						'meta_query' => array(
							array(
								'key'       => 'top_stories',
								'value'     => 'yes',
								'compare'   => '=',
							),
						),
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							get_template_part('template-parts/content', 'post');
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
			<div class="segment col-sm-3">
				Banner Ads
			</div>
		</div>
	</content>
</div>

<?php get_footer(); ?>