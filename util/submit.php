<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 20:17
 */
require 'tableEditor.php';
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $text = htmlspecialchars($_POST['text']); // 文本框的内容
    $it = new tableEditor();
    if ($it->insert($keyword, $text)) { // 如果写入成功
        header("Refresh:0;url=/success.php?keyword=" . $keyword);
    } else echo "<p>Failed</p>";
}
?>