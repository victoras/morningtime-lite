<?php
/**
 * Custom Functions
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*  Archive functionality
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_posts_by_year' ) ) {
	function morning_time_lite_posts_by_year() {
		// array to use for results
		$years = array();

		// get posts from WP
		$posts = get_posts(array(
			'numberposts' => -1,
			'orderby' => 'post_date',
			'order' => 'ASC',
			'post_type' => 'post',
			'post_status' => 'publish'
		));

		// loop through posts, populating $years arrays
		foreach($posts as $post) {
			$years[date('Y', strtotime($post->post_date))][] = $post;
		}

		// reverse sort by year
		krsort($years);

		return $years;
	}
}

/*-----------------------------------------------------------------------------------*/
/*  Get Attachemet ID
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'morning_time_lite_get_attachment' ) ) {

	function morning_time_lite_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
		return array(
			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => get_permalink( $attachment->ID ),
			'src' => $attachment->guid,
			'title' => $attachment->post_title
		);
	}
}

/*-----------------------------------------------------------------------------------*/
/*  Add CSS class to menus for submenu indicator
/*-----------------------------------------------------------------------------------*/

class morning_time_lite_Page_Navigation_Walker extends Walker_Nav_Menu {
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( !empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'has-dropdown';
		}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown\">\n";
	}
}

/*-----------------------------------------------------------------------------------*/
/*  Page Navi - Numeric pagination
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_pagination' ) ) {
	function morning_time_lite_pagination() {

		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$paginate_links = paginate_links(
			array(
				'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link($big) ) ),
				'format'       => '',
				'current'      => max( 1, get_query_var('paged') ),
				'total'        => $wp_query->max_num_pages,
				'prev_text'    => '&larr;',
				'next_text'    => '&rarr;',
				'type'         => 'list',
				'end_size'     => 3,
				'mid_size'     => 3
			)
		);

		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
		$paginate_links = str_replace( '<li><span class="page-numbers dots">', "<li><a href='#'>", $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'><a href='#'>", $paginate_links );
		$paginate_links = str_replace( "</span>", "</a>", $paginate_links );
		$paginate_links = str_replace( "<li><a href='#'>&hellip;</a></li>", "<li><span class='dots'>&hellip;</span></li>", $paginate_links );
		$paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo '<div class="pagination-centered">';
			echo $paginate_links;
			echo '</div><!--// end .pagination -->';
		}
	}
}


/*-----------------------------------------------------------
	Display Navigation for post, pages, search
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_content_navigation' ) ) {

	function morning_time_lite_content_navigation( $nav_id ) { ?>
			<div class="post-nav">
				<div class="post-nav-prev">
					<?php previous_post_link( '%link', __( '<i class="fas fa-angle-left"></i>  Previous post', 'morningtime-lite' ) ); ?>
				</div><!-- /.post-nav-prev -->

				<div class="post-nav-next">
					<?php next_post_link( '%link', __( 'Next post <i class="fas fa-angle-right"></i>', 'morningtime-lite' ) ); ?>
				</div><!-- /.post-nav-next -->
			</div><!-- /.post-nav -->
		<?php
	}
}


/*-----------------------------------------------------------
	Add new class to nex and prev buttons
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_post_link_attributes' ) ) {

	function morning_time_lite_post_link_attributes($output) {
		$button_class = 'class="button tiny grey"';
		return str_replace('<a href=', '<a '.$button_class.' href=', $output);
	}
	add_filter('next_post_link', 'morning_time_lite_post_link_attributes');
	add_filter('previous_post_link', 'morning_time_lite_post_link_attributes');
}


if ( ! function_exists( 'morning_time_lite_image_link_attributes' ) ) {

	function morning_time_lite_image_link_attributes($output) {
		$button_class = 'class="button tiny grey"';
		return str_replace('<a href=', '<a '.$button_class.' href=', $output);
	}
	add_filter('next_image_link', 'morning_time_lite_image_link_attributes');
	add_filter('previous_image_link', 'morning_time_lite_image_link_attributes');
}

/*-----------------------------------------------------------------------------------*/
/*  Add a container for video
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_custom_oembed_filter' ) ) {

	add_filter( 'embed_oembed_html', 'morning_time_lite_custom_oembed_filter', 10, 4 ) ;

	function morning_time_lite_custom_oembed_filter($html, $url, $attr, $post_ID) {
		$return = '<div class="post-video">'.$html.'</div>';
		return $return;
	}
}


/*-----------------------------------------------------------
	Get taxonomies terms links
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_custom_taxonomies_terms_links' ) ) {

	function morning_time_lite_custom_taxonomies_terms_links() {
		global $post, $post_id;
		// get post by post id
		$post = get_post($post->ID);
		// get post type by post
		$post_type = $post->post_type;
		// get post type taxonomies
		$taxonomies = get_object_taxonomies($post_type);
		foreach ($taxonomies as $taxonomy) {
			// get the terms related to post
			$terms = get_the_terms( $post->ID, $taxonomy );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term )
					$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
				$return = join( ', ', $out );
			} else {
				$return = '';
			}
			return $return;
		}
	}

}

/*-----------------------------------------------------------
	Custom Tag cloud Widget
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_tag_cloud_widget' ) ) {

	function morning_time_lite_tag_cloud_widget($args) {
		$args['largest'] = 14;
		$args['smallest'] = 14;
		$args['unit'] = 'px';
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'morning_time_lite_tag_cloud_widget' );

}


/*-----------------------------------------------------------
	Get Date
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_get_dates' ) ) {

	function morning_time_lite_get_dates() {
		the_time('M j');
	}

}


/*-----------------------------------------------------------
	Get Date
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_get_date' ) ) {

	function morning_time_lite_get_date() {
		the_time(get_option('date_format'));
	}

}


/*-----------------------------------------------------------
	Get Time
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_get_time' ) ) {

	function morning_time_lite_get_time() {
		the_time(get_option('time_format'));
	}

}


/*-----------------------------------------------------------
	Get Date and Time
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_get_date_time' ) ) {

	function morning_time_lite_get_date_time() {
		the_time(get_option('date_format'));
		_e( ' at ', 'morningtime-lite');
		the_time(get_option('time_format'));
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Trim excerpt
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_short_excerpt' ) ) {

	function morning_time_lite_short_excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

}


/*-----------------------------------------------------------
	Display Navigation for post, pages, search
-----------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_content_navigation' ) ) {

	function morning_time_lite_content_navigation( $nav_id ) {
		global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo esc_attr($nav_id); ?>">
				<?php if ( get_previous_posts_link() ) { ?>
					<div class="nav-previous"><?php previous_posts_link( __( '<span class="mobile-nav">Previous</span>', 'morningtime-lite' ) ); ?></div>
				<?php } ?>

				<?php if ( get_next_posts_link() ) { ?>
					<div class="nav-next"><?php next_posts_link( __( '<span class="mobile-nav">Next</span>', 'morningtime-lite' ) ); ?></div>
				<?php } ?>
					<div class="clear"></div>
			</nav><!-- #nav -->
		<?php endif;
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Pro Version
/*-----------------------------------------------------------------------------------*/

