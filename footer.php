		</div>
	</section>

	<footer class="body__footer">
		<div class="inner">
			<nav class="body__footer__nav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary-footer-menu-location', 'container' => false) ); ?>
			</nav>
			<?php include(locate_template('modules/_social-icons.php')); ?>
			<p>&copy; <?php echo date("Y"); ?> Client Name</p>
		</div>
	</footer>

	<?php wp_footer(); // required don't remove ?>
</body>
</html>