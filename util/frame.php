<?php
/**
 * Created by Lucien
 * Date: 2018/8/3
 * Time: 19:32
 */

function head() {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>NetClip</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
    </head>

    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark fixed-top">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="<?php $config = require 'config.php'; echo $config['website']; ?>">NetClip</a>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1"
                                   data-toggle="dropdown">
                                    其它工具
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                                    <div class="dropdown-header">网络粘贴板</div>
                                    <a class="dropdown-item" href="http://www.lucien.ink/go/paste">NetPaste</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-header">在线二维码生成</div>
                                    <a class="dropdown-item" href="http://qrcode.lucien.ink">QRCode Generator</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2"
                                   data-toggle="dropdown">联系我</a>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="dropdown-header">Email</div>
                                    <a class="dropdown-item">lucien@lucien.ink</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <br><br><br><br>
                <?php
                }

function foot() {
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
    <footer>
        <div style="text-align: center;">
            <p>&copy; 2018 版权所有 <a href='http://www.lucien.ink' target='_blank'>Lucien Shui</a></p>
        </div>
    </footer>
    </html>
    <?php
}

function home($value) {
    ?>
    <script src="/js/tools.js"></script>
    <div class='row'>
        <div class='col-md-4'>
        </div>
        <div class='col-md-4'>
            <div onkeyup="enterJudge()">
                <div class='form-group'>
                    <h3>网络剪贴板</h3>
                    <hr/>
                    <label title='点击以了解索引串及其用法' id='modal-74921' href='#modal-container-74921' data-toggle='modal'>
                        剪贴板索引串
                        <a id='modal-74921' href='#modal-container-74921' role='button' data-toggle='modal'><span
                                    class='badge badge-pill badge-info'>?</span></a>
                    </label>
                    <input name='keyword' id='keyword' pattern='[a-zA-Z0-9]*' type='text' required='required'
                           class='form-control'
                           placeholder='在这里输入剪贴板的索引串' title="大小写字母或数字" value="<?php echo $value; ?>"/>
                </div>
                <button class='btn btn-primary' onclick="redirect()">前往</button>
            </div>
            <div class='modal fade' id='modal-container-74921' role='dialog' aria-labelledby='myModalLabel'
                 aria-hidden='true'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='myModalLabel'>索引串及其用法</h5>
                            <button type='button' class='close' data-dismiss='modal'>
                                <span aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-body'>
                            <ul>
                                <li>索引串可以由大小写字母和数字组成</li>
                                <li>如果索引串对应的剪贴板为空，则会新建一份空的剪贴板，否则就会显示对应的剪贴板的内容</li>
                                <li>除了通过在网页中填写索引串来访问剪贴板之外，还可以通过访问<a style='color: red'>本站网址+'/'+索引串</a>的方式来访问剪贴板</li>
                            </ul>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-dismiss='modal'>关闭</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class='alert alert-dismissable alert-info'>
                每个被创建的剪贴板只能被<strong>查看一次</strong>
            </div>
        </div>
        <div class='col-md-4'>
        </div>
    </div>
    <?php
}

function edit($file_name) {
    ?>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form role="form" action="/util/submit.php" method="post">
                <div class="form-group">
                    <input name="file_name" style="display: none" value="<?php echo $file_name; ?>" title="null"/>
                    <textarea class="form-control" required="required" name='text' rows='10' style="resize: none"
                              placeholder="这是一个空的剪切板，写点什么进去吧"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <?php
}

function show($text) {
    ?>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <textarea class="form-control" name='text' rows='10' style="resize: none"
                          title="剪贴板内容"><?php echo $text;?></textarea>
            </div>
            <a class="btn btn-primary btn-large" href="/">返回主页</a>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <?php
}

function success($keyword, $url) {
    ?>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="jumbotron">
                <h2>
                    保存成功
                </h2>
                <p>
                    欲访问索引串<b><?php echo $keyword?></b>所对应的剪贴板：
                </p>
                <ul>
                    <li>在主页中输入索引串</li>
                    <li>在浏览器中访问：<a href="<?php echo $url?>"><?php echo $url?></a></li>
                    <li><a href = 'http://qrcode.lucien.ink?text=<?php echo $url?>&tag=NetClip - 可能是最low的在线剪贴板' target='_blank'>扫描二维码</a></li>
                </ul>
                <p>
                    <a class="btn btn-primary btn-large" href="/">返回主页</a>
                </p>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <?php
}

?>