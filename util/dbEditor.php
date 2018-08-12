<?php
class dbEditor {
    private $connection = null;
    private $config;
    public function __construct() {
        $this->config = require ('config.php');
        $config = $this->config;
        $this->connection = mysqli_connect($config['dbhost'], $config['username'], $config['password']);
        if (!$this->connection) die('Error: ' . mysqli_error($this->connection));
        mysqli_query($this->connection, "USE `{$config['dbname']}`");
    }

    private function error() {
        echo 'Error: ' . mysqli_error($this->connection);
        return False;
    }

    public function insert($keyword, $text) {
        $sql = $this->connection->prepare("INSERT INTO `clip` VALUES (?, ?)");
        $sql->bind_param('ss', $keyword, $text);
        if ($sql->execute()) return True;
        return $this->error();
    }

    public function get_array($keyword) {
        $sql = $this->connection->prepare("SELECT `text` FROM `clip` WHERE `keyword` = ?");
        $sql->bind_param('s', $keyword);
        $sql->execute();
        $sql->store_result();
        $sql->bind_result($text);
        $sql->fetch();
        $sql->close();
        return $text;
    }

    public function exists($keyword) {
        $sql = $this->connection->prepare("SELECT `keyword` FROM `clip` WHERE `keyword` = ?");
        $sql->bind_param('s', $keyword);
        $sql->execute();
        $sql->store_result();
        return $sql->num_rows > 0;
    }

    public function remove($keyword) {
        $sql = $this->connection->prepare("DELETE FROM `clip` WHERE `keyword` = ?");
        $sql->bind_param('s', $keyword);
        if ($sql->execute()) return True;
        return False;
    }
}
?>