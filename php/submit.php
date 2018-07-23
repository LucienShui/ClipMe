<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/23
 * Time: 20:17
 */
if (isset($_POST['file_name'])) {
    $file_name = $_POST['file_name'];
    $file_path = "./.file/" . $file_name; // 文件的存储路径
    $text = $_POST['text']; // 文本框的内容
    if (!is_dir("./.file")) mkdir("./.file", 0755); // 如果文件夹不存在，那么创建这个文件夹
    $newfile = fopen($file_path, "w"); // 创建文件
    fwrite($newfile, $text); // 写入
    if (file_exists($file_path)) { // 如果写入成功
        header("Refresh:0;url=/success.php?keyword=" . $file_name);
    } else echo "<p>Failed</p>";
}
?>