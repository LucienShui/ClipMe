<?php
function genTextarea($name, $value, $width, $height, $placeholder = '') {
    $html = "<textarea name='{$name}' " . "style='width:{$width}; height:{$height} ' ";
    if (isset($value) && !empty($value)) $html .= ">{$value}</textarea>";
    else if ('' != $placeholder) $html .= "placeholder='{$placeholder}'></textarea>";
    else $html .= "></textarea>";
    return $html;
}

function combine($arr) {
	$ret = "";
	foreach ($arr as $line) $ret = $ret . $line;
	return $ret;
}

function homePage() {
    $hostname = $_SERVER['HTTP_HOST'];
    $html = combine(file('./homePage.html'));
    return str_replace('{&hostname}', $hostname, $html);
}

function editpage($file_path) {
	$pre = "<html><head><title>NetClip</title></head><form action='./submit.php' method='post'><div>";
	$mid = "<textarea name='file_path' style='display: none'>{$file_path}</textarea>" . genTextarea("text", "Input something there, press \"Enter\" to submit.", "70%", "50%");
    $suf = "</div><div><input type='submit' value='submit'/></div></form></html>";
	return $pre . $mid . $suf;
}

function footer() {

}


$file_name = str_replace('/', '', $_SERVER["PATH_INFO"]);
if ($file_name == "") echo homePage();
else {
    $file_path = "./file/" . $file_name;
    if (file_exists($file_path)) {
        echo genTextarea("output", combine(file($file_path)), "70%", "50%");
      	echo "<div><a href='http://{$_SERVER['HTTP_HOST']}'>
		  		<input type='button' title='Back to home' value='Back to home'/></a>";
        unlink($file_path);
    } else echo editpage($file_path);
}
?>


