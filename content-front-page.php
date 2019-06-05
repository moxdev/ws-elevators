<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Warfield and Sanford
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('main-article'); ?>>
	<div class="wrapper">
		<header class="entry-header">
			<?php if ( get_field( 'on_page_title' )){
					echo '<h1 class="entry-title">' . get_field( 'on_page_title' ) . '</h1>';
				} else {
				 	the_title( '<h1 class="entry-title">', '</h1>' ); 
				} ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<img id="graphic-100years" src="<?php echo get_template_directory_uri() . '/imgs/graphic-ws-icon.svg' ?>" alt="W &amp; S" />
			<article class="home-entry-content-wrapper">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'warfield_sanford' ),
					'after'  => '</div>',
				) );
			?>
			</article>	
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'warfield_sanford' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
