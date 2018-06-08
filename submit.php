<?php
function str_combine($arr) {
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

$file_name = $_POST['file_name'];
$host_name = $_SERVER['HTTP_HOST'];
if ($file_name == "") header("location:http://{$host_name}");
else {
	$file_path = "./.file/" . $file_name;
	$text = $_POST['text'];
	if ($text == "") {
		echo "<script> alert('Content can not be empty.') </script>";
		header("refresh:0;url=http://{$host_name}/{$file_name}"); 
	} else {
		if (!is_dir("./.file")) mkdir("./.file", 0755);
		$newfile = fopen($file_path, "w");
		fwrite($newfile, $text);
		$html = str_combine(file('./base.html'));
		if (file_exists($file_path)) {
			$tmp = "<h2>Saved</h2>
				  <a href='http://{$host_name}'><input type='button' title='goback' value='Home'/></a>";
		    echo "<meta http-equiv='refresh' content='3; url=http://{$host_name}";
			echo str_replace('{&body}', $tmp, $html);
		} else echo str_replace('{&body}', "<p>Failed</p>", $html);
	}
}

?>



