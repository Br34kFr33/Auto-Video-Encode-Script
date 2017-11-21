# Auto-Encoder

This script scans a directory for any video files with .avi, .mp4, .mkv extentions and re-enodes them to .mp4 format.  It also cleans up the filename by looking for keywords that are set in config.php file and removes them.


# Requirements

* ffmpeg
* php

# Setup

1.  Edit re_encode.php and replace /home/Videos/TV/ with whatever directory you want to scan.
2.  Edit config.php and replace /var/www/html/videos/shows/ with your complete directory and replace /home/Trash/ with the directory you want the old video files to be moved to.
