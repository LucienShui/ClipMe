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
    $html = combine(file('./homepage.html'));
    return str_replace('{&hostname}', $hostname, $html);
}

function editpage($file_path) {
	$html = combine(file('./edit.html'));
	$tmp = "<textarea name='file_path' style='display: none'>{$file_path}</textarea>" . genTextarea("text", "Input something there, press \"Enter\" to submit.", "70%", "50%");
	return str_replace('&$text_area&$', $tmp, $html);
}

function footer() {

}


$file_name = str_replace('/', '', $_SERVER["PATH_INFO"]);
if ($file_name == "") echo homepage();
else {
    $file_path = "./file/" . $file_name;
    if (file_exists($file_path)) {
    	echo "<link rel='stylesheet' href='//cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css'>
<script src='//cdn.bootcss.com/jquery/1.11.2/jquery.min.js'></script>
<script src='//cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js'></script><body><div>";
        echo genTextarea("output", combine(file($file_path)), "70%", "50%");
        echo "</div></body>";
        unlink($file_path);
    } else echo editpage($file_path);
}
?>