function morningtime_buy_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;

	$wp_admin_bar->add_menu( array(
	'id' => 'custom_buymenu',
	'title' => __( 'MorningTime - Full Version', 'morningtime-lite' ),
	'href' => 'https://wplook.com/product/themes/personal/personal-blog-wordpress-theme/?utm_source=Buy-Full&utm_medium=link&utm_campaign=MorningTime-Lite',
	'meta' => array('title' => 'Learn more about MorningTime', 'class' => 'wplookbuy') ) );

}
add_action('admin_bar_menu', 'morningtime_buy_menu', '1000');


/*-----------------------------------------------------------------------------------*/
/*	Doctitle
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'morning_time_lite_doctitle' ) ) {

	function morning_time_lite_doctitle() {

		if ( is_search() ) {
			$content = __('Search Results for:', 'morningtime-lite');
			$content .= ' ' . esc_html(stripslashes(get_search_query()));
		}

		elseif ( is_day() ) {
			$content = esc_html(stripslashes( get_the_date()));
		}

		elseif ( is_month() ) {
			$content = esc_html(stripslashes( get_the_date( 'F Y' )));
		}
		elseif ( is_year()  ) {
			$content = esc_html(stripslashes( get_the_date( 'Y' ) ));
		}

		elseif ( is_author() ) {
			$content = __("Author's Posts", 'morningtime-lite');

		}

		elseif ( is_404() ) {
			$content = __('Page Not Found', 'morningtime-lite');
		}


		else {
			$content = '';
		}

		$elements = array("content" => $content);

		// Filters should return an array
		$elements = apply_filters('morning_time_lite_doctitle', $elements);

		// But if they don't, it won't try to implode
			if(is_array($elements)) {
			  $doctitle = implode(' ', $elements);
			} else {
			  $doctitle = $elements;
			}

			if ( is_search() || is_day() || is_month() || is_year() || is_404() || is_author() ) {
				$doctitle = $doctitle;
			}

		echo $doctitle;

	}
}
?>
