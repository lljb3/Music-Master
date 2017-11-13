<?php
	// Template Files
	function include_shows_template( $template_path ) {
		if( get_post_type() == 'shows' ) {
			if( is_single() ) {
				// checks if the file exists in the theme first,
				// otherwise serve the file from the plugin
				if ( $theme_file = locate_template( array ( 'single-shows.php' ) ) ) {
					$template_path = $theme_file;
				} else {
					$template_path = plugin_dir_path( __FILE__ ) . '../templates/single-shows.php';
				}
			}
			elseif( is_archive() ) {
				if( $theme_file = locate_template( array ( 'archive-shows.php' ) ) ) {
					$template_path = $theme_file;
				} else { $template_path = plugin_dir_path( __FILE__ ) . '../templates/archive-shows.php';
	 
				}
			}
		}
		return $template_path;
	}
	add_filter( 'template_include', 'include_shows_template', 1 );

	// Get ID of Slug
	function get_shows_id_by_slug( $page_slug ) {
		$page = get_page_by_path( $page_slug );
		if( $page ) {
			return $page->ID;
		} else {
			return null;
		}
	}