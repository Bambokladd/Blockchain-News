<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CodeVibrant
 * @subpackage News Vibrant
 * @since 1.0.0
 */

global $wp_query;

$post_count = $wp_query->current_post;
$total_post_count = $wp_query->found_posts;

if( $post_count % 5 == 0 ) {
	$article_layout = 'classic-post';
	echo '<div class="nv-archive-classic-post-wrapper">';
} else {
	if( $post_count == 1 || $post_count == 6 ) {
		echo '<div class="nv-archive-grid-post-wrapper nv-clearfix">';
	}
	$article_layout = 'grid-post';
}

if( has_post_thumbnail() ) {
	$post_class = 'has-thumbnail';
} else {
	$post_class = 'no-thumbnail';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>	

	<div class="nv-article-thumb">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'full' ); ?>
		</a>
	</div><!-- .nv-article-thumb -->

	<div class="nv-archive-post-content-wrapper">
		<header class="entry-header">
			<?php			
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() ) :
			?>
					<div class="entry-meta">
						<?php news_vibrant_inner_posted_on(); ?>
					</div><!-- .entry-meta -->
			<?php
				endif;
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt();
				$news_vibrant_archive_read_more_text = get_theme_mod( 'news_vibrant_archive_read_more_text', __( 'Continue Reading', 'news-vibrant' ) );
			?>
			<span class="nv-archive-more"><a href="<?php the_permalink(); ?>" class="nv-button"><i class="fa fa-arrow-circle-o-right"></i><?php echo esc_html( $news_vibrant_archive_read_more_text ); ?></a></span>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php news_vibrant_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .nv-archive-post-content-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
	if( $post_count % 5 == 0 ) {
		echo '</div>';
	} else {
		if( $post_count == 4 || $post_count == 9 || $post_count == $total_post_count-1 ) {
			echo '</div>';
		}
	}
?>