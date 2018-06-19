<!doctype html>
<html>
<head>
    <title>NetClip - 可能是最low的剪贴板</title>
    <meta charset='utf-8' />
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" >
    <style type='text/css'>
        body {
            background-color: #f0f0f2;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;

        }
        div {
            width: 600px;
            margin: 5em auto;
            padding: 50px;
            background-color: #fff;
            border-radius: 1em;
        }
        textarea {
            width: 100%;
            resize: none;
            font-size: 1em;
        }
        a:link, a:visited {
            color: #38488f;
            text-decoration: none;
        }
        @media (max-width: 700px) {
            body {
                background-color: #fff;
            }
            div {
                width: auto;
                margin: 0 auto;
                border-radius: 0;
                padding: 1em;
            }
        }
    </style>
</head>

<body>
<div>
    <?php
    function str_combine($arr) { // 将一个string数组连接成一个string
        $ret = "";
        foreach ($arr as $line) $ret = $ret . $line;
        return $ret;
    }
    if ($_POST['request_url'] == "") { // 如果没有post请求
        $request_url = str_replace('/', '', $_SERVER["REQUEST_URI"]); // 取当前路由的后缀
        if ($request_url == "") { // 如果没有后缀，那么显示主页
            $hostname = $_SERVER['HTTP_HOST']; // 获取当前域名
            echo "<h2>使用指北</h2>
            <p><li>在网址的后面随意添加一些文字，举个栗子：<b><a href = 'http://{$hostname}/example'>{$hostname}/example</a></b></li></p>
            <p><li>访问相同的网址或扫描二维码就可以查看对应的内容，每个内容只能被查看一次</li></p>
            <p><a href='http://github.com/LucienShui/NetClip' target='_blank'>更多信息...</a></p>
            <p align='right'>&copy; 2018 版权所有 <a href='http://www.lucien.ink' target='_blank'>Lucien Shui</a></p>";
        } else {
            $file_name = str_replace('.', 'dot', $request_url); // 将"."全部替换
            $file_path = "./.file/" . $file_name; // 文件路径
            $host_name = $_SERVER['HTTP_HOST'];
            if (file_exists($file_path)) { // 如果文件存在
                echo "<b>呀，这个文件居然不是空的</b>";
                echo "<textarea name='out' rows='10'>";
                echo  htmlspecialchars(str_combine(file($file_path)));
                echo "</textarea>";
                echo "<a href='http://{$host_name}'><input type='button' title='goback' value='返回主页'/></a>";
                unlink($file_path);
            } else { // 如果文件不存在
                echo "<b>这是一个空文件，写点什么进去好呢</b>
                      <form action='' method='post'>
                      <textarea name='request_url' style='display: none'>{$request_url}</textarea>";
                echo "<textarea name='text' rows='10'></textarea>";
                echo "<input type='submit' value='保存'/>"; // 创建表单
            }
        }
    } else { // 存在post请求，开始存储文件
        $request_url = $_POST['request_url']; // 文件名称
        $file_name = str_replace('.', 'dot', $request_url); // 将"."全部替换
        $host_name = $_SERVER['HTTP_HOST']; // 网站域名
        $file_path = "./.file/" . $file_name; // 文件的存储路径
        $text = $_POST['text']; // 文本框的内容
        if ($text == '') { // 如果文本框内容为空，没有意义
            echo "<script> alert('什么都不写，是宝宝不够俊美吗') </script>";
            header("refresh:0;url=http://{$host_name}/{$file_name}");
        } else {
            if (!is_dir("./.file")) mkdir("./.file", 0755); // 如果文件夹不存在，那么创建这个文件夹
            $newfile = fopen($file_path, "w"); // 创建文件
            fwrite($newfile, $text); // 写入
            if (file_exists($file_path)) { // 如果写入成功
                echo "<h2>保存成功</h2>
                      <p><li>其它设备访问 <b>{$host_name}/{$request_url}</b> 或 <a href = 'http://qrcode.lucien.ink?text=http://{$host_name}/{$request_url}&tag=NetClip - 可能是最low的在线剪贴板' target='_blank'>扫描二维码</a> 就可以看到刚才保存的内容</li></p>
                      <p><li>请注意，每个内容只能被查看一次，没有被查看过的内容至多保留一年</li></p>
                      <a href='http://{$host_name}'><input type='button' title='goback' value='返回主页'/></a>";
            } else echo "<p>Failed</p>";
        }
    }
    ?>
</div>
</body>
</html>
