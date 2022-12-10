<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sellace
 */

?>
<div class="flex-12 flex-sm-6 flex-md-4 content-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
				echo '<a href="' . esc_url(get_permalink()) . '" title="' . get_the_title() . '">';
					sellace_post_thumbnail();
				echo '</a>';
			?>
		</header>

		<div class="entry-content">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</div>

		<footer class="entry-footer">
			<div class="flex flex-wrap flex-alings-center">
				<div class="flex-6">
					<?php sellace_posted_on() ?>
				</div>

				<div class="flex-6 flex flex-justify-end">
					<?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . get_the_title() . '" class="btn-arrow">' . __('Read', 'sellace') . '</a>'; ?>
				</div>
			</div>
		</footer>
	</article>
</div>

