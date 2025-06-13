Dockerビルド

https://github.com/tomato-rabbit1833/contact-form-2.git
docker-compose up -d --build

laravel環境構築
docker-compose exec php bash
composer install               
php artisan key:generate                                                 
php artisan migrate                   
php artisan make:migration
php artisan make:migration create_contacts_table
php artisan make:migration create_categories_table
php artisan make:model ModelName -m 
php artisan make:controller ContactController
php artisan make:model Category -m
php artisan make:controller AdminContactController
php artisan make:controller AuthController
php artisan db:seed
php artisan make:seeder CategoriesTableSeeder

使用技術
laravel 10
php 7.4.9
mysql 8.0

URL

開発環境:http://localhost:81/
*自分はnginxのポート番号を81:80にしているのでlocalhostの後に:81をつけてください
phpmyadmin:http://localhost:8081
