<?php 
	
	class ArticlePost {

		public $_template;
		public $_slug;

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

	}

?>