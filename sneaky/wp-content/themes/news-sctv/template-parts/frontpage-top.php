<?php 
	$views = wpb_get_post_views(get_the_ID());
	$date = get_the_date();
?>

<div class="item-list <?php fetch_category('item-top'); ?> clearfix spacepad-15">
	<?php if(has_post_thumbnail()) { ?>
		<div class="item-list-thumb col-xs-12 col-sm-5">
			<a href="<?php the_permalink() ?>">

				<img class="img-responsive center-block" src="<?php the_post_thumbnail_url(); ?>" alt="Thumbnail - <?php the_title() ?> ">
				
			</a>
		</div>
	<?php } ?>
	<div class="item-list-desc col-xs-12 col-sm-7">
		<div class="item-list-desc-title">
			<a href="<?php the_permalink() ?>">
				<?php the_title(); ?>
			</a>
		</div>
		<div class="item-list-desc-stats clearfix">
			<div class="item-list-desc-date pull-left"><?php echo $date; ?></div>
		</div>
		<div class="item-list-desc-text">
			<?php 
				echo custom_excerpt(250);
			?>
		</div>
		<!-- <div class="item-list-desc-button">
			<a href="<?php the_permalink() ?>">
				<button type="button" class="btn btn-primary custom">Baca</button>
			</a>
		</div> -->
	</div>
</div>
<!-- <hr> -->