<div class="item-list clearfix spacepad-15">
	<div class="item-list-desc col-xs-12">
		<div class="item-list-desc-title">
			<?php the_title(); ?>
			<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
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