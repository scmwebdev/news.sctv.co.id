<div class="item-list item-latest <?php fetch_category('item-latest'); ?>col-xs-12" data-id="<?php echo get_the_ID() ?>">
	<a href="<?php echo get_permalink(); ?>">
	
		<?php
			if(is_mobile()) {
				echo '<div class="item-list-thumb col-xs-4">';
				if (has_post_thumbnail()) {
					the_post_thumbnail('article_thumb'); 
				} else {
					noimage();
				}
				echo '</div>';
			}

		?>
	
	<div class="item-list-desc col-xs-8">
		<div class="item-list-desc-title ">
			<?php the_title(); ?>
			<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
		</div>
	</div>
	</a>
</div>