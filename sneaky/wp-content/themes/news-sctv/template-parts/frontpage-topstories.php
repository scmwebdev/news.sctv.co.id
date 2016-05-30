<div class="item-list clearfix">
	<div class="item-list-thumb col-xs-12 col-sm-4">
		<a href="<?php the_permalink() ?>">
			<?php the_post_thumbnail('video_thumb'); ?>
		</a>
	</div>
	<div class="item-list-desc col-xs-12 col-sm-8">
		<div class="item-list-desc-title">
			<?php the_title(); ?>
			<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
		</div>
		<div class="item-list-desc-text">
			<?php echo substr(get_the_excerpt(), 0, 250) . ' ...' ?>
		</div>
		<div class="item-list-desc-button">
			<a href="<?php the_permalink() ?>">
				<button type="button" class="btn btn-primary custom">Baca</button>
			</a>
		</div>
	</div>
</div>