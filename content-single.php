<?php
/**
 * @package Warfield and Sanford
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php warfield_sanford_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'warfield_sanford' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<!--<footer class="entry-footer">-->
	<!--<?php warfield_sanford_entry_footer(); ?>-->
	<!--</footer> -->
	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'warfield_sanford' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'warfield_sanford' ) );

			if ( ! warfield_sanford_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. <br/> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'warfield_sanford' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'psl-apts' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. <br/> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'warfield_sanford' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. <br/> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'warfield_sanford' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);

			echo "<p><a href='/news/'>Back to News page</a></p>"
		?>

		<?php edit_post_link( __( 'Edit', 'warfield_sanford' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->