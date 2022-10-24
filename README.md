Простенький блог с добавлением постов и админ панелью на Ларавел (с laravel mix).
Чтобы запустить приложение, делаем следующее:
1) Клонируем репозиторий.
2) В папке с клонированным проектом вводим следующие команды:
$composer install
$npm install 
$npm run dev
3) Поднимаем все контейнеры командой:
$docker-compose up -d
4) Заходим внутрь контейнера командой:
$docker exec -it laravel /bin/bash
5) Внутри контейнера выполняем следующие команды
$php artisan key:generate
$php artisan migrate
$php artisan db:seed
$php artisan storage:link
