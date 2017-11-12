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

	// Script Loader
    function shows_script_loader() {
		$script_path = plugin_dir_url( __FILE__ ).'../lib/';
		wp_enqueue_script( 'plugin-js', $script_path . 'js/shows.js', array( 'jquery' ), '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'shows_script_loader');

	// Get ID of Slug
	function get_shows_id_by_slug( $page_slug ) {
		$page = get_page_by_path( $page_slug );
		if( $page ) {
			return $page->ID;
		} else {
			return null;
		}
	}