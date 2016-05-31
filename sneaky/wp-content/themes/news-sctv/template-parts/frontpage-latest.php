<div class="item-list col-xs-12">
	<a href="<?php echo get_permalink(); ?>">
	<div class="item-list-thumb col-xs-4">
		<?php			
			if (has_post_thumbnail()) {
				the_post_thumbnail('article_thumb'); 
			} else {
				noimage();
			}
		?>
	</div>
	<div class="item-list-desc col-xs-8">
		<div class="item-list-desc-title ">
			<?php the_title(); ?>
			<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
		</div>
	</div>
	</a>
</div>