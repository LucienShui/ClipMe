<?php
$config = require('config.php');
$connection = mysqli_connect($config['dbhost'], $config['username'], $config['password']);
if (!$connection) die('Error' . mysqli_error($connection));
$sqlSet = array(
    "CREATE DATABASE IF NOT EXISTS {$config['dbname']}",
    "USE {$config['dbname']}",
    "CREATE TABLE IF NOT EXISTS `clip` (
        `keyword` varchar(107) PRIMARY KEY,
	    `text` text)",
);
foreach ($sqlSet as $sql) if (!$connection->query($sql)) die('Error');
echo 'Success';
unlink('init.php');
header("Refresh:0;url=/");
?>
