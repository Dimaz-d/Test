First of all, you must create database, change db connection credentials in .env file. 
Then open in terminal project folder and run 

    php artisan migrate --seed

The db will have users with a default password 'qwerty1234567890'.

Open the terminal and run

    php artisan generate:token {email} qwerty1234567890
  
{email} - you can take any email from table Users, as you want. 
You get the token after command in terminal. Your token will expire in 5 minutes, hurry up.
Then run in terminal
  
    php artisan serve
  
to run the project.
  
There are to pages - Catalog and Forms.
On page "Forms" you see two forms for creating and changing information in db. You must use token you get before.
On page "Catalog" you can delete DB recordes, which were created before.

Server config for Laravel applications on Nginx:

    server {
        listen 80;
        server_name server_domain_or_IP;
        root /var/www/server_domain/public;

        add_header X-Frame-Options "SAMEORIGIN";
        add_header X-XSS-Protection "1; mode=block";
        add_header X-Content-Type-Options "nosniff";

        index index.html index.htm index.php;

        charset utf-8;

        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location = /favicon.ico { access_log off; log_not_found off; }
        location = /robots.txt  { access_log off; log_not_found off; }

        error_page 404 /index.php;

        location ~ \.php$ {
            fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
            fastcgi_index index.php;
            fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
            include fastcgi_params;
        }

        location ~ /\.(?!well-known).* {
            deny all;
        }
    }
