<?php
/**
 * Template Name: Two Column
 *
 * This is the template that displays two column template.
 * 
 *
 * @package Warfield and Sanford
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php warfield_sanford_featured_image() ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'contact' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
			<?php warfield_sanford_services_banner() ?>
			<?php warfield_sanford_247_banner() ?>
			<?php warfield_sanford_estimate_expert_banner() ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
