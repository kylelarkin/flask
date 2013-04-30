		<footer>
			<p>&copy; <?php echo date("Y"); ?> Client Name</p>
		</footer>
	
	</div> <!-- close .wrapper -->
	
	<?php wp_enqueue_script( 'js-combo', get_bloginfo( 'template_directory' ) . '/js/script-min.js', array('jquery')); ?>
	
	<?php wp_footer(); ?><!-- required don't remove -->

</body>
</html>