<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imagegridly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox blogposts-list'); ?>>
	<a href="<?php the_permalink() ?>" class="featured-img-box" style="background-image:url(<?php the_post_thumbnail_url('full'); ?>);">
		<?php if ( has_post_thumbnail() ) : ?>
		<span class="featured-img-gradient"></span>
		<span class="img-colors">
		<?php endif; ?>

		<span class="content-wrapper">
			<h2><?php the_title(); ?></h2>
			<span class="entry-date"><?php echo get_the_date(); ?></span>

		</span>
		<?php if ( has_post_thumbnail() ) : ?>
	</span>
<?php endif; ?>


</a>
</article><!-- #post-<?php the_ID(); ?> -->
