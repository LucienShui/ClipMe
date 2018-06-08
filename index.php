<?php
function genTextarea($name, $args='', $value='') { // 生成一个textarea
    return "<textarea name='{$name}' {$args}" . ">{$value}</textarea>";
}

function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

$file_name = str_replace('/', '', $_SERVER["PATH_INFO"]); // 取当前路由的后缀
if ($file_name == "") { // 如果没有后缀，那么显示主页
    $hostname = $_SERVER['HTTP_HOST']; // 获取当前域名
    $html = str_combine(file('./base.html')); // 取网页框架
    $tmp = "<h2>How to use</h2>
    <p><li>Enter any word behind this page's URL in browser and input anything you want.</li></p>
    <p><li>On any PC or Phone enter in the same URL to view the text you write just now.</li></p>
    <p><b>For example: <a href = 'http://{$hostname}/example'>{$hostname}/example</a></b></p>
    <p><a href='http://github.com/LucienShui/NetClip' target='_blank'>More information...</a></p>
    <p align='right'><a href='http://www.lucien.ink' target='_blank'>&copy; 2018 Lucien Shui</a></p>";
    echo str_replace('{&body}', $tmp, $html);
} else {
    $file_name = str_replace('.', 'dot', $file_name); // 将"."全部替换
    $file_path = "./.file/" . $file_name; // 文件路径
    $host_name = $_SERVER['HTTP_HOST'];
    if (file_exists($file_path)) { // 如果文件存在
        $html = str_combine(file('./base.html')); // 取网页框架
        $tmp = "<b>The file shows below</b>" . genTextarea("output", "rows=10 readonly='readonly'", str_combine(file($file_path))) . "<a href='http://{$host_name}'><input type='button' title='goback' value='Home'/></a>"; // 显示文本
        echo str_replace('{&body}', $tmp, $html);
        unlink($file_path);
    } else { // 如果文件不存在
        $html = str_combine(file('./base.html')); // 取网页框架
        $tmp = "<b>This file is empty, you can input something below</b><form action='./submit.php' method='post'><textarea name='file_name' style='display: none'>{$file_name}</textarea>" . genTextarea("text", "rows=10") . "<input type='submit' value='Submit'/>"; // 创建表单
        echo str_replace('{&body}', $tmp, $html);
    }
}
?>


