
<?php
	global $prodhmd_theme_option;
	if ( !empty( $prodhmd_theme_option['logo-menu'] ) ) {
		$logo = $prodhmd_theme_option['logo-menu']['url'];
	}
    $chat = $prodhmd_theme_option['site-header-chat'];
    $chat_click = $prodhmd_theme_option['site-header-chat-click'];
    $phone = $prodhmd_theme_option['site-header-phone'];
?>

<!-- Header Information -->
<header id="header-container" class="row">
    <div class="menu center-block">
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="navbar-brand center-block">
            <?php if( empty( $logo ) ) { ?>
                <span><?php bloginfo('name'); ?></span>
            <?php } else { ?>
                <img src="<?php echo $logo; ?>" alt="" class="img-responsive center-block">
            <?php } ?>
        <!-- end .navbar-brand --></a>
        <button type="button" class="navbar-toggle pull-right collapsed" data-toggle="collapse" data-target="#header-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        <!-- end .navbar-toggle --></button>
        <div class="panel-collapse collapse" id="header-collapse">
            <div class="header-table">
                <div class="container-fluid" id="header-menu">
                    <div class="row text-center">
                        <div class="col-md-10 col-md-offset-1">
                            <a href="<?php echo esc_url( home_url('/home') ); ?>" class="navbar-brand center-block">
                                <?php if( empty( $logo ) ) { ?>
                                    <span><?php bloginfo('name'); ?></span>
                                <?php } else { ?>
                                    <img src="<?php echo $logo; ?>" alt="" class="img-responsive center-block">
                                <?php } ?>
                            <!-- end .navbar-brand --></a>
                            <?php if( is_shop() || is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) { ?>
                                <?php wp_nav_menu( 
                                    array(
                                        'theme_location' => 'shop',
                                        'container'      => 'ul',
                                        'menu_class'     => 'navbar-nav nav',
                                        'echo'           => true,
                                        'link_before'    => '<span>',
                                        'link_after'     => '</span>',
                                        'items_wrap'     => '<ul class="navbar-nav nav">%3$s</ul>',
                                        'depth'          => 0,
                                        'walker'		 => new wp_bootstrap_navwalker()
                                    )
                                ); ?>
                            <?php } else { ?>
                                <?php wp_nav_menu( 
                                    array(
                                        'theme_location' => 'primary',
                                        'container'      => 'ul',
                                        'menu_class'     => 'navbar-nav nav',
                                        'echo'           => true,
                                        'link_before'    => '<span>',
                                        'link_after'     => '</span>',
                                        'items_wrap'     => '<ul class="navbar-nav nav">%3$s</ul>',
                                        'depth'          => 0,
                                        'walker'		 => new wp_bootstrap_navwalker()
                                    )
                                ); ?>
                            <?php } ?>
                        <!-- end .col-md-8 --></div>
                    <!-- end .text-center --></div>
                <!-- end .container-fluid --></div>
                <div class="container-fluid" id="header-info">
                    <div class="row text-center" id="site-social">
                        <div class="col-md-10 col-md-offset-1">
                            <?php if ( $facebook ) { ?><a href="<?php echo $facebook; ?>"><i aria-hidden="true" class="fa fa-facebook facebook"></i></a><?php } ?>
                            <?php if ( $twitter ) { ?><a href="<?php echo $twitter; ?>"><i aria-hidden="true" class="fa fa-twitter twitter"></i></a><?php } ?>
                            <?php if ( $google ) { ?><a href="<?php echo $google; ?>"><i aria-hidden="true" class="fa fa-google google"></i></a><?php } ?>
                            <?php if ( $youtube ) { ?><a href="<?php echo $youtube; ?>"><i aria-hidden="true" class="fa fa-youtube youtube"></i></a><?php } ?>
                            <?php if ( $instagram ) { ?><a href="<?php echo $instagram; ?>"><i aria-hidden="true" class="fa fa-instagram instagram"></i></a><?php } ?>
                            <?php if ( $soundcloud ) { ?><a href="<?php echo $skype; ?>"><i aria-hidden="true" class="fa fa-soundcloud soundcloud"></i></a><?php } ?>
                            <?php if ( $bandcamp ) { ?><a href="<?php echo $yelp; ?>"><i aria-hidden="true" class="fa fa-bandcamp bandcamp"></i></a><?php } ?>
                            <?php if ( $apple ) { ?><a href="<?php echo $yelp; ?>"><i aria-hidden="true" class="fa fa-apple apple"></i></a><?php } ?>
                        <!-- end .col-md-6 --></div>
                    <!-- end #site-links --></div>
                <!-- end .container-fluid --></div>
                <div class="container-fluid" id="credits-info">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <p><?php echo $copyright; ?> | Site by <a href="http://prodhmd.com/" target="blank">His Master's Dance</a> | <a href="/terms-of-use/">Terms</a> | <a href="/privacy-policy/">Privacy</a> | <a href="/login/">LOGIN</a></p>
                        <!-- end .col-md-12 --></div>
                    <!-- end .row --></div>
                <!-- end .container-fluid --></div>
            <!-- end .header-table --></div>
        <!-- end .collapse --></div>
    <!-- end .menu --></div>                
<!-- end #header-container --></header>
