<?php
/**
 * imageHosting functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package imageHosting
 */
// add custom Favicon to the WP theme
function add_favicon(){
    echo '<!-- Custom Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="'. get_template_directory_uri() .'/images/favicon.ico"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="'. get_template_directory_uri() .'/images/apple-touch-icon.png">';
}
add_action('wp_head','add_favicon');

function imagegridly_setup(){
	if (! wp_mkdir_p('files'))
		wp_mkdir_p('files');
	if (! wp_mkdir_p('resize'))
		wp_mkdir_p('resize');
}
add_action( 'after_setup_theme', 'imagegridly_setup' );

 // Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );
/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
add_theme_support( 'title-tag' );
	
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'menu-1'	=> esc_html__( 'Primary', 'imagegridly' ),
	) );
	
/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
	) );
	
// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'imagegridly_custom_background_args', array(
			'default-color' => '#f1f1f1',
			'default-image' => '',
			'default-image' => '%1$s/images/bg.png',
			) ) );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function imagegridly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'imagegridly_content_width', 640 );
}
add_action( 'after_setup_theme', 'imagegridly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function imagegridly_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'imagegridly' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-headline-wrapper"><div class="sidebarlines-wrapper"><div class="widget-title-lines"></div></div><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'imagegridly' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'imagegridly' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'imagegridly' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (1)', 'imagegridly' ),
		'id'            => 'headerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (2)', 'imagegridly' ),
		'id'            => 'headerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget (3)', 'imagegridly' ),
		'id'            => 'headerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'imagegridly' ),
		'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );

	
}

add_action( 'widgets_init', 'imagegridly_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function imagegridly_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'imagegridly-style', get_stylesheet_uri() );


	wp_enqueue_script( 'imagegridly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'imagegridly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	wp_enqueue_script( 'imagegridly-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'imagegridly-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'imagegridly_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Google fonts, credits can be found in readme.
 */

function imagegridly_google_fonts() {

	wp_enqueue_style( 'imagegridly-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,900', false ); 
}

add_action( 'wp_enqueue_scripts', 'imagegridly_google_fonts' );


/**
 * Blog Pagination 
 */
if ( !function_exists( 'imagegridly_numeric_posts_nav' ) ) {
	
	function imagegridly_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
				) ));
		}
	}
	
}


/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function imagegridly_comparepage_css($hook) {
	if ( 'appearance_page_imagegridly-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'imagegridly-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'imagegridly_comparepage_css' );


function per_user_upload_dir( $original ){
    // use the original array for initial setup
    $modified = $original;
	$mydir = '/files';
    // set our own replacements
    //if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        $subdir = $current_user->user_login;
        //$modified['subdir'] = $subdir;
        /*$modified['url'] = $original['baseurl'];// . '/' . $subdir;
        $modified['path'] = $original['basedir'];// . DIRECTORY_SEPARATOR . $subdir;*/
		$modified['url'] = str_replace("/wp-content/uploads","/files",$original['baseurl']);
		$modified['path'] = 'files';//str_replace("/var/www/html/mediabots.tk/wp-content/uploads","files",$original['basedir']);
		$modified['baseurl'] = str_replace("/wp-content/uploads","",$original['baseurl']);
		//$modified['basedir'] = 'files'; //did't
    //}
    return $modified;
}
add_filter( 'upload_dir', 'per_user_upload_dir');

/* Random unique string generator */

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getToken($length)
{
    $token = "";
    //$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet = "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
	$codeAlphabet.= "-_";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}


function getToken_for_attachment($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
	
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}

function so_3261107_hash_filename( $filename ) {
    $info = pathinfo( $filename );
    $ext  = empty( $info['extension'] ) ? '' : '.' . $info['extension'];
    $name = basename( $filename, $ext );

    return $GLOBALS['rand_unique_string2'] . $ext;
}

add_filter( 'sanitize_file_name', 'so_3261107_hash_filename', 10 );

/* Upload multiple files */
function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
  // check to make sure its a successful upload
  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');

  $attach_id = media_handle_upload( $file_handler, $post_id );
  if ( is_numeric( $attach_id ) ) {
    update_post_meta( $post_id, '_my_file_upload', $attach_id );
  }
  return $attach_id;
}

