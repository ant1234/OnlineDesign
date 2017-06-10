<?php
function wp_verify_nonce($param1, $param2){
	return true;
}

function wp_die(){
	return die();
}

function absint($var){
	return (int)($var);
}

function wp_mkdir_p($path) {
	if(@mkdir($path) or file_exists($path)) return true;
    return (wp_mkdir_p(dirname($path)) and mkdir($path));
}

function wp_is_mobile(){
	include_once('mobiledetect.php');
	$mobile = new Mobiledetect();
	if(!$mobile->isMobile()) return false;
	return true;
}

function get_bloginfo(){
	return "";
}

function get_post_meta($product_id, $key = '', $single = false) {
	$ret = "";
	$onlinedesignIds = Mage::getModel('onlinedesign/onlinedesign')->_getOnlineDesignByProduct($product_id);
	
	foreach($onlinedesignIds as $onlinedesignId) {
		if(strpos($key, "_designer_setting") !== false) {
			$ret = $onlinedesignId->getContentDesign();
		}elseif(strpos($key, "_nbdesigner_dpi") !== false) {
			$ret = $onlinedesignId->getDpi();
		}elseif(strpos($key, "_nbdesigner_enable") !== false) {
			$ret = $onlinedesignId->getStatus();
		}elseif(strpos($key, "_nbdesigner_option") !== false) {
			$ret = $onlinedesignId->getNbdesignerOption();
		}
	} 
	return $ret;
}

function do_action($action_name, $result){
	Mage::log($_SESSION['nbdesigner']['nbdesigner_909']);
}

function wp_get_image_editor( $filename) {
    $type = exif_imagetype($full_name);
	if ($type == IMAGETYPE_PNG) {
		$image = imagecreatefrompng($filename);
	} elseif ($type == IMAGETYPE_JPEG) {
		$image = imagecreatefromjpeg($filename);
	}
    return $image;
}

function is_wp_error($value) {
	if(!$value) return false;
	return true;
}

function wp_create_nonce($nonce){
	return $nonce;
}

function current_user_can(){
	return true;
}

function wp_upload_dir() {
	$up = array();
	$base_url = str_replace("/nbdesigner", "", NBDESIGNER_DATA_URL);
	$up['baseurl'] = $base_url;
	return $up;
}

function __checked_selected_helper( $helper, $current, $echo, $type ) {
		if ( (string) $helper === (string) $current )
				$result = " $type='$type'";
		else
				$result = '';

		if ( $echo )
				echo $result;

		return $result;
}

function checked( $checked, $current = true, $echo = true ) {
		return __checked_selected_helper( $checked, $current, $echo, 'checked' );
}

function is_multisite() {
	return false;
}

function get_site_url(){
	return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
}
	
?>