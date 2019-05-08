<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imagegridly
 */

get_header(); 
$allowd_ext = array("jpg", "jpeg", "jpe", "png", "bmp", "gif", "ico", "tif", "tiff", "svg");
?>
<script type="text/javascript">
var _validFileExtensions = [".jpe",".jpg",".jpeg",".png",".gif",".ico",".bmp",".tif",".tiff",".svg"];
function checkextension() {     
  var file = document.querySelector("#my_file_upload");
if (file.files.length <= 25){ // number of files checking
for (var i=0;i<file.files.length;i++){
	  if ( /\.(jpe?g|png|gif|ico|tiff|tif|bmp|svg)$/i.test(file.files.item(i).name) === false ) {  // format checking
	  alert( "Sorry, not an allowed file format!\n Allowed extensions are: " + _validFileExtensions.join(", "));
      document.getElementById('my_file_upload').value = '';
	  break;
}
	if (file.files.item(i).size/1024/1024 > 10){ // size checking
		alert( "Sorry, but File : '"+file.files.item(i).name+"' extended the allowed file size(10MB)");
		document.getElementById('my_file_upload').value = '';
		break;	
	}
}
}
else{
		alert("Sorry, but at a time maximum 25 images could be chosen!");
		document.getElementById('my_file_upload').value = '';
}
}
function checkextension2() {
var urlR = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
var content = document.getElementById("file_url").value;
var url = content.match(urlR);
var fileName, fileExtension;
if (url.length <= 25){ // number of files checking
for (var i=0;i<url.length;i++){
	fileName = url[i]
	fileExtension = fileName.substr((fileName.lastIndexOf('.') + 1));
	// format checking
	if (_validFileExtensions.indexOf('.'+fileExtension)==-1){
		alert("Sorry, but ."+fileExtension+" is not an allowed file format!\n Allowed extensions are: " + _validFileExtensions.join(", "));
		document.getElementById('file_url').value = '';
		break;
	}
}
}
else{
	alert("Sorry, but at a time maximum 25 images could be chosen!");
	document.getElementById('file_url').value = '';
}
}
function checkInput() {
  var file = document.getElementById("my_file_upload").value;
  var url = document.getElementById("file_url").value;
  if ((file==null || file=="") && (url==null || url=="")){
  document.getElementById("my_file_upload").required = true;
  document.getElementById("file_url").required = true;
  window.location.reload();
  }
}
</script>
<?php 
$user_id = get_current_user_id();
$url = "";

if(isset($_POST['submit_signup'],$_POST['0dj3FG33uJS1']) 
   && wp_verify_nonce($_POST['0dj3FG33uJS1'],'my_signup_form')) {
		custom_registration_function();		
}
else if(isset($_POST['submit_register'],$_POST['my_register_nonce'] )
   && wp_verify_nonce($_POST['my_register_nonce'],'my_register') ){
	custom_registration_function();
}
else if(isset($_POST['submit_sigin'],$_POST['90DjX23Dn9ZoF4'])
	   && wp_verify_nonce($_POST['90DjX23Dn9ZoF4'],'my_sigin_form'))
{
	    $args = array(
        'redirect' => admin_url(), 
        'form_id' => 'loginform',
		'form_name' => 'loginform',
        'label_username' => __( 'Username or Email Address' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Sign In' ),
        'remember' => true
    );
    wp_login_form( $args );
}
else if(isset($_POST['submit_contact'],$_POST['my_contact_form_nonce'])
	   && wp_verify_nonce($_POST['my_contact_form_nonce'],'my_contact_form')){
html_form_code($_POST["cf-name"],$_POST["cf-email"],$_POST["cf-subject"],$_POST["cf-message"]);	
}
else if(isset($_POST['cf-submitted'],$_POST['Dx99g1HqJ5Bb2rkF'])
	   && wp_verify_nonce($_POST['Dx99g1HqJ5Bb2rkF'],'my_contact_form_submit')){
	deliver_mail();
}
else{
if(isset($_POST['submit_my_file_upload'],$_POST['my_file_upload_nonce']) &&
   ($_POST['file_url'] || $_FILES['my_file_upload']['size'][0] > 0)
   && wp_verify_nonce($_POST['my_file_upload_nonce'],'my_file_upload')) {
//Upload Image
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );
	require_once( ABSPATH . 'wp-admin/includes/taxonomy.php' );
$rand_unique_string = getToken(8);
$rand_unique_string.= mt_rand(1000,9999);
//echo '<p> ['.$rand_unique_string.'] </p>';
//Insert Post
    $my_post = array(
    'post_title'    => $rand_unique_string,
    'post_content'  => '',
    'post_status'   => 'publish',
    'post_author'   => $user_id,
	//'post_parent' => 0, // set/reset
    //'post_category' => array($catids),
	/*'tax_input'     => array( 
						  'category' => $catids 
						),*/
    'post_type'     => 'post' // post/page
    );
//print_r($catids);
$post_id = wp_insert_post( $my_post );

if(!$post_id)
    echo("[ERROR] post insertion failed. Handle it here");
else{
	if (isset($_POST['nsfw_field']))
		add_post_meta( $post_id, "nsfw_field", '1', true );
	else
		add_post_meta( $post_id, "nsfw_field", '0', true );
	//echo "<br/><p id='autoposted'>New post id :" . $post_id . "</p>";
	if ($_POST['file_url']){
	$attachment_id = array();
	preg_match_all('#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si', $_POST['file_url'], $file_urls_arr);
	//print_r($file_urls_arr);
	$counter = 0;
	foreach($file_urls_arr[0] as $file_urls_arr_)
    {
	$counter++;
	if ($counter > 25) // number of files checking
		break;
	//$image_data = file_get_contents($_POST['file_url']); // for single image
	$image_data = file_get_contents($file_urls_arr_);
	
	$upload_dir = wp_upload_dir();
    //$filename = basename($_POST['file_url']); // for single image
    $filename = basename($file_urls_arr_);
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$image_size = strlen($image_data);
	if (in_array($ext,$allowd_ext) && $image_size/1024/1024 <= 10){ // format & file size checking
	$rand_unique_string2 = getToken_for_attachment(10);
	$rand_unique_string2.= mt_rand(100000,999999);
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $rand_unique_string2 . '.' . $ext;
    else                                    $file = $upload_dir['basedir'] . '/' . $rand_unique_string2 . '.' . $ext;
	file_put_contents($file, $image_data);
	$wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attachment_id[] = wp_insert_attachment( $attachment, $file, $post_id );
	}
	}
	}
	else{
	/*$GLOBALS['rand_unique_string'] = $rand_unique_string;
	$attachment_id = media_handle_upload('file',$post_id);*/
	if ( $_FILES ) { 
    $files = $_FILES["my_file_upload"];  
	$counter = 0;
    foreach ($files['name'] as $key => $value) {
			$counter++;
			if ($counter > 25) // number of files checking
				break;
            if ($files['name'][$key] && $files['size'][$key]/1024/1024 <= 10 && stristr($files['type'][$key], "image/")) { // , file size & format checking
                $file = array( 
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key], 
                    'tmp_name' => $files['tmp_name'][$key], 
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                ); 
				//print_r($file);
                $_FILES = array ("my_file_upload" => $file); 
				$attachment_id = array();
                foreach ($_FILES as $file => $array) {
					$rand_unique_string2 = getToken_for_attachment(10);
					$rand_unique_string2.= mt_rand(100000,999999);
					$GLOBALS['rand_unique_string2'] = $rand_unique_string2;
					//$filetype = wp_check_filetype($file);
                    $attachment_id[] = my_handle_attachment($file,$post_id); 
                }
            } 
        } 
    }
	}
    if (is_wp_error($attachment_id[0])) { 
        echo '[ERROR] Image not Uploaded!<br/>'; 
	}
    else{ 
		if (count($attachment_id[0]) != 0){
        echo 'Image Uploaded<br/>';
		//Set Image as thumbnail
		set_post_thumbnail($post_id, $attachment_id[0]);
		}
	}
}
$attachments = get_posts( array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_parent' => $post_id,
					//'exclude'     => get_post_thumbnail_id($post_id)
				) );
