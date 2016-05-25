<?php get_header(); ?>

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
	<?php

		$args = array (
			// 'post_type'              => array( 'post' ),
			'post_status'            => array( 'publish' ),
			'order'                  => 'DESC',
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
<?php get_footer(); ?>