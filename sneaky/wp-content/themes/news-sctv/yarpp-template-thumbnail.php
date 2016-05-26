<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<h3 class="subtitle">Related Article</h3>
<?php if (have_posts()):?>
<div class="row">
	

<ul class="nodots">
	<?php while (have_posts()) : the_post(); ?>
		<?php if (has_post_thumbnail()):?>
		<li class="ul">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<div class="related-thumb col-xs-6 col-sm-3">
				<?php the_post_thumbnail(); ?>	
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