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

function homepage() {
    $hostname = $_SERVER['HTTP_HOST'];
    return combine(file('./homepage.html'));
}

function editpage($file_path) {
	$html = combine(file('./edit.html'));
	$html = $html . "<textarea name='file_path' style='display: none'>{$file_path}</textarea>";
	$html = $html . genTextarea("text", "Input something there, press \"Enter\" to submit.", "100%", "100%");
	$html = $html . "</div><div><input type='submit' value='submit'/></div></form></div></div></body></html>";
	return $html;
}

function footer() {

}


$file_name = str_replace('/', '', $_SERVER["PATH_INFO"]);
if ($file_name == "") echo homepage();
else {
    $file_path = "./file/" . $file_name;
    if (file_exists($file_path)) {
        echo genTextarea("output", combine(file($file_path)), "100%", "100%");
        unlink($file_path);
    } else {
        echo editpage($file_path);
    }
}
?>

