# 此项目已合并至[PasteMe](https://github.com/LucienShui/PasteMe)

---

# 以下是曾经的内容

# ClipMe

在不同的设备之间用自定义的链接来传输文本内容。

## 服务端部署

```
web_root
 ├─ index.php
 ├─ handle.php
 ├─ success.php
 ├─ favicon.ico (if you have)
 ├─ js
 │   └─ tools.js
 └─ util
     ├─ config.php
     ├─ frame.php
     ├─ util.php
     └─ submit.php
```

修改web_root/util/config.php中的数据库相关的信息，并将website项更改为服务器的域名。

第一次启动网页时，访问web_root/util/init.php来初始化数据库。

### Rewrite（必须）

#### Nginx

```
if (!-e $request_filename) {
    rewrite ^(.*)$ /handle.php$1 last;
}
```

#### Apache

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ handle.php [L,E=PATH_INFO:$1]
</IfModule>
```

## 其它

+ 为了信息安全性考虑，所有存储在 [netclip.lucien.ink](http://www.lucien.ink/go/clip) 中的文本信息在被查看过一次之后就会被立即销毁。

+ 也就是说一旦某个后缀被看过，那么下一个访问这个网址的人将会看到这是一个无人使用的后缀。

+ 第一个php作品，代码写的很烂，望轻喷。

## Demo

[netclip.lucien.ink](http://www.lucien.ink/go/clip)

## 版权所有

[Lucien Shui](http://www.lucien.ink)
