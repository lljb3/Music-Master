
<?php 
	global $prodhmd_theme_option;
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
