# NetClip

在不同的设备之间用自定义的链接来传输文本内容。

## 服务端部署

```
web_site_root
 └─ index.php
```

## Rewrite规则（必须配置）

#### Nginx

```
if (!-e $request_filename) {
    rewrite ^(.*)$ /index.php$1 last;
}
```

#### Apache

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [L,E=PATH_INFO:$1]
</IfModule>
```

## 使用指北

+ 在浏览器的地址里输入网址 + 任何你喜欢的后缀，如果这个后缀当前被使用了，就会显示这个网页后缀所存储的信息，如果没有被使用，则会提示你输入一些文字。

+ 在另一个设备上打开同样的网址 + 后缀，就可以显示刚才你粘贴的内容了。

### 举个栗子

+ 某一台设备在浏览器里输入了网址：[netclip.cf/example](https://www.lucien.ink/go/clipexample/), 然后在里面随便输入了一些信息。

+ 在此之后另一台设备也访问了这个网址，则刚才存入的信息被读取。

## 其它

+ 为了信息安全性考虑，所有存储在 [netclip.cf](http://www.lucien.ink/go/clip) 中的文本信息在被查看过一次之后就会被立即销毁。

+ 也就是说一旦某个后缀被看过，那么下一个访问这个网址的人将会看到这是一个无人使用的后缀。

+ 第一个php作品，代码写的很烂，望轻喷。

## Demo

[netclip.cf](http://www.lucien.ink/go/clip)

## 版权所有

[Lucien Shui](http://www.lucien.ink)
