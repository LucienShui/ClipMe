<!doctype html>
<html>
<head>
    <title>NetClip</title>
    <meta charset='utf-8' />
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
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
    function genTextarea($name, $args='', $value='') { // 生成一个textarea
        return "<textarea name='{$name}' {$args}" . ">{$value}</textarea>";
    }

    function str_combine($arr) { // 将一个string数组连接成一个string
        $ret = "";
        foreach ($arr as $line) $ret = $ret . $line;
        return $ret;
    }

    if ($_POST['file_name'] == "") { // 如果没有post请求
        $file_name = str_replace('/', '', $_SERVER["REQUEST_URI"]); // 取当前路由的后缀
        if ($file_name == "") { // 如果没有后缀，那么显示主页
            $hostname = $_SERVER['HTTP_HOST']; // 获取当前域名
            echo "<h2>How to use</h2>
            <p><li>Enter any word behind this page's URL in browser and input anything you want.</li></p>
            <p><li>On any PC or Phone enter in the same URL to view the text you write just now.</li></p>
            <p><b>For example: <a href = 'http://{$hostname}/example'>{$hostname}/example</a></b></p>
            <p><a href='http://github.com/LucienShui/NetClip' target='_blank'>More information...</a></p>
            <p align='right'><a href='http://www.lucien.ink' target='_blank'>&copy; 2018 Lucien Shui</a></p>";
        } else {
            $file_name = str_replace('.', 'dot', $file_name); // 将"."全部替换
            $file_path = "./.file/" . $file_name; // 文件路径
            $host_name = $_SERVER['HTTP_HOST'];
            if (file_exists($file_path)) { // 如果文件存在
                echo "<b>The file shows below</b>";
                echo genTextarea("output", "rows=10 readonly='readonly'", str_combine(file($file_path)));
                echo "<a href='http://{$host_name}'><input type='button' title='goback' value='Home'/></a>";
                unlink($file_path);
            } else { // 如果文件不存在
                echo "<b>This file is empty, you can input something below</b>
                      <form action='' method='post'>
                      <textarea name='file_name' style='display: none'>{$file_name}</textarea>";
                echo genTextarea("text", "rows=10");
                echo "<input type='submit' value='Submit'/>"; // 创建表单
            }
        }
    } else { // 存在post请求，开始存储文件
        $file_name = $_POST['file_name']; // 文件名称
        $host_name = $_SERVER['HTTP_HOST']; // 网站域名
        $file_path = "./.file/" . $file_name; // 文件的存储路径
        $text = $_POST['text']; // 文本框的内容
        if ($text == "") { // 如果文本框内容为空，没有意义
            echo "<script> alert('Content can not be empty.') </script>";
            header("refresh:0;url=http://{$host_name}/{$file_name}");
        } else {
            if (!is_dir("./.file")) mkdir("./.file", 0755); // 如果文件夹不存在，那么创建这个文件夹
            $newfile = fopen($file_path, "w"); // 创建文件
            fwrite($newfile, $text); // 写入
            if (file_exists($file_path)) { // 如果写入成功
                echo "<h2>Successfully saved</h2>
                      <p>On any browser enter in <b>http://{$host_name}/{$file_name}</b> to view the content.</p>
                      <p>Please note that the information can be viewed only once.</p>
                      <a href='http://{$host_name}'><input type='button' title='goback' value='Home'/></a>";
            } else echo "<p>Failed</p>";
        }
    }

    ?>
</div>
</body>
</html>