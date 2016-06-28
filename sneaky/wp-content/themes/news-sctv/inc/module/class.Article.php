<?php 
	
	class ArticlePost {

		public $_template;
		public $_slug;


		/**
		 * @param $slug => for the parent folder of the template. example: 'template-parts/content'
		 * @param $template => for the template name. example: 'post'
		 *
		 */
		public function __construct($slug, $template) {
			
			$this->_template = $template;
			$this->_slug = $slug;

		}

		public function post_per_page($min = 4, $max = 6) {

			if(is_mobile()) {
				return $min;
			} else {
				return $max;
			}

		}

		public function get_post($key, $keyValue, $order = 'DESC', $compare = '=') {

			$post_per_page = $this->post_per_page();
			$slug = $this->_slug; 
			$template = $this->_template;

			// set the filters/requirement for the query
			$args = array (
				'post_status'            => array( 'publish' ),
				'order'                  => 'DESC',
				'post_type' 			 => 'post',
				'posts_per_page' 		 => $post_per_page,
				'meta_query' => array(
					array(
						'key'       => $key,
						'value'     => $keyValue,
						'compare'   => $compare,
						'order'		=> $order
					),
				),
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part($slug, $template);
				}
			} else {
				// no posts found
				echo 'no posts found';
			}

			// Restore original Post Data
			wp_reset_postdata();

		}

		public static function latest_news() {

			$args = array (
				'post_status'            => array( 'publish' ),
				'order'                  => 'DESC',
				'post_type' 			 => 'post',
				'posts_per_page' 		 => $post_per_page,
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
						get_template_part('template-parts/frontpage', 'latest');
				}
			} else {
				echo 'no posts found!';
			}

			// Restore original Post Data
			wp_reset_postdata();
		}

		public static function breaking_news() {

			$get_tag = get_field('breaking_news');
			$spacing = (is_mobile()) ? '' : 'spacemar-20';
			$spacing2 = (is_mobile()) ? 'no-spacepad-side' : '';

			$header  = '<div class="segment col-sm-12 '. $spacing2 .'" id="breaking-news">';
			$header .= '<div class="segment-wrap clearfix item-post">';
			$header .= '<div class="'. $spacing .'">';
			$header .= '<h2 class="title">Breaking News</h2>';
			$header .= '</div>'; //spacing
			$header .= '<div class="slicky-container">';
			$header .= '<div class="slicky">';

			echo $header;

			$args = array (
				'post_status'            => array( 'publish' ),
				'order'                  => 'DESC',
				'post_type' 			 => 'post',
				'tag_id'			     => $get_tag
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
						get_template_part('template-parts/frontpage', 'breakingnews');
				}
			} else {
				echo 'no posts found!';
			}

			// Restore original Post Data
			wp_reset_postdata();

			$footer = '</div>'; //endof slicky
			$footer = '</div>'; //endof slicky-container
			$footer = '</div>'; //endof segment-wrap;
			$footer = '</div>'; //endof segment

			echo $footer;
		}

	}



?>