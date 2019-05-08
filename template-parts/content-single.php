<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imagegridly
 */

global $store_arr;
$store_arr = array();
setPostViews(get_the_ID()); 
?>
		<!--<?php // if ( has_post_thumbnail() ) : ?>
		<div class="featured-thumbnail">
			<?php // the_post_thumbnail('imagegridly-slider'); ?>
		</div>
	<?php // endif; ?>-->
<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox'); ?>>
	<header class="entry-header">
		<?php
		if ( is_page() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		/*else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );*/
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="blog-data-wrapper">
				<div class="post-data-divider"></div>
				<div class="post-data-positioning">
					<div class="post-data-text">
						<?php imagegridly_posted_on(); ?>
					</div>
				</div>
			</div>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<form action="#" id="likeform" method="post" enctype='multipart/form-data'>
		<input type="hidden" name="postid" value="<?php echo get_the_ID(); ?>"/>
		<input type="hidden" name="userid" value="<?php echo get_current_user_id();?>"/>
		<?php wp_nonce_field( 'my_like_form', 'my_like_form_nonce' ); ?>
		</form>
		<?php if (! is_page()):?>
		<div class="post-stat">
		<?php echo getPostViews(get_the_ID())." ";?><span class="post-view"></span>
		<?php echo get_comments_number()." ";?><span class="post-comment"></span>
		<?php echo getPostLikes(get_the_ID());?><button class="post-like" type="submit" form="likeform" value="Like it" name="submit_like" <?php if (getLikedBy(get_the_ID(),get_current_user_id())) echo "disabled";?>></button>
		</div>
		<?php
			endif;
			/*wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'imagegridly' ),
				'after'  => '</div>',
			) );*/
		?>
	</div><!-- .entry-content -->
<?php
			if( has_post_thumbnail() ) {
				$thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
				printf(
					'<div class="entry-image">
						<a href="%1$s" data-lightbox="image" target="_blank">%2$s</a>
					</div>',
					esc_url( $thumb_url[0] ) ,
					'<img class="image-fade wp-post-image" src="'.get_the_post_thumbnail_url().'" alt="" />'
				);
				$store_arr[] = esc_url( $thumb_url[0] );
				//$store = '<a href="'.esc_url( $thumb_url[0] ).'" target="_blank"><img src="'.str_replace("/files/","/resize/",get_the_post_thumbnail_url()).'" alt="mediabots" /></a>';
			}
			if ( $post->post_type == 'post' && $post->post_status == 'publish' ) {
				$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post->ID,
					'exclude'     => get_post_thumbnail_id()
				) );

				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						//$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
						//$thumbimg = wp_get_attachment_link( $attachment->ID, 'thumbnail-size', true );
						//echo '<li class="' . $class . ' data-design-thumbnail">' . $thumbimg . '</li>';
						echo '<div class="entry-image"><a href="'.wp_get_attachment_url( $attachment->ID ).'" target="_blank"><img class="image-fade wp-post-image" src="'.wp_get_attachment_url( $attachment->ID ).'" alt="" /></a></div>';
						$store_arr[] = esc_url( wp_get_attachment_url( $attachment->ID ) );
					}

				}
			}
?>
</article><!-- #post-<?php the_ID(); ?> -->