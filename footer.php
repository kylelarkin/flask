		</div>
	</section>

	<footer>
		<div class="inner">
			<nav class="footer">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-footer-menu-location', 'container' => false) ); ?>
			</nav>
			<?php include(locate_template('partials/_social-icons.php')); ?>
			<p>&copy; <?php echo date("Y"); ?> Client Name</p>
		</div>
	</footer>

	<?php wp_enqueue_script( 'site-js', get_bloginfo( 'template_directory' ) . '/js/public/script.js'); ?>

	<?php wp_footer(); // required don't remove ?>
</body>
</html>