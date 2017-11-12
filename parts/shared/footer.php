
<?php 
	global $prodhmd_theme_option;
	$copyright = $prodhmd_theme_option['copyright'];
	$facebook = $prodhmd_theme_option['social-facebook'];
	$twitter = $prodhmd_theme_option['social-twitter'];
	$google = $prodhmd_theme_option['social-google'];
	$linkedin = $prodhmd_theme_option['social-linkedin'];
	$pinterest = $prodhmd_theme_option['social-pinterest'];
	$instagram = $prodhmd_theme_option['social-instagram'];
	$youtube = $prodhmd_theme_option['social-youtube'];
	$skype = $prodhmd_theme_option['social-skype'];
	$yelp = $prodhmd_theme_option['social-yelp'];
?>
	
<?php if ( $prodhmd_theme_option['footer-show-up-button'] ) { ?>
	<!-- Back to Top -->
	<a data-scroll href="#totop" class="totop fadeOut"><span class="glyphicon glyphicon-triangle-top"></span></a>
<?php } ?>

<!-- Footer Information -->	
<footer id="footer-container">
    <div class="container-fluid">
        <div class="row">
            <?php if ( is_shop() || is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) : ?>
            	<!-- No player fired -->
            <?php else : ?>            
                <?php require_once('player.php'); ?>
            <?php endif; ?>
        <!-- end .row --></div>
    <!-- end .hidden-xs --></div>
<!-- end #footer-container --></footer>
