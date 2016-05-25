<?php get_header(); ?>

<<<<<<< HEAD
<div class="segment" id="mainbanner">
	<?php 

		$get_banner = get_field('banner');
		$banner = wp_get_attachment_image( $get_banner , 'mainbanner_lg');
		if ($banner) { ?>
			<img class="img-responsive" src="<?php echo $banner; ?>" alt="main banner">
		<?php }
	 ?>
=======
<div>
	this is frontpage
>>>>>>> 9beab8a2339abc49c863686515d26c5bacd70939
</div>
<?php get_footer(); ?>