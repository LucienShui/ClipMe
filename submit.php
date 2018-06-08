<?php
function str_combine($arr) { // 将一个string数组连接成一个string
    $ret = "";
    foreach ($arr as $line) $ret = $ret . $line;
    return $ret;
}

$file_name = $_POST['file_name']; // 文件名称
$host_name = $_SERVER['HTTP_HOST']; // 网站域名
if ($file_name == "") header("location:http://{$host_name}"); 
// 如果文件名为空，说明是人为主动访问的，返回主页
else {
	$file_path = "./.file/" . $file_name; // 文件的存储路径
	$text = $_POST['text']; // 文本框的内容
	if ($text == "") { // 如果文本框内容为空，没有意义
		echo "<script> alert('Content can not be empty.') </script>";
		header("refresh:0;url=http://{$host_name}/{$file_name}");
	} else {
		if (!is_dir("./.file")) mkdir("./.file", 0755); // 如果文件夹不存在，那么创建这个文件夹
		$newfile = fopen($file_path, "w"); // 创建文件
		fwrite($newfile, $text); // 写入
		$html = str_combine(file('./base.html')); // 网页框架
		if (file_exists($file_path)) { // 如果写入成功
			echo str_replace('{&body}', "<h2>Saved</h2><p>3 seconds go back home automatically.</p>", $html);
			header("refresh:3;url=http://{$host_name}"); // 三秒自动跳转
		} else echo str_replace('{&body}', "<p>Failed</p>", $html);
	}
}

?>



