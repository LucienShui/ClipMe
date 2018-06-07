<?php
function genTextarea($name, $args='', $value='') {
    return "<textarea name='{$name}' {$args}" . ">{$value}</textarea>";
}

function str_combine($arr) {
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

$file_name = str_replace('/', '', $_SERVER["PATH_INFO"]);
if ($file_name == "") {
    $hostname = $_SERVER['HTTP_HOST'];
    $html = str_combine(file('./base.html'));
    $tmp = "<h2>How to use</h2>
    <li><p>Enter any word behind this page's URL in browser and input anything you want.</p></li>
    <li><p>On any PC or Phone enter in the same URL to view the text you write just now.</p></li>
    <p><b>For example: <a href = 'http://{$hostname}/example' target='_blank'>{$hostname}/example</a></b></p>
    <p><a href='http://github.com/LucienShui/NetClip' target='_blank'>More information...</a></p>
    <p align='right'><a href='http://www.lucien.ink' target='_blank'>&copy; 2018 Lucien Shui</a></p>";
    echo str_replace('{&body}', $tmp, $html);
} else {
    $file_path = "./file/" . $file_name;
    if (file_exists($file_path)) {
        $html = str_combine(file('./base.html'));
        $tmp = "<b>The file shows below</b>" . genTextarea("output", "rows=10 readonly='readonly'", str_combine(file($file_path))) . "<a href='http://{$_SERVER['HTTP_HOST']}'><input type='button' title='Back to home' value='Back to home'/></a>";
        echo str_replace('{&body}', $tmp, $html);
        unlink($file_path);
    } else {
        $html = str_combine(file('./base.html'));
        $tmp = "<b>This file is empty, you can input something below</b><form action='./submit.php' method='post'><textarea name='file_path' style='display: none'>{$file_path}</textarea>" . genTextarea("text", "rows=10") . "<input type='submit' value='Submit'/></form>";
        echo str_replace('{&body}', $tmp, $html);
    }
}
?>