$counter = 1;
if ( $attachments ) {
	foreach ( $attachments as $attachment ) {
		$image = wp_get_image_editor (wp_get_attachment_url( $attachment->ID ));
		if ( ! is_wp_error( $image ) ) {
			$path_parts = pathinfo(wp_get_attachment_url( $attachment->ID ));
			$image->resize( 300, 300, false );
			$image->save( 'resize/'.$path_parts['basename'] );
			echo "Thumbnail generated [for image no. ".$counter."] :)<br/>";
		}
		else{
			echo "Error in generating Thumbnail! [for image no. ".$counter."] :)<br/>";
			}
		$counter++;
		}
}
/*	$image = wp_get_image_editor (get_the_post_thumbnail_url($post_id));
if ( ! is_wp_error( $image ) ) {
	$path_parts = pathinfo(get_the_post_thumbnail_url($post_id));
	$image->resize( 300, 300, false );
	//echo $path_parts['filename'].'.'.$path_parts['extension'];
    //$image->save( 'files/'.$path_parts['filename'].'-300x300.'.$path_parts['extension'] );
    $image->save( 'resize/'.$path_parts['basename'] );
	echo "Thumbnail generated :)<br/>";
}
else{
	echo "Error in generating Thumbnail!<br/>";
	}*/
	$url = get_permalink( $post_id );
	echo "<br/>Redirecting to : <a href='".$url."'>".$url."</a>";
	//custom_redirect($url); <- not working
?> 
<script type="text/javascript">
	document.location.href="<?php echo $url;?>";
</script>
<?php
}
else{
	print "<form id='file_upload' method='post' action='#' enctype='multipart/form-data' style='display:block'>";
	//print "Title: <input type='text' name='autotitle'><br/>";
	//print "Content: <textarea name='autocontent'></textarea>";
	//print "Select an Image: <br/><input type='file' name='file'>";
	print "Select image(s)<br/><input type='file' name='my_file_upload[]' id='my_file_upload' class='custom-file-input' multiple='multiple' accept='image/bmp,image/jpeg,image/tiff,image/gif,image/png,image/x-icon,image/svg+xml' onchange='checkextension()'>";
	wp_nonce_field( 'my_file_upload', 'my_file_upload_nonce' );
	print "<br/>(OR) <br/><textarea rows='5' cols='1' name='file_url' id='file_url' placeholder='Paste Direct URL(s) \n[separate by lines]' onchange='checkextension2()'></textarea>";
	print "<br/>NSFW/Adult content <input type='checkbox' name='nsfw_field'>";
	print "<br/><input onclick='checkInput()' type='submit' id='submit_my_file_upload' name='submit_my_file_upload' value='Upload '>";
	print "</form>";
	print "<font size='1'>Maximum individual file size : 10 MB; at a time 25 files could be uploaded</font>";
}
}
get_footer();
/*$original = wp_upload_dir();
echo $original['path']."<br/>";
echo $original['url']."<br/>";
echo $original['baseurl']."<br/>";
echo $original['basedir']."<br/>";*/
//get_template_part( 'footer2' );