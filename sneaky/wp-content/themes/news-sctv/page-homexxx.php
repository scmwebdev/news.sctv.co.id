<?php get_header(); ?>

<div class="frontpage" id="site-page-content">
	<header id="site-page-header">
	<div class="segment col-xs-12 col-md-9 no-padding" id="mainbanner">
			<?php 

				$featuredBanner = new Banner();
				$featuredBanner->featured_img('mainbanner_lg');

			 ?>
		</div>

		<div class="segment col-xs-12 col-md-3 template2" id="latest">
			<h2 class="title">Latest News</h2>
			<div class="video-list">
			<?php 
				ArticlePost::latest_news();
			?>
			</div>
		</div>
	</header><!-- /header -->
	<section class="clearfix section-content section-content-bannerads">

		<div class="container-fluid no-spacepad-side">
			<div class="segment col-xs-9 no-padding bannerads" id="long-banner-ads">
				<?php 
	        		$long = new Banner();
					$long->ads('long_banner_ads');
        		?>
			</div>
			<div class="segment col-xs-3 no-spacepad-side bannerads" id="small-banner-ads">
				<?php 
					$small = new Banner();
					$small->ads('small_banner_ads');
        		?>
			</div>
		</div>
	</section>
	<section class="clearfix section-content">
	   <div class="container-fluid <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>">
	        <div class="no-spacepad-side">
	        		<?php 
						$get_tag = get_field('breaking_news');

						// if breaking news exist, show it
						($get_tag) ? ArticlePost::breaking_news() : '';
					?>
	        	<!-- Top Stories -->
	        	<div class="segment col-sm-8 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="top-stories">
		        	<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
						<h2 class="title">Top Stories</h2>
					</div>
					<div class="<?php echo (is_mobile()) ? 'slicky' : ''; ?>">
						<?php 
							$article = new ArticlePost('template-parts/frontpage', 'top');
							$article->get_post('top_stories', 'yes');			
						?>
					</div>
				</div>

				<!-- Most Popular -->
				<div class="segment col-sm-4 <?php echo (is_mobile()) ? 'no-spacepad-side' : ' '; ?>" id="most-popular">
					<div class="segment-wrap clearfix item-post" >
						<div class="<?php echo (is_mobile()) ? '' : 'spacemar-20'; ?>">
							<h2 class="title">Most Popular</h2>
						</div>
						<div class="<?php echo (is_mobile()) ? 'slicky' : 'no-slicky'; ?>">
							<?php frontpage_posts('wpb_post_views_count', 1, 'popular', 3, 3, 'ASC', '>' ); ?>
						</div>
					</div>
				</div>
	        </div>
	    </div>
	</section>

</div>

<?php get_footer(); ?>
