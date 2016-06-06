<div class="item-list list-page <?php fetch_category('item-latest'); ?> col-xs-12 col-sm-4">
	<a href="<?php echo get_permalink(); ?>">
	
		<?php
				echo '<div class="item-list-thumb">';
				if (has_post_thumbnail()) {
					the_post_thumbnail(); 
				} else {
					noimage();
				}
				echo '</div>';

		?>
	</a>
	<div class="item-list-desc">
		<div class="item-list-desc-title ">
			<?php the_title(); ?>
			<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
		</div>
		<div class="item-list-desc-text">
			<?php the_excerpt(); ?>
		</div>
	</div>
	</a>
</div>