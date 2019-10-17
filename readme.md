# Find Address by GPS Project

![](screenshot.png)

## Requirements

- Database structure: https://dbdiagram.io/d/5d98694fff5115114db4ef0c

- Updating...

## Libraries

- PHP: Laravel Framework (https://laravel.com/docs/)

## Tools - Softwares

- composer

- git

- Localhost: apache - php - mysql

## Setup

- Create project folder (Ex: findaddress.pro)

- Run cmd (or terminal) in above folder

- Run following commands:

    + `git clone https://<your_github_user_name>@github.com/HienPham1998/MyProject.git && cd MyProject`

    + `composer install`

    + `php -r "file_exists('.env') || copy('.env.example', '.env');"`

    + `php artisan key:generate`

- Edit config in `.env` file: Database, Key google maps api

- Create database and data demo: `php artisan migrate:refresh --seed`

- Run `php artisan serve` and enjoy!

## Meta

- Hanoi University of Industry (HaUI)

- Instructor

    + Hoang Quang Huy

- Members: Group No. 26

    + Hoang Van Thinh

    + Pham Thi Hien

    + Nguyen Van Nam

## More infomation

- Code convention: https://github.com/laravel/laravel