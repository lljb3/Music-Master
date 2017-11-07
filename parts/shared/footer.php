
<?php 
	global $kake_theme_option;
	$copyright = $kake_theme_option['copyright'];
	$facebook = $kake_theme_option['social-facebook'];
	$twitter = $kake_theme_option['social-twitter'];
	$google = $kake_theme_option['social-google'];
	$linkedin = $kake_theme_option['social-linkedin'];
	$pinterest = $kake_theme_option['social-pinterest'];
	$instagram = $kake_theme_option['social-instagram'];
	$youtube = $kake_theme_option['social-youtube'];
	$skype = $kake_theme_option['social-skype'];
	$yelp = $kake_theme_option['social-yelp'];
?>
	
<?php if ( $kake_theme_option['footer-show-up-button'] ) { ?>
	<!-- Back to Top -->
	<a data-scroll href="#totop" class="totop fadeOut"><span class="glyphicon glyphicon-triangle-top"></span></a>
<?php } ?>

<?php if ( $kake_theme_option['footer-sitemap'] ) { ?>
	<!-- Sitemap Information -->
	<div class="container-fluid" id="footer-sitemap">
		<div class="row">
			<?php $sitemap1 = has_nav_menu('sitemap1'); if ( $sitemap1 ) { ?>
				<div class="col-sm-2 split">
					<?php wp_nav_menu( 
						array(
							'theme_location'	=> 'sitemap1',
							'container'	=> 'ul',
							'menu_class'	=> 'list-unstyled',
							'echo'	=> true,
							'link_before'	=> '<span>',
							'link_after'	=> '</span>',
							'items_wrap'	=> '<ul class="list-unstyled">%3$s</ul>',
							'depth'	=> 0,
							'walker'	=> new wp_bootstrap_navwalker()
						)
					); ?>
				<!-- end .split --></div>
			<?php } ?>
			<?php $sitemap2 = has_nav_menu('sitemap2'); if ( $sitemap2 ) { ?>
				<div class="col-sm-2 split">
					<?php wp_nav_menu( 
						array(
							'theme_location'	=> 'sitemap2',
							'container'	=> 'ul',
							'menu_class'	=> 'list-unstyled',
							'echo'	=> true,
							'link_before'	=> '<span>',
							'link_after'	=> '</span>',
							'items_wrap'	=> '<ul class="list-unstyled">%3$s</ul>',
							'depth'	=> 0,
							'walker'	=> new wp_bootstrap_navwalker()
						)
					); ?>
				<!-- end .split--></div>
			<?php } ?>
			<?php $sitemap3 = has_nav_menu('sitemap3'); if ( $sitemap3 ) { ?>
				<div class="col-sm-2 split">
					<?php wp_nav_menu( 
						array(
							'theme_location'	=> 'sitemap3',
							'container'	=> 'ul',
							'menu_class'	=> 'list-unstyled',
							'echo'	=> true,
							'link_before'	=> '<span>',
							'link_after'	=> '</span>',
							'items_wrap'	=> '<ul class="list-unstyled">%3$s</ul>',
							'depth'	=> 0,
							'walker'	=> new wp_bootstrap_navwalker()
						)
					); ?>
				<!-- end .split --></div>
			<?php } ?>
			<?php $sitemap4 = has_nav_menu('sitemap4'); if ( $sitemap4 ) { ?>
				<div class="col-sm-2 split">
					<?php wp_nav_menu( 
						array(
							'theme_location'	=> 'sitemap4',
							'container'	=> 'ul',
							'menu_class'	=> 'list-unstyled',
							'echo'	=> true,
							'link_before'	=> '<span>',
							'link_after'	=> '</span>',
							'items_wrap'	=> '<ul class="list-unstyled">%3$s</ul>',
							'depth'	=> 0,
							'walker'	=> new wp_bootstrap_navwalker()
						)
					); ?>
				<!-- end .split --></div>
			<?php } ?>
			<?php $sitemap5 = has_nav_menu('sitemap5'); if ( $sitemap5 ) { ?>
				<div class="col-sm-2 split">
					<?php wp_nav_menu( 
						array(
							'theme_location'	=> 'sitemap5',
							'container'	=> 'ul',
							'menu_class'	=> 'list-unstyled',
							'echo'	=> true,
							'link_before'	=> '<span>',
							'link_after'	=> '</span>',
							'items_wrap'	=> '<ul class="list-unstyled">%3$s</ul>',
							'depth'	=> 0,
							'walker'	=> new wp_bootstrap_navwalker()
						)
					); ?>
				<!-- end .split --></div>
			<?php } ?>
			<?php $sitemap6 = has_nav_menu('sitemap6'); if ( $sitemap6 ) { ?>
				<div class="col-sm-2 split">
					<?php wp_nav_menu( 
						array(
							'theme_location'	=> 'sitemap6',
							'container'	=> 'ul',
							'menu_class'	=> 'list-unstyled',
							'echo'	=> true,
							'link_before'	=> '<span>',
							'link_after'	=> '</span>',
							'items_wrap'	=> '<ul class="list-unstyled">%3$s</ul>',
							'depth'	=> 0,
							'walker'	=> new wp_bootstrap_navwalker()
						)
					); ?>
				<!-- end .split --></div>
			<?php } ?>
		<!-- end .row --></div>
	<!-- end #footer-sitemap --></div>
<?php } ?>

