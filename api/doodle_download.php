<?php
/**
 * Method for forcing download of doodle file
 */
if( !isset( $data['file'] ) )
{
	die( 'Error: no file provided.' );
}

// Test for attempted php download
if( stripos( strrev($data['file']), 'php.' ) === 0 )
{
	die( 'Error: attempted hack detected.' );
}

// Add the uploads dir to the file
$upload_dir = wp_upload_dir();
$file = $upload_dir["basedir"] . $data['file'];

// Prevent directory traversal
$file = realpath($file);
$pos = strpos($file, $upload_dir["basedir"]);
if( $pos === false )
{
	die( 'Error: attempted hack detected.' );
}

// Does the file exist?
if( !file_exists( $file ) )
{
	die( 'Error: invalid file.' );
}

$file_name = basename($file);
$file_size = filesize($file);

header("Cache-Control: private");
header("Content-Type: application/stream");
header("Content-Length: ".$file_size);
header("Content-Disposition: attachment; filename=".$file_name);
readfile ($file);                   
exit();
