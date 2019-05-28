<?php

//Directory to place finished encodes into
$tv = '/home/user-name/shows/';
$movies = '/home/user-name/movies/';
$trash = '/home/user-name/Trash/';

$files = glob('/home/br0k3n/bkup/Videos/*/*.{avi,mkv,mp4,}', GLOB_BRACE);
        foreach($files as $file) {
		$noPath = basename($file);
		$fileName = substr($noPath, "0", -4);

		if(preg_match("/(.S\d+E\d+)/i", $fileName)) { $finished = $tv; } else { $finished = $movies; }
		if(preg_match("/[a-z.]+.S\d+E\d+/i", $fileName)) { preg_match("/[a-z.]+.S\d+E\d+/i", $fileName, $tvMatch); }
		if(preg_match("/[a-z.]+[\d]+.S\d+E\d+/i", $fileName)) { preg_match("/[a-z.]+[\d]+.S\d+E\d+/i", $fileName, $tvMatch); }
		if($finished == $movies) { preg_match("/[a-z.]+.\d{4}/i", $fileName, $movieMatch); }

		if($finished == $tv) { $name = preg_replace("/.\d{4}./", ".", $tvMatch[0]); } else { $name = $movieMatch[0]; }
		if($finished == $tv) { $name = str_ireplace('.us.', '.', $name); }

		$name = ucwords($name, '.');
		$name = ucfirst($name);

                $string="ffmpeg -i '$file' -movflags +faststart -crf 24 -preset medium -threads 4 -strict -2 '$name'.mp4";
                shell_exec($string);
        shell_exec("mv " . escapeshellarg($file) . " " . escapeshellarg($trash));
        shell_exec("mv " . escapeshellarg($name . ".mp4") . " " . escapeshellarg($finished));
}
?>