/* Remove admin bar for users except admin */
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

/* After logged in redirect to home page*/

function admin_default_page() {
  return home_url();
}

add_filter('login_redirect', 'admin_default_page');

/* After logged in redirect to current page*/

function wpse125952_redirect_to_request( $redirect_to, $request, $user ){
    // instead of using $redirect_to we're redirecting back to $request
    return $request;
}
//add_filter('login_redirect', 'wpse125952_redirect_to_request', 10, 3);

/* Remove activity from dashboard/admin-panel */
function remove_dashboard_widgets(){
	if  (current_user_can('author')){
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	}
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/* remove custom field,slug field section of an edit post option from admin_menu */
function remove_metaboxes() {
	if  (current_user_can('author')){
		remove_meta_box( 'postcustom' , 'post' , 'normal' ); 
		remove_meta_box( 'slugdiv', 'post', 'normal' );
	}
}
add_action( 'admin_menu' , 'remove_metaboxes' );

/* Restrict user role = 'author' to view media library of his/her own */
function devplus_wpquery_where( $where ){
    global $current_user;

    if( is_user_logged_in() ){
         // logged in user, but are we viewing the library?
         if( current_user_can('author') && isset( $_POST['action'] ) && ( $_POST['action'] == 'query-attachments' ) ){
            // here you can add some extra logic if you'd want to.
            $where .= ' AND post_author='.$current_user->data->ID;
        }
    }

    return $where;
}

add_filter( 'posts_where', 'devplus_wpquery_where' );

/* Limit Author's to their Own Posts in WordPress Admin */

function posts_for_current_author($query) {
    global $pagenow;
 
    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;
 
    if( !current_user_can( 'edit_others_posts' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

// did not work
add_filter( 'sce_comment_time', 'edit_sce_comment_time' );
function edit_sce_comment_time( $time_in_minutes ) {
    return 10; // allow upto 10 mins to edit own comment
}

//restrict 'author' role to list his/her comments only in wordpress deshboard
add_filter('the_comments', 'wpse56652_filter_comments');

function wpse56652_filter_comments($comments){
    global $pagenow;
    global $user_ID;
    get_currentuserinfo();
    if($pagenow == 'edit-comments.php' && current_user_can('author')){
        foreach($comments as $i => $comment){
            $the_post = get_post($comment->comment_post_ID);
            if($comment->user_id != $user_ID  && $the_post->post_author != $user_ID)
                unset($comments[$i]);
        }
    }
    return $comments;
}

/* Removes Comments from admin bar */
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
	if (current_user_can('author')){
    	$wp_admin_bar->remove_menu('comments');
		//$wp_admin_bar->remove_menu('new-post');
		//$wp_admin_bar->remove_menu('new-media');
	}
}
//add_action( 'admin_bar_menu', 'remove_wp_nodes', 999 );

function remove_wp_nodes() 
{
    global $wp_admin_bar; 
	if (current_user_can('author')){
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-media' );
	}
}

add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// Removes Comments from admin menu
function my_remove_admin_menus() {
	if (current_user_can('author')){
    	remove_menu_page( 'edit-comments.php' );
	}
}
//add_action( 'admin_menu', 'my_remove_admin_menus' );

// Hijack the option for default user's role
add_filter('pre_option_default_role', function($default_role){
    return 'author'; // This is changed
    //return $default_role; // This allows default
});

/* Does't not work */
function custom_redirect($url) {
    ob_start();
    //header('Location: '.$url);
    wp_redirect($url);
    ob_end_flush();
    die();
}

/* POST Views */

function getPostViews($postID){

global $count_key;

global $count;

    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0 ";

    }

    return $count.' ';

}

function setPostViews($postID) {

    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

    }else{

        $count++;

        update_post_meta($postID, $count_key, $count);

    }

}

/* POST Likes */

function getPostLikes($postID){

global $count_key;

global $count;

    $count_key = 'post_likes_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0 ";

    }

    return $count.' ';

}

function setPostLikes($postID) {

    $count_key = 'post_likes_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

    }else{

        $count++;

        update_post_meta($postID, $count_key, $count);

    }

}

