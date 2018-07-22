<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>NetClip</title>
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" /></head>
	
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark fixed-top">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="navbar-toggler-icon"></span>
						</button> <a class="navbar-brand" href="#">NetClip</a>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="navbar-nav">
								<li class="nav-item dropdown">
									 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
									 	其它工具
									 </a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<div class="dropdown-header">在线二维码生成</div>
										<a class="dropdown-item" href="http://qrcode.lucien.ink">QRCode Generator</a>
									</div>
								</li>
							</ul>
							<ul class="navbar-nav ml-md-auto">
								<li class="nav-item dropdown">
									 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">联系我</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
										<div class="dropdown-header">Email</div>
										<a class="dropdown-item">lucien@lucien.ink</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
					<br><br><br><br>
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-8">
							<?php
								if (isset($_GET['filename'])) {

								} else {

								}
							?>
							<form role="form" action="handle.php" target="_blank" method="post">
									<div class="form-group">
									<textarea class="form-control" name='text' rows='10' style="resize: none" placeholder="这是一个空的剪切板，写点什么进去吧"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">保存</button>
							</form>
						</div>
						<div class="col-md-2">
						</div>
					</div>
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