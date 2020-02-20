<?php
/**
 * @package envision
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : // Only display if post has Featured Image ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; // End if has_post_thumbnail ?>

	<header class="entry-header">
		<!-- temporary date formatting -->
		<div class="entry-date">
			<?php the_date( 'M' ); ?><br/>
			<?php the_time( 'j' ); ?>
		</div>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php //envision_posted_on(); ?>
			<span class="entry-author"><?php the_author(); ?></span> &nbsp;
			<span class="entry-comments"><?php comments_number( 'No comments yet', 'One comment', '% responses' ); ?></span>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'envision' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'envision' ) );
					if ( $categories_list && envision_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'envision' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( '', 'envision' ) );
					if ( $tags_list ) :
				?>

				<span class="tags-links">
					<?php printf( __( '%1$s', 'envision' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>

				<?php envision_post_nav(); ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'envision' ), __( '1 Comment', 'envision' ), __( '% Comments', 'envision' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'envision' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
</article><!-- #post-## -->
