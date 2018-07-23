<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 17:31
 */
function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}
$html = str_combine(file("html/frame.html"));
$html = str_replace('{$body$}', str_combine(file("html/home.html")), $html);
$value = '';
session_start();
if (isset($_SESSION['keyword'])) {
    $value = $_SESSION['keyword'];
}
$html = str_replace('{$value$}', $_SESSION['keyword'], $html);
echo $html;
?>
