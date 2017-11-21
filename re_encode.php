<?php
include 'config.php';

$files = glob('/home/Videos/TV/*.{mkv,avi,mp4,}', GLOB_BRACE);
	foreach($files as $file) {
		$filename = $file;
		$filename = substr($file, "0", -4);
		$name = str_ireplace($tvwatch, '', $filename);
		$string="ffmpeg -i '$file' -movflags +faststart -crf 20 -preset slow -threads 6 -b:a 192k '$name'.mp4";
    exec($string);
	shell_exec("mv " . escapeshellarg($file) . " " . escapeshellarg($trash));
	shell_exec("mv " . escapeshellarg($name . ".mp4") . " " . escapeshellarg($tv));

}
