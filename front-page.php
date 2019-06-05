<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Warfield and Sanford
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php warfield_sanford_home_slider() ?>
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'front-page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>
			<?php warfield_sanford_services_banner() ?>
			<?php warfield_sanford_247_banner() ?>
			<?php warfield_sanford_100_years_vintage_banner() ?>
			<?php warfield_sanford_estimate_expert_banner() ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
