
A simple news blog with admin panel (with laravel mix).
To start this app, do the following:
1. Clone this repository.
2. In app folder, run commands:
- $composer install
- $npm install 
- $npm run dev
3. Start docker containers:
- $docker-compose up -d
4. Use interactive terminal in docker container:
- $docker exec -it laravel /bin/bash
5. Inside the container run commands:
- $php artisan key:generate
- $php artisan migrate
- $php artisan db:seed
- $php artisan storage:link
- $php artisan queue:work
6. Default admin account:
* login = admin@admin.com
* password = password

