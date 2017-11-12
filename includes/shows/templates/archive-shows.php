<?php
/*
Template Name: Template - Shows
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
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>

<!-- Main Information -->
<div class="container-fluid" id="main">
    <div <?php body_class('row'); ?>>
        <div class="col-md-12 page-container">

			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/header' ) ); ?>
            <!-- Content Information -->
            <?php $slug_id = get_shows_id_by_slug('shows'); $attachment_id = get_post_thumbnail_id($slug_id); $bg_url = wp_get_attachment_image_src($attachment_id, 'full', false); ?>
            <div class="row shows-main" id="content">
                <div class="col-md-10 col-md-offset-1" id="container">
                    <div class="content-box">
                        <?php if ( have_posts() ): ?>
                        <h3 class="has-title archive-title"> Upcoming Shows</h3>	
                        <ol class="row isotope">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <li class="col-md-4 isotope-item transition" id="news-post" data-category="transition">
                                <article class="post">
                                    <h4 class="has-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                                    <div class="has-text">
                                        <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate>
                                            <?php 
                                                $post_id = get_the_id();
                                                $tickets = get_post_meta($post_id,'event_info_ticket-url',true);
                                                $location = get_post_meta($post_id,'event_info_city-state',true);
                                                $date_time = get_post_meta($post_id,'event_info_date-time',true);
                                                
                                                echo $location; echo '<br />';
                                                echo date('F j, Y, g:i a',strtotime($date_time)); echo '<br />';
                                                if ( !empty( $tickets ) ) {
                                                    echo '<a href="' . $tickets . '" target="_blank">Get Tickets</a>';
                                                }
                                            ?>
                                        </time>
                                    <!-- end .has-text --></div>
                                <!-- end .post --></article>
                            <!-- end #news-post --></li>
                        <?php endwhile; ?>
                        <!-- end .row --></ol>
                        <?php else: ?>
                        <h4 class="has-title">No posts to display</h4>
                        <?php endif; ?>
                    <!-- end .content-box --></div>
                <!-- end .col-md-8 --></div>
            <!-- end .row --></div>
            <!-- Background Information -->
            <div class="shows-container" id="content-bg">
                <img src="<?php echo $bg_url[0]; ?>" class="background img-responsive center-block" />
            <!-- end #content-bg --></div>
        <!-- end .col-md-12 --></div>
    <!-- end .body-class --></div>
<!-- end #main --></div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>