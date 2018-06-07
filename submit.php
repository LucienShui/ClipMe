<?php
$file_path = $_POST['file_path'];
$text = $_POST['text'];
if (!is_dir("./file")) mkdir("./file", 0755);
$newfile = fopen($file_path, "w");
fwrite($newfile, $text);
if (file_exists($file_path)) echo "Saved.";
else echo "Failed.";
?>
