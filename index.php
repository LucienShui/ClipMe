<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 17:31
 */
require 'util/frame.php';
head();
$value = '';
session_start();
if (isset($_SESSION['keyword'])) {
    $value = $_SESSION['keyword'];
}
home($value);
foot();
?>
