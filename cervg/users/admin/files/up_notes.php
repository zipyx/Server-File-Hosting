<?php

// Getting uploaded file
$file = $_FILES["file"];

// Uploading in "uploads_notes" folder
move_uploaded_file($file["tmp_name"], "/var/www/hdrive/web_php/Notes/" . $file["name"]);

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);
