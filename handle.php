<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 19:27
 */
function str_combine($arr)
{ // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

$request_url = str_replace('/', '', $_SERVER["REQUEST_URI"]); // 取当前路由的后缀
if ($request_url == "") { // 如果没有后缀，那么显示主页
    header("Refresh:0;url=/" . $url);
} else {
    if (preg_match('/^[a-zA-Z0-9]*$/', $request_url) == 0) {
        echo "<script> alert('索引串只能由大小写英文字母或数字组成') </script>";
        header("Refresh:0;url=/" . $url);
    } else {
        $html = str_combine(file("/html/frame.html"));
        $file_name = $request_url;
        session_start();
        $_SESSION['keyword'] = $file_name;
        $file_path = "./.file/" . $file_name; // 文件路径
        if (file_exists($file_path)) { // 如果文件存在
            $html = str_replace('{$body$}', str_combine(file('/html/handle_show.html')), $html);
            $html = str_replace('{$text$}', htmlspecialchars(str_combine(file($file_path))), $html);
            unlink($file_path);
        } else { // 如果文件不存在
            $html = str_replace('{$body$}', str_combine(file('/html/handle_edit.html')), $html);
            $html = str_replace('{$file_name$}', $file_name, $html);
        }
        echo $html;
    }
}
?>
