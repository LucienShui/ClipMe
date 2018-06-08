# 中文版

[Lucien's Blog](http://www.lucien.ink/archives/252/)

# What's NetClip
Move information between computers using the any url you like.

# Deploy

```
web_site_root
 ├─ index.php
 ├─ submit.php
 └─ base.html
```

# Rewrite

### Nginx

```
if (!-e $request_filename) {
    rewrite ^(.*)$ /index.php$1 last;
}
```

### Apache

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [L,E=PATH_INFO:$1]
</IfModule>
```

# How to use

+ Enter the ANY URL in browser and type or paste in what you want.

+ On another computer or smartphone enter in the same URL to retrive the information.

## For example

+ One computer or smartphone open the URL [clip.lucien.ink/example](https://www.lucien.ink/go/clipexample/), then input something into the textarea.

+ Then another computer or smartphone can enter in the same URL to view the information for once.

## Tips

+ For security the information in [clip.lucien.ink](http://www.lucien.ink/go/clip) is destroyed as soon as it is read.

+ Anyone visiting the same URL at a later time will not be able to see the message.

# Demo

[](http://www.lucien.ink/go/clip)

# Copyright

[Lucien Shui](http://www.lucien.ink)
