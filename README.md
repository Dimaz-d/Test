<h2>Plan</h2>    

| Task         | Spent time, min | Real time spent, min | Comment |
| :---         |     :---:       |         :---:        |     :---:|
| Reading and analyzing the technical specifications   | 10      | 20           |      -   |
| Creating project   | 5      | 3           |      -   |
| Development of a token generation command    | 30        | 20             |   -      |
| Creating script to adding info inot DB <br> with personal access token and JSON object    | 30        | 40             |      -   |
| Creating script to editing info in DB by Id <br> with personal access token and JSON object    | 20        | 20             |    -     |
| Writing comfortable interface on HTML/CSS for working with script    | 30        | 30             |    -     |
| Writing a page, with view of all db's table recordings, and and ability to delete them | 20        | 20             |    -     |
| Checking and fixing code style | 20        | 20             |    perfectionistic ways     |

<h2>How to use</h2>    
    
    git clone https://github.com/Dimaz-d/Test.git

After project cloning run

    composer install --no-scripts --no-autoloader --no-interaction --dev
    
    composer dump-autoload --optimize
    
Rename .env.example to .env
    
    php artisan key:generate

First of all, you must create database and change db connection credentials in .env. 
Then open in terminal project folder and run 

    php artisan migrate --seed

The db will have users with a default password 'qwerty1234567890'.

Open the terminal and run

    php artisan generate:token {email} qwerty1234567890
  
{email} - you can take any email from table Users, as you want. 
You get the token after command in terminal. Your token will expire in 5 minutes, hurry up.

For testing run

    php artisan test

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
