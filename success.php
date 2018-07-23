<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 20:55
 */
function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $config = include_once('php/config.php');
    $html = str_combine(file("html/frame.html"));
    $html = str_replace('{$body$}', str_combine(file('html/success.html')), $html);
    $html = str_replace('{$url$}', $config['website'] . $keyword, $html);
    $html = str_replace('{$keyword$}', $keyword, $html);
    echo $html;
}
?>