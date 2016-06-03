<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>


<?php if (have_posts()):?>
	<ul class="related">
		<?php while (have_posts()) : the_post(); ?>
			<?php if (has_post_thumbnail()):?>
			<li class="ul col-xs-12">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<div class="related-title col-xs-8">
						<?php the_title(); ?>
					</div>
					<div class="related-thumb col-xs-4 no-spacepad-side">
						<?php the_post_thumbnail('article_thumb'); ?>	
					</div>
				
				</a>
			</li>
			<?php endif; ?>
		<?php endwhile; ?>
	</ul>
<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>