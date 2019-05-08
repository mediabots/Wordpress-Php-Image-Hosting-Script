<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package imagegridly
 */

get_header(); 
global $anaximander_options,$bool,$views;

	$anaximander_settings = get_option( 'anaximander_options', $anaximander_options );
	$click_to_continue = $anaximander_settings['click_to_continue'];

while ( have_posts() ) : the_post();
$author = get_the_author_meta('ID');
$current_user = wp_get_current_user();
endwhile;

$bool = $author==$current_user->ID;

$views = (int)chop(getPostViews(get_the_ID()));

if(! isset($click_to_continue) || $views <1 || (is_user_logged_in() && $bool) || current_user_can('administrator') || (isset($_POST['submit_continue'],$_POST['continue_form_nonce']) 
   && wp_verify_nonce($_POST['continue_form_nonce'],'continue_form'))){ 
?>
		
		<div id="primary" class="featured-content-single content-area">
		<?php if (get_post_meta(get_the_ID(), 'nsfw_field', true)):
		echo '<main id="main" class="site-main" style="border-top: 5px solid blue;">';
		else:
		echo '<main id="main" class="site-main" style="border-top: 5px solid green;">';
		endif;
		?>

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'single' );
			// the_post_navigation();

			// imagegridly_related_posts();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
				if(! is_user_logged_in()):
					//$comments = get_comments(array('post_id' => get_the_ID()));
					//print_r($comments);
					echo '<div id="comments" class="fbox comments-area">
						<div id="respond" class="comment-respond">
						<h3 id="reply-title" class="comment-reply-title">Leave a Reply</h3>			
						<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
						<p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>
						<p class="form-submit"><input name="submit_fakecomment" type="submit" id="submit" class="submit" value="Post Comment"></p>';
					wp_nonce_field( 'submit_fakecomment', 'submit_fakecomment_nonce' );
					echo '</form>
						</div></div>';
				endif;
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		</div><!-- #primary -->
<?php
get_sidebar();
}
else{
		echo '<div id="primary" class="featured-content-single content-area" style="text-align:center;width: 100% !important;">
		<form action="" id="continueform" method="post" enctype="multipart/form-data">';
		wp_nonce_field( 'continue_form', 'continue_form_nonce' );
		echo '</form>
		<button type="submit" form="continueform" value="" name="submit_continue">Click to Continue to Image(s)</button>
		</div><!-- #primary -->';
}
get_footer();