<!-- Footer Information -->	
<footer id="footer-container">
    <div class="container-fluid">
        <div class="row" id="footer-info">
            <div class="col-md-6 col-md-offset-1 col-xs-12">
            	<div class="has-text pull-left">
                	<?php echo $copyright; ?> | <a href="/terms-of-use/"><strong>Terms</strong></a> | <a href="/privacy-policy/"><strong>Privacy</strong></a> | Developed by <a href="http://kakemultimedia.com/" target="blank"><strong>Kake Multimedia</strong></a>
                <!-- end .has-text --></div>
            <!-- end .col-md-5 --></div>
            <div class="col-md-4 col-xs-12">
                <div class="social pull-right">
                    <?php if ( $facebook ) { ?><a href="<?php echo $facebook; ?>"><i aria-hidden="true" class="fa fa-facebook facebook"></i></a><?php } ?>
                    <?php if ( $twitter ) { ?><a href="<?php echo $twitter; ?>"><i aria-hidden="true" class="fa fa-twitter twitter"></i></a><?php } ?>
                    <?php if ( $google ) { ?><a href="<?php echo $google; ?>"><i aria-hidden="true" class="fa fa-google google"></i></a><?php } ?>
                    <?php if ( $linkedin ) { ?><a href="<?php echo $linkedin; ?>"><i aria-hidden="true" class="fa fa-linkedin linkedin"></i></a><?php } ?>
                    <?php if ( $youtube ) { ?><a href="<?php echo $youtube; ?>"><i aria-hidden="true" class="fa fa-youtube youtube"></i></a><?php } ?>
                    <?php if ( $pinterest ) { ?><a href="<?php echo $pinterest; ?>"><i aria-hidden="true" class="fa fa-pinterest pinterest"></i></a><?php } ?>
                    <?php if ( $instagram ) { ?><a href="<?php echo $instagram; ?>"><i aria-hidden="true" class="fa fa-instagram instagram"></i></a><?php } ?>
                    <?php if ( $skype ) { ?><a href="<?php echo $skype; ?>"><i aria-hidden="true" class="fa fa-skype skype"></i></a><?php } ?>
                    <?php if ( $yelp ) { ?><a href="<?php echo $yelp; ?>"><i aria-hidden="true" class="fa fa-yelp yelp"></i></a><?php } ?>
				<!-- end .social --></div>
            <!-- end .col-md-5 --></div>
        <!-- end .row --></div>
    <!-- end .container-fluid --></div>
<!-- end #footer-container --></footer>
