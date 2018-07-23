<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 19:50
 */
$connection = mysqli_connect("localhost:3306","root","root");
if (!$connection) die('Database connect Error');
if (mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS `netclip`")) {
    echo 'Yes';
} else echo 'No: ' . mysqli_error($connection);
mysqli_select_db($connection, 'netclip');

?>