<div class="item-list clearfix spacepad-15">
	
		<div class="item-list-desc col-xs-12">
			<div class="item-list-desc-title">
				<a href="<?php the_permalink() ?>">
				<?php the_title(); ?>
					<div class="item-list-desc-date"><?php echo get_the_date(); ?></div>
				</a>
			</div>

			<?php if (!is_mobile()) : ?>
			<div class="item-list-desc-text">
				<?php 
					echo custom_excerpt(250);
				?>
			</div>
			<?php endif; ?>
				<!-- <div class="item-list-desc-button">
						<button type="button" class="btn btn-primary custom">Baca</button>
				</div> -->
		</div>

</div>
<!-- <hr> -->