<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 19:27
 */
require 'util/frame.php';
require 'util/tableEditor.php';
$request_url = str_replace('/', '', $_SERVER["REQUEST_URI"]); // 取当前路由的后缀
if ($request_url == "") { // 如果没有后缀，那么显示主页
    header("Refresh:0;url=/");
} else {
    if (preg_match('/^[a-zA-Z0-9]*$/', $request_url) == 0) {
        echo "<script> alert('索引串只能由大小写英文字母或数字组成') </script>";
        header("Refresh:0;url=/");
    } else {
        $it = new tableEditor();
        $keyword = $request_url;
        session_start();
        $_SESSION['keyword'] = $keyword;
        head();
        if ($it->exists($keyword)) { // 如果文件存在
            show($it->get_text($keyword));
            $it->remove($keyword);
        } else { // 如果文件不存在
            edit($keyword);
        }
        foot();
    }
}
?>
