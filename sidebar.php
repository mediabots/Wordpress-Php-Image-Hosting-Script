<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imagegridly
 */
global $store_arr;
/*if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}*/
?>

<aside id="secondary" class="featured-sidebar widget-area">
	<?php //dynamic_sidebar( 'sidebar-1' ); 
	//print_r($store_arr);
	//
	$direct="<div>Direct URL</div><div><textarea>";
	$bbcode="</textarea></div><div>BBCode</div><div><textarea>";
	$html="</textarea></div><div>HTML</div><div><textarea>";
	$end = "</textarea></div>";
	foreach($store_arr as $store_arr_):
	$direct.= $store_arr_."\n";
	$bbcode.= '[URL='.$store_arr_.'][IMG]'.str_replace("/files/","/resize/",$store_arr_).'[/IMG][/URL]'."\n";
	$html.= '<a href="'.$store_arr_.'" target="_blank"><img src="'.str_replace("/files/","/resize/",$store_arr_).'" alt="MediaBOTS"/></a>'."\n";
	endforeach;
	
	echo chop($direct);
	echo chop($bbcode);
	echo chop($html);
	echo $end;
	?>
	
</aside><!-- #secondary -->
