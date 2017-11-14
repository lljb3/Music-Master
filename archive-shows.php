<?php
    /**
     * The template for displaying Archive show pages.
     *
     * Used to display archive-type pages if nothing more specific matches a query.
     * For example, puts together date-based pages if no date.php file exists.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     *
     * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts() 
     *
     * @package 	WordPress
     * @subpackage 	Starkers
     * @since 		Starkers 4.0
     */
    global $prodhmd_theme_option;
    $attachment_id = get_post_thumbnail_id(); 
    $bg_url = wp_get_attachment_image_src($attachment_id, 'full', false);
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>

<!-- Main Information -->
<main <?php body_class(); ?> id="main">

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/header' ) ); ?>

<!-- Section Information -->
<section class="container-fluid" id="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
        <!-- end .col-md-10 --></div>
    <!-- end .row --></div>
<!-- end #content --></section>

<!-- end .home --></main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>