function getLikedBy($postID,$userID) {
global $count_key;

global $count;
	
	$count_key = 'who_liked';
	
	$user_ids = get_post_meta($postID, $count_key, true);
	
	if(in_array($userID, $user_ids)){
		
		return true;
		
	}
	else{
		return false;
    }	
}

function setLikedBy($postID,$userID) {
	
	$count_key = 'who_liked';
	
	$user_ids = get_post_meta($postID, $count_key, true);
	if(sizeof($user_ids)==0){
		
		delete_post_meta($postID, $count_key);
	
		add_post_meta($postID, $count_key, array($userID));
		//echo "000000";
		
	}
	else{

        $user_ids[] = $userID;

        update_post_meta($postID, $count_key, $user_ids);
		//echo "111111111";

    }	
	//print_r($user_ids);
}

/* hook blank form action submit to a funtion */
add_action( 'template_redirect', 'wpse149613_form_process' );
function wpse149613_form_process(){
    if(isset($_POST['submit_like'],$_POST['my_like_form_nonce'])
	  && wp_verify_nonce($_POST['my_like_form_nonce'],'my_like_form') ) // assuming you're using POST and submit button name is 'submit_like'
	{
		if(is_user_logged_in()){
		//echo "User". $_POST['userid'] ."<br/>";
		//echo "Post". $_POST['postid'];
		if (! getLikedBy($_POST['postid'],$_POST['userid'])){
			setPostLikes($_POST['postid']);
			setLikedBy($_POST['postid'],$_POST['userid']);
		}
		}
		else{
		wp_redirect( wp_login_url() );
		}
	}
	else if (isset($_POST['submit_fakecomment'],$_POST['submit_fakecomment_nonce']) 
			&& wp_verify_nonce($_POST['submit_fakecomment_nonce'],'submit_fakecomment') ){
		if ( ! is_user_logged_in())
			wp_redirect( wp_login_url() );
	}
}

/* Customizing Admin Columns In WordPress for all kind of posts */
add_filter( 'manage_posts_columns', 'custom_post_columns');
function custom_post_columns( $columns ) {
    unset(
   //$columns['author'],
   $columns['categories']
    ); 
  $columns['views'] = __( 'Views', 'smashing' );
  $columns['votes'] = __( 'Votes', 'smashing' );
  $columns['featured_image'] = 'Featured Image';
  return $columns;
}

add_action( 'manage_posts_custom_column', 'custom_post_column', 10, 2);
function custom_post_column( $column, $post_id ) {
	
  // Monthly price column
  if ( 'views' === $column ) {
    $view = get_post_meta( $post_id, 'post_views_count', true );

    if ( ! $view ) {
      _e( '0' );  
    } else {
      echo number_format($view) ;
    }
  }
  if ( 'votes' === $column ) {
    $like = get_post_meta( $post_id, 'post_likes_count', true );

    if ( ! $like ) {
      _e( '0' );  
    } else {
      echo number_format($like) ;
    }
  }
  if ( 'featured_image' === $column ) {
        $post_featured_image = get_the_post_thumbnail_url($post_ID);
        if ($post_featured_image) {
			//$a = str_replace("/files/","/resize/",$post_featured_image);
            echo '<img src="' . str_replace("/files/","/resize/",$post_featured_image) . '" style="width:135px;height:auto;" />';
        }
    }
}
/* Customizing Admin Columns In WordPress for pages */
add_filter( 'manage_pages_columns', 'custom_pages_columns' );
 
function custom_pages_columns( $columns ) {
  unset(
   $columns['comments'],
   $columns['author'],
   $columns['post_type']
  );
 
  return $columns;
}

//function to disable wp different image size generation
function add_image_insert_override($sizes){
	unset( $sizes[ 'thumbnail' ]);
    unset( $sizes[ 'medium' ]);
    unset( $sizes[ 'medium_large' ] );
    unset( $sizes[ 'large' ]);
    unset( $sizes[ 'full' ] );
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'add_image_insert_override' );

add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size(50, 50, true);  // comment to disable auto resize
//add_image_size( 'cat-thumb', 100, 100 , false ); // comment to disable auto resize

/*
add_action( 'init', 'czc_disable_extra_image_sizes' );
add_filter( 'image_resize_dimensions', 'czc_disable_crop', 10, 6 );
function czc_disable_crop( $enable, $orig_w, $orig_h, $dest_w, $dest_h, $crop )
{
    // Instantly disable this filter after the first run
    // remove_filter( current_filter(), __FUNCTION__ );
    // return image_resize_dimensions( $orig_w, $orig_h, $dest_w, $dest_h, false );
    return false;
}
function czc_disable_extra_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        remove_image_size( $size );
    }
}
*/

add_filter( 'upload_mimes', 'theme_restrict_mime_types' );
function theme_restrict_mime_types( $mime_types ){
	
	$mime_types = array(
        'bmp' => 'image/bmp',
        'jpg|jpeg|jpe' => 'image/jpeg',
        'tiff|tif' => 'image/tiff',
        'gif' => 'image/gif',
        'png' => 'image/png',
		'ico' => 'image/x-icon',
		'svg' => 'image/svg+xml'
    );
	
	return $mime_types;
}

function my_theme_output_upload_mimes() {
	var_dump( wp_get_mime_types() );
}
//add_action( 'template_redirect', 'my_theme_output_upload_mimes' );


/* Custom Registration form */

function registration_form( $username, $password,$password2, $email, $website, $first_name, $last_name, $nickname, $bio, $tos ) {
	global $anaximander_options;
	$anaximander_settings = get_option( 'anaximander_options', $anaximander_options );
	$tos_page = $anaximander_settings['tos_page'];
    echo '
    <style>
    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
 
    echo '
    <form class="regform" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div>
    <label for="username">Username <strong><font color=red>*</font></strong></label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
     
    <div>
    <label for="password">Password <strong><font color=red>*</font></strong></label>
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
	
	<div>
    <label for="password2">Repeat Password <strong><font color=red>*</font></strong></label>
    <input type="password" name="password2" value="' . ( isset( $_POST['password2'] ) ? $password2 : null ) . '">
    </div>
     
    <div>
    <label for="email">Email <strong><font color=red>*</font></strong></label>
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>';
     
    /*<div>
    <label for="website">Website</label>
    <input type="text" name="website" value="' . ( isset( $_POST['website']) ? $website : null ) . '">
    </div>
     
    <div>
    <label for="firstname">First Name</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
     
    <div>
    <label for="website">Last Name</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
     
    <div>
    <label for="nickname">Nickname</label>
    <input type="text" name="nickname" value="' . ( isset( $_POST['nickname']) ? $nickname : null ) . '">
    </div>
     
    <div>
    <label for="bio">About / Bio</label>
    <textarea name="bio" rows="5" cols="18" style="width: auto;">' . ( isset( $_POST['bio']) ? $bio : null ) . '</textarea>
    </div>';*/
	wp_nonce_field( 'my_register', 'my_register_nonce' );
	echo '
	<div><input type="checkbox" name="tos" ' . ( isset( $_POST['tos']) ? "checked" : null ) . '> I do agree with <a href="'.$tos_page.'">T.O.S.</a> <strong><font color=red>*</font></strong></div>
    <input type="submit" name="submit_register" value="Register"/>
    </form>
    ';
}

function registration_validation( $username, $password,$password2, $email, $website, $first_name, $last_name, $nickname, $bio,$tos )  {

global $reg_errors;
$reg_errors = new WP_Error;
	
if ( empty( $username ) || empty( $password ) || empty( $password2 ) || empty( $email ) || ! isset( $tos )) {
    $reg_errors->add('field', 'Required form field is/are missing');
}
	
if ( 4 > strlen( $username ) ) {
    $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
}
	
if ( username_exists( $username ) )
    $reg_errors->add('user_name', 'Sorry, that username already exists!');

if ( ! validate_username( $username ) ) {
    $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
}
	
if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 5' );
    }
if (  strlen($password) !=   strlen($password2)) {
        $reg_errors->add( 'repeat password', 'Password length mismatch' );
    }
else if ( $password !=  $password2) {
        $reg_errors->add( 'repeat password', 'Password mismatch' );
    }

