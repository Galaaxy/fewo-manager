<?php
/**
 * Created by PhpStorm.
 * User: Freddy
 * Date: 09.08.2017
 * Time: 09:38
 */

if( ! function_exists('wp_handle_upload')){
	require_once (home_url() . 'wp-admin/includes/file.php');
}


$uploadedfile = $_FILES['file'];

$upload_overrides = array( 'test_form' => false );

$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

if ( $movefile && ! isset( $movefile['error'] ) ) {
	echo "File is valid, and was successfully uploaded.\n";
	var_dump( $movefile );
} else {
	/**
	 * Error generated by _wp_handle_upload()
	 * @see _wp_handle_upload() in wp-admin/includes/file.php
	 */
	echo $movefile['error'];
}
/*foreach ($_FILES as $key => $file){

	$directory = "../../../uploads/fewo.sass-manager/";

	$dname = explode(".", $file["name"]);
	$count = count($dname);
	$ext = $dname[$count-1];

	for($i = 0; $i < $count-1; $i++){
		$name .= $dname[$i];
	}

	$file["newName"] = str_replace(".", "", $name);

	if($file["size"]>0 &&
	    $ext == "gif" ||
		$ext == "png" ||
		$ext == "jpg" ||
		$ext == "jpeg"){
		copy($file["tmp_name"],$directory.$file["newName"].".".$ext);
	}

}*/