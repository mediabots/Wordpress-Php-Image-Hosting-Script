<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imagegridly
 */

// GET THEME OPTIONS
	global $anaximander_options;

	$anaximander_settings = get_option( 'anaximander_options', $anaximander_options );
	$meta_description = $anaximander_settings['meta_description'];
	$meta_keywords = $anaximander_settings['meta_keywords'];
	$about_page = $anaximander_settings['about_page'];
	//$tos_page = $anaximander_settings['tos_page'];
	$dmca_page = $anaximander_settings['dmca_page'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-language" content="en-US">
	<meta http-equiv="language" content="en-US">
	<meta name="description" content="<?php echo $meta_description;?>">
	<meta name="keywords" content="<?php echo $meta_keywords;?>">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php
		wp_register_script('top_js', get_bloginfo('template_url').'/js/top.js', array('jquery'), '');
		wp_enqueue_script('top_js'); 
		wp_register_style('top_css', get_bloginfo('template_url').'/css/top.css', 'all' );
		wp_enqueue_style('top_css');
	wp_head(); ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header id="masthead" class="sheader site-header clearfix">
			<nav id="primary-site-navigation" class="primary-menu main-navigation clearfix">

				<div class="top-nav-wrapper">
					<div class="content-wrap">
						<div class="logo-container"> 
						<a class="logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
						</div>
<div class="center-main-menu">
<div id="primary-menu" class="pmenu"><ul>
<li><a href="<?php echo $about_page;?>#">About Us</a></li>	
<li><a href="<?php echo $dmca_page;?>#">DMCA</a></li>
<?php 
	echo '<form action="'. home_url() .'" id="contactform" method="post" enctype="multipart/form-data" style="display:none;">';
	wp_nonce_field( 'my_contact_form', 'my_contact_form_nonce' );
	echo '</form>';	
	echo '<li><button type="submit" form="contactform" value="" name="submit_contact" style="background:#fff;color:#000;padding:0px 15px;">Contact Us</button></li>';
	if(is_user_logged_in()){
	$text = 'Uploads';
	if (current_user_can('administrator'))
		$text = 'All '.$text;
	else
		$text = 'My '.$text;
	echo '<li><a href="'. get_site_url() .'/wp-admin/edit.php">'.$text.'</a></li>';
	echo '<li><a href="'. wp_logout_url(home_url()) .'">Sign Out</a></li>';
	}
	else{
	echo '<form action="'. home_url() .'" id="signinform" method="post" enctype="multipart/form-data" style="display:none;">';
	wp_nonce_field( 'my_sigin_form', '90DjX23Dn9ZoF4' );
	echo '</form>';
	echo '<li><button type="submit" form="signinform" value="" name="submit_sigin" style="background:#fff;color:#000;padding:0px 0px 0px 15px;">Sign In</button></li>';
	//echo '<li><a href="'. wp_login_url() .'">Sign In</a></li>';
	echo '<form action="'. home_url() .'" id="signupform" method="post" enctype="multipart/form-data" style="display:none;">';
	wp_nonce_field( 'my_signup_form', '0dj3FG33uJS1' );
	echo '</form>';
	echo '<li><button type="submit" form="signupform" value="" name="submit_signup" style="background:#fff;color:#000;padding:0px 0px 0px 30px;">Sign Up</button></li>';
	}
?>
</ul></div>
					</div>
				</div>
			</div>
		</nav>

		<div class="super-menu clearfix">
			<div class="super-menu-inner">
				<a href="#" id="pull" class="toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false">
				<a class="logofont" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
		</a>
	</div>
</div>
<div id="mobile-menu-overlay"></div>
</header>

<div class="content-wrap">
<!-- Upper widgets -->
<!-- / Upper widgets -->
</div>

<div id="content" class="site-content clearfix">
	<div class="content-wrap">
