Redirecting traffic to index
=================================
2017-01-29


This technique is used a lot nowadays on the web.
The technique of redirecting traffic to the index (or any other file) consists of redirecting virtual requests to 
a single file.

A virtual request is a request which points to file that doesn't exist.
For instance, the user can see your website through the following urls:

- http://yoursite.com/contact
- http://yoursite.com/categories/fitness
- http://yoursite.com/blog/how-i-found-the-secret-of-life.html
- http://yoursite.com/oldschool?sounds=good


Traditionally, a webserver would map those urls to concrete files on the **yoursite.com** server.
Which means you would normally need to create the corresponding files to every request:  
  

- /app/www/contact
- /app/www/categories/fitness
- /app/www/blog/how-i-found-the-secret-of-life.html
- /app/www/oldschool


But you can also redirect all the traffic to a file of your choice (**app/www/index.php** in the case of a zuk application)
and create your own logic of mapping those urls to files inside of that index file.

In other words, this technique allows us to take control of how traffic is handled inside our application.

That's an awesome technique.


This technique depends on the webserver you are using.


Below, I'm showing how the technique is implemented for the following web servers:

- apache
- nginx


Apache
============

In apache, we can do this with a **.htaccess** (provided that you allow for .htaccess override).
Actually, the zuk default code already contains the .htaccess file (**app/www/.htaccesss**).
The code of the .htaccess file is the following:


```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>
```

Please refer to apache documentation for more information.




Nginx
==============

In nginx, here is the conf file content necessary to implement this redirecting technique:


```nginx
server {
    listen 80; 
    server_name zuk;
    index index.php index.html;
    
    root "/myphp/zuk/public/app/www";
    
    try_files $uri $uri/ /index.php?$query_string;
    
    location ~ \.php {
        include fastcgi_params;
        include fastcgi.conf;
        fastcgi_pass 127.0.0.1:9000;
    }
}

```


This was tested on version 1.10.2.

