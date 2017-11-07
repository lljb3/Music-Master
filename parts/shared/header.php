
<?php
	global $kake_theme_option;
	if ( !empty( $kake_theme_option['logo-menu'] ) ) {
		$logo = $kake_theme_option['logo-menu']['url'];
	}
    $chat = $kake_theme_option['site-header-chat'];
    $chat_click = $kake_theme_option['site-header-chat-click'];
    $phone = $kake_theme_option['site-header-phone'];
?>

<!-- Header Information -->
<header id="header-container">
    <div class="container-fluid" id="header-menu">
    	<div class="row">
            <div class="col-md-10 col-md-offset-1" id="header-menu-table">
                <!-- Large Menu -->
                <div class="menu center-block hidden-xs" id="header-menu-table-row">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="navbar-brand pull-left" id="header-menu-table-cell">
                        <?php if( empty( $logo ) ) { ?>
                            <span><?php bloginfo('name'); ?></span>
                        <?php } else { ?>
                            <img src="<?php echo $logo; ?>" alt="" class="img-responsive">
                        <?php } ?>
                    <!-- end .navbar-brand --></a>
                    <div class="navbar-collapse collapse pull-right" id="header-menu-table-cell">
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
                        <ul class="navbar-nav nav">
                            <?php if( !empty( $chat ) ) { 
                                echo '<script type="text/javascript">' . $chat . '</script>';
                                echo '<li class="menu-chat menu-item"><i class="fa fa-comments-o" aria-hidden="true"></i></li>'; 
                            } ?>
                            <?php if( !empty( $phone ) ) { 
                                echo '<li class="menu-phone menu-item"><a title="Call" href="tel:' . $phone . '"><i class="fa fa-mobile" aria-hidden="true" ></i></a></li>'; 
                            } ?>
                        <!-- end .navbar-nav --></ul>
                    <!-- end .collapse --></div>
                <!-- end .menu --></div>
                <!-- Small Menu -->
                <div class="menu center-block visible-xs">
                    <div class="navbar-header">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" class="navbar-brand pull-left">
                            <?php if( empty( $logo ) ) { ?>
                                <span><?php bloginfo('name'); ?></span>
                            <?php } else { ?>
                                <img src="<?php echo $logo; ?>" alt="" class="img-responsive">
                            <?php } ?>
                        <!-- end .navbar-brand --></a>
                        <button type="button" class="navbar-toggle pull-right collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        <!-- .navbar-toggle --></button>
                    <!-- end .navbar-header --></div>
                    <div class="navbar-collapse collapse text-center" id="navbar-collapse">
                        <?php wp_nav_menu( 
                            array(
                                'theme_location'  => 'primary',
                                'container'       => 'ul',
                                'menu_class'      => 'navbar-nav nav',
                                'echo'            => true,
                                'link_before'     => '<span>',
                                'link_after'      => '</span>',
                                'items_wrap'      => '<ul class="navbar-nav nav">%3$s</ul>',
                                'depth'           => 0,
								'walker'          => new wp_bootstrap_navwalker()
                            )
                        ); ?>
                        <ul class="navbar-nav nav">
                            <?php if( !empty( $chat ) ) { 
                                echo '<script type="text/javascript">' . $chat . '</script>';
                                echo '<li class="menu-chat menu-item"><a title="Chat" onclick="' . $chat_click . '"><i class="fa fa-comments-o" aria-hidden="true"></a></i></li>'; 
                            } ?>
                            <?php if( !empty( $phone ) ) { 
                                echo '<li class="menu-phone menu-item"><a title="Call" href="tel:' . $phone . '"><i class="fa fa-mobile" aria-hidden="true" ></i></a></li>'; 
                            } ?>
                        <!-- end .navbar-nav --></ul>
                    <!-- end .collapse --></div>
                <!-- end .visible-xs --></div>
        	<!-- end .col-md-12 --></div>
        <!-- end .row --></div>
    <!-- end .container-fluid --></div>
<!-- end #header-container --></header>
