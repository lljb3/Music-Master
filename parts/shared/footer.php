
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
        <div class="row" id="footer-info">
            <div class="col-md-6 col-md-offset-1 col-xs-12">
            	<div class="has-text pull-left">
                	<?php echo $copyright; ?> | <a href="/terms-of-use/"><strong>Terms</strong></a> | <a href="/privacy-policy/"><strong>Privacy</strong></a> | Site by <a href="http://prodhmd.com/" target="blank"><strong>HMD Web</strong></a>
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
