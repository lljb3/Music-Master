<?php
	global $prodhmd_theme_option;
	$custom_scripts = $prodhmd_theme_option['custom-scripts'];
?>

<!-- File Calls -->
<?php wp_footer(); ?>

<!-- Custom JavaScript -->
<?php echo $custom_scripts; ?>
<!-- RequireJS -->
</body>

<!-- End of Site -->
</html>