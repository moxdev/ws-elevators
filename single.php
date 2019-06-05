<?php
/**
 * The template for displaying all single posts.
 *
 * @package Warfield and Sanford
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="wrapper">
				<div class="blog-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php warfield_sanford_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

				<?php endwhile; // end of the loop. ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
