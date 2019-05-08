<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imagegridly
 */
global $anaximander_options,$bool,$views,$validation_return;

	$anaximander_settings = get_option( 'anaximander_options', $anaximander_options );
	$about_page = $anaximander_settings['about_page'];
	$tos_page = $anaximander_settings['tos_page'];
	$click_to_continue = $anaximander_settings['click_to_continue'];

?>
</div>
</div><!-- #content -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
<?php if (is_home() || is_front_page()){
	if ( isset($_POST['cf-submitted']) && ($validation_return == 1) )
		echo '<footer id="colophon" class="site-footer2 clearfix">';
	else if ( isset($_POST['submit_signup']) || isset($_POST['submit_register']) || isset($_POST['submit_contact']) || isset($_POST['cf-submitted']))
		echo '<footer id="colophon" class="site-footer clearfix">';
	else
		echo '<footer id="colophon" class="site-footer2 clearfix">';
}
else if (is_single()){
	if ( ! isset($click_to_continue) || $views <1 || (is_user_logged_in() && $bool) || current_user_can('administrator') || isset($_POST['submit_continue']))
		echo '<footer id="colophon" class="site-footer clearfix">';
	else
		echo '<footer id="colophon" class="site-footer2 clearfix">';
}
else
	echo '<footer id="colophon" class="site-footer clearfix">';
?>
	<div class="content-wrap">
		<?php if ( is_active_sidebar( 'footerwidget-1' ) ) : ?>
			<div class="footer-column-wrapper">
				<div class="footer-column-three footer-column-left">
					<?php dynamic_sidebar( 'footerwidget-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footerwidget-2' ) ) : ?>
				<div class="footer-column-three footer-column-middle">
					<?php dynamic_sidebar( 'footerwidget-2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footerwidget-3' ) ) : ?>
				<div class="footer-column-three footer-column-right">
					<?php dynamic_sidebar( 'footerwidget-3' ); ?>				
				</div>
			<?php endif; ?>

		</div>

		<div class="site-info">
		    
			&copy; 2019 - <?php echo date('Y'); ?>
							<!-- Delete below lines to remove copyright from footer -->
				<span class="footer-info-right">
					<?php echo __('&nbsp;&nbsp;|&nbsp;&nbsp;WordPress "ImageHosting" Theme by - ', 'ImageHosting') ?> <a href="<?php echo esc_url('https://github.com/mediabots/Wordpress-Php-Image-Hosting-Script', 'imagegridly'); ?>"><?php echo __('MediaBOTS', 'ImageHosting') ?></a>
				</span>
			<p class="footer-info-right" style="margin: 0px;">
				<?php bloginfo( 'name' ); ?> : <?php bloginfo( 'description' ); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $tos_page;?>#">T.O.S.</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $about_page;?>#">About Us</a>

			</p>
				<!-- Delete above lines to remove copyright from footer -->

		</div><!-- .site-info -->
	</div>



</footer><!-- #colophon -->
</div><!-- #page -->

<div id="smobile-menu" class="mobile-only"></div>
<div id="mobile-menu-overlay"></div>

<?php wp_footer(); ?>
</body>
</html>
