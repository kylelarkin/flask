		</div>
	</section>

	<footer>
		<nav class="footer">
			<?php wp_nav_menu( array( 'theme_location' => 'primary-footer-menu-location', 'container' => false) ); ?>
		</nav>
		<div class="inner">
			<p>&copy; <?php echo date("Y"); ?> Client Name</p>
		</div>
	</footer>

	<?php wp_enqueue_script( 'site-js', get_bloginfo( 'template_directory' ) . '/js/public/script.min.js'); ?>

	<?php wp_footer(); // required don't remove ?>
</body>
</html>