<?php

// Getting uploaded file
$file = $_FILES["file"];

// Uploading in "uploads_music" folder
move_uploaded_file($file["tmp_name"], "/var/www/hdrive/web_php/Music/" . $file["name"]);

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);
