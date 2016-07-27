<div class="item-banner" data-id="<?php echo strtolower(get_the_ID()); ?>">
	<?php 
		echo '<a href="'. get_the_permalink() .'">';
		the_post_thumbnail($post->ID, 'mainBanner_lg', array( 'class' => 'img-responsive' ));
		echo '</a>';
	?>
</div>