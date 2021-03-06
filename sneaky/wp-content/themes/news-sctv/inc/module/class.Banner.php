<?php 

	class Banner {

		public function __construct() {}

		/**
		 * @param $banner_size => mainbanner_lg, mainbanner_md, OR mainbanner_xs
		 *
		 * Example:
		 * $featuredBanner = new Banner();
 		 * $featuredBanner->featured_img('mainbanner_lg');
 		 *
		 */
		public function featured_img($banner_size) {

			$get_banner = get_field('banner');
			$banner = wp_get_attachment_image( $get_banner , $banner_size);
			if ($banner) { echo $banner; }

		}

		/**
		 * @param $banner_type => long_banner_ads OR small_banner_ads
		 *
		 * Example:
		 * $long = new BannerAds();
 		 * $long->ads('long_banner_ads');
 		 *
		 */
		public function ad_type($banner_type) {

			$bannerads = get_field($banner_type);
			$banneradsURL = get_field($banner_type . '_url');

			$html  = '<a target="_blank" href="http://www.'. $banneradsURL .'">';
    		$html .= '<img class="img-responsive" src="'. $bannerads .'">';
    		$html .= '</a>';

    		echo $html;
		}

		/**
		 * Grab the long banner ads
		 */
		public static function long_bannerads() {

			echo '<div class="segment col-xs-9" id="long-banner-ads">';

			$long = new Banner();
			$long->ad_type('long_banner_ads');

			echo '</div>';

		}

		/**
		 * Grab the small banner ads
		 */
		public static function small_bannerads() {

			echo '<div class="segment col-xs-3" id="small-banner-ads">';
			$small = new Banner();
			$small->ad_type('small_banner_ads');

			echo '</div>';
		}


	};

?>