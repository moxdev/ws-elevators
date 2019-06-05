<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Warfield and Sanford
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( get_field( 'on_page_title' )){
				echo '<h1 class="entry-title">' . get_field( 'on_page_title' ) . '</h1>';
			} else {
			 	the_title( '<h1 class="entry-title">', '</h1>' ); 
			} ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div class="wrapper">
			<div class="two-column right">
				<?php the_content(); ?>
			</div>
			<?php get_sidebar(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'warfield_sanford' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .wrapper --> 
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'warfield_sanford' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
