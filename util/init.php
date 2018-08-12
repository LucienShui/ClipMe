<?php
$config = require_once ('config.php');
$connection = mysqli_connect($config['dbhost'], $config['username'], $config['password']);
if (!$connection) die('Error' . mysqli_error($connection));
if ($connection->query("SELECT * FROM `clip`")) {
    header("Refresh:0;url=/");
} else {
    $sqlSet = array(
        "USE {$config['dbname']}",
        "CREATE TABLE IF NOT EXISTS `clip` (
            `keyword` varchar(107) PRIMARY KEY,
	        `text` text)",
    );
    foreach ($sqlSet as $sql) if (!$connection->query($sql)) die('Error');
    echo 'Success';
}
?>
