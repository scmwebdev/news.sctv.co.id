<?php 

	class BannerAds {

		public $_bannerType;

		public function __construct($banner_type) {

			$this->_bannerType = $banner_type;

		}

		public function smallBannerAds() {

		}

		public function longBannerAds() {

		}

		public static function BannerAds() {

		}


	}


/* Usage
 * $smallBanner = new BannerAds();
 * $smallBanner->smallBannerAds();
 * $longBanner->longBannerAds();
 */

?>