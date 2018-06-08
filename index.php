<?php
function genTextarea($name, $args='', $value='') { // 生成一个textarea
    return "<textarea name='{$name}' {$args}" . ">{$value}</textarea>";
}

function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

if ($_POST['file_name'] == "") { // 如果没有post请求
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
            $tmp = "<b>This file is empty, you can input something below</b><form action='' method='post'><textarea name='file_name' style='display: none'>{$file_name}</textarea>" . genTextarea("text", "rows=10") . "<input type='submit' value='Submit'/>"; // 创建表单
            echo str_replace('{&body}', $tmp, $html);
        }
    }
} else { // 
    $file_name = $_POST['file_name']; // 文件名称
    $host_name = $_SERVER['HTTP_HOST']; // 网站域名
    $file_path = "./.file/" . $file_name; // 文件的存储路径
    $text = $_POST['text']; // 文本框的内容
    if ($text == "") { // 如果文本框内容为空，没有意义
        echo "<script> alert('Content can not be empty.') </script>";
        header("refresh:0;url=http://{$host_name}/{$file_name}");
    } else {
        if (!is_dir("./.file")) mkdir("./.file", 0755); // 如果文件夹不存在，那么创建这个文件夹
        $newfile = fopen($file_path, "w"); // 创建文件
        fwrite($newfile, $text); // 写入
        $html = str_combine(file('./base.html')); // 网页框架
        if (file_exists($file_path)) { // 如果写入成功
            $tmp = "<h2>Successfully saved</h2><p>On any browser enter in <b>http://{$host_name}/{$file_name}</b> to view the content.</p><p>Please note that the information can be viewed only once.</p><a href='http://{$host_name}'><input type='button' title='goback' value='Home'/></a>";
            // <p>3 seconds go back home automatically.</p>
            echo str_replace('{&body}', $tmp, $html);
            // header("refresh:3;url=http://{$host_name}"); // 三秒自动跳转
        } else echo str_replace('{&body}', "<p>Failed</p>", $html);
    }
}

?>