if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', 'Email is not valid' );
}

if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', 'Email Already in use' );
}
	
if ( ! empty( $website ) ) {
    if ( ! filter_var( $website, FILTER_VALIDATE_URL ) ) {
        $reg_errors->add( 'website', 'Website is not a valid URL' );
    }
}
if (! isset($_POST['tos'])) {
	$reg_errors->add( 'Terms', 'You must check T.O.S.' );
}
	
if ( is_wp_error( $reg_errors ) ) {
 
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
        echo '<div>';
        echo '<strong>ERROR</strong>:';
        echo $error . '<br/>';
        echo '</div>';
         
    }
}
	
}

function complete_registration() {
    global $reg_errors, $username, $password,$password2, $email, $website, $first_name, $last_name, $nickname, $bio,$tos;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'user_url'      =>   $website,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
        'nickname'      =>   $nickname,
        'description'   =>   $bio,
        );
        $user = wp_insert_user( $userdata );
        echo 'Registration completed :)<br/>Redirecting to <a href="' . get_site_url() . '/wp-login.php">login page</a> within 5 seconds.'; ?>
		<script type="text/javascript">
		document.location.href="<?php echo get_site_url(). '/wp-login.php';?>";
		</script>
<?php
    }
}

function custom_registration_function() {
    if ( isset($_POST['submit_register'] ) ) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
		$_POST['password2'],
        $_POST['email'],
        $_POST['website'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['nickname'],
        $_POST['bio'],
		$_POST['tos']
        );
         
        // sanitize user form input
        global $username, $password,$password2, $email, $website, $first_name, $last_name, $nickname, $bio,$tos;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
		$password2   =   esc_attr( $_POST['password2'] );
        $email      =   sanitize_email( $_POST['email'] );
        $website    =   esc_url( $_POST['website'] );
        $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
        $nickname   =   sanitize_text_field( $_POST['nickname'] );
        $bio        =   esc_textarea( $_POST['bio'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
		$password2,
        $email,
        $website,
        $first_name,
        $last_name,
        $nickname,
        $bio,
		$tos
        );
    }
 
    registration_form(
        $username,
        $password,
		$password2,
        $email,
        $website,
        $first_name,
        $last_name,
        $nickname,
        $bio,
		$tos
        );
}

// Register a new shortcode: [cr_custom_registration]
add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}

/* add forgot password option for wp_login_form */
add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
	return '<a href="'.get_site_url().'/wp-login.php?action=lostpassword">Lost your password?</a>';
}

/* Disabling new post for user_role=author*/
function hide_add_new() {
global $submenu;
	if (current_user_can('author')){
    // For Removing New Posts from Admin Menu
    unset($submenu['post-new.php?post_type=post'][10]);
    // For Removing New Pages
    unset($submenu['post-new.php?post_type=page'][10]);
   // For Removing CPTs
    //unset($submenu['post-new.php?post_type=custom_post_type'][10]);
	}
}
add_action('admin_menu', 'hide_add_new');

function remove_admin_bar_links() {
    global $wp_admin_bar;
	if (current_user_can('author')){
    $wp_admin_bar->remove_menu('new-post');
    $wp_admin_bar->remove_menu('new-media');
	}
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


function disable_new_post() {
if (current_user_can('author'))
if ( get_current_screen()->post_type == 'post' )
    wp_die( "You are not allowed to do that!" );
}
add_action( 'load-post-new.php', 'disable_new_post' );

add_action('admin_head', 'maybe_modify_admin_css');

add_action('admin_head', 'maybe_modify_admin_css');

function maybe_modify_admin_css() {

    if (current_user_can('author')) {
        echo '
        <style>
            li#wp-admin-bar-new-content {
                display: none;
            }
        </style>';
    }
}

add_action('admin_init', 'wpse_110427_hide_title');
function wpse_110427_hide_title() {
 if (current_user_can('author'))
     remove_post_type_support('post', 'title');

}
//end

function disable_new_media2() {
if (current_user_can('author')){
$current_screen = get_current_screen();
if ( $current_screen()->id === 'upload' )
    wp_die( "You are not allowed to do that!") ;
}
}
//add_action( 'load-media-new.php', 'disable_new_media2' ); // media-new.php would not be accessed

