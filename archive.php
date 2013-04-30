<?php get_header(); ?>

		<section class="main" role="main">
		
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?><!-- start loop -->
				<article>
					<h1><?php the_title(); ?></h1>
					<p class="post-date"><?php the_date('F jS, Y'); ?></p>
					<?php the_content(); ?>
				</article>	
			<?php endwhile; endif; ?><!-- end loop -->
			
			<nav role="navigation" class="archive-posts-nav">
				<?php next_posts_link('&laquo; Older Entries') ?> <?php previous_posts_link('Newer Entries &raquo;') ?>
			</nav>
			
		</section>
	
		<?php get_sidebar(); ?><!-- optional -->

<?php get_footer(); ?>