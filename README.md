# NetClip
Move information between computers using the any url you like

# Deploy

```
web_site_root
 ├─ index.php
 ├─ submit.php
 ├─ homePage.html
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

# Demo

[clip.lucien.ink](http://www.lucien.ink/clip)

# Copyright

[Lucien Shui](http://www.lucien.ink)
