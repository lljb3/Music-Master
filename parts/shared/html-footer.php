<?php
	global $kake_theme_option;
	$custom_scripts = $kake_theme_option['custom-scripts'];
?>

<!-- File Calls -->
<?php wp_footer(); ?>

<!-- Custom JavaScript -->
<?php echo $custom_scripts; ?>
<!-- RequireJS -->
</body>

<!-- End of Site -->
</html>