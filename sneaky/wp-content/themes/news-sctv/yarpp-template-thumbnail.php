<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<h3 class="subtitle">Related Article</h3>

<?php if (have_posts()):?>
<div class="">
	

<ul class="nodots related">
	<?php while (have_posts()) : the_post(); ?>
		<?php if (has_post_thumbnail()):?>
		<li class="ul col-xs-12">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<div class="related-thumb col-xs-6 no-spacepad-side">
					<?php the_post_thumbnail(); ?>	
				</div>
				<div class="related-title col-xs-6">
					<?php the_title(); ?>
				</div>
			
			</a>
		</li>
		<?php endif; ?>
	<?php endwhile; ?>
</ul>
</div>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
<hr>