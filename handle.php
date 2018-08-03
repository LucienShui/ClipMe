<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 19:27
 */
require 'util/frame.php';
require 'util/util.php';
$request_url = str_replace('/', '', $_SERVER["REQUEST_URI"]); // 取当前路由的后缀
if ($request_url == "") { // 如果没有后缀，那么显示主页
    header("Refresh:0;url=/");
} else {
    if (preg_match('/^[a-zA-Z0-9]*$/', $request_url) == 0) {
        echo "<script> alert('索引串只能由大小写英文字母或数字组成') </script>";
        header("Refresh:0;url=/");
    } else {
        $file_name = $request_url;
        session_start();
        $_SESSION['keyword'] = $file_name;
        $file_path = "./.file/" . $file_name; // 文件路径
        head();
        if (file_exists($file_path)) { // 如果文件存在
            show(htmlspecialchars(str_combine(file($file_path))));
            unlink($file_path);
        } else { // 如果文件不存在
            edit($file_name);
        }
        foot();
    }
}
?>
