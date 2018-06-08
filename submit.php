<?php
function str_combine($arr) {
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

$file_path = $_POST['file_path'];
if ($file_path == "") header("location:http://{$_SERVER['HTTP_HOST']}");
$text = $_POST['text'];
if (!is_dir("./.file")) mkdir("./.file", 0755);
$newfile = fopen($file_path, "w");
fwrite($newfile, $text);
$html = str_combine(file('./base.html'));
if (file_exists($file_path)) {
	$tmp = "<h2>Saved.</h2>
		  <a href='http://{$_SERVER['HTTP_HOST']}'>
		  		<input type='button' title='Back to home' value='Back to home'/></a>";
    echo "<meta http-equiv='refresh' content='3; url=http://{$_SERVER['HTTP_HOST']}";
	echo str_replace('{&body}', $tmp, $html);
} else echo str_replace('{&body}', "<p>Failed.</p>", $html);
?>


