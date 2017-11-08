<?php
	//* Slider Slug Name Meta Box *//
	// Fire our meta box setup function on the post editor screen.
	add_action( 'load-post.php', 'layer_slider_post_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'layer_slider_post_meta_boxes_setup' );
	// Meta box setup function.
	function layer_slider_post_meta_boxes_setup() {
		// Add meta boxes on the 'add_meta_boxes' hook.
		add_action( 'add_meta_boxes', 'layer_slider_add_post_meta_boxes' );
		// Save post meta on the 'save_post' hook.
		add_action( 'save_post', 'layer_slider_save_post_class_meta', 10, 2 );
	}
	// Create one or more meta boxes to be displayed on the post editor screen.
	function layer_slider_add_post_meta_boxes() {
		add_meta_box(
			'layer_slider-post-class', // Unique ID
			esc_html__( 'Slider Info', 'example' ), // Title
			'layer_slider_post_class_meta_box',   // Callback function
			'page', // Admin page (or post type)
			'side', // Context
			'default' // Priority
		);
	}
	function layer_slider_post_class_meta_box( $object, $box ) { ?>
	<?php wp_nonce_field( basename( __FILE__ ), 'layer_slider_post_class_nonce' ); ?>
        <p>
            <label for="layer_slider-post-class"><?php _e( "Set which slider this page will generate. Use the slug name of the slider only.", 'example' ); ?></label>
            <br />
            <input class="widefat" type="text" name="layer_slider-post-class" id="layer_slider-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'layer_slider_post_class', true ) ); ?>" size="30" />
        </p>
	<?php }
	// Save the meta box's post metadata.
	function layer_slider_save_post_class_meta( $post_id, $post ) {
		// Verify the nonce before proceeding.
		if ( !isset( $_POST['layer_slider_post_class_nonce'] ) || !wp_verify_nonce( $_POST['layer_slider_post_class_nonce'], basename( __FILE__ ) ) )
		return $post_id;
		// Get the post type object.
		$post_type = get_post_type_object( $post->post_type );
		// Check if the current user has permission to edit the post.
		if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
		// Get the posted data and sanitize it for use as an HTML class.
		$new_meta_value = ( isset( $_POST['layer_slider-post-class'] ) ? sanitize_html_class( $_POST['layer_slider-post-class'] ) : '' );
		// Get the meta key.
		$meta_key = 'layer_slider_post_class';
		// Get the meta value of the custom field key.
		$meta_value = get_post_meta( $post_id, $meta_key, true );
		// If a new meta value was added and there was no previous value, add it.
		if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );
		// If the new meta value does not match the old value, update it.
		elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );
		// If there is no new meta value but an old value exists, delete it.
		elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
	}
	// Filter the post class hook with our custom post class function.
	add_filter( 'post_class', 'layer_slider_post_class' );
	function layer_slider_post_class( $classes ) {
		/* Get the current post ID. */
		$post_id = get_the_ID();
		/* If we have a post ID, proceed. */
		if ( !empty( $post_id ) ) {
		/* Get the custom post class. */
		$post_class = get_post_meta( $post_id, 'layer_slider_post_class', true );
		/* If a post class was input, sanitize it and add it to the post class array. */
		if ( !empty( $post_class ) )
			$classes[] = sanitize_html_class( $post_class );
		}
		return $classes;
	}
	 
	/* Slider Custom Meta Box */ 
	class Slider_Meta_Box {
		private $screens = array(
			'page',
		);
		private $fields = array(
			array(
				'id' => 'slidermeta-text',
				'label' => 'Heading Text',
				'desc' => 'Enter the heading text here (leave blank for image).',
				'type' => 'text',
				'std' => ''
			),
			array(
				'id' => 'slidermeta-image',
				'label' => 'Heading Image',
				'desc' => 'Enter the heading text here (if no header text).',
				'type' => 'media',
				'std' => ''
			),
			array(
				'id' => 'slidermeta-textarea',
				'label' => 'Sub Text',
				'desc' => 'Insert the sub text copy here.',
				'type' => 'textarea',
				'std' => ''
			),
			array(
				'id' => 'slidermeta-button',
				'label' => 'Button Text',
				'desc' => 'Define the text in the button',
				'type' => 'text',
				'std' => ''
			),
			array(
				'id' => 'slidermeta-link',
				'label' => 'Button Link',
				'desc' => 'Define the link in the button',
				'type' => 'text',
				'std' => ''
			),
		);
		// Class construct method. Adds actions to their respective WordPress hooks.
		public function __construct() {
			add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
			add_action( 'admin_footer', array( $this, 'admin_footer' ) );
			add_action( 'save_post', array( $this, 'save_post' ) );
		}
		// Hooks into WordPress' add_meta_boxes function.
		// Goes through screens (post types) and adds the meta box.
		public function add_meta_boxes() {
			foreach ( $this->screens as $screen ) {
				add_meta_box(
					'slider-text',
					__( 'Slider Text', 'slidermeta-' ),
					array( $this, 'add_meta_box_callback' ),
					$screen,
					'advanced',
					'high'
				);
			}
		}
		// Generates the HTML for the meta box
		/** @param object $post WordPress post object **/
		public function add_meta_box_callback( $post ) {
			wp_nonce_field( 'slider_text_data', 'slider_text_nonce' );
			echo 'Set your slider text for this page.';
			$this->generate_fields( $post );
		}
		// Hooks into WordPress' admin_footer function.
		// Adds scripts for media uploader.
		public function admin_footer() {
			?><script>
				// https://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
				jQuery(document).ready(function($){
					if ( typeof wp.media !== 'undefined' ) {
						var _custom_media = true,
						_orig_send_attachment = wp.media.editor.send.attachment;
						$('.rational-metabox-media').click(function(e) {
							var send_attachment_bkp = wp.media.editor.send.attachment;
							var button = $(this);
							var id = button.attr('id').replace('_button', '');
							_custom_media = true;
								wp.media.editor.send.attachment = function(props, attachment){
								if ( _custom_media ) {
									$("#"+id).val(attachment.url);
								} else {
									return _orig_send_attachment.apply( this, [props, attachment] );
								};
							}
							wp.media.editor.open(button);
							return false;
						});
						$('.add_media').on('click', function(){
							_custom_media = false;
						});
					}
				});
			</script><?php
		}
		// Generates the field's HTML for the meta box.
		public function generate_fields( $post ) {
			$output = '';
			foreach ( $this->fields as $field ) {
				$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
				$db_value = get_post_meta( $post->ID, '' . $field['id'], true );
				switch ( $field['type'] ) {
					case 'media':
						$input = sprintf(
							'<input class="regular-text" id="%s" name="%s" type="text" value="%s"> <input class="button rational-metabox-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
							$field['id'],
							$field['id'],
							$db_value,
							$field['id'],
							$field['id']
						);
						break;
					case 'textarea':
						$input = sprintf(
							'<textarea class="large-text" id="%s" name="%s" rows="5">%s</textarea>',
							$field['id'],
							$field['id'],
							$db_value
						);
						break;
					default:
						$input = sprintf(
							'<input %s id="%s" name="%s" type="%s" value="%s">',
							$field['type'] !== 'color' ? 'class="regular-text"' : '',
							$field['id'],
							$field['id'],
							$field['type'],
							$db_value
						);
				}
				$output .= $this->row_format( $label, $input );
			}
			echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
		}
		// Generates the HTML for table rows.
		public function row_format( $label, $input ) {
			return sprintf(
				'<tr><th scope="row">%s</th><td>%s</td></tr>',
				$label,
				$input
			);
		}
		// Hooks into WordPress' save_post function
		public function save_post( $post_id ) {
			if ( ! isset( $_POST['slider_text_nonce'] ) )
				return $post_id;
	
			$nonce = $_POST['slider_text_nonce'];
			if ( !wp_verify_nonce( $nonce, 'slider_text_data' ) )
				return $post_id;
	
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return $post_id;
	
			foreach ( $this->fields as $field ) {
				if ( isset( $_POST[ $field['id'] ] ) ) {
					switch ( $field['type'] ) {
						case 'email':
							$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
							break;
						case 'text':
							$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
							break;
					}
					update_post_meta( $post_id, '' . $field['id'], $_POST[ $field['id'] ] );
				} else if ( $field['type'] === 'checkbox' ) {
					update_post_meta( $post_id, '' . $field['id'], '0' );
				}
			}
		}
	}
	new Slider_Meta_Box;