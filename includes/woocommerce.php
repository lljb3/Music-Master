<?php
	/* WooCommerce Theme Support */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_action( 'woocommerce_sidebar', 'action_woocommerce_sidebar', 10, 2 ); 
	// Theme Wrapper	
	function my_theme_wrapper_start() {
		echo '<section id="main">';
	}
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	function my_theme_wrapper_end() {
		echo '</section>';
	}
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	// Woo Support
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'woocommerce_support' );
    // WooCommerce Extra Feature (e.g.:[product_categories_dropdown orderby="title" count="0" hierarchical="0"])
    function woo_product_categories_dropdown( $atts ) {
        extract(shortcode_atts(array(
            'show_count'    => '0',
            'hierarchical'  => '0',
            'orderby'       => ''
        ), $atts));
        ob_start();
            $c = $count;
            $h = $hierarchical;
            $o = ( isset( $orderby ) && $orderby != '' ) ? $orderby : 'order';
            // Stuck with this until a fix for http://core.trac.wordpress.org/ticket/13258
            wc_product_dropdown_categories( $c, $h, 0, $o );
            ?>
                <script type='text/javascript'>
                    /* <![CDATA[ */
                        var product_cat_dropdown = jQuery(".dropdown_product_cat");
                        product_cat_dropdown.change(function() {
                            if ( product_cat_dropdown.val() !=='' ) {
                                location.href = "<?php echo home_url(); ?>/?product_cat="+product_cat_dropdown.val();
                            }
                        });
                    /* ]]> */
                </script>
            <?php
        return ob_get_clean();
    }
    add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );