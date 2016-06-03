<?php 
	$views = wpb_get_post_views(get_the_ID());
	$date = get_the_date();
?>
<div class="item-list clearfix spacepad-15">
	
		<div class="item-list-desc col-xs-12">
			<div class="item-list-desc-title clearfix">
				<a href="<?php the_permalink() ?>">
					<?php the_title(); ?>
				</a>
			</div>
			<div class="item-list-desc-stats clearfix">
				<span class="item-list-desc-date"><?php echo $date?></span>
				<span class="item-list-desc-views"><!-- - <?php echo $views?> --></span>
			</div>
		
			<?php if (!is_mobile()) : ?>
			<div class="item-list-desc-text clearfix">
				<?php 
					echo custom_excerpt(150);
				?>
			</div>
			<?php endif; ?>

				<!-- <div class="item-list-desc-button">
						<button type="button" class="btn btn-primary custom">Baca</button>
				</div> -->
		</div>

</div>
<!-- <hr> -->