<?php get_header(); ?>

<div class="frontpage" id="site-page-content">
	<header id="site-page-header">

		<div class="segment col-xs-12 col-md-9 no-padding" id="mainbanner">
			<?php 

				$get_banner = get_field('banner');
				$banner = wp_get_attachment_image( $get_banner , 'mainbanner_lg');
				if ($banner) { echo $banner; }
			 ?>
		</div>

		<div class="segment col-xs-12 col-md-3 template2" id="latest">
			<h2 class="title">Latest News</h2>
			
			<div class="video-list">
			<?php latest_news('latest', 4, 6); ?>
			</div>
		</div>
	</header><!-- /header -->
	<section class="clearfix section-content">
	    <div class="container-fluid <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>">
	        <div class="col-sm-9 leftCol no-spacepad-side">
	        	<!-- breaking news -->
	        	<div class="segment col-sm-12 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="breaking-news">
	        		<?php 
						$get_tag = get_field('breaking_news');
						// if breaking news is true..
						if($get_tag) { 
					?>

					<div class="segment-wrap clearfix item-post">
					    <div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
					        <h2 class="title">Breaking News</h2>
					    </div>
					    <div class="slicky-container">
							<div class="slicky">
						    	<?php breaking_news(); ?>
						    </div>
					    </div>

					</div>
					<?php }//endif ?>
	        	</div>
	        	<!-- Top Stories -->
	        	<div class="segment col-sm-8 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="top-stories">
		        	<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
						<h2 class="title">Top Stories</h2>
					</div>
					<div class="<?php echo (is_mobile()) ? 'slicky' : ''; ?>">
						<?php frontpage_posts('top_stories', 'yes', 'top', 4, 6) ?>
					</div>
				</div>
				<div class="segment col-sm-4 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="most-popular">
					<div class="segment-wrap clearfix item-post" >
						<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
							<h2 class="title">Most Popular</h2>
						</div>
						<div class="<?php echo (is_mobile()) ? 'slicky' : 'no-slicky'; ?>">
							<?php frontpage_posts('wpb_post_views_count', 3, 'popular', 4, 6, 'ASC', '>' ); ?>
						</div>
					</div>
	        </div>
	        <div class="col-sm-3 rightCol">
	            Banner Ads
	        </div>
	    </div>
	</section>
</div>

<?php get_footer(); ?>
