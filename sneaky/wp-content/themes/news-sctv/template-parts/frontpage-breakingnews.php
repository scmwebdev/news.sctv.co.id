<?php 
	$views = wpb_get_post_views(get_the_ID());
	$date = get_the_date();
?>

<div class="item-list <?php fetch_category('item-breaking'); ?> col-xs-3 spacepad-15">
	<?php if(has_post_thumbnail()) { ?>
		<div class="item-list-thumb">
			<a href="<?php the_permalink() ?>">
				<?php
					if(has_post_thumbnail()) {
						echo the_post_thumbnail('video_thumb');
					}
				?>
			</a>
		</div>
	<?php } ?>
	<div class="item-list-desc">
		<div class="item-list-desc-title">
			<a href="<?php the_permalink() ?>">
				<?php the_title(); ?>
			</a>
		</div>
	</div>
</div>