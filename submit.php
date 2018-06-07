<?php
$filename = $_POST['filename'];
$text = $_POST['text'];
if (!is_dir("./file")) mkdir("./file", 0755);
$newfile = fopen("./file/{$filename}", "w");
fwrite($newfile, $text);
echo "Saved."
?>
