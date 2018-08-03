<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/3
 * Time: 22:29
 */
function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}
?>