function disable_new_media( $file ) {
    if (current_user_can('author')) {
        $file['error'] = 'You aren\'t allowed to upload images!';
    }
    return $file;
}
//add_filter( 'wp_handle_upload_prefilter', 'disable_new_media' ); // this would disable local uploading for 'author' role

function remove_theme_caps() {
    // gets the author role
    $role = get_role( 'author' );

    // This only works, because it accesses the class instance.
    // would allow the author to edit others' posts for current theme only
    $role->remove_cap( 'upload_files' ); 
}
add_action( 'admin_init', 'remove_theme_caps'); // this would remove 'Media' from admin menu + restrict to access thta page , but local files could be uploaded through my form

/* contact form plugin */

function html_form_code($name,$email,$subject,$message) {
	echo '
    <style>
    div {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }
    </style>
    ';
	echo '<form class="contactform" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post" enctype="multipart/form-data">';
	echo '<p>';
	echo 'Your Name (required)<br/>';
	echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? $name : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? $email : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Subject (required)<br/>';
	echo '<input type="text" name="cf-subject" pattern="[a-zA-Z0-9-_ ?]+" value="' . ( isset( $_POST["cf-subject"] ) ? $subject : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br/>';
	echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? $message : '' ) . '</textarea>';
	echo '</p>';
	wp_nonce_field( 'my_contact_form_submit', 'Dx99g1HqJ5Bb2rkF' );
	echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
	echo '</form>';
}

function contact_validation( $name,$email,$subject,$message )  {

global $reg_errors;
$reg_errors = new WP_Error;
	
if ( empty( $name ) || empty( $email ) || empty( $subject ) || empty( $message ) ) {
    $reg_errors->add('field', 'Required form field is/are missing');
}
if (empty( $name ))	
	$reg_errors->add( 'name_cant_empty', 'Name cant be blank' );
if ( !is_email( $email ) )
    $reg_errors->add( 'email_invalid', 'Email is not valid' );
if (empty( $subject ))	
	$reg_errors->add( 'subject_cant_empty', 'Subject cant be blank' );
if (empty( $message ))	
	$reg_errors->add( 'message_cant_empty', 'message cant be blank' );
	
if ( is_wp_error( $reg_errors ) && count($reg_errors->errors)>0) {
 	//print_r($reg_errors->errors);
	//echo "C :".count($reg_errors->errors);
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
        echo '<div>';
        echo '<strong>ERROR</strong>:';
        echo $error . '<br/>';
        echo '</div>';
         
    }
return 0;
}
return 1;
}

function deliver_mail() {
		global $validation_return;
		$validation_return = contact_validation(
			$_POST["cf-name"],
			$_POST["cf-email"],
			$_POST["cf-subject"],
			$_POST["cf-message"]
		);
		// sanitize form values
		//global $name, $email,$subject, $message;
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$subject = sanitize_text_field( $_POST["cf-subject"] );
		$message = esc_textarea( $_POST["cf-message"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( $validation_return == 1 ) :
			if ( wp_mail( $to, $subject, $message, $headers ) ) {
				echo '<div>';
				echo '<p>Thanks for contacting us, we would try to response as fast as posible.</p>';
				echo '</div>';
			} else {
				echo 'Sorry, An unexpected error occurred!';
			}
		else:
			html_form_code($name,$email,$subject,$message);
		endif;
}

function cf_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );


//end


/* Theme Options */
if ( ! function_exists( 'anaximander_setup' ) ):

function anaximander_setup() {
//  Get theme options
	require_once ( get_template_directory() . '/theme-options/theme-options.php' );
}
endif; // anaximander_setup

add_action( 'after_setup_theme', 'anaximander_setup' );

/**/

function remove_website_field($fields) {
    unset($fields['url']);
	unset($fields['author']);
	unset($fields['email']);
    return $fields;
}

/* setting post permalink through function */
function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

/* enable anyone can register through function */
if ( ! get_option( 'users_can_register' ) )
	add_action('init', 'update_anyone_can_register');
function update_anyone_can_register() {
  		update_option('users_can_register', true);
}
