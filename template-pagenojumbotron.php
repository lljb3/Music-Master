<?php
/*
Template Name: Template - No Jumbotron Page
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

<!-- Content Information -->
<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <h2 class="has-title text-center hidden"><?php the_title(); ?></h2>
                <div class="has-text"><?php the_content(); ?></div>
            <?php endwhile; ?>
        <!-- end .col-md-10 --></div>
    <!-- end .row --></div>
<!-- end #content --></div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>