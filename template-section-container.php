<?php
	/*
	Template Name: Template - Section Container
	*/
?>

<?php
	/**
	 * The template for displaying all pages.
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site will use a
	 * different template.
	 *
	 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
	 *
	 * @package 	WordPress
	 * @subpackage 	Starkers
	 * @since 		Starkers 4.0
	 */
global $kake_theme_option; 
$trans_opt = $kake_theme_option['transitional-header-button'];
$trans_page_opt = get_post_meta($post->ID,'page_options_trans-header',true);
?>
<?php if ( $trans_page_opt == 1 ) { ?> 
    <?php if ( $kake_theme_option['transitional-header-button'] ) { ?>
        <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/trans-header' ) ); ?>
    <?php } ?>
<?php } else { ?>
    <?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php } ?>

<!-- Jumbotron Information -->
<div class="jumbotron" id="home">
    <div class="slider-text container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php 
                    $slidertitle = get_post_meta($post->ID, "slidermeta-text", true); 
                    $sliderimage = get_post_meta($post->ID, "slidermeta-image", true); 
                    if( !empty( $slidertitle ) && empty( $sliderimage ) ) { 
                ?>
                    <h1 class="slider-title"><?php echo $slidertitle; ?></h1>
                <?php } elseif( empty( $slidertitle ) && !empty( $sliderimage ) ) { ?>
                    <h1 class="slider-title">
                        <img src="<?php echo $sliderimage; ?>" alt="" class="img-responsive center-block" />
                    <!-- end .slider-title --></h1>
                <?php } elseif( !empty( $slidertitle ) && !empty( $sliderimage ) ) { ?>
                    <h1 class="slider-title">
                        <img src="<?php echo $sliderimage; ?>" alt="" class="img-responsive center-block" />
                        <?php echo $slidertitle; ?>
                    <!-- end .slider-title --></h1>
                <?php } ?>
                <?php 
                    $slidertext = get_post_meta($post->ID, "slidermeta-textarea", true);
                    if( $slidertext ) { 
                ?>
                    <p><?php echo $slidertext; ?></p>
                <?php } ?>
                <?php 
                    $sliderbutton = get_post_meta($post->ID, "slidermeta-button", true); 
                    $sliderlink = get_post_meta($post->ID, "slidermeta-link", true); 
                    if( $sliderbutton ) {
                ?>
                    <a href="<?php echo $sliderlink; ?>" class="btn btn-lg button-success"><?php echo $sliderbutton; ?></a>
                <?php } ?>
                <div class="down-arrow">
                    <?php $scrdwnimg = $kake_theme_option['scroll-down-icon-image']['url']; $scrdwnicon = $kake_theme_option['scroll-down-icon-html']; $scrdwntxt = $kake_theme_option['scroll-down-text']; $scrdwnline = $kake_theme_option['scroll-down-line']; ?>
                    <?php if( !empty( $scrdwnimg ) && empty( $scrdwnicon ) ) { ?>
                        <a href="#section-container" data-scroll><img src="<?php echo $scrdwnimg ?>" alt="" /></a><br />
                    <?php } elseif( !empty( $scrdwnicon ) ) { ?>
                        <a href="#section-container" data-scroll><i class="<?php echo $scrdwnicon ?>"></i></a>
                    <?php } if( !empty( $scrdwntxt ) ) { ?>
                        <a href="#section-container" class="scroll-text" data-scroll><span><?php echo $scrdwntxt; ?></span></a><br />
                    <?php } if( ( $scrdwnline ) ) { ?>
                        <span class="line"></span>
                    <?php } ?>
                <!-- end .down-arrow --></div>
            <!-- end .col-md-10 --></div>
        <!-- end .row --></div>
    <!-- end .slider-text --></div>
    <?php $jumboimg = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
    <div class="slider">
        <?php $slidername = get_post_meta($post->ID, "layer_slider_post_class", true); ?>
        <?php if( !empty( $slidername ) ) { layerslider($slidername); } else { echo '<div class="jumbotron-img" style="background-image:url(' . $jumboimg . ');"></div>'; } ?>
    <!-- end .slider --></div>
    <div class="slider-wash"></div>
<!-- end .jumbotron --></div>

<!-- Section Container Information -->
<main class="container-fluid" id="section-container">
	<?php 
		$args = array(
			'post_type'=>'page',
			'post_parent'=>$post->ID,
			'order'=>'ASC',
			'orderby'=>'menu_order',
			'posts_per_page'=>-1,
		);
		$parent = new WP_Query($args); 
	?>
    <div class="row">
        <div class="col-md-12">
			<?php if ( $parent->have_posts() ) while ( $parent->have_posts() ) : $parent->the_post(); ?>
                <?php 
                    global $post; 
                    $post_slug = $post->post_name;
                    $section_bg = wp_get_attachment_url( get_post_thumbnail_id() );
                ?>
                <section class="container-fluid section" id="<?php echo $post_slug; ?>" <?php if( !empty( $section_bg ) ) { ?> style="background-image:url('<?php echo $section_bg; ?>')" <?php } ?>>
					<div class="row">
						<div class="col-md-12">
							<?php the_content(); ?>
						<!-- end .col-md-12 --></div>
					<!-- end .row --></div>
				<!-- end #section --></section>
			<?php endwhile; ?>
        <!-- end .col-md-12 --></div>
    <!-- end .row --></div>
<!-- end #content --></main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>