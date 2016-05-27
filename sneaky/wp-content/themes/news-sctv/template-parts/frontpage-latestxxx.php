<div class="item-list col-xs-12 col-sm-4">
	<div class="item-list-thumb">
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('video_thumb'); ?>
		</a>
	</div>
	<div class="item-list-desc">
		<div class="item-list-desc-title col-xs-9">
			<?php the_title(); ?>
			<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
		</div>
		<div class="item-list-desc-icon col-xs-3">
			<i class="fa fa-file-text fa-3x" aria-hidden="true"></i>
		</div>
	</div>

</div>