<?php get_header(); ?>

<div class="segment" id="mainbanner">
	<?php 

		$get_banner = get_field('banner');
		$banner = wp_get_attachment_image( $get_banner , 'mainbanner_lg');
		if ($banner) { ?>
			<img class="img-responsive" src="<?php echo $banner; ?>" alt="main banner">
		<?php }
	 ?>
<div>
</div>
<?php get_footer(); ?>