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

				$max_post = max_post(4, 6);
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
	</header><!-- /header -->
	<section class="clearfix section-content">
		<div class="container-fluid <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>">
			<div class="col-sm-9 no-spacepad-side">
				<div class="segment col-sm-12 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="breaking-news">
					<div class="segment-wrap clearfix item-post">
						<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
							<h2 class="title">Breaking News</h2>
						</div>
						<div class="<?php echo (is_mobile()) ? 'slicky' : ''; ?>">
						<?php
							$get_tag = get_field('breaking_news');
							$args = array (
								'post_status'            => array( 'publish' ),
								'order'                  => 'DESC',
								'post_type' 			 => 'post',
								'tag_id'			     => $get_tag
							);

							// The Query
							$query = new WP_Query( $args );

							// The Loop
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
									get_template_part('template-parts/frontpage', 'breakingnews');
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
				<div class="segment col-sm-8 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="top-stories">
					<div class="segment-wrap clearfix item-post">
						<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
							<h2 class="title">Top Stories</h2>
						</div>
						<div class="<?php echo (is_mobile()) ? 'slicky' : ''; ?>">
						<?php
							$max_post = max_post(4, 6);
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
									get_template_part('template-parts/frontpage', 'top');
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
				<div class="segment col-sm-4 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="most-popular">
					
					<div class="segment-wrap clearfix item-post" >
						<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
							<h2 class="title">Most Popular</h2>
						</div>
						<div class="<?php // echo (is_mobile()) ? 'slicky' : 'no-slicky'; ?>">
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
			</div>
			<div class="col-sm-3">
				Banner Ads
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>