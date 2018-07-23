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
$html = str_combine(file("frame.html"));
$html = str_replace('{$body$}', str_combine(file("home.html")), $html);
if (isset($_SESSION['keyword'])) {
    $html = str_replace('{$value$}', "value='" . $_SESSION['keyword'] . "'", $html);
} else {
    session_start();
    $_SESSION['keyword'] = "";
    $html = str_replace('{$value$}', "value='" . $_SESSION['keyword'] . "'", $html);
}
echo $html;
?>
