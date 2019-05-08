<?php

if ( is_admin() ) : // Load only if we are viewing an admin page

function anaximander_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'anaximander_theme_options', 'anaximander_options', 'anaximander_validate_options' );
}

add_action( 'admin_init', 'anaximander_register_settings' );

function anaximander_theme_options() {
	// Add theme options page to the addmin menu
	$page = add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'anaximander_theme_options_page' );
	//add_action( 'admin_print_styles-' . $page, 'my_admin_scripts' );
	}

add_action( 'admin_menu', 'anaximander_theme_options' );

// Function to generate options page
function anaximander_theme_options_page() {
	global $anaximander_options, $anaximander_polarities;

		
	if ( isset( $_REQUEST['updated'] ) )
	{
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted.
	}
		?>
	<div class="wrap">

	<?php screen_icon(); echo "<h2>" . wp_get_theme() . __( ' Theme Options' ) . "</h2>";
	// This shows the page's name and an icon if one has been provided ?>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>
	<form method="post" action="options.php">

	<?php $settings = get_option( 'anaximander_options', $anaximander_options ); ?>
	
	<?php settings_fields( 'anaximander_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	<h3>on site SEO (optional)</h3>
	<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->
		<tr valign="top">
			<th scope="row"><label for="meta_description">Meta Description</label></th>
			<td>
				<input size="63" id="meta_description" name="anaximander_options[meta_description]" type="text" value="<?php  esc_attr_e($settings['meta_description']); ?>" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="meta_keywords">Meta Keywords</label></th>
			<td>
				<textarea rows="8" cols="60" id="meta_keywords" name="anaximander_options[meta_keywords]"><?php  esc_attr_e($settings['meta_keywords']); ?></textarea>
			</td>
		</tr>

	</table>

	<h3>Setup Pages</h3>
	<table class="form-table">
		<tr valign="top">
			Create essential pages from here : <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/post-new.php?post_type=page" target="_blank"><?php echo esc_url( home_url( '/' ) ); ?>wp-admin/post-new.php?post_type=page</a> and copy paste URLs here.
		</tr>
		<tr valign="top">
			<th scope="row"><label for="about_page">URL of About Us page</label></th>
			<td>
				<input size="63" id="about_page" name="anaximander_options[about_page]" type="url" value="<?php	esc_attr_e($settings['about_page']);?>" />
				
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="tos_page">URL of T.O.S. page</label></th>
			<td>
				<input size="63" id="tos_page" name="anaximander_options[tos_page]" type="url" value="<?php	esc_attr_e($settings['tos_page']);?>" />
				
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="dmca_page">URL DMCA page</label></th>
			<td>
				<input size="63" id="dmca_page" name="anaximander_options[dmca_page]" type="url" value="<?php	esc_attr_e($settings['dmca_page']);?>" />
				
			</td>
		</tr>
	
	</table>
		
	<h3>Extras</h3>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="click_to_continue"></label></th>
			<td>
				<label>Enable "Click to continue to Images(s)" functionality</label> <input id="click_to_continue" name="anaximander_options[click_to_continue]" type="checkbox" <?php if(isset($settings['click_to_continue'])) echo "checked";?> />
				
			</td>
		</tr>
	</table>
		
	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

	</form>
	
	

	</div>

	<?php
}

function anaximander_validate_options( $input ) {
	global $anaximander_options, $anaximander_polarities;

	$settings = get_option( 'anaximander_options', $anaximander_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['meta_description'] = wp_filter_post_kses($input['meta_description']);
	$input['meta_keywords'] = wp_filter_post_kses($input['meta_keywords']);
	$input['about_page'] = wp_filter_post_kses( $input['about_page'] );
	$input['tos_page'] = wp_filter_post_kses( $input['tos_page'] );
	$input['dmca_page'] = wp_filter_post_kses( $input['dmca_page'] );
	$input['click_to_continue'] =  $input['click_to_continue'] ;
	return $input;
}

endif;  // EndIf is_admin()



// Add theme options to the Theme Customizer
add_action( 'customize_register', 'anaximander_customize_register' );
function anaximander_customize_register($wp_customize) {

	// SUPER-HEADER ICONS
	$wp_customize->add_section( 'anaximander_seo', array(
		'title'          => __( 'SEO', 'anaximander' ),
		'priority'       => 1,
	) );
	$wp_customize->add_setting( 'anaximander_options[meta_description]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'anaximander_options[meta_keywords]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'anaximander_meta_description', array(
		'label'      => __( 'meta description', 'anaximander' ),
		'section'    => 'anaximander_seo',
		'settings'   => 'anaximander_options[meta_description]',
		'type'       => 'text'
	) );
	$wp_customize->add_control( 'anaximander_meta_keywords', array(
		'label'      => __( 'meta keywords', 'anaximander' ),
		'section'    => 'anaximander_seo',
		'settings'   => 'anaximander_options[meta_keywords]',
		'type'       => 'text'
	) );
	$wp_customize->add_section( 'anaximander_pages', array(
		'title'          => __( 'Pages', 'anaximander' ),
		'priority'       => 2,
	) );
	$wp_customize->add_setting( 'anaximander_options[about_page]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'anaximander_about_page', array(
		'label'   => __( 'about page', 'anaximander' ),
		'section' => 'anaximander_pages',
		'settings'   => 'anaximander_options[about_page]',
		'type'       => 'url'
	) );
	$wp_customize->add_setting( 'anaximander_options[tos_page]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'anaximander_tos_page', array(
		'label'   => __( 'tos page', 'anaximander' ),
		'section' => 'anaximander_pages',
		'settings'   => 'anaximander_options[tos_page]',
		'type'       => 'url'
	) );
	$wp_customize->add_setting( 'anaximander_options[dmca_page]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'anaximander_dmca_page', array(
		'label'   => __( 'dmca page', 'anaximander' ),
		'section' => 'anaximander_pages',
		'settings'   => 'anaximander_options[dmca_page]',
		'type'       => 'url'
	) );
	$wp_customize->add_section( 'anaximander_extras', array(
		'title'          => __( 'Extras', 'anaximander' ),
		'priority'       => 3,
	) );
	$wp_customize->add_setting( 'anaximander_options[click_to_continue]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'anaximander_click_to_continue', array(
		'label'   => __( 'click to continue', 'anaximander' ),
		'section' => 'anaximander_extras',
		'settings'   => 'anaximander_options[click_to_continue]',
		'type'       => 'checkbox'
	) );
}



