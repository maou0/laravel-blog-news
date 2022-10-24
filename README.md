
A simple news blog with admin panel (with laravel mix).
To start this app, do the following:
1. Clone this repository.
2. In app folder, run commands:
```     
composer install
npm install 
npm run dev
```
4. Start docker containers:
```
docker-compose up -d
```
5. Use interactive terminal in docker container:
```
docker exec -it laravel /bin/bash
```
7. Inside the container run commands:
```
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan queue:work
```
8. Default admin account:
```
login = admin@admin.com
password = password